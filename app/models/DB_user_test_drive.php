<?php

class TestDriveData extends DatabaseManager
{
    private $table = "user_test_drive";

    public function getAllData()
    {
        $sql = "SELECT td.user_test_drive_id,
                td.user_test_drive_day, 
                td.user_test_drive_time, 
                td.user_test_drive_where, 
                td.user_test_drive_fullname, 
                td.user_test_drive_tel, 
                td.user_test_drive_email,
                td.car_id,
                cars.car_name
                FROM $this->table td
                LEFT JOIN cars ON cars.car_id = td.car_id;";

        $this->result = $this->execute($sql);

        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'user_test_drive_id' => $row['user_test_drive_id'],
                    'user_test_drive_day' => $row['user_test_drive_day'],
                    'user_test_drive_time' => $row['user_test_drive_time'],
                    'user_test_drive_where' => $row['user_test_drive_where'],
                    'user_test_drive_fullname' => $row['user_test_drive_fullname'],
                    'user_test_drive_email' => $row['user_test_drive_email'],
                    'car_name' => $row['car_name'],
                    'car_id' => $row['car_id'],
                );
            }
        }
        return $data;
    }

    public function setData(
        $user_test_drive_day,
        $user_test_drive_time,
        $user_test_drive_where,
        $user_test_drive_fullname,
        $user_test_drive_tel,
        $user_test_drive_email,
        $car_id
    ) {
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
                ?,
                ?,
                ?,
                $car_id);";

        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Lỗi khi chuẩn bị lệnh query: " . $this->conn->error);
        }

        $stmt->bind_param(
            'sss',
            $user_test_drive_fullname,
            $user_test_drive_tel,
            $user_test_drive_email,
        );

        $stmt->execute();

        if ($stmt->affected_rows === -1) {
            die("Lỗi khi thêm dữ liệu: " . $stmt->error);
        }

        $stmt->close();
    }
}
