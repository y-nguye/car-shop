<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '', 'AccountController@admin');
    $r->addGroup('/product', require 'managerByAdmin/products.php');
    $r->addGroup('/user', require 'managerByAdmin/users.php');
};
