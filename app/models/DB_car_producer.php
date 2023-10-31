<?php

class CarProducerData extends DatabaseManager
{
    private $table = "car_producer";

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table;";
        $this->result = $this->execute($sql);
        $data = [];
        if ($this->result->num_rows > 0) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = array(
                    'car_producer_id' => $row['car_producer_id'],
                    'car_producer_name' => $row['car_producer_name'],
                );
            }
        }
        return $data;
    }

    public function checkData($car_producer_name)
    {
        $sql = "SELECT * FROM $this->table WHERE car_producer_name = '$car_producer_name';";
        $this->result = $this->execute($sql);

        if ($this->result->num_rows > 0) {
            return $this->result->fetch_assoc();
        }
        return false;
    }

    public function setData($car_producer_name)
    {
        $sql = "INSERT INTO $this->table (car_producer_id, car_producer_name) VALUES (null,'$car_producer_name');";
        $this->execute($sql);
    }

    public function deleteData($car_producer_ids)
    {
        $ids = implode(' ,', $car_producer_ids);
        $sql = "DELETE FROM $this->table WHERE car_producer_id IN ($ids);";
        var_dump($sql);
        $this->result = $this->execute($sql);
    }
}
