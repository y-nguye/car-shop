<?php

class CarFuelData extends DatabaseManager
{
    private $table = "car_fuel";

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table;";
        $this->result = $this->execute($sql);

        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_fuel_id' => $row['car_fuel_id'],
                    'car_fuel' => $row['car_fuel'],
                );
            }
        }
        return $data;
    }
}
