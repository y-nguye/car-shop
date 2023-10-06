<?php
session_start();
require_once __DIR__ . '/AccessController.php';

class DepositController extends AccessController
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

        $this->checkNull($user_deposit['user_deposit_id']);

        include_once __DIR__ . "/../views/backend/deposit/seeMore.php";

        if (isset($_POST['btnUpdate'])) {
            $user_deposit_is_contacted  = $_POST['user_deposit_is_contacted'];
            $user_deposit_is_payed      = $_POST['user_deposit_is_payed'];

            $DB['db_user_deposit']->updateData($user_deposit_id, $user_deposit_is_contacted, $user_deposit_is_payed);
            $DB['db_user_deposit']->disconnect();

            echo '<script>location.href = "/car-shop/admin/deposit/see-more/' . $user_deposit_id . '"</script>';
        }
    }
}
