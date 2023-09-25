<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '', 'StoreController@index');
    $r->addRoute('GET', '/type-{name}', 'StoreController@type');
    $r->addRoute(['GET', 'POST'], '/product/{id:\d+}', 'StoreController@product');
    $r->addRoute('GET', '/dich-vu', 'StoreController@service');
    $r->addRoute('GET', '/ho-tro', 'StoreController@support');
};
