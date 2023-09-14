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

    public function setData($name, $price)
    {
        $sql = "INSERT INTO $this->table (user_id, name, price) VALUES (null, '$name', $price);";
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
