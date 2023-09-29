<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '', 'DepositController@index');
    $r->addRoute(['GET', 'POST'], '/see-more/{id:\d+}', 'DepositController@seeMore');
};
