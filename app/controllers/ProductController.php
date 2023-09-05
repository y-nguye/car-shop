<?php

class ProductController
{
    public function index($db_cars)
    {
        $data = $db_cars->getAllData();
        include __DIR__ . "/../views/backend/product/index.php";
    }

    public function add($db_cars)
    {
        include __DIR__ . "/../views/backend/product/add.php";

        if (isset($_POST['add-btn'])) {
            $name = $_POST['sp_ten'];
            $price = $_POST['sp_gia'];
            $db_cars->setData($name, $price);
            header("location: ../product");
        }
    }

    public function edit($db_cars, $vars)
    {
        $id = implode('', $vars);
        include __DIR__ . "/../views/backend/product/edit.php";
    }

    public function delete($db_cars, $vars)
    {
        $id = implode('', $vars);
        include __DIR__ . "/../views/backend/product/delete.php";
    }
}
