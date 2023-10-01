<?php

session_start();

class TestDriveController
{
    public function index($DB)
    {
        $this->authentication();
        $this->authorization();

        $DB['db_user_test_drive']->connect();
        $data_user_test_drive = $DB['db_user_test_drive']->getAllData();
        $DB['db_user_test_drive']->disconnect();
        include_once __DIR__ . "/../views/backend/testDrive/index.php";
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
