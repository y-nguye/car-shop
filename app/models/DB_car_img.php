<?php
include_once 'app/models/Database_manager.php';

class CarImgData extends DatabaseManager
{
    private $table = "car_img";

    public function getData($car_img_id)
    {
        $sql = "SELECT * FROM $this->table WHERE car_img_id = $car_img_id;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        }
        return null;
    }

    public function getAllDataByCarID($car_id)
    {
        $sql = "SELECT * FROM $this->table WHERE car_id = $car_id ORDER BY car_img_id ASC;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            $data = [];
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_img_id' => $row['car_img_id'],
                    'car_img_filename' => $row['car_img_filename'],
                    'car_img_update_at' => $row['car_img_update_at'],
                    'car_id' => $row['car_id'],
                );
            }
            return $data;
        }
        return null;
    }

    public function setData($carImgFilesFromInput, $car_id, $uploadDir)
    {
        if (!is_writable($uploadDir)) {
            echo "Thư mục không có quyền ghi";
            die;
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $valuesInsertToQuery = '';
        foreach ($carImgFilesFromInput['name'] as $index => $name) {
            $name =  $index . '_' .  date('Ymd_His_') . $name;
            if (!move_uploaded_file($carImgFilesFromInput['tmp_name'][$index], $uploadDir . $name)) {
                $error = error_get_last();
                echo "Lỗi: " . $error['message'] . ". Không thể thêm hình ảnh";
            }
            $valuesInsertToQuery =  $valuesInsertToQuery . "(null, '$name', NOW(), $car_id),";
        }
        // Loại bỏ dấu ',' cuối cùng
        $valuesInsertToQuery = rtrim($valuesInsertToQuery, ',');
        $sql = "INSERT INTO $this->table (car_img_id, car_img_filename, car_img_update_at, car_id) VALUES $valuesInsertToQuery";
        $this->execute($sql);
    }

    public function updateData($data_all_car_img, $carImgFilesFromInput, $car_id, $uploadDir)
    {
        if (!is_writable($uploadDir)) {
            echo "Thư mục không có quyền ghi";
            die;
        }

        $whenNumberOfImageOnInputEqualIndex = false;
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        foreach ($carImgFilesFromInput['name'] as $index => $name) {
            $name =  $index . '_' .  date('Ymd_His_') . $name;

            if (isset($data_all_car_img[$index]['car_img_id'])) {
                // Đánh dấu khi số lượng hình ảnh từ input = số lần lặp trong foreach
                count($carImgFilesFromInput['name']) - 1 == $index && $whenNumberOfImageOnInputEqualIndex = true;

                if (!move_uploaded_file($carImgFilesFromInput['tmp_name'][$index], $uploadDir . $name)) {
                    $error = error_get_last();
                    echo "Lỗi: " . $error['message'] . ". Không thể thêm hình ảnh";
                    die();
                }
                // Xoá hình cũ để tránh rác
                unlink($uploadDir . $data_all_car_img[$index]['car_img_filename']);

                $sql = "UPDATE $this->table SET car_img_filename = '$name', car_img_update_at = NOW(), car_id = $car_id
            WHERE car_img_id = " . $data_all_car_img[$index]['car_img_id'] . ";";
                $this->execute($sql);

                if ($whenNumberOfImageOnInputEqualIndex) {
                    // Bắt đầu vòng lặp xoá cột thừa
                    for ($i = $index + 1; $i <= count($data_all_car_img) - 1; $i++) {
                        unlink($uploadDir . $data_all_car_img[$i]['car_img_filename']);
                        $sql = "DELETE FROM $this->table WHERE car_img_id = " . $data_all_car_img[$i]['car_img_id'] . ";";
                        $this->execute($sql);
                    }
                    $whenNumberOfImageOnInputEqualIndex = false;
                }
            } else { // Dữ liệu hình ảnh thêm nhiều hơn so với trước khi cập nhật thì tạo thêm cột
                // var_dump("Dữ liệu thêm nhiều hơn" . $name);
                if (!move_uploaded_file($carImgFilesFromInput['tmp_name'][$index], $uploadDir . $name)) {
                    $error = error_get_last();
                    echo "Lỗi: " . $error['message'] . ". Không thể thêm hình ảnh";
                    die();
                }
                $sql = "INSERT INTO $this->table (car_img_id, car_img_filename, car_img_update_at, car_id) VALUES (null, '$name', NOW(), $car_id);";
                $this->execute($sql);
            };
        }
    }

    public function deleteData($car_id)
    {
        $sql = "DELETE FROM $this->table WHERE car_id = $car_id;";
        return $this->execute($sql);
    }
}
