<?php
include_once 'app/models/Database_manager.php';

class CarImgData extends DatabaseManager
{
    private $table = "car_img";

    public function getData($car_img_id)
    {
        $sql = "SELECT car_img_id, car_img_filename, car_id FROM $this->table WHERE car_id = $car_img_id;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        } else {
            echo "Không có kết quả";
        }
    }

    public function getAllData($car_id)
    {
        $sql = "SELECT * FROM $this->table WHERE car_id = $car_id;";
        $this->result = $this->execute($sql);;

        $data = [];
        if ($this->result->num_rows > 0) {
            return $this->result;
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

    public function setData($car_img_file, $car_id, $uploadDir)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $valuesInsertToQuery = '';
        foreach ($car_img_file['name'] as $key => $name) {
            $name =  $key . '_' .  date('Ymd_His_') . $name;
            if (!is_writable($uploadDir)) {
                echo "Thư mục không có quyền ghi";
                die;
            }
            if (!move_uploaded_file($car_img_file['tmp_name'][$key], $uploadDir . $name)) {
                $error = error_get_last();
                echo "Lỗi: " . $error['message'] . ". Không thể thêm hình ảnh";
            }
            $valuesInsertToQuery =  $valuesInsertToQuery . "( null, '$name', NOW(), $car_id),";
        }
        // Loại bỏ dấu ',' cuối cùng
        $valuesInsertToQuery = rtrim($valuesInsertToQuery, ',');
        $sql = "INSERT INTO $this->table (car_img_id, car_img_filename, car_img_update_at, car_id) VALUES $valuesInsertToQuery";
        $this->execute($sql);
    }

    public function updateData($car_img_id, $car_img_filename, $car_id)
    {
        $sql = "UPDATE $this->table SET car_img_filename = '$car_img_filename', car_id = $car_id
        WHERE car_img_id = $car_img_id;";
        return $this->execute($sql);
    }

    public function deleteData($car_img_id)
    {
        $sql = "DELETE FROM $this->table WHERE car_img_id = $car_img_id;";
        return $this->execute($sql);
    }
}
