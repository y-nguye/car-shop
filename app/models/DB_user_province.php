<?php

include_once 'app/models/Database_manager.php';

class UserProvinceData extends DatabaseManager
{
    private $table = "user_province";

    public function getDataByID($user_province_id)
    {
        $sql = "SELECT * FROM $this->table WHERE user_province_id = $user_province_id;";
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
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'user_province_id' => $row['user_province_id'],
                    'user_province_name' => $row['user_province_name'],
                    'user_registration_fee' => $row['user_registration_fee'],
                );
            }
        }
        return $data;
    }
}
