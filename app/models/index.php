<?php

include('app/models/DB_cars.php');
include('app/models/DB_admin.php');
include('app/models/DB_users.php');

$db_cars = new CarsData;
$db_admin = new AdminData;
$db_users = new UserData;

$db_cars->connect();
$db_admin->connect();
$db_users->connect();
