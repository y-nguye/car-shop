<?php

function get_header($headTitle, $stylesPage, $controllerClass)
{
    ob_start(); // Bắt đầu bộ đệm đầu ra

    // Bao gồm các tệp CSS
    include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php';
    include_once __DIR__ . '/headerStyles.php';
    include_once __DIR__ . '/footerStyles.php';
    include_once __DIR__ . "/../../frontend/$stylesPage.php";
    // Đóng bộ đệm đầu ra và lưu nó vào biến
    $headStyles = ob_get_clean();

    $html = <<<EOT
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>$headTitle</title>
        $headStyles
    </head>
    <body>
    EOT;

    $data_all_car_type = $controllerClass->getAllCarTypesForHeader();

    echo $html;
    include_once __DIR__ . '/../../resources/layouts/navbar.php';
}
