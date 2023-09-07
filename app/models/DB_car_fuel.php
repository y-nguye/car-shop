<?php

include_once 'app/models/DB_connect.php';

class CarFuelData extends DataBase
{
    private $table = "car_fuel";

    public function getData($car_type_id)
    {
        $sql = "SELECT car_type_id, car_type_name, car_type_describe FROM $this->table WHERE car_type_id = $car_type_id;";
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
            $data = [];
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_fuel_id' => $row['car_fuel_id'],
                    'car_fuel_type' => $row['car_fuel_type'],
                );
            }
            return $data;
        } else {
            echo "Không có kết quả.";
        }
    }

    public function setData($car_type_name, $car_type_describe)
    {
        $sql = "INSERT INTO $this->table (car_type_id, car_type_name, car_type_describe) VALUES (null, '$car_type_name', $car_type_describe);";
        $this->execute($sql);
    }

    public function updateData($car_type_id, $car_type_name, $car_type_describe)
    {
        $sql = "UPDATE $this->table SET car_type_name = '$car_type_name', car_type_describe = $car_type_describe
        WHERE car_type_id = $car_type_id;";
        return $this->execute($sql);
    }

    public function deleteData($car_type_id)
    {
        $sql = "DELETE FROM $this->table WHERE car_type_id = $car_type_id;";
        return $this->execute($sql);
    }
}
