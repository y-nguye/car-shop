<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '', 'AdminController@index');
    $r->addGroup('/product', require 'managerByAdmin/products.php');
    $r->addGroup('/deposit', require 'managerByAdmin/deposit.php');
    $r->addGroup('/test-drive', require 'managerByAdmin/testDrive.php');
};
