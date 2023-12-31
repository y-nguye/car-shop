<?php

class CarSeatData extends DatabaseManager
{
    private $table = "car_seat";

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
