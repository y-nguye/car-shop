<?php

class AdminData
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "car_shop";
    private $table = "admin";

    private $conn = null;
    private $result = null;

    public function connect()
    {
        try {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

            if ($this->conn->connect_error) {
                throw new Exception("Kết nối thất bại: " . $this->conn->connect_error);
            }
            // Thiết lập bảng mã kết nối
            if (!$this->conn->set_charset('utf8')) {
                throw new Exception("Lỗi khi thiết lập bảng mã kết nối: " . $this->conn->error);
            }
            return $this->conn;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            exit();
        }
    }

    public function execute($sql)
    {
        $this->result = $this->conn->query($sql);
        return $this->result;
    }

    public function getData($id)
    {
        $sql = "SELECT id, username, password FROM $this->table WHERE id = $id;";
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
