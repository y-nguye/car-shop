<?php

session_start();

class AccountController
{
    public function index($DB)
    {
        if (!isset($_SESSION["logged"])) {
            echo '<script>location.href = "/car-shop/account/login"</script>';
            die();
        }

        if (isset($_SESSION["logged"]) && !$_SESSION["logged"]) {
            echo '<script>location.href = "/car-shop/account/login"</script>';
            die();
        }

        $DB['db_car_type']->connect();
        $data_car_type = $DB['db_car_type']->getAllData();

        $lastName = strrchr($_SESSION['user_fullname'], ' ');
        include_once __DIR__ . "/../views/frontend/account/index.php";

        if (isset($_POST["editBtn"])) {
            echo $_POST['user_fullname'];
        }

        $DB['db_car_type']->disconnect();
    }
    public function login($DB)
    {
        $DB['db_user']->connect();
        $DB['db_car_type']->connect();

        if (!$_SESSION["logged"]) {

            $data_car_type = $DB['db_car_type']->getAllData();
            include_once __DIR__ . "/../views/frontend/account/login.php";

            if (isset($_POST["loginBtn"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];

                $data_user = $DB['db_user']->getData($username);

                // if ($data_user && password_verify($password, $data_user["user_password"])) {
                if ($data_user && ($password == $data_user["user_password"])) {
                    // Đăng nhập thành công
                    $_SESSION["logged"] = true;
                    $_SESSION["user_fullname"] = $data_user["user_fullname"];
                    $_SESSION["user_tel"] = $data_user["user_tel"];
                    $_SESSION["user_email"] = $data_user["user_email"];
                    $_SESSION["user_address"] = $data_user["user_address"];
                    $_SESSION["user_avt"] = $data_user["user_avt"];
                    $_SESSION["user_is_admin"] = $data_user["user_is_admin"];

                    $_SESSION['cart'] = 2;

                    if ($_SESSION["user_is_admin"]) {
                        $DB['db_user']->disconnect();
                        echo '<script>location.href = "/car-shop/admin"</script>';
                    } else {
                        echo '<script>location.href = "/car-shop/cart"</script>';
                    }
                } else {
                    // Đăng nhập thất bại
                    echo "Tên đăng nhập hoặc mật khẩu không đúng.";
                }
            }
        } else {
            echo '<script>location.href = "/car-shop"</script>';
        }
    }
    public function logout($DB)
    {
        unset($_SESSION["logged"]);
        unset($_SESSION["user_fullname"]);
        unset($_SESSION["user_tel"]);
        unset($_SESSION["user_email"]);
        unset($_SESSION["user_address"]);
        unset($_SESSION["user_avt"]);
        unset($_SESSION["user_is_admin"]);
        echo '<script>location.href = "/car-shop"</script>';
    }

    public function signup($DB)
    {
    }
    public function admin($DB)
    {
        include_once __DIR__ . "/../views/backend/admin/index.php";
    }
}
