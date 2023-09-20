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

    public function getAllData($car_id)
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
        foreach ($carImgFilesFromInput['name'] as $key => $name) {
            $name =  $key . '_' .  date('Ymd_His_') . $name;
            if (!move_uploaded_file($carImgFilesFromInput['tmp_name'][$key], $uploadDir . $name)) {
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

    public function updateData($data_car_img, $carImgFilesFromInput, $car_id, $uploadDir)
    {
        if (!is_writable($uploadDir)) {
            echo "Thư mục không có quyền ghi";
            die;
        }

        $flag = false;
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        foreach ($carImgFilesFromInput['name'] as $key => $name) {
            $name =  $key . '_' .  date('Ymd_His_') . $name;

            if (isset($data_car_img[$key]['car_img_id'])) {
                // Đánh dấu khi số lượng hình ảnh từ input = số lần lặp trong foreach
                count($carImgFilesFromInput['name']) - 1 == $key && $flag = true;

                if (!move_uploaded_file($carImgFilesFromInput['tmp_name'][$key], $uploadDir . $name)) {
                    $error = error_get_last();
                    echo "Lỗi: " . $error['message'] . ". Không thể thêm hình ảnh";
                    die();
                }
                // Xoá hình cũ để tránh rác
                unlink($uploadDir . $data_car_img[$key]['car_img_filename']);

                $sql = "UPDATE $this->table SET car_img_filename = '$name', car_img_update_at = NOW(), car_id = $car_id
            WHERE car_img_id = " . $data_car_img[$key]['car_img_id'] . ";";
                $this->execute($sql);

                // Nếu cờ được bật, bắt đầu vòng lặp, đặt những cột thừa trong database về 'null' và xoá những hình ảnh thừa
                if ($flag) {
                    // Khi có những cột thừa...
                    for ($i = $key + 1; $i <= count($data_car_img) - 1; $i++) {
                        unlink($uploadDir . $data_car_img[$i]['car_img_filename']);
                        $sql = "UPDATE $this->table SET car_img_filename = NULL, car_img_update_at = NOW(), car_id = $car_id
                    WHERE car_img_id = " . $data_car_img[$i]['car_img_id'] . ";";
                        $this->execute($sql);
                    }
                    $flag = false;
                }
            } else { // Dữ liệu hình ảnh thêm nhiều hơn so với trước khi cập nhật thì tạo thêm cột
                // var_dump("Dữ liệu thêm nhiều hơn" . $name);
                if (!move_uploaded_file($carImgFilesFromInput['tmp_name'][$key], $uploadDir . $name)) {
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
