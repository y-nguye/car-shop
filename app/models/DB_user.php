<?php

include_once 'app/models/Database_manager.php';

class UserData extends DatabaseManager
{
    private $table = "user";

    public function getData($user_username)
    {
        $sql = "SELECT * FROM $this->table WHERE user_username = '$user_username' OR user_email = '$user_username';";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        } else {
            echo "Không có kết quả";
        }
    }

    public function checkDataByUsername($user_username)
    {
        $sql = "SELECT * FROM $this->table WHERE user_username = '$user_username';";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function checkDataByEmail($user_email)
    {
        $sql = "SELECT * FROM $this->table WHERE user_email = '$user_email';";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table;";
        $this->result = $this->execute($sql);;

        if ($this->result->num_rows > 0) {
            return $this->result;
        } else {
            echo "Không có kết quả.";
        }
    }

    public function setData($user_username, $user_password, $user_fullname, $user_tel, $user_email, $user_address)
    {
        $sql = "INSERT INTO $this->table (user_id,
                                        user_username,
                                        user_password,
                                        user_fullname,
                                        user_tel,
                                        user_email,
                                        user_address,
                                        user_avt,
                                        user_is_admin)
                                    VALUES (
                                        null,
                                        '$user_username',
                                        '$user_password',
                                        '$user_fullname',
                                        '$user_tel',
                                        '$user_email',
                                        '$user_address',
                                        NULL,
                                        0);";
        $this->execute($sql);
    }

    public function updateData($user_id, $name, $price)
    {
        $sql = "UPDATE $this->table SET name = '$name', price = $price
        WHERE user_id = $user_id;";
        return $this->execute($sql);
    }

    public function deleteData($user_id)
    {
        $sql = "DELETE FROM $this->table WHERE user_id = $user_id;";
        return $this->execute($sql);
    }
}
