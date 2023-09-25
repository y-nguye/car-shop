<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/frontend/cart/cartPageStyle.php' ?>
    <title>Giỏ hàng</title>
</head>

<body>

    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>
    <div class="push-footer-down-page">


        <div class="container-lg">
            <div class="pt-3 pb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <?php if (empty($cart)) : ?>
                        <h2 class="mb-0">Giỏ hàng của bạn đang trống</h2>
                    <?php else : ?>
                        <h2 class="mb-0">Giỏ hàng</h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="container-lg pb-3">

            <?php if (empty($cart)) : ?>
                <div class="mt-3 mb-3">
                    <a class="btn text-dark rounded-pill fs-5 ps-5 pe-5 bg-custom" href="/car-shop">Tiếp tục mua sắm</a>
                </div>
            <?php endif ?>


            <?php $i = 0; ?>
            <?php foreach ($cart as $data) : ?>
                <div class="mt-3 mb-3">
                    <?php if ($i != 0) echo "<hr>" ?>
                    <div class="d-flex align-items-center">
                        <a href="/car-shop/product/<?= $data['car_id'] ?>">
                            <?php if (empty($data_cart['car_img_filename'])) : ?>
                                <img src="/car-shop/assets/imgs/no-img.jpg" class="rounded-3 img-car-on-cart" alt="img-car-on-cart">
                            <?php else : ?>
                                <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="img-car-on-cart" alt="img-car-on-cart">
                            <?php endif; ?>
                        </a>
                        <div class="d-flex flex-column ms-5">
                            <h1 class="m-0"><?= $data['car_name'] ?></h1>
                            <p class="fs-3 m-0"><?= number_format($data['car_price'], 0, ',', '.') ?> ₫</p>
                            <a class="fs-5 icon-link icon-link-hover" href="/car-shop/cart/registration-fee/<?= $data['car_id'] ?>">Dự toán chi phí <i class="bi bi-arrow-right align-middle "></i></a>
                        </div>
                        <a class="btn-close fs-5 ms-auto me-4" aria-label="Close" href="/car-shop/cart/delete/<?= $data['car_id'] ?>"></a>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach ?>

        </div>

        <?php if (empty($cart)) : ?>
            <div class="border-top border-bottom mt-5">
                <div class="container-lg pt-3 pb-3 fs-5">
                    Bạn cần hỗ trợ thêm? gọi 0772884452.
                </div>
            </div>
        <?php endif ?>

    </div>

    <?php
    include_once 'app/views/frontend/layouts/footer.php';
    ?>

    <?php
    include_once 'app/views/resources/script/script.php';
    ?>

</body>

</html>