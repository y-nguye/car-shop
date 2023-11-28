<?php get_header('Giỏ hàng', 'cart/cartPagesStyles', $this); ?>

<div class="push-footer-down-page">

    <div class="container-lg pt-3 ">
        <?php if (empty($cart)) : ?>
            <h2 class="mb-0 mb-5">Ở đây hơi trống trải.</h2>
        <?php else : ?>
            <h2 class="mb-0">Giỏ hàng</h2>
        <?php endif; ?>
    </div>

    <div class="container-lg pb-3">

        <?php if (empty($cart)) : ?>
            <div class="mt-3 mb-3">
                <a class="btn text-dark rounded-pill fs-5 ps-5 pe-5 bg-gray-light" href="<?= BASE_URL ?>">Tiếp tục mua sắm</a>
            </div>
        <?php endif ?>

        <?php foreach ($cart as $data) : ?>
            <div class="mt-3 mb-3">
                <hr>
                <div class="d-flex align-items-center">
                    <a href="<?= BASE_URL ?>/product/<?= $data['car_id'] ?>">
                        <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                            <img src="<?= BASE_URL ?>/assets/uploads/<?= $data['car_img_filename'] ?>" class="img-car-on-cart" alt="img-car-on-cart">
                        <?php else : ?>
                            <img src="<?= BASE_URL ?>/assets/imgs/no-img.jpg" class="rounded-3 img-car-on-cart" alt="img-car-on-cart">
                        <?php endif; ?>
                    </a>

                    <div class="d-flex flex-column ms-3">
                        <h1 class="m-0 car-name__cart-page"><?= $data['car_name'] ?></h1>
                        <p class="fs-3 m-0 car-price__cart-page"><?= number_format($data['car_price'], 0, ',', '.') ?> ₫</p>
                        <a class="fs-5 icon-link icon-link-hover registration-fee__cart-page" href="<?= BASE_URL ?>/cart/registration-fee/<?= $data['car_id'] ?>">Dự toán chi phí <i class="bi bi-arrow-right align-middle "></i></a>
                    </div>
                    <a class="btn-close fs-5 ms-auto me-1" aria-label="Close" href="<?= BASE_URL ?>/cart/delete/<?= $data['car_id'] ?>"></a>
                </div>
            </div>
        <?php endforeach ?>

    </div>

    <?php if (empty($cart)) : ?>
        <div class="border-top border-bottom mt-4">
            <div class="container-lg pt-3 pb-3 fs-5">
                Bạn cần hỗ trợ thêm? gọi 0123456789.
            </div>
        </div>
    <?php endif ?>

</div>

<?php
include_once __DIR__ . '/../../resources/layouts/footer.php';
?>

</body>

</html>