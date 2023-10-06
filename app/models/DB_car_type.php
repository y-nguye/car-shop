<?php
include_once 'app/models/Database_manager.php';

class CarTypeData extends DatabaseManager
{
    private $table = "car_type";

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table;";
        $this->result = $this->execute($sql);

        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_type_id' => $row['car_type_id'],
                    'car_type_name' => $row['car_type_name'],
                );
            }
        }
        return $data;
    }
}
