<?php

include_once 'app/models/Database_manager.php';

class PayMethodData extends DatabaseManager
{
    private $table = "pay_method";

    public function getDataByID($pay_method_id)
    {
        if (!$pay_method_id) return null;
        $sql = "SELECT * FROM $this->table WHERE pay_method_id = $pay_method_id;";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        }
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table;";
        $this->result = $this->execute($sql);

        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'pay_method_id' => $row['pay_method_id'],
                    'pay_method_name' => $row['pay_method_name'],
                );
            }
        }
        return $data;
    }
}
