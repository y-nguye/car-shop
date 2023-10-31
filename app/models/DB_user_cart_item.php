<?php

class UserCartItem extends DatabaseManager
{
    private $table = "user_cart_item";

    public function getAllDataByUserID($user_id)
    {
        if (!$user_id) return null;

        $sql = "SELECT cart_item.user_cart_item_id, 
                cart_item.user_id, 
                cart_item.car_id, 
                cars.car_name, 
                cars.car_price, 
                cars.car_describe, 
                MIN(car_img.car_img_filename) AS car_img_filename
                FROM user_cart_item cart_item 
                LEFT JOIN car_img ON car_img.car_id = cart_item.car_id
                LEFT JOIN cars ON cars.car_id = cart_item.car_id
                WHERE cart_item.user_id = $user_id
                GROUP BY cart_item.user_cart_item_id;";

        $this->result = $this->execute($sql);

        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'user_cart_item_id' => $row['user_cart_item_id'],
                    'user_id' => $row['user_id'],
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

    public function checkDataByUserIDAndCarID($user_id, $car_id)
    {
        $sql = "SELECT * FROM $this->table WHERE user_id = $user_id AND car_id = $car_id;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function setData($user_id, $car_id)
    {
        $sql = "INSERT INTO $this->table (user_cart_item_id, user_id, car_id) VALUES (null, $user_id, $car_id);";
        $this->execute($sql);
    }


    public function deleteData($car_id)
    {
        $sql = "DELETE FROM $this->table WHERE car_id = $car_id;";
        $this->result = $this->execute($sql);
    }
}
