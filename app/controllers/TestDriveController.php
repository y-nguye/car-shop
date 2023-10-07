<?php
require_once __DIR__ . '/AccessController.php';

class TestDriveController extends AccessController
{
    public function index($DB)
    {
        $this->authentication();
        $this->authorization();

        $DB['db_user_test_drive']->connect();
        $data_user_test_drive = $DB['db_user_test_drive']->getAllData();
        include_once __DIR__ . "/../views/backend/testDrive/index.php";
        $DB['db_user_test_drive']->disconnect();
    }
}
