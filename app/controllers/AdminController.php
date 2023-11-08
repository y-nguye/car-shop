<?php
require_once __DIR__ . '/Controller.php';

class AdminController extends Controller
{
    public function index()
    {
        $this->authentication();
        $this->authorization();

        $lastName = strrchr($_SESSION['user_fullname'], ' ');
        include_once __DIR__ . "/../views/backend/admin/index.php";
    }
    public function manage()
    {
        $this->authentication();
        $this->authorization();

        $this->DB['db_user']->connect();
        $data_user = $this->DB['db_user']->getAllData();

        include_once __DIR__ . "/../views/backend/admin/manage.php";

        if (isset($_POST['btn-save'])) {
            $user_ids = $_POST['user_ids'];
            $this->DB['db_user']->updateAdmin($user_ids);
            echo '<script>location.href = "/car-shop/admin/manage"</script>';
        }
        $this->DB['db_user']->disconnect();
    }
}
