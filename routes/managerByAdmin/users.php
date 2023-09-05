<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '', 'UserController@index');
    $r->addRoute('GET', '/add', 'UserController@add');
    $r->addRoute('GET', '/edit/{id:\d+}', 'UserController@edit');
    $r->addRoute('GET', '/delete/{id:\d+}', 'UserController@delete');
};
