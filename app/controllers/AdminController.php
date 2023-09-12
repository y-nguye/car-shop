<?php

class AdminController
{
    public function index()
    {
        include __DIR__ . "/../views/backend/admin/index.php";
    }
    public function login()
    {
        include __DIR__ . "/../views/backend/admin/login.php";
    }
    public function register()
    {
        include __DIR__ . "/../views/backend/admin/register.php";
    }
}
