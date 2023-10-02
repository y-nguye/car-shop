<?php
session_start();
include_once 'app/controllers/AccessController.php';

class TestDriveController extends AccessController
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
}
