<?php

include_once 'app/models/Database_manager.php';

class CarSeatData extends DatabaseManager
{
    private $table = "car_seat";

    public function getDataByID($car_seat_id)
    {
        if (!$car_seat_id) $car_seat_id = 'NULL';
        $sql = "SELECT * FROM $this->table WHERE car_seat_id = $car_seat_id;";
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
        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_seat_id' => $row['car_seat_id'],
                    'car_seat' => $row['car_seat'],
                );
            }
        }
        return $data;
    }
}
