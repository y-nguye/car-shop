<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute(['GET', 'POST'], '', 'AccountController@index');
    $r->addRoute(['GET', 'POST'], '/login', 'AccountController@login');
    $r->addRoute(['GET', 'POST'], '/logout', 'AccountController@logout');
    $r->addRoute(['GET', 'POST'], '/signup', 'AccountController@signup');
    $r->addRoute(['GET', 'POST'], '/usernameCheck', 'AccountController@usernameCheck');
    $r->addRoute(['GET', 'POST'], '/emailCheck', 'AccountController@emailCheck');
};
