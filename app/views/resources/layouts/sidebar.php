<?php

$sidebar_items = [
    ["admin", BASE_URL . "/admin", "<i class=' bi bi-house-door me-2'></i> Trang chủ"],
    ["test-drive", BASE_URL . "/admin/test-drive", "<i class='bi bi-p-circle me-2'></i>Danh sách lái thử"],
    ["deposit", BASE_URL . "/admin/deposit", "<i class='bi bi-truck me-2'></i>Quản lý đơn đặt cọc"],
    ["product", BASE_URL . "/admin/product", "<i class='bi bi-car-front me-2'></i> Quản lý xe"],
    ["product-trash", BASE_URL . "/admin/product/trash", "<i class='bi bi-trash me-2'></i> Thùng rác"],
];

?>
<div class="d-flex flex-column flex-shrink-0 p-3 sticky-top rounded-3 sidebar-custom">
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if (isset($_SESSION["user_avt"]) && file_exists(__DIR__ . '/../../../../assets/imgs/avt/' . $_SESSION["user_avt"])) : ?>
                <img id="avatar" class="rounded-circle ms-2 me-2 avt-img" src="<?= BASE_URL ?>/assets/imgs/avt/<?= $_SESSION["user_avt"] ?>" alt="avt-img">
            <?php else : ?>
                <img id="avatar" class="rounded-circle ms-2 me-2 avt-img" src="<?= BASE_URL ?>/assets/imgs/avt/no-avt.jpg" alt="no-avt">
            <?php endif ?>
            <b><?= $_SESSION["user_fullname"] ?></b>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="<?= BASE_URL ?>/">Trang chủ cửa hàng</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>/account">Thông tin cá nhân</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>/account/logout">Đăng xuất</a></li>
        </ul>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">

        <?php foreach ($sidebar_items as $item) : ?>
            <li class="nav-item">
                <a href="<?= $item[1] ?>" class="nav-link sidebar-item <?php if ($item[0] == $item_select) echo "active" ?>">
                    <?= $item[2] ?>
                </a>
            </li>
        <?php endforeach ?>

    </ul>
</div>