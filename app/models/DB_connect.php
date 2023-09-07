<?php

class DataBase
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "car_shop";
    public $conn = null;
    public $result = null;

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
}
