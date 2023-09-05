<?php
include_once 'app\views\resources\layouts\headerStyles.php'
?>

<nav class="navbar fixed-top navbar-expand-lg custom-navbar">
    <div class="container-xxl">
        <a class="navbar-brand" href="/car-shop"><i class="bi bi-car-front-fill"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="h4"><i class="bi bi-list"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 navbar-list">
                <li class="nav-item ms-4">
                    <a class="nav-link" href="/car-shop/sedans">Sedans</a>
                </li>
                <li class="nav-item ms-4">
                    <a class="nav-link" href="/car-shop/suv">SUV</a>
                </li>
                <li class="nav-item ms-4">
                    <a class="nav-link" href="/car-shop/da-dung">Đa dụng</a>
                </li>
                <li class="nav-item ms-4">
                    <a class="nav-link" href="/car-shop/ban-tai">Bán tải</a>
                </li>
                <li class="nav-item ms-4">
                    <a class="nav-link" href="/car-shop/coupe">Coupé</a>
                </li>
                <li class="nav-item ms-auto me-4">
                    <a class="nav-link" href="/car-shop/dich-vu">Dịch vụ</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="/car-shop/ho-tro">Hỗ trợ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/car-shop/cart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Giỏ hàng"><i class=" bi bi-bag icon-cart"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="empty-space-below-navbar"></div>