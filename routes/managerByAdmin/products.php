<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '', 'ProductController@index');
    $r->addRoute('GET', '/add', 'ProductController@add');
    $r->addRoute('GET', '/edit/{id:\d+}', 'ProductController@edit');
    $r->addRoute('GET', '/delete/{id:\d+}', 'ProductController@delete');
};
