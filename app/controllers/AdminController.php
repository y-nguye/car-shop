<?php

session_start();

class AdminController
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

        if ($_SESSION["user_is_admin"]) {
            $lastName = strrchr($_SESSION['user_fullname'], ' ');
            include_once __DIR__ . "/../views/backend/admin/index.php";
        } else echo '<script>location.href = "/car-shop/account"</script>';
    }
}
