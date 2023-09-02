<?php

class ProductController
{
    public function index()
    {
        // Xử lý và hiển thị trang chủ
        include __DIR__ . "/../views/product/index.php";
    }

    public function add()
    {
        // Xử lý và hiển thị trang chủ
        include __DIR__ . "/../views/product/add.php";
    }
}
