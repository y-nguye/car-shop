<?php

include_once 'app/views/backend/layout/sideBarStyle.php';

$sidebar_items = [
    ["admin", "/car-shop/admin", "<i class=' bi bi-house-door me-2'></i> Trang chủ"],
    ["user", "/car-shop/admin/user", "<i class='bi bi-person me-2'></i> Quản lý khách hàng"],
    ["product", "/car-shop/admin/product", "<i class='bi bi-grid me-2'></i> Quản lý xe"],
    ["product_trash", "/car-shop/admin/product/trash", "<i class='bi bi-trash me-2'></i> Thùng rác"],
];

?>

<div class="d-flex flex-column flex-shrink-0 p-3 bg-light sticky-top sidebar-custom">
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/car-shop/assets/imgs/avt/<?php if (isset($_SESSION["user_avt"]) && $_SESSION["user_avt"]) echo $_SESSION["user_avt"];
                                                else echo 'no-avt.jpg' ?>" alt="avt-img" width="32" height="32" class="rounded-circle ms-2 me-2">
            <b><?= $_SESSION["user_fullname"] ?></b>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="/car-shop/">Trang chủ cửa hàng</a></li>
            <li><a class="dropdown-item" href="/car-shop/account">Trang cá nhân</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/car-shop/account/logout">Đăng xuất</a></li>
        </ul>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">

        <?php foreach ($sidebar_items as $item) { ?>
            <li class="nav-item">
                <a href="<?= $item[1] ?>" class="nav-link sidebar-item <?php if ($item[0] == $item_select) echo "active" ?>">
                    <?= $item[2] ?>
                </a>
            </li>
        <?php } ?>

    </ul>

</div>