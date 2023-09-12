<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '', 'AdminController@index');
    $r->addRoute('GET', '/login', 'AdminController@login');
    $r->addGroup('/product', require 'managerByAdmin/products.php');
    $r->addGroup('/user', require 'managerByAdmin/users.php');
};
