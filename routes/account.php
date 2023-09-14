<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute(['GET', 'POST'], '', 'AccountController@index');
    $r->addRoute(['GET', 'POST'], '/login', 'AccountController@login');
    $r->addRoute(['GET', 'POST'], '/logout', 'AccountController@logout');
};
