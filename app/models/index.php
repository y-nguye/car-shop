<?php

include_once 'app/models/DB_cars.php';
include_once 'app/models/DB_car_seat.php';
include_once 'app/models/DB_car_fuel.php';
include_once 'app/models/DB_car_type.php';
include_once 'app/models/DB_car_transmission.php';
include_once 'app/models/DB_car_producer.php';
include_once 'app/models/DB_car_img.php';
include_once 'app/models/DB_user.php';

$db_cars = new CarsData;
$db_car_seat = new CarSeatData;
$db_car_fuel = new CarFuelData;
$db_car_type = new CarTypeData;
$db_car_transmission = new CarTransmissionData;
$db_car_producer = new CarProducerData;
$db_car_img = new CarImgData;
$db_user = new UserData;

$DB = array(
    'db_cars' => $db_cars,
    'db_car_seat' => $db_car_seat,
    'db_car_fuel' => $db_car_fuel,
    'db_car_type' => $db_car_type,
    'db_car_transmission' => $db_car_transmission,
    'db_car_producer' => $db_car_producer,
    'db_car_img' => $db_car_img,
    'db_admin' => $db_admin,
    'db_user' => $db_user
);
