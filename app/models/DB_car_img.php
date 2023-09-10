<?php
include_once 'app/models/DB_connect.php';

class CarImgData extends DataBase
{
    private $table = "car_img";

    public function getData($car_id)
    {
        $sql = "SELECT car_img_id, car_img_filename, car_id FROM $this->table WHERE car_id = $car_id;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        } else {
            echo "Không có kết quả";
        }
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table;";
        $this->result = $this->execute($sql);;

        if ($this->result->num_rows > 0) {
            return $this->result;
            $data = [];
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_img_id' => $row['car_img_id'],
                    'car_img_filename' => $row['car_img_filename'],
                    'car_id' => $row['car_id'],
                );
            }
            return $data;
        } else {
            echo "Không có kết quả.";
        }
    }

    public function setData($car_img_filename, $car_id)
    {
        $sql = "INSERT INTO $this->table (car_img_id, car_img_filename, car_id) VALUES (null, '$car_img_filename', $car_id);";
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
