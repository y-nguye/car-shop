<?php
include_once 'app/views/resources/layouts/headerStyles.php';
?>

<div class="fixed-top blur-body-page"></div>

<nav class="navbar d-block fixed-top navbar-expand-lg custom-navbar">
    <div class="container-lg">
        <a class="navbar-brand text-dark car-logo" href="/car-shop"><i class="bi bi-car-front-fill"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="h4"><i class="bi bi-list"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 navbar-list">

                <?php foreach ($data_car_type as $value) { ?>
                    <?=
                    '<li class="nav-item ms-4">
                    <a class="nav-link text-dark" href="/car-shop/type-' . convertToSlug($value['car_type_name']) . '">' . $value['car_type_name'] . '</a>
                    </li>'
                    ?>
                <?php } ?>

                <li class="nav-item ms-auto me-4">
                    <a class="nav-link text-dark" href="/car-shop/dich-vu">Dịch vụ</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link text-dark" href="/car-shop/ho-tro">Hỗ trợ</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link text-dark bag" href="/car-shop/cart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Giỏ hàng"><i class="bi bi-bag-fill"></i></a> -->
                    <button type="button" class="nav-link btn text-dark bag"><i class="bi bi-bag-fill"></i></button>
                </li>
            </ul>
        </div>

    </div>
    <div class="extension-nav-bar-by-bag">
        <div class="container-lg bag-info">




            <?php if (isset($_SESSION['cart'])) {
                if ($_SESSION['cart'] > 1) { ?>
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="m-0">Giỏ hàng</h4>
                        <button type="button" class="btn btn-primary cart-btn">Xem giỏ hàng</button>
                    </div>
                    <ul class="list-car-on-bag">
                        <li class="mt-4">
                            <a class="text-dark" href="">
                                <div>
                                    <img class="rounded-3 me-3 img-item-on-bag" src="assets/imgs/2020-Hyundai-Accent.jpg" alt="">
                                    <span>Hyundai Accent 2023</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                <?php }
            } else { ?>
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="m-0">Giỏ của bạn hiện trống</h4>
                </div>
                <div class="mt-4"><a class="text-dark text-decoration-underline" href="/car-shop/account/login">Đăng nhập</a> để xem bạn có món hàng nào được lưu hay không</div>
            <?php } ?>


            <div class="mt-4 text-secondary"><span>Hồ sơ của tôi</span></div>
            <ul>
                <li class="mt-2 fs-7"><a href=""><i class="bi bi-box align-middle me-2"></i>Đơn hàng</a></li>
                <li class="mt-2 fs-7"><a href="/car-shop/account"><i class="bi bi-person-circle align-middle me-2"></i>Tài khoản</a></li>

                <?php if (isset($_SESSION['logged'])) {
                    if ($_SESSION['logged'] == true) { ?>
                        <?php if ($_SESSION['user_is_admin']) { ?>
                            <li class="mt-2 fs-7"><a href="/car-shop/admin"><i class="bi bi-server align-middle me-2"></i>Truy cập hệ thống quản trị</a></li>
                        <?php } ?>
                        <li class="mt-2 fs-7"><a href="/car-shop/account/logout"><i class="bi bi-box-arrow-left align-middle me-2"></i>Đăng xuất</a></li>
                    <?php } else { ?>
                        <li class="mt-2 fs-7"><a href="/car-shop/account/login"><i class="bi bi-box-arrow-left align-middle me-2"></i>Đăng nhập</a></li>
                    <?php
                    }
                } else { ?>
                    <li class="mt-2 fs-7"><a href="/car-shop/account/login"><i class="bi bi-box-arrow-in-right align-middle me-2"></i>Đăng nhập</a></li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>

<div class="empty-space-below-navbar"></div>

<script>
    const customNavbar = document.querySelector('.custom-navbar');
    const bag = document.querySelector('.bag');
    const bagInfo = document.querySelector('.bag-info');
    const extensionNavBar = document.querySelector('.extension-nav-bar-by-bag');
    const cartBtn = document.querySelector('.cart-btn');
    const blurBodyPage = document.querySelector('.blur-body-page');

    const children = bagInfo.children;
    const totalHeight = Array.from(children).reduce((acc, child) => {
        console.log(acc);
        return acc + child.clientHeight + parseInt(window.getComputedStyle(child).marginTop)
    }, 0);

    bag.addEventListener('click', () => {
        extensionNavBar.classList.toggle('expand-nav-bar');
        blurBodyPage.classList.toggle('blured');

        if (document.querySelector('.expand-nav-bar')) {
            extensionNavBar.style.height = `${totalHeight + 80}px`;
        } else {
            extensionNavBar.style.height = '0px';
        }

        if (!document.querySelector('.blured')) {
            setTimeout(function() {
                blurBodyPage.style.visibility = "hidden";
            }, 320)
        } else {
            blurBodyPage.style.visibility = "visible";
        }

        bagInfo.classList.toggle('expand-bag-info');
    });

    blurBodyPage.addEventListener('click', () => {
        extensionNavBar.classList.remove('expand-nav-bar');
        blurBodyPage.classList.remove('blured');
        extensionNavBar.style.height = '0px';
        bagInfo.classList.remove('expand-bag-info');
        setTimeout(function() {
            blurBodyPage.style.visibility = "hidden";
        }, 320)
    });

    if (cartBtn) {
        cartBtn.addEventListener('click', () => {
            window.location.href = "/car-shop/cart";
        });
    }
</script>

<?php

function convertToSlug($str, $delimiter = '-')
{

    $unwanted_array = [
        'á' => 'a',
        'à' => 'a',
        'ả' => 'a',
        'ã' => 'a',
        'ạ' => 'a',
        'ă' => 'a',
        'ắ' => 'a',
        'ằ' => 'a',
        'ẳ' => 'a',
        'ẵ' => 'a',
        'ặ' => 'a',
        'â' => 'a',
        'ấ' => 'a',
        'ầ' => 'a',
        'ẩ' => 'a',
        'ẫ' => 'a',
        'ậ' => 'a',
        'đ' => 'd',
        'é' => 'e',
        'è' => 'e',
        'ẻ' => 'e',
        'ẽ' => 'e',
        'ẹ' => 'e',
        'ê' => 'e',
        'ế' => 'e',
        'ề' => 'e',
        'ể' => 'e',
        'ễ' => 'e',
        'ệ' => 'e',
        'í' => 'i',
        'ì' => 'i',
        'ỉ' => 'i',
        'ĩ' => 'i',
        'ị' => 'i',
        'ó' => 'o',
        'ò' => 'o',
        'ỏ' => 'o',
        'õ' => 'o',
        'ọ' => 'o',
        'ô' => 'o',
        'ố' => 'o',
        'ồ' => 'o',
        'ổ' => 'o',
        'ỗ' => 'o',
        'ộ' => 'o',
        'ơ' => 'o',
        'ớ' => 'o',
        'ờ' => 'o',
        'ở' => 'o',
        'ỡ' => 'o',
        'ợ' => 'o',
        'ú' => 'u',
        'ù' => 'u',
        'ủ' => 'u',
        'ũ' => 'u',
        'ụ' => 'u',
        'ư' => 'u',
        'ứ' => 'u',
        'ừ' => 'u',
        'ử' => 'u',
        'ữ' => 'u',
        'ự' => 'u',
        'ý' => 'y',
        'ỳ' => 'y',
        'ỷ' => 'y',
        'ỹ' => 'y',
        'ỵ' => 'y',
    ];

    $str = strtr($str, $unwanted_array);

    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;
}

?>