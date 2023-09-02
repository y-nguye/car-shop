<?php

$routeProduct = $route;

echo gettype($routeProduct);

include __DIR__ . '/../app/controllers/ProductController.php';
$controller = new ProductController();

switch ($routeProduct) {
    case 'product':
        $controller->index();
        break;
    case 'product/add':
        $controller->add();
        break;
    default:
        echo "Hello";
}
