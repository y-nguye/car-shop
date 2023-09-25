<?php

include_once 'app/models/Database_manager.php';

class CarTransmissionData extends DatabaseManager
{
    private $table = "car_transmission";

    public function getDataByID($car_transmission_id)
    {
        if (!$car_transmission_id) $car_transmission_id = 'NULL';
        $sql = "SELECT * FROM $this->table WHERE car_transmission_id = $car_transmission_id;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        }
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table;";
        $this->result = $this->execute($sql);
        $data = [];
        if ($this->result->num_rows > 0) {
            // Trích xuất dữ liệu sang mảng liên hợp
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_transmission_id' => $row['car_transmission_id'],
                    'car_transmission' => $row['car_transmission'],
                );
            }
        }
        return $data;
    }
}
