<?php

class CartController
{
    public function index($DB)
    {
        $DB['db_car_type']->connect();
        $data_car_type = $DB['db_car_type']->getAllData();
        include __DIR__ . "/../views/frontend/cart/index.php";
    }
}
