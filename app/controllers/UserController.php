<?php

class UserController
{
    public function index($db_user)
    {
        $data = $db_user->getAllData();
        include __DIR__ . "/../views/backend/product/index.php";
    }

    public function add($db_user)
    {
        include __DIR__ . "/../views/backend/product/add.php";

        if (isset($_POST['add-btn'])) {
            $name = $_POST['sp_ten'];
            $price = $_POST['sp_gia'];
            $db_user->setData($name, $price);
            header("location: ../product");
        }
    }

    public function edit($db_user, $vars)
    {
        include __DIR__ . "/../views/backend/product/edit.php";
    }

    public function delete($db_user, $vars)
    {
        include __DIR__ . "/../views/backend/product/delete.php";
    }
}
