<?php

class UserDepositData extends DatabaseManager
{
    private $table = "user_deposit";

    public function getDataByID($user_deposit_id)
    {
        if (!$user_deposit_id) return null;
        $sql = "SELECT deposit.user_deposit_id,
                deposit.user_deposit_fullname,
                deposit.user_deposit_tel,
                deposit.user_deposit_email,
                deposit.user_deposit_total_price,
                deposit.user_deposit_price,
                deposit.user_deposit_where,
                deposit.user_deposit_is_payed, 
                deposit.user_deposit_is_contacted, 
                deposit.user_deposit_at,
                deposit.pay_method_id,
                deposit.car_id,
                deposit.user_id,
                cars.car_name,
                cars.car_price,
                pay_method.pay_method_name,
                MIN(car_img.car_img_filename) AS car_img_filename
                FROM $this->table deposit
                LEFT JOIN cars ON cars.car_id = deposit.car_id
                LEFT JOIN car_img ON car_img.car_id = deposit.car_id
                LEFT JOIN pay_method ON pay_method.pay_method_id = deposit.pay_method_id
                WHERE deposit.user_deposit_id = $user_deposit_id;";

        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        }
    }

    public function getAllDataByUserID($user_id)
    {
        $sql = "SELECT deposit.user_deposit_id, 
                deposit.user_deposit_where,
                deposit.user_deposit_price,
                deposit.user_deposit_at,
                deposit.pay_method_id,
                deposit.car_id,
                deposit.user_id,
                cars.car_name,
                pay_method.pay_method_name,
                MIN(car_img.car_img_filename) AS car_img_filename
                FROM $this->table deposit
                LEFT JOIN cars ON cars.car_id = deposit.car_id
                LEFT JOIN car_img ON car_img.car_id = deposit.car_id
                LEFT JOIN pay_method ON pay_method.pay_method_id = deposit.pay_method_id
                WHERE deposit.user_id = $user_id
                GROUP BY deposit.user_deposit_id;";

        $this->result = $this->execute($sql);

        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'user_deposit_id' => $row['user_deposit_id'],
                    'user_deposit_where' => $row['user_deposit_where'],
                    'user_deposit_price' => $row['user_deposit_price'],
                    'user_deposit_at' => $row['user_deposit_at'],
                    'pay_method_id' => $row['pay_method_id'],
                    'pay_method_name' => $row['pay_method_name'],
                    'user_id' => $row['user_id'],
                    'car_id' => $row['car_id'],
                    'car_name' => $row['car_name'],
                    'car_img_filename' => $row['car_img_filename'],
                );
            }
        }
        return $data;
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result;
        }
        return null;
    }

    public function setData(
        $user_deposit_fullname,
        $user_deposit_tel,
        $user_deposit_email,
        $user_deposit_total_price,
        $user_deposit_price,
        $user_deposit_where,
        $pay_method_id,
        $user_id,
        $car_id
    ) {
        $sql = "INSERT INTO $this->table
                (user_deposit_id,
                user_deposit_fullname,
                user_deposit_tel,
                user_deposit_email,
                user_deposit_total_price,
                user_deposit_price,
                user_deposit_where,
                user_deposit_is_payed,
                user_deposit_is_contacted,
                user_deposit_at,
                pay_method_id,
                user_id,
                car_id)
            VALUES (
                null,
                ?,
                ?,
                ?,
                $user_deposit_total_price,
                $user_deposit_price,
                '$user_deposit_where',
                0,
                0,
                NOW(),
                $pay_method_id,
                $user_id,
                $car_id);";

        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Lỗi khi chuẩn bị lệnh query: " . $this->conn->error);
        }

        $stmt->bind_param(
            'sss',
            $user_deposit_fullname,
            $user_deposit_tel,
            $user_deposit_email,
        );

        $stmt->execute();

        if ($stmt->affected_rows === -1) {
            die("Lỗi khi thêm dữ liệu: " . $stmt->error);
        }

        $stmt->close();
    }


    public function updateData($user_deposit_id, $user_deposit_is_contacted, $user_deposit_is_payed)
    {
        $sql = "UPDATE $this->table
                SET user_deposit_is_contacted = $user_deposit_is_contacted,
                user_deposit_is_payed = $user_deposit_is_payed
                WHERE user_deposit_id = $user_deposit_id;";

        return $this->execute($sql);
    }
}
