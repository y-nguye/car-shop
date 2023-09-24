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

    public function delete($DB, $vars)
    {
        unset($_SESSION['cart'][$vars['id']]);
        echo '<script>location.href = "/car-shop/cart"</script>';
    }

    public function registrationFee($DB, $vars)
    {

        $car_id = $vars['id'];
        $DB['db_car_type']->connect();
        $DB['db_user_province']->connect();
        $data_all_car_type = $DB['db_car_type']->getAllData();
        $data_all_user_province = $DB['db_user_province']->getAllData();

        $data_car = [];
        if (isset($_SESSION['cart'])) {
            $data_car = $_SESSION['cart'][$car_id];
        }

        include __DIR__ . "/../views/frontend/cart/registrationFee.php";

        if (isset($_SESSION['from-registration-fee']) && $_SESSION['from-registration-fee']) {
            echo '<script>toast.show();</script>';
            unset($_SESSION['from-registration-fee']);
        }

        if (isset($_POST['btnDeposits'])) {
            $total_price = $_POST['total_price'];

            if (isset($_SESSION['cart'])) {
                $data_car = $_SESSION['cart'][$car_id];
            }

            // Thêm tổng giá vào SESSION
            $data_car = array(
                'car_id' => $data_car['car_id'],
                'car_name' => $data_car['car_name'],
                'car_price' => $data_car['car_price'],
                'car_img_filename' => $data_car['car_img_filename'],
                'total_price' => $total_price,
            );

            $_SESSION['cart'][$car_id] = $data_car;

            echo '<script>location.href = "/car-shop/cart/pay/' . $car_id . '"</script>';
        }
    }

    public function pay($DB, $vars)
    {
        $car_id = $vars['id'];
        $data_user_fullname = null;
        $data_user_tel = null;
        $data_user_province_id = null;

        if (isset($_SESSION['logged'])) {
            $data_user_fullname = $_SESSION["user_fullname"];
            $data_user_tel = $_SESSION["user_tel"];
            $data_user_province_id = $_SESSION["user_province_id"];
        }

        $data_car = [];
        if (isset($_SESSION['cart'])) {
            $data_car = $_SESSION['cart'][$car_id];
        }

        $DB['db_car_type']->connect();
        $DB['db_user_province']->connect();
        $data_all_car_type = $DB['db_car_type']->getAllData();
        $data_all_user_province = $DB['db_user_province']->getAllData();

        $depositsPrice = $data_car['total_price'] * 0.1;

        include __DIR__ . "/../views/frontend/cart/pay.php";
    }

    public function paySuccess($DB, $vars)
    {
        echo "Thành Công!";
    }
}
