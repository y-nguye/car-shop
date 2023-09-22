<?php

include_once 'app/models/Database_manager.php';

class CarFuelData extends DatabaseManager
{
    private $table = "car_fuel";

    public function getDataByID($car_fuel_id)
    {
        if (!$car_fuel_id) $car_fuel_id = 'NULL';
        $sql = "SELECT * FROM $this->table WHERE car_fuel_id = $car_fuel_id;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        }
        return null;
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
                    'car_fuel' => $row['car_fuel'],
                );
            }
            return $data;
        }
        return null;
    }
}
