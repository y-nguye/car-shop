<?php

class HomeController
{
    public function index($db_cars)
    {
        // Xử lý và hiển thị trang chủ
        $data = $db_cars->getAllData();
        include __DIR__ . "/../views/frontend/home/index.php";
    }
}
