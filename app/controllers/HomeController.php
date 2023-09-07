<?php

class HomeController
{
    public function index($DB, $type)
    {
        $DB['db_cars']->connect();
        $DB['db_car_types']->connect();

        $data_cars = $DB['db_cars']->getAllData();
        $data_car_types = $DB['db_car_types']->getAllData();
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
