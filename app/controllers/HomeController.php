<?php

class HomeController
{
    public function index($DB)
    {
        $DB['db_cars']->connect();
        $DB['db_car_type']->connect();

        $data_cars = $DB['db_cars']->getAllData();
        $data_car_type = $DB['db_car_type']->getAllData();
        include __DIR__ . "/../views/frontend/home/index.php";
        // } else echo $type;
    }
    public function type($DB, $type)
    {
        $type = implode('', $type);
        echo $type;
        // include __DIR__ . "/../views/backend/product/index.php";
    }
    public function service($DB, $type)
    {
        $type = implode('', $type);
        echo $type;
        // include __DIR__ . "/../views/backend/product/index.php";
    }
    public function support($DB, $type)
    {
        $type = implode('', $type);
        echo $type;
        // include __DIR__ . "/../views/backend/product/index.php";
    }
}
