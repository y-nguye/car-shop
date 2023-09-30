<?php

include_once 'app/models/Database_manager.php';

class TestDriveData extends DatabaseManager
{
    private $table = "user_test_drive";

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

    public function setData($user_test_drive_day, $user_test_drive_time, $user_test_drive_where, $user_test_drive_fullname, $user_test_drive_tel, $user_test_drive_email, $car_id)
    {
        $sql = "INSERT INTO $this->table
                (user_test_drive_id,
                user_test_drive_day,
                user_test_drive_time,
                user_test_drive_where,
                user_test_drive_fullname,
                user_test_drive_tel,
                user_test_drive_email,
                car_id)
            VALUES (
                null,
                '$user_test_drive_day',
                '$user_test_drive_time',
                '$user_test_drive_where',
                '$user_test_drive_fullname',
                '$user_test_drive_tel',
                '$user_test_drive_email',
                $car_id);";

        $this->execute($sql);
    }
}
