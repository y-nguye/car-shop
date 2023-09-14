<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute(['GET', 'POST'], '', 'CartController@index');
};
