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
                    <h3 class="text-dark mb-0">Giỏ hàng</h3>
                </div>
            </div>
        </div>

        <div class="container-lg">

            <?php if (empty($cart)) : ?>
                <h4>Giỏ hàng rỗng</h4>
            <?php endif; ?>
            <?php $i = 0; ?>
            <?php foreach ($cart as $data) : ?>

                <div class="mt-3 mb-3">

                    <?php if ($i != 0) echo "<hr>" ?>
                    <div class="d-flex align-items-center">
                        <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="img-car-on-cart" alt="">
                        <div class="d-flex flex-column ms-5">
                            <h1 class="m-0"><?= $data['car_name'] ?></h1>
                            <p class="fs-3 m-0"><?= number_format($data['car_price'], 0, ',', '.') ?> ₫</p>
                            <a class="fs-5 icon-link icon-link-hover" href="/car-shop/cart/registration-fee/<?= $data['car_id'] ?>">Dự toán chi phí <i class="bi bi-arrow-right align-middle "></i></a>
                        </div>
                        <button type="button" class="btn-close fs-5 ms-auto me-4" aria-label="Close"></button>
                    </div>
                </div>

                <?php $i++; ?>
            <?php endforeach ?>

        </div>

    </div>

    <?php
    include_once 'app/views/frontend/layouts/footer.php';
    ?>

    <?php
    include_once 'app/views/resources/script/script.php';
    ?>

</body>

</html>