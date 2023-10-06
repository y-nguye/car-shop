<?php

include_once 'app/models/Database_manager.php';

class CarsData extends DatabaseManager
{
    private $table = "cars";

    public function getDataByID($car_id)
    {
        if (!$car_id) return null;
        $sql = "SELECT car.car_id,
                car.car_name, 
                car.car_price,
                car.car_quantity,
                car.car_engine,
                car.car_describe,
                car.car_detail_describe,
                car.car_type_id,
                car.car_seat_id,
                car.car_fuel_id,
                car.car_producer_id,
                car.car_transmission_id,
                car.car_update_at,
                car.car_deleted_at,
                car_type.car_type_name,
                car_fuel.car_fuel,
                car_producer.car_producer_name,
                car_transmission.car_transmission,
                car_seat.car_seat,
                MIN(car_img.car_img_filename) AS car_img_filename
                FROM $this->table car
                LEFT JOIN car_type ON car_type.car_type_id = car.car_type_id
                LEFT JOIN car_seat ON car_seat.car_seat_id = car.car_seat_id
                LEFT JOIN car_fuel ON car_fuel.car_fuel_id = car.car_fuel_id
                LEFT JOIN car_producer ON car_producer.car_producer_id = car.car_producer_id
                LEFT JOIN car_transmission ON car_transmission.car_transmission_id = car.car_transmission_id
                LEFT JOIN car_img ON car_img.car_id = car.car_id
                WHERE car.car_id = $car_id AND car.car_deleted = 0;";

        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        }
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table WHERE car_deleted = 0;";
        $this->result = $this->execute($sql);

        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_id' => $row['car_id'],
                    'car_name' => $row['car_name'],
                    'car_seat_id' => $row['car_seat_id'],
                    'car_price' => $row['car_price'],
                    'car_quantity' => $row['car_quantity'],
                    'car_describe' => $row['car_describe'],
                    'car_detail_describe' => $row['car_detail_describe'],
                    'car_engine' => $row['car_engine'],
                    'car_fuel_id' => $row['car_fuel_id'],
                    'car_type_id' => $row['car_type_id'],
                    'car_transmission_id' => $row['car_transmission_id'],
                    'car_producer_id' => $row['car_producer_id'],
                    'car_update_at' => $row['car_update_at'],
                    'car_deleted' => $row['car_deleted'],
                    'car_deleted_at' => $row['car_deleted_at'],
                );
            }
        }
        return $data;
    }

    public function getAllDataWithFirstImgByCarTypeID($car_type_id)
    {
        $sql = "SELECT car.car_id, car.car_name, car.car_price, car.car_describe,
                car_type.car_type_id,
                car_type.car_type_name,
                MIN(car_img.car_img_filename) AS car_img_filename
                FROM $this->table car 
                LEFT JOIN car_type ON car_type.car_type_id = car.car_type_id 
                LEFT JOIN car_img ON car_img.car_id = car.car_id
                WHERE car.car_deleted = 0 AND car.car_type_id = $car_type_id
                GROUP BY car.car_id;";

        $this->result = $this->execute($sql);

        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_id' => $row['car_id'],
                    'car_name' => $row['car_name'],
                    'car_price' => $row['car_price'],
                    'car_describe' => $row['car_describe'],
                    'car_type_id' => $row['car_type_id'],
                    'car_type_name' => $row['car_type_name'],
                    'car_img_filename' => $row['car_img_filename'],
                );
            }
        }
        return $data;
    }

    public function getAllDataWithSecondImgByCarIDs($car_ids)
    {
        $car_ids = implode(' ,', $car_ids);
        $sql = "SELECT
                car.car_id,
                car.car_name,
                car.car_price,
                car.car_describe,
                (
                    SELECT car_img.car_img_filename
                    FROM car_img
                    WHERE car_img.car_id = car.car_id
                    LIMIT 1 OFFSET 1
                ) AS car_img_filename
            FROM $this->table car
            WHERE car.car_deleted = 0 AND car.car_id IN ($car_ids);";

        $this->result = $this->execute($sql);

        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_id' => $row['car_id'],
                    'car_name' => $row['car_name'],
                    'car_price' => $row['car_price'],
                    'car_describe' => $row['car_describe'],
                    'car_img_filename' => $row['car_img_filename'],
                );
            }
        }
        return $data;
    }

    public function getAllDataWithSecondImgByFourNewUpdate()
    {
        $sql = "SELECT
                car.car_id,
                car.car_name,
                car.car_price,
                car.car_describe,
                (
                    SELECT car_img.car_img_filename
                    FROM car_img
                    WHERE car_img.car_id = car.car_id
                    LIMIT 1 OFFSET 1
                ) AS car_img_filename
            FROM $this->table car
            WHERE car.car_deleted = 0
            ORDER BY car.car_update_at DESC LIMIT 4;";

        $this->result = $this->execute($sql);

        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_id' => $row['car_id'],
                    'car_name' => $row['car_name'],
                    'car_price' => $row['car_price'],
                    'car_describe' => $row['car_describe'],
                    'car_img_filename' => $row['car_img_filename'],
                );
            }
        }
        return $data;
    }


    public function getAllDataDeleted()
    {
        $sql = "SELECT * FROM $this->table WHERE car_deleted = 1;";
        $this->result = $this->execute($sql);
        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_id' => $row['car_id'],
                    'car_name' => $row['car_name'],
                    'car_price' => $row['car_price'],
                    'car_quantity' => $row['car_quantity'],
                    'car_deleted_at' => $row['car_deleted_at'],
                );
            }
        }
        return $data;
    }

    public function setData(
        $car_name,
        $car_price,
        $car_quantity,
        $car_describe,
        $car_detail_describe,
        $car_engine,
        $car_type_id,
        $car_seat_id,
        $car_fuel_id,
        $car_transmission_id,
        $car_producer_id
    ) {

        $sql = "INSERT INTO $this->table
                    (car_id,
                    car_name,
                    car_price,
                    car_quantity,
                    car_describe,
                    car_detail_describe,
                    car_engine,
                    car_type_id,
                    car_seat_id,
                    car_fuel_id,
                    car_transmission_id,
                    car_producer_id,
                    car_update_at,
                    car_deleted,
                    car_deleted_at)
                VALUES (
                    null,
                    '$car_name',
                    $car_price,
                    $car_quantity,
                    '$car_describe',
                    '$car_detail_describe',
                    '$car_engine',
                    $car_type_id,
                    $car_seat_id,
                    $car_fuel_id,
                    $car_transmission_id,
                    $car_producer_id,
                    NOW(),
                    0,
                    null);";

        $this->execute($sql);
    }

    public function updateData(
        $car_id,
        $car_name,
        $car_price,
        $car_quantity,
        $car_describe,
        $car_detail_describe,
        $car_engine,
        $car_type_id,
        $car_seat_id,
        $car_fuel_id,
        $car_transmission_id,
        $car_producer_id
    ) {
        $sql = "UPDATE $this->table
                SET car_name = '$car_name',
                    car_price = $car_price,
                    car_quantity = $car_quantity,
                    car_describe = '$car_describe',
                    car_detail_describe = '$car_detail_describe',
                    car_engine = '$car_engine',
                    car_type_id = $car_type_id,
                    car_seat_id = $car_seat_id,
                    car_fuel_id = $car_fuel_id,
                    car_transmission_id = $car_transmission_id,
                    car_producer_id = $car_producer_id,
                    car_update_at = NOW()
                WHERE car_id = $car_id;";

        return $this->execute($sql);
    }

    public function restore($ids)
    {
        $ids = implode(' ,', $ids);
        $sql = "UPDATE $this->table SET car_deleted = 0, car_update_at = NOW() WHERE  car_id IN ($ids);";
        return $this->execute($sql);
    }

    public function softDelete($ids)
    {
        $ids = implode(' ,', $ids);
        $sql = "UPDATE $this->table SET car_deleted = 1, car_deleted_at = NOW() WHERE car_id IN ($ids);";
        return $this->execute($sql);
    }

    public function forceDelete($ids, $uploadDir)
    {
        // Xoá hình trong thư mục uploads
        foreach ($ids as $id) {
            $sql = "SELECT car_img_filename FROM car_img WHERE car_id = $id;";
            $this->result = $this->execute($sql);
            if ($this->result->num_rows > 0) {
                while ($row = $this->result->fetch_assoc()) {
                    if ($row['car_img_filename'] && file_exists($uploadDir . $row['car_img_filename'])) {
                        unlink($uploadDir . $row['car_img_filename']);
                    }
                }
            }
        }
        $ids = implode(' ,', $ids);
        $sql = "DELETE FROM $this->table WHERE car_id IN ($ids);";
        $this->result = $this->execute($sql);
    }
}
