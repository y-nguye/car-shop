<?php

include_once 'app/models/DB_connect.php';

class CarProducerData extends DataBase
{
    private $table = "car_producer";

    public function getData($id)
    {
        $sql = "SELECT car_id, car_name, car_price, car_quantity, car_producer_id, car_type_id  FROM $this->table WHERE car_id = $id;";
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
        $this->result = $this->execute($sql);
        if ($this->result->num_rows > 0) {
            $data = [];
            // Trích xuất dữ liệu sang mảng liên hợp
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_producer_id' => $row['car_producer_id'],
                    'car_producer_name' => $row['car_producer_name'],
                );
            }
            return $data;
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
