<?php

include_once 'app/models/DB_connect.php';

class CarsData extends DataBase
{
    private $table = "cars";

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
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_id' => $row['car_id'],
                    'car_name' => $row['car_name'],
                    'car_seat_id' => $row['car_seat_id'],
                    'car_price' => $row['car_price'],
                    'car_quantity' => $row['car_quantity'],
                    'car_describe' => $row['car_describe'],
                    'car_detail_describe' => $row['car_detail_describe'],
                    'car_img' => $row['car_img'],
                    'car_fuel_id' => $row['car_fuel_id'],
                    'car_type_id' => $row['car_type_id'],
                    'car_producer_id' => $row['car_producer_id'],
                    'car_added_day' => $row['car_added_day'],
                    'car_deleted' => $row['car_deleted'],
                );
            }
            return $data;
        } else {
            echo "Không có kết quả.";
        }
    }

    public function setData(
        $car_name,
        $car_price,
        $car_quantity,
        $car_describe,
        $car_detail_describe,
        $car_img,
        $car_seat_id,
        $car_fuel_id,
        $car_type_id,
        $car_producer_id
    ) {

        $sql = "INSERT INTO $this->table
                    (car_id,
                    car_name,
                    car_price,
                    car_quantity,
                    car_describe,
                    car_detail_describe,
                    car_img,
                    car_seat_id,
                    car_fuel_id,
                    car_type_id,
                    car_producer_id,
                    car_added_day,
                    car_deleted)
                VALUES (
                    null,
                    '$car_name',
                    $car_price,
                    $car_quantity,
                    '$car_describe',
                    '$car_detail_describe',
                    '$car_img',
                    $car_seat_id,
                    $car_fuel_id,
                    $car_type_id,
                    $car_producer_id,
                    NOW(),
                    0);";

        var_dump($sql);
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
