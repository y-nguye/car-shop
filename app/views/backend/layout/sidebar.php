<?php

$sidebar_items = [
    ["admin", "/car-shop/admin", "<i class=' bi bi-house-door me-2'></i> Trang chủ"],
    ["user", "/car-shop/admin/user", "<i class='bi bi-person me-2'></i> Quản lý khách hàng"],
    ["product", "/car-shop/admin/product", "<i class='bi bi-grid me-2'></i> Quản lý sản phẩm"],
    ["product_img", "/car-shop/admin/product/img", "<i class='bi bi-grid me-2'></i> Quản lý hình sản phẩm"],
    ["product_trash", "/car-shop/admin/product/trash", "<i class='bi bi-trash me-2'></i> Thùng rác"],
];

?>

<div class="d-flex flex-column flex-shrink-0 p-3 bg-light sticky-top custom-sidebar">

    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle ms-2 me-2">
            <b><?= $_SESSION["user_fullname"] ?></b>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Tuỳ chỉnh</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
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
    <hr>
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <i class="bi bi-car-front-fill fs-3 ms-2 me-2"></i><span class="fs-4">Quản trị</span>
    </a>
</div>