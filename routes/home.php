<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '', 'HomeController@index');
    $r->addRoute('GET', '/type-{name}', 'HomeController@type');
    $r->addRoute('GET', '/dich-vu', 'HomeController@service');
    $r->addRoute('GET', '/ho-tro', 'HomeController@support');
};
