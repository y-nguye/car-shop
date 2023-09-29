<?php

session_start();

class DepositController
{
    public function index($DB)
    {
        $this->authentication();
        $this->authorization();

        $DB['db_user_deposit']->connect();
        $data_user_deposit = $DB['db_user_deposit']->getAllData();
        $DB['db_user_deposit']->disconnect();
        include_once __DIR__ . "/../views/backend/deposit/index.php";
    }

    public function seeMore($DB, $vars)
    {
        $this->authentication();
        $this->authorization();

        $user_deposit_id = $vars['id'];
        $DB['db_user_deposit']->connect();
        $user_deposit = $DB['db_user_deposit']->getDataByID($user_deposit_id);

        include_once __DIR__ . "/../views/backend/deposit/seeMore.php";

        if (isset($_POST['btnUpdate'])) {
            $user_deposit_is_contacted = $_POST['user_deposit_is_contacted'];
            $user_deposit_is_payed = $_POST['user_deposit_is_payed'];

            $DB['db_user_deposit']->updateData($user_deposit_id, $user_deposit_is_contacted, $user_deposit_is_payed);

            echo '<script>location.href = "/car-shop/admin/deposit/see-more/' . $user_deposit_id . '"</script>';
        }
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
