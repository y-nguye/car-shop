<?php

include('app/models/DB_connect.php');
include('app/models/DB_cars.php');
include('app/models/DB_car_seat.php');
include('app/models/DB_car_fuel.php');
include('app/models/DB_car_types.php');
include('app/models/DB_car_producer.php');
include('app/models/DB_admin.php');
include('app/models/DB_users.php');

$db_cars = new CarsData;
$db_car_seat = new CarSeatData;
$db_car_fuel = new CarFuelData;
$db_car_types = new CarTypesData;
$db_car_producer = new CarProducerData;
$db_admin = new AdminData;
$db_users = new UserData;

$DB = array(
    'db_cars' => $db_cars,
    'db_car_seat' => $db_car_seat,
    'db_car_fuel' => $db_car_fuel,
    'db_car_types' => $db_car_types,
    'db_car_producer' => $db_car_producer,
    'db_admin' => $db_admin,
    'db_users' => $db_users
);
