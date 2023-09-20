<?php
include_once 'app/models/Database_manager.php';

class CarTypeData extends DatabaseManager
{
    private $table = "car_type";

    public function getData($car_type_id)
    {
        $sql = "SELECT * FROM $this->table WHERE car_type_id = $car_type_id;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        }
        return null;
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            $data = [];
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_type_id' => $row['car_type_id'],
                    'car_type_name' => $row['car_type_name'],
                    'car_type_describe' => $row['car_type_describe'],
                );
            }
            return $data;
        }
        return null;
    }
}
