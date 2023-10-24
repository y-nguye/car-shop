<?php

use FastRoute\RouteCollector;

// Định nghĩa route bên trong thư mục htdoc
$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    // Thư mục project
    $r->addGroup('/project', function (RouteCollector $r) {
        // Thư mục car-shop
        $r->addGroup('/car-shop', function (RouteCollector $r) {
            $r->addGroup('', require __DIR__ . '/store.php');
            $r->addGroup('/cart', require __DIR__ . '/cart.php');
            $r->addGroup('/account', require __DIR__ . '/account.php');
            $r->addGroup('/admin', require __DIR__ . '/admin.php');
        });
    });
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

// Loại bỏ dấu '/' thừa ở cuối đường dẫn
$uri = rtrim($uri, '/');

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        require __DIR__ . '/../app/controllers/AccessController.php';
        $controller = new AccessController();
        call_user_func([$controller, 'pageNotFound']);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        echo '405 - Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // Chia chuỗi $handler thành một mảng $controllerName và $methodName bằng cách sử dụng ký tự '@' như dấu phân tách
        [$controllerName, $methodName] = explode('@', $handler);
        require __DIR__ . '/../app/controllers/' . $controllerName . '.php';
        $controller = new $controllerName();
        call_user_func([$controller, $methodName], $DB, $vars);
        break;
}
