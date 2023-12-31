<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '', 'StoreController@index');
    $r->addRoute('GET', '/type-{slug}', 'StoreController@type');
    $r->addRoute(['GET', 'POST'], '/product/{id:\d+}', 'StoreController@product');
    $r->addRoute('GET', '/service', 'StoreController@service');
    $r->addRoute('GET', '/support', 'StoreController@support');
    $r->addRoute(['GET', 'POST'], '/test-drive/{id:\d+}', 'StoreController@testDrive');
    $r->addRoute(['GET', 'POST'], '/test-drive/register', 'StoreController@testDriveRegisterpRequired');
};
