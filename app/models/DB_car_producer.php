<?php

include_once 'app/models/Database_manager.php';

class CarProducerData extends DatabaseManager
{
    private $table = "car_producer";

    public function getDataByID($car_producer_id)
    {
        $sql = "SELECT * FROM $this->table WHERE car_producer_id = $car_producer_id;";
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
            // Trích xuất dữ liệu sang mảng liên hợp
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_producer_id' => $row['car_producer_id'],
                    'car_producer_name' => $row['car_producer_name'],
                );
            }
            return $data;
        }
        return null;
    }
}
