<?php
require_once __DIR__ . '/Controller.php';

class TestDriveController extends Controller
{
    public function index()
    {
        $this->authentication();
        $this->authorization();

        $this->DB['db_user_test_drive']->connect();
        $data_user_test_drive = $this->DB['db_user_test_drive']->getAllData();
        include_once __DIR__ . "/../views/backend/testDrive/index.php";
        $this->DB['db_user_test_drive']->disconnect();
    }
}
