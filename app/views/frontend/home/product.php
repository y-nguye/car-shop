<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/frontend/home/homePageStyle.php' ?>
    <title><?= $data_car['car_name'] ?></title>
</head>

<body>
    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>

    <div class="container-lg mt-3">

        <div class="row">
            <div class="col-7">
                <div class="d-flex">

                    <div id="carouselIndicators" class="carousel slide rounded-3" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <?php foreach ($data_all_car_img as $index => $data) : ?>
                                <?php if (($index == 0)) continue ?>
                                <?php if ($data['car_img_filename']) : ?>
                                    <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="<?= $index - 1 ?>" aria-label="Slide <?= $index ?>" <?php if ($index - 1 == 0) : ?> class="active" aria-current="true" <?php endif; ?>></button>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>

                        <div class="carousel-inner">

                            <?php if (!$data['car_img_filename']) : ?>
                                <div class="carousel-item active">
                                    <img src="/car-shop/assets/imgs/no-img.jpg" alt="" class="d-block w-100">
                                </div>
                            <?php endif ?>

                            <?php foreach ($data_all_car_img as $index => $data) : ?>
                                <!-- Loại bỏ hình đại diện -->
                                <?php if ($index == 0) continue; ?>
                                <?php if ($data['car_img_filename']) : ?>
                                    <div class="carousel-item <?php if ($index == 1) echo 'active'; ?> " data-bs-interval="5000">
                                        <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" alt="" class="d-block w-100">
                                    </div>
                                <?php else : ?>
                                    <div class="carousel-item">
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

                <form name="formProductCar" method="post" action="">
                    <h1 class="text-dark"><?= $data_car['car_name'] ?></h1>
                    <span class="fs-3"><?= number_format($data_car['car_price'], 0, ',', '.') ?> ₫</span>

                    <div class="mt-4 pb-3 border-start border-end ">
                        <div class="row">
                            <div class="col-4">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <span>Kiểu dáng</span>
                                    <span class="mt-2 p-1 fs-4"><?= $data_car_type['car_type_name'] ?></span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <span>Số chỗ ngồi</span>
                                    <span class="mt-2 p-1 fs-4"><?= $data_car_seat['car_seat'] ?></span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <span>Loại hộp số</span>
                                    <span class="text-center p-1 mt-2 fs-4"><?= $data_car_transmission['car_transmission'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 border-start border-end ">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex flex-column align-items-center justify-content-center ps-5">
                                    <span>Nhiên liệu</span>
                                    <span class="mt-2 p-1 fs-4"><?= $data_car_fuel['car_fuel'] ?></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column align-items-center justify-content-center pe-5">
                                    <span>Hãng sản xuất</span>
                                    <span class="mt-2 p-1 fs-4"><?= $data_car_producer['car_producer_name'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <input type="hidden" name="car_id" value="<?= $data_car['car_id'] ?>" />
                    <input type="hidden" name="car_name" value="<?= $data_car['car_name'] ?>" />
                    <input type="hidden" name="car_price" value="<?= $data_car['car_price'] ?>" />
                    <input type="hidden" name="car_type_name" value="<?= $data_car_type['car_type_name'] ?>" />
                    <input type="hidden" name="car_seat" value="<?= $data_car_seat['car_seat'] ?>" />
                    <input type="hidden" name="car_transmission" value="<?= $data_car_transmission['car_transmission'] ?>" />
                    <input type="hidden" name="car_fuel" value="<?= $data_car_fuel['car_fuel'] ?>" />
                    <input type="hidden" name="car_producer_name" value="<?= $data_car_producer['car_producer_name'] ?>" />

                    <div class="mt-auto">
                        <a class="btn btn-primary mb-2 w-100" href="/car-shop/cart/registration-fee/<?= $data['car_id'] ?>">Dự toán chi phí</a>
                        <div class="d-flex">
                            <button type="submit" name="btnCostCalculator" class="btn btn-outline-primary w-50 me-2">Thêm vào giỏ hàng</button>
                            <button class="btn btn-outline-secondary w-50">Đăng kí lái thử</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>

        <div class="text-center">
            <p class="mt-2 p-4 fs-4"> <?= $data_car['car_describe'] ?> </p>
        </div>

        <hr>

        <div class="row mt-3">
            <h4 class="">Thông tin sản phẩm</h4>
            <p class="text-justify mt-2"><?= $data_car['car_detail_describe'] ?></p>
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