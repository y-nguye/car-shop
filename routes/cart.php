<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute(['GET', 'POST'], '', 'CartController@index');
    $r->addRoute(['GET', 'POST'], '/delete/{id:\d+}', 'CartController@delete');
    $r->addRoute(['GET', 'POST'], '/registration-fee/{id:\d+}', 'CartController@registrationFee');
    $r->addRoute(['GET', 'POST'], '/deposit/{id:\d+}', 'CartController@deposit');
    $r->addRoute(['GET', 'POST'], '/deposit/deposit-required', 'CartController@depositRequired');
    $r->addRoute(['GET', 'POST'], '/deposit/mail-send-success', 'CartController@mailSendSuccess');
    $r->addRoute(['GET', 'POST'], '/deposit/mail-send-error', 'CartController@mailSendError');
};
