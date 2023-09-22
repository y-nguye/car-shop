<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/frontend/home/homePageStyle.php' ?>
    <title>Thanh toán</title>
</head>

<body>

    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>
    <div class="push-footer-down-page">


        <div class="container-lg">
            <div class="pt-3 pb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="text-dark mb-0">Thanh toán</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-8">

                </div>
                <div class="col-4">


                    <div class="rounded-3 p-3 pt-2">
                        <h6 class="text-dark m-0">Tên khách hàng</h6>
                        <input type="text" name="<?= $user_info[$i][2] ?>" class="form-control mt-3" value="<?= $user_info[$i][3] ?>" />
                    </div>

                    <div class="rounded-3 p-3 pt-2">
                        <h6 class="text-dark m-0">Số điện thoại</h6>
                        <input type="text" name="<?= $user_info[$i][2] ?>" class="form-control mt-3" value="<?= $user_info[$i][3] ?>" />
                    </div>

                    <div class="rounded-3 p-3 pt-2">
                        <h6 class="text-dark m-0">Bàn giao tại cửa hàng</h6>
                        <select class="form-select mt-3" name="user_province_id">

                            <?php foreach ($data_all_user_province as $value) : ?>
                                <?php if ($value['user_province_id'] == $data_user['user_province_id']) : ?>
                                    <option selected value="<?= $value['user_province_id'] ?>">Showroom <?= $value['user_province_name'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $value['user_province_id'] ?>">Showroom <?= $value['user_province_name'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="rounded-3 p-3 pt-2 pb-2">
                        <h6 class="">Phương thức thanh toán</h6>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Chuyển khoản
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tiền mặt
                            </label>
                        </div>
                    </div>

                    <div class="rounded-3 ps-3 pe-3">
                        <hr>
                        <div class="d-flex align-items-center justify-content-between text-secondary">
                            <h6 class="m-0">Tổng chi phí dự tính</h6>
                            <div class="text-end"><?= number_format(1700000000, 0, ',', '.') ?> ₫</div>
                        </div>
                    </div>
                    <div class="rounded-3 ps-3 pb-3 pe-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="m-0">Phí cọc trước 10%</h6>
                            <div class="text-end pt-3 pb-3 fs-3"><?= number_format(170000000, 0, ',', '.') ?> ₫</div>
                        </div>
                    </div>


                    <div class="d-flex flex-column align-items-center justify-content-between ps-3 pe-3 mb-5">
                        <a class="btn btn-primary w-100" href="#">Đặt cọc</a>
                        <a class="mt-3" href="/car-shop/cart/registration-fee">Quay về tính toán</a>
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