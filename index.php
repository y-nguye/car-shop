<?php

include('app/models/DB_cars.php');
$db = new CarsData;
$db->connect();

// Sử dụng ánh xạ URL thay cho tham số controller truyền thống
include_once __DIR__ . '/routes/index.php';
