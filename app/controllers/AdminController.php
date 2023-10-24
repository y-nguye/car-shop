<?php
require_once __DIR__ . '/AccessController.php';

class AdminController extends AccessController
{
    public function index()
    {
        $this->authentication();
        $this->authorization();

        $lastName = strrchr($_SESSION['user_fullname'], ' ');
        include_once __DIR__ . "/../views/backend/admin/index.php";
    }
    public function manage($DB)
    {
        $this->authentication();
        $this->authorization();

        $DB['db_user']->connect();
        $data_user = $DB['db_user']->getAllData();

        include_once __DIR__ . "/../views/backend/admin/manage.php";

        if (isset($_POST['btn-save'])) {
            $user_ids = $_POST['user_ids'];
            $DB['db_user']->updateAdmin($user_ids);
            echo '<script>location.href = "/project/car-shop/admin/manage"</script>';
        }
        $DB['db_user']->disconnect();
    }
}
