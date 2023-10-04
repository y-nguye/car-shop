<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/styles/styles.php'; ?>
    <?php include_once __DIR__ . '/storePagesStyles.php'; ?>
    <title><?= $data_car['car_name'] ?></title>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../resources/layouts/header.php'
    ?>

    <div class="container-lg mt-3">

        <div class="row">
            <div class="col-7">
                <div class="d-flex">

                    <div id="carouselIndicators" class="carousel slide rounded-3 slide__product-page" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <?php foreach ($data_all_car_img as $index => $data) : ?>
                                <?php if (($index == 0)) continue ?>
                                <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                                    <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="<?= $index - 1 ?>" aria-label="Slide <?= $index ?>" <?php if ($index - 1 == 0) : ?> class="active" aria-current="true" <?php endif; ?>></button>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="carousel-inner">
                            <?php if (empty($data_all_car_img[1])) : ?>
                                <div class="carousel-item carousel-item-custom__product-page active">
                                    <img src="/car-shop/assets/imgs/no-img.jpg" alt="" class="d-block w-100">
                                </div>
                            <?php endif ?>

                            <?php foreach ($data_all_car_img as $index => $data) : ?>
                                <!-- Loại bỏ hình đại diện -->
                                <?php if ($index == 0) continue; ?>
                                <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                                    <div class="carousel-item carousel-item-custom__product-page <?php if ($index == 1) echo 'active'; ?> " data-bs-interval="5000">
                                        <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" alt="" class="d-block w-100">
                                    </div>
                                <?php else : ?>
                                    <div class="carousel-item carousel-item-custom__product-page">
                                        <img src="/car-shop/assets/imgs/no-img.jpg" alt="" class="d-block w-100">
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>

            <div class="d-flex flex-column col-5 ps-5">


                <h1 class="text-dark"><?= $data_car['car_name'] ?></h1>
                <span class="fs-3"><?= number_format($data_car['car_price'], 0, ',', '.') ?> ₫</span>

                <div class="mt-4 pb-3 border-start border-end">
                    <div class="row">
                        <div class="col-4">
                            <div class="text-center d-flex flex-column align-items-center justify-content-center">
                                <span>Kiểu dáng</span>
                                <span class="mt-2 p-1 fs-4"><?= $data_car['car_type_name'] ?></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center d-flex flex-column align-items-center justify-content-center">
                                <span>Số chỗ ngồi</span>
                                <span class="mt-2 p-1 fs-4"><?= $data_car['car_seat'] ?></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center d-flex flex-column align-items-center justify-content-center">
                                <span>Loại hộp số</span>
                                <span class="text-center p-1 mt-2 fs-4"><?= $data_car['car_transmission'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 border-start border-end">
                    <div class="row">
                        <div class="col-4">
                            <div class="text-center d-flex flex-column align-items-center justify-content-center">
                                <span>Hãng sản xuất</span>
                                <?php if (empty($data_car['car_producer_name'])) : ?>
                                    <span class="mt-2 p-1 fs-4">---</span>
                                <?php else : ?>
                                    <span class="mt-2 p-1 fs-4"><?= $data_car['car_producer_name'] ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center d-flex flex-column align-items-center justify-content-center">
                                <span>Nhiên liệu</span>
                                <?php if (empty($data_car['car_fuel'])) : ?>
                                    <span class="mt-2 p-1 fs-4">---</span>
                                <?php else : ?>
                                    <span class="mt-2 p-1 fs-4"><?= $data_car['car_fuel'] ?></span>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center d-flex flex-column align-items-center justify-content-center">
                                <span>Động cơ</span>
                                <span class="mt-2 p-1 fs-4"><?= $data_car['car_engine'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <form name="formProductCar" class="d-flex flex-column h-100" method="post" action="">

                    <input type="hidden" name="car_id" value="<?= $data_car['car_id'] ?>" />
                    <input type="hidden" name="car_name" value="<?= $data_car['car_name'] ?>" />
                    <input type="hidden" name="car_price" value="<?= $data_car['car_price'] ?>" />
                    <input type="hidden" name="car_describe" value="<?= $data_car['car_describe'] ?>" />

                    <div class="mt-auto">
                        <button type="submit" name="btnRegistrationFee" class="btn btn-primary mb-2 w-100">Dự toán chi phí</button>
                        <div class="d-flex">
                            <button type="submit" name="btnAddCarToCart" class="btn btn-outline-primary w-50 me-2">Thêm vào giỏ hàng</button>
                            <a class="btn btn-outline-secondary w-50" href="/car-shop/test-drive/<?= $data_car['car_id'] ?>">Đăng ký lái thử</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="text-center">
            <p class="mt-5 mb-5 fs-4"> <?= $data_car['car_describe'] ?> </p>
        </div>

        <hr>

        <div class="row mt-3">
            <div class="d-flex align-items-center justify-content-center mb-5">
                <?php if ($data_all_car_img[0]['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data_all_car_img[0]['car_img_filename'])) : ?>
                    <img src="/car-shop/assets/uploads/<?= $data_all_car_img[0]['car_img_filename'] ?>" alt="" class=" w-50">
                <?php endif ?>
            </div>
            <h4 class="">Thông tin sản phẩm</h4>
            <p class="text-justify mt-2"><?= $data_car['car_detail_describe'] ?></p>
        </div>

    </div>

    <!-- HTML cho một toast -->
    <div id="toast-result-test-drive" class="toast align-items-center text-white bg-primary fixed-top toast-custom" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../resources/script/script.php';
    ?>

    <script>
        // -------------------- Toast hiển thị kết quả đăng ký lái thử --------------------
        const toastBody = document.querySelector('.toast-body');
        const toastResultTestDrive = document.getElementById('toast-result-test-drive');
        const toast = new bootstrap.Toast(toastResultTestDrive);

        toastResultTestDrive.addEventListener('shown.bs.toast', function() {
            setTimeout(function() {
                toast.hide();
            }, 3000);
        });
    </script>

</body>

</html>