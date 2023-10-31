<?php

class DatabaseManager
{
    private $hostname;
    private $username;
    private $password;
    private $dbname;

    public $conn = null;
    public $result = null;
    public $id = null;

    public function __construct()
    {
        $this->hostname = $_ENV['DB_HOST'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->dbname = $_ENV['DB_DATABASE'];
    }

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

    public function disconnect()
    {
        if ($this->conn !== null) {
            $this->conn->close();
            $this->conn = null; // Đặt đối tượng kết nối về giá trị null để đảm bảo không sử dụng nó sau khi đã đóng kết nối.
        }
    }

    public function execute($sql)
    {
        $this->result = $this->conn->query($sql);
        $this->id = $this->conn->insert_id;
        return $this->result;
    }
}
