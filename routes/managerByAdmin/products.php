<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute(['GET', 'POST'], '', 'ProductController@index');
    $r->addRoute(['GET', 'POST'], '/add', 'ProductController@add');
    $r->addRoute(['GET', 'POST'], '/add-producer', 'ProductController@addProducer');
    $r->addRoute(['GET', 'POST'], '/add-producer-check', 'ProductController@addProducerCheck');
    $r->addRoute(['GET', 'POST'], '/edit/{id:\d+}', 'ProductController@edit');
    $r->addRoute(['GET', 'POST'], '/delete', 'ProductController@softDelete');
    $r->addRoute(['GET', 'POST'], '/trash', 'ProductController@trash');
    $r->addRoute(['GET', 'POST'], '/trash/restore', 'ProductController@restore');
    $r->addRoute(['GET', 'POST'], '/trash/force-delete', 'ProductController@forceDelete');
};
