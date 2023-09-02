<?php
// Lấy tuyến đường từ URL sau khi được chuyển hướng bởi .htaccess
$route = isset($_GET['url']) ? $_GET['url'] : '';

// Xử lý tuyến đường
switch ($route) {
    case '':
        // Xử lý trang chủ
        include_once __DIR__ . '/home.php';
        break;
    case 'product':
        // Xử lý trang "product"
        include_once __DIR__ . '/product.php';
        break;
    case 'cart':
        // Xử lý trang "contact"
        include __DIR__ . '/../app/controllers/CartController.php';
        $controller = new CartController();
        $controller->index();
        break;
    default:
        // Xử lý trang 404
        // include 'controllers/errorController.php';
        // $controller = new ErrorController();
        // $controller->notFound();
        break;
}
