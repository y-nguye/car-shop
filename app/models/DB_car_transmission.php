<?php

class CarTransmissionData extends DatabaseManager
{
    private $table = "car_transmission";

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
