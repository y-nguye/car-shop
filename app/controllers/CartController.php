<?php

session_start();

class CartController
{
    public function index($DB)
    {
        $DB['db_car_type']->connect();
        $data_all_car_type = $DB['db_car_type']->getAllData();
        $cart = [];
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }
        include __DIR__ . "/../views/frontend/cart/index.php";
    }
    public function registrationFee($DB, $vars)
    {
        $DB['db_car_type']->connect();
        $DB['db_user_province']->connect();
        $data_all_car_type = $DB['db_car_type']->getAllData();
        $data_all_user_province = $DB['db_user_province']->getAllData();

        $data_car = [];
        if (isset($_SESSION['cart'])) {
            $data_car = $_SESSION['cart'][$vars['id']];
        }

        include __DIR__ . "/../views/frontend/cart/registrationFee.php";
    }
    public function pay($DB)
    {
        $DB['db_car_type']->connect();
        $DB['db_user_province']->connect();
        $data_all_car_type = $DB['db_car_type']->getAllData();
        $data_all_user_province = $DB['db_user_province']->getAllData();
        include __DIR__ . "/../views/frontend/cart/pay.php";
    }
}
