<?php

include_once 'app/models/Database_manager.php';

class UserDepositData extends DatabaseManager
{
    private $table = "user_deposit";

    public function getData($user_username)
    {
        $sql = "SELECT * FROM $this->table WHERE user_username = '$user_username' OR user_email = '$user_username';";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        }
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table;";
        $this->result = $this->execute($sql);;

        if ($this->result->num_rows > 0) {
            return $this->result;
        }
        return null;
    }

    public function setData($user_deposit_fullname, $user_deposit_tel, $user_deposit_email, $user_deposit_price, $user_deposit_where, $pay_method_id, $user_id, $car_id)
    {
        $sql = "INSERT INTO $this->table
                (user_deposit_id,
                user_deposit_fullname,
                user_deposit_tel,
                user_deposit_email,
                user_deposit_price,
                user_deposit_where,
                user_deposit_is_pay,
                user_deposit_at,
                pay_method_id,
                user_id,
                car_id)
            VALUES (
                null,
                '$user_deposit_fullname',
                '$user_deposit_tel',
                '$user_deposit_email',
                $user_deposit_price,
                '$user_deposit_where',
                0,
                NOW(),
                $pay_method_id,
                $user_id,
                $car_id);";

        $this->execute($sql);
    }
}
