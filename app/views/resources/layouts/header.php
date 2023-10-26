<?php
include_once __DIR__ . '/headerStyles.php';
?>

<div class="fixed-top blur-below-navbar"></div>

<nav class="navbar d-block fixed-top navbar-expand-lg custom-navbar">
    <div class="container-lg">
        <a class="navbar-brand text-dark car-logo ps-2 pe-2 m-0" href="/car-shop"><i class="bi bi-car-front-fill"></i></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="h4"><i class="bi bi-list"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-lg-0 navbar-list">

                <?php foreach ($data_all_car_type as $data) : ?>
                    <?=
                    '<li class="nav-item ms-4">
                    <a class="nav-link text-dark" href="/car-shop/type-' . convertToSlug($data['car_type_name']) . '">' . $data['car_type_name'] . '</a>
                    </li>'
                    ?>
                <?php endforeach; ?>

                <li class="nav-item ms-auto me-4">
                    <a class="nav-link text-dark" href="/car-shop/service">Dịch vụ</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link text-dark" href="/car-shop/support">Hỗ trợ</a>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link btn text-dark position-relative bag">
                        <i class="bi bi-bag-fill"></i>
                        <?php if (isset($_SESSION['cart']) &&  count($_SESSION['cart']) != 0) : ?>
                            <span class="position-absolute top-0 start-50 badge rounded-pill bg-dark">
                                <?= count($_SESSION['cart']) ?>
                            </span>
                        <?php endif; ?>
                    </button>
                </li>
            </ul>
        </div>

    </div>
    <div class="expand-navbar-by-bag">
        <div class="container-lg bag-into">

            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="m-0"><b>Giỏ hàng</b></h3>
                    <button type="button" class="btn btn-primary rounded-pill cart-btn">Xem giỏ hàng</button>
                </div>
                <ul class="list-car-on-bag">
                    <?php $index = 0 ?>
                    <?php foreach ($_SESSION['cart'] as $data_cart) : ?>
                        <?php if ($index < 3) : ?>
                            <li class="mt-4">
                                <a class="text-dark" href="/car-shop/product/<?= $data_cart['car_id'] ?>">
                                    <div>
                                        <?php if ($data_cart['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data_cart['car_img_filename'])) : ?>
                                            <img src="/car-shop/assets/uploads/<?= $data_cart['car_img_filename'] ?>" class="rounded-3 me-3 img-item-on-bag" alt="mb">
                                        <?php else : ?>
                                            <img src="/car-shop/assets/imgs/no-img.jpg" alt="mb" class="rounded-3 me-3 img-item-on-bag">
                                        <?php endif; ?>
                                        <span><?= $data_cart['car_name'] ?></span>
                                    </div>
                                </a>
                            </li>
                        <?php else : ?>
                            <div class="mt-3"><?= "Còn " . count($_SESSION['cart']) - $index . " sản phẩm khác trong giỏ hàng của bạn" ?></div>
                            <?php break; ?>
                        <?php endif; ?>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                </ul>

            <?php else : ?>
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="m-0">Giỏ của bạn hiện trống</h4>
                </div>
                <?php if (isset($_SESSION['logged'])) : ?>
                    <?php if ($_SESSION['logged']) : ?>
                        <div class="mt-4"><a class="text-dark text-decoration-underline" href="/car-shop/">Mua sắm ngay</a></div>
                    <?php else : ?>
                        <div class="mt-4"><a class="text-dark text-decoration-underline" href="/car-shop/account/login">Đăng nhập</a> để xem bạn có món hàng nào được lưu hay không</div>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="mt-4"><a class="text-dark text-decoration-underline" href="/car-shop/account/login">Đăng nhập</a> để xem bạn có món hàng nào được lưu hay không</div>
                <?php endif; ?>
            <?php endif ?>

            <div class="mt-4 text-secondary"><span>Hồ sơ của tôi</span></div>
            <ul>
                <?php if (isset($_SESSION['logged'])) : ?>
                    <?php if ($_SESSION['logged'] == true) : ?>
                        <li class="mt-2 fs-7"><a href="/car-shop/account/deposit"><i class="bi bi-box align-middle me-2"></i>Đơn hàng</a></li>
                        <li class="mt-2 fs-7"><a href="/car-shop/account"><i class="bi bi-person-circle align-middle me-2"></i>Tài khoản</a></li>

                        <?php if ($_SESSION['user_is_admin']) : ?>
                            <li class="mt-2 fs-7"><a href="/car-shop/admin"><i class="bi bi-server align-middle me-2"></i>Truy cập hệ thống quản trị</a></li>
                        <?php endif; ?>

                        <li class="mt-2 fs-7"><a href="/car-shop/account/logout"><i class="bi bi-box-arrow-left align-middle me-2"></i>Đăng xuất</a></li>
                    <?php else : ?>
                        <li class="mt-2 fs-7"><a href="/car-shop/account/login"><i class="bi bi-box-arrow-left align-middle me-2"></i>Đăng nhập</a></li>
                    <?php endif ?>
                <?php else : ?>
                    <li class="mt-2 fs-7"><a href="/car-shop/account/login"><i class="bi bi-box-arrow-in-right align-middle me-2"></i>Đăng nhập</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="empty-space-below-navbar"></div>

<script>
    const navbarCollapse = document.querySelectorAll('.nav-item');
    const navbarToggler = document.querySelector('.navbar-toggler');
    var navbarMenu = document.querySelector('#navbarSupportedContent');

    const bag = document.querySelector('.bag');
    const bagInto = document.querySelector('.bag-into');
    const expandNavBar = document.querySelector('.expand-navbar-by-bag');
    const cartBtn = document.querySelector('.cart-btn');
    const blurBelowNavBar = document.querySelector('.blur-below-navbar');

    const children = bagInto.children;
    const totalHeight = Array.from(children).reduce((acc, child) => {
        return acc + child.clientHeight + parseInt(window.getComputedStyle(child).marginTop)
    }, 0);

    var isExpandNavBar = false;
    var isBagClicked = false;

    // Trường hợp web không bị thu nhỏ
    bag.addEventListener('click', () => {
        if (!isExpandNavBar) {
            handleExpandNavBar();
            if (window.innerWidth < 992) {
                isBagClicked = true;
                navbarToggler.click();
            }
        } else {
            handleShrinkNavbar();
        }
    });

    // ---------------------------------

    // Trường hợp web bị thu nhỏ
    navbarToggler.addEventListener('click', function() {
        // Xử lý sự kiện khi nút được nhấn
        if (navbarToggler.getAttribute('aria-expanded') === 'true') {
            // Nút đang mở rộng (expanded)
            handleShrinkNavbar(false);
            handleTurnOnBlurBelowNavBar();
        } else {
            // Nút không mở rộng (collapsed)
            if (!isBagClicked) {
                handleTurnOffBlurBelowNavBar();
            }
            isBagClicked = false;
        }
    });


    blurBelowNavBar.addEventListener('mouseover', () => {
        var chieuNgangTrang = window.innerWidth;
        if (chieuNgangTrang >= 992) {
            handleShrinkNavbar();
            if (navbarToggler.getAttribute('aria-expanded') === 'true') {
                // navbarToggler.click();
            }
        }
    });

    blurBelowNavBar.addEventListener('click', () => {
        handleShrinkNavbar();
        if (navbarToggler.getAttribute('aria-expanded') === 'true') {
            navbarToggler.click();
        }
    });

    function handleExpandNavBar(useBlurBelowNavBar = true) {
        expandNavBar.classList.add('extension-navbar');
        expandNavBar.style.height = `${totalHeight + 80}px`;
        bagInto.classList.add('extension-bag-into');
        if (useBlurBelowNavBar) handleTurnOnBlurBelowNavBar();
        isExpandNavBar = true;
    }

    function handleShrinkNavbar(useBlurBelowNavBar = true) {
        expandNavBar.classList.remove('extension-navbar');
        expandNavBar.style.height = '0px';
        bagInto.classList.remove('extension-bag-into');
        if (useBlurBelowNavBar) handleTurnOffBlurBelowNavBar();
        isExpandNavBar = false;
    }

    function handleTurnOnBlurBelowNavBar() {
        blurBelowNavBar.classList.add('blurred');
        blurBelowNavBar.style.visibility = "visible";
    }

    function handleTurnOffBlurBelowNavBar() {
        blurBelowNavBar.classList.remove('blurred');
        setTimeout(function() {
            blurBelowNavBar.style.visibility = "hidden";
        }, 320)
    }

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