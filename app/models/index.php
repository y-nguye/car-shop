<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

include_once __DIR__ .  '/Database_manager.php';

include_once __DIR__ . '/DB_cars.php';
include_once __DIR__ . '/DB_car_seat.php';
include_once __DIR__ . '/DB_car_fuel.php';
include_once __DIR__ . '/DB_car_type.php';
include_once __DIR__ . '/DB_car_transmission.php';
include_once __DIR__ . '/DB_car_producer.php';
include_once __DIR__ . '/DB_car_img.php';
include_once __DIR__ . '/DB_user.php';
include_once __DIR__ . '/DB_user_cart_item.php';
include_once __DIR__ . '/DB_user_province.php';
include_once __DIR__ . '/DB_user_deposit.php';
include_once __DIR__ . '/DB_user_test_drive.php';
include_once __DIR__ . '/DB_pay_method.php';

$db_cars = new CarsData;
$db_car_seat = new CarSeatData;
$db_car_fuel = new CarFuelData;
$db_car_type = new CarTypeData;
$db_car_transmission = new CarTransmissionData;
$db_car_producer = new CarProducerData;
$db_car_img = new CarImgData;
$db_user = new UserData;
$db_user_cart_item = new UserCartItem;
$db_user_province = new UserProvinceData;
$db_user_deposit = new UserDepositData;
$db_user_test_drive = new TestDriveData;
$db_pay_method = new PayMethodData;

$DB = array(
    'db_cars' => $db_cars,
    'db_car_seat' => $db_car_seat,
    'db_car_fuel' => $db_car_fuel,
    'db_car_type' => $db_car_type,
    'db_car_transmission' => $db_car_transmission,
    'db_car_producer' => $db_car_producer,
    'db_car_img' => $db_car_img,
    'db_user' => $db_user,
    'db_user_cart_item' => $db_user_cart_item,
    'db_user_province' => $db_user_province,
    'db_user_deposit' => $db_user_deposit,
    'db_user_test_drive' => $db_user_test_drive,
    'db_pay_method' => $db_pay_method,
);
