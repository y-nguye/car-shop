<?php

session_start();

class AdminController
{
    public function index($DB)
    {
        $this->authentication();
        $this->authorization();

        $lastName = strrchr($_SESSION['user_fullname'], ' ');
        include_once __DIR__ . "/../views/backend/admin/index.php";
    }

    private function authentication()
    {
        if (!isset($_SESSION["logged"])) {
            echo '<script>location.href = "/car-shop/account/login"</script>';
            die();
        }

        if (isset($_SESSION["logged"]) && !$_SESSION["logged"]) {
            echo '<script>location.href = "/car-shop/account/login"</script>';
            die();
        }
    }

    private function authorization()
    {
        if (!$_SESSION["user_is_admin"]) {
            echo '<script>location.href = "/car-shop/account"</script>';
            die();
            echo '404-page';
        }
    }
}
