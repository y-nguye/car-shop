<?php

class ProductController
{
    public function index($db)
    {
        $data = $db->getAllData();
        include __DIR__ . "/../views/backend/product/index.php";
    }

    public function add($db)
    {
        include __DIR__ . "/../views/backend/product/add.php";

        if (isset($_POST['add-btn'])) {
            $name = $_POST['sp_ten'];
            $price = $_POST['sp_gia'];
            $db->setData($name, $price);
            header("location: ../product");
        }
    }

    public function edit($db, $vars)
    {
        include __DIR__ . "/../views/backend/product/edit.php";
    }

    public function delete($db, $vars)
    {
        include __DIR__ . "/../views/backend/product/delete.php";
    }
}
