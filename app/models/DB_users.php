<?php

include_once 'app/models/Database_manager.php';

class UserData extends DatabaseManager
{
    private $table = "users";

    public function getData($id)
    {
        $sql = "SELECT id, name, price FROM $this->table WHERE id = $id;";
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
        $sql = "INSERT INTO $this->table (id, name, price) VALUES (null, '$name', $price);";
        $this->execute($sql);
    }

    public function updateData($id, $name, $price)
    {
        $sql = "UPDATE $this->table SET name = '$name', price = $price
        WHERE id = $id;";
        return $this->execute($sql);
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = $id;";
        return $this->execute($sql);
    }
}
