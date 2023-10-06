<?php
session_start();
require_once __DIR__ . '/AccessController.php';

class AdminController extends AccessController
{
    public function index($DB)
    {
        $this->authentication();
        $this->authorization();

        $lastName = strrchr($_SESSION['user_fullname'], ' ');
        include_once __DIR__ . "/../views/backend/admin/index.php";
    }
}
