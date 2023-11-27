<?php

class CarImgData extends DatabaseManager
{
    private $table = "car_img";

    public function getFirstDataByCarID($car_id)
    {
        if (!$car_id) return null;
        $sql = "SELECT MIN(car_img_filename) AS car_img_filename FROM $this->table WHERE car_id = $car_id;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        }
    }

    public function getAllDataByCarID($car_id)
    {
        $sql = "SELECT * FROM $this->table WHERE car_id = $car_id ORDER BY car_img_id ASC;";
        $this->result = $this->execute($sql);

        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_img_id' => $row['car_img_id'],
                    'car_img_filename' => $row['car_img_filename'],
                    'car_img_update_at' => $row['car_img_update_at'],
                    'car_id' => $row['car_id'],
                );
            }
        }
        return $data;
    }

    public function setData($carImgFilesFromInput, $car_id, $uploadDir)
    {
        if (!is_writable($uploadDir)) {
            echo "Thư mục không có quyền ghi";
            die();
        }

        $valuesInsertIntoQuery = $this->moveUploadedFileAndReturnValuesInsertIntoQuery($carImgFilesFromInput, $car_id, $uploadDir);

        $sql = "INSERT INTO $this->table (car_img_id, car_img_filename, car_img_update_at, car_id) VALUES $valuesInsertIntoQuery";
        $this->execute($sql);
    }

    public function updateData($data_all_car_img, $carImgFilesFromInput, $car_id, $uploadDir)
    {
        if (!is_writable($uploadDir)) {
            echo "Thư mục không có quyền ghi";
            die();
        }

        $whenNumberOfImageOnInputEqualIndex = false;
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        foreach ($carImgFilesFromInput['name'] as $index => $name) {
            $name =  $index . '_' .  date('Ymd_His_') . $name;

            if (isset($data_all_car_img[$index]['car_img_id'])) {
                // Đánh dấu khi số lượng hình ảnh từ input = số lần lặp trong foreach
                count($carImgFilesFromInput['name']) - 1 == $index && $whenNumberOfImageOnInputEqualIndex = true;

                $this->moveUploadedFile($carImgFilesFromInput, $index, $name, $uploadDir);

                // Kiểm tra xem tên tệp khác null và tệp có tồn tại trong đường dẫn hay không
                if ($data_all_car_img[$index]['car_img_filename'] && file_exists($uploadDir . $data_all_car_img[$index]['car_img_filename'])) {
                    // Xoá hình cũ để tránh rác
                    unlink($uploadDir . $data_all_car_img[$index]['car_img_filename']);
                }

                $sql = "UPDATE $this->table SET car_img_filename = '$name', car_img_update_at = NOW(), car_id = $car_id
                        WHERE car_img_id = " . $data_all_car_img[$index]['car_img_id'] . ";";
                $this->execute($sql);
                // Xoá hàng thừa
                $this->deleteRedundantRowsAndDeleteImgOnUploadsDir($data_all_car_img, $whenNumberOfImageOnInputEqualIndex, $index, $uploadDir);
            }
            // Dữ liệu hình ảnh thêm nhiều hơn so với trước khi cập nhật thì tạo thêm hàng
            else {
                $this->moveUploadedFile($carImgFilesFromInput, $index, $name, $uploadDir);
                $sql = "INSERT INTO $this->table (car_img_id, car_img_filename, car_img_update_at, car_id) VALUES (null, '$name', NOW(), $car_id);";
                $this->execute($sql);
            };
        }
    }

    private function moveUploadedFileAndReturnValuesInsertIntoQuery($carImgFilesFromInput, $car_id, $uploadDir)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $valuesInsertIntoQuery = '';
        foreach ($carImgFilesFromInput['name'] as $index => $name) {
            $name =  $index . '_' .  date('Ymd_His_') . $name;
            $this->moveUploadedFile($carImgFilesFromInput, $index, $name, $uploadDir);
            $valuesInsertIntoQuery =  $valuesInsertIntoQuery . "(null, '$name', NOW(), $car_id),";
        }
        // Loại bỏ dấu ',' cuối cùng
        return rtrim($valuesInsertIntoQuery, ',');
    }

    private function deleteRedundantRowsAndDeleteImgOnUploadsDir($data_all_car_img, $whenNumberOfImageOnInputEqualIndex, $index, $uploadDir)
    {
        if ($whenNumberOfImageOnInputEqualIndex) {
            // Tiếp tục tại index cuối
            $indexContinue = $index + 1;
            // Bắt đầu vòng lặp xoá hàng thừa
            for ($i = $indexContinue; $i <= count($data_all_car_img) - 1; $i++) {
                if ($data_all_car_img[$i]['car_img_filename'] && file_exists($uploadDir . $data_all_car_img[$i]['car_img_filename'])) {
                    unlink($uploadDir . $data_all_car_img[$i]['car_img_filename']);
                }
                $sql = "DELETE FROM $this->table WHERE car_img_id = " . $data_all_car_img[$i]['car_img_id'] . ";";
                $this->execute($sql);
            }
        }
    }

    private function moveUploadedFile($carImgFilesFromInput, $index, $name, $uploadDir)
    {
        if (!move_uploaded_file($carImgFilesFromInput['tmp_name'][$index], $uploadDir . $name)) {
            $error = error_get_last();
            echo "Lỗi: " . $error['message'] . ". Không thể thêm hình ảnh";
            die();
        }
    }
}
