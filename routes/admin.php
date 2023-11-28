<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '', 'AdminController@index');
    $r->addRoute(['GET', 'POST'], '/manage', 'AdminController@manage');
    $r->addGroup('/product', require 'manageByAdmin/products.php');
    $r->addGroup('/deposit', require 'manageByAdmin/deposit.php');
    $r->addGroup('/test-drive', require 'manageByAdmin/testDrive.php');
};
