<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/frontend/home/homePageStyle.php' ?>
    <title>Tính toán chi phí</title>
</head>

<body>

    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>
    <div class="push-footer-down-page">


        <div class="container-lg">
            <div class="pt-3 pb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="text-dark mb-0">Tính toán chi phí</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                </div>

                <div class="col-4">

                    <div class="p-3 pt-2 pb-1">
                        <div class=" d-flex align-items-center justify-content-between text-secondary">
                            <h6 class="m-0">Giá tính phí trước bạ</h6>
                            <div class="text-end fs-6"><?= number_format($data_car['car_price'], 0, ',', '.') ?> ₫</div>
                        </div>
                        <hr>
                    </div>

                    <div class="p-3 pt-1">
                        <h6 class="text-dark m-0">Nơi đăng ký xe</h6>
                        <select class="form-select mt-3" name="user_province_id" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                            <option selected value="">---Chọn---</option>
                            <?php foreach ($data_all_user_province as $value) { ?>
                                <option value="<?= $value['user_province_id'] ?>"> <?= $value['user_province_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="p-3 pt-2">
                        <h6 class="text-dark m-0">Gói phí lưu hành đường bộ</h6>
                        <select class="form-select mt-3" name="user_province_id">
                            <option value="130000" selected>1 tháng</option>
                            <option value="780000">6 tháng</option>
                            <option value="1560000">12 tháng</option>
                            <option value="2280000">18 tháng</option>
                            <option value="3000000">24 tháng</option>
                            <option value="3660000">30 tháng</option>
                        </select>
                    </div>

                    <div class="p-3 pt-2">
                        <h6 class="text-dark m-0">Phí đăng kiểm</h6>
                        <div class="text-end fs-5"><?= number_format(340000, 0, ',', '.') ?> ₫</div>
                    </div>

                    <div class="ps-3 pb-3 pe-3">
                        <hr>
                        <h5 class="m-0">Tổng chi phí dự tính</h5>
                        <div class="text-end pt-3 pb-3 fs-3"><?= number_format(1700000000, 0, ',', '.') ?> ₫</div>
                    </div>

                    <div class="d-flex flex-column align-items-center justify-content-between ps-3 pe-3 mb-5">
                        <a class="btn btn-primary w-100" href="/car-shop/cart/pay">Tiến hành đặt cọc</a>
                        <a class="mt-3" href="/car-shop/cart">Quay về giỏ hàng</a>
                    </div>
                </div>
            </div>
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