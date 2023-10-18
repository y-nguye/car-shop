<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php'; ?>
    <?php include_once __DIR__ . '/storePagesStyles.php'; ?>
    <title>Trang chủ</title>
</head>

<body>

    <?php
    include_once __DIR__ . '/../../resources/layouts/header.php'
    ?>

    <div class="container-lg pt-3 push-footer-down-page">
        <?php if (empty($data_all_car_by_car_ids_to_display_carouse) && empty($data_all_car_by_car_ids_to_display_salling)) : ?>
            <h1>Oh no! Cửa hàng đang bảo trì, quay lại sau nhé...</h1>
        <?php else : ?>
            <div class="d-flex justify-content-center">
                <div id="carouselCaptions" class="carousel card slide rounded-3 slide__home-page" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($data_all_car_by_car_ids_to_display_carouse as $index => $data) : ?>
                            <a href="/car-shop/product/<?= $data['car_id'] ?>">
                                <div class="carousel-item carousel-item-custom__home-page <?php if ($index == 0) echo "active" ?>">
                                    <div class="carousel-shadow__home-page"></div>
                                    <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                                        <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="card-img" alt="carousel-img">
                                    <?php else : ?>
                                        <img src="/car-shop/assets/imgs/no-img.jpg" class="card-img carousel-no-img-custom__home-page" alt="carousel-img">
                                    <?php endif; ?>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1><a class="text-white" href="#"><?= $data['car_name'] ?></a></h1>
                                        <p class="fs-5"><?= $data['car_describe'] ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="mt-5">
                <b>
                    <span class="mt-5 fs-2">Top bán chạy.</span>
                    <span class="mt-5 fs-2 text-secondary">Mức giá dễ tiếp cận của mỗi dòng xe.</span>
                </b>
            </div>

            <div class="row">
                <?php foreach ($data_all_car_by_car_ids_to_display_salling as $data) : ?>
                    <div class="col-md-6 mt-4">
                        <a href="/car-shop/product/<?= $data['car_id'] ?>">
                            <div class="card card-custom__home-page text-white">
                                <div class="card-shadow__home-page"></div>
                                <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                                    <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="card-img" alt="mb">
                                <?php else : ?>
                                    <img src="/car-shop/assets/imgs/no-img.jpg" alt="mb" class="card-img">
                                <?php endif; ?>
                                <div class="card-img-overlay">
                                    <h2 class="card-title"><?= $data['car_name'] ?></h2>
                                    <p class="card-text"><?= $data['car_describe'] ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-5">
                <b>
                    <span class="mt-5 fs-2">Mới nhập.</span>
                    <span class="mt-5 fs-2 text-secondary">Khám phá những điều mới mẻ ngay.</span>
                </b>
            </div>

            <div class="row">
                <?php foreach ($data_all_car_by_car_ids_to_display_four_newest as $data) : ?>
                    <div class="col-md-6 mt-4">
                        <a href="/car-shop/product/<?= $data['car_id'] ?>">
                            <div class="card card-custom__home-page text-white">
                                <div class="card-shadow__home-page"></div>
                                <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                                    <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="card-img" alt="mb">
                                <?php else : ?>
                                    <img src="/car-shop/assets/imgs/no-img.jpg" alt="mb" class="card-img">
                                <?php endif; ?>
                                <div class="card-img-overlay">
                                    <h2 class="card-title"><?= $data['car_name'] ?></h2>
                                    <p class="card-text"><?= $data['car_describe'] ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-5">
                <b>
                    <span class="mt-5 fs-2">Hạng sang.</span>
                    <span class="mt-5 fs-2 text-secondary">Đẳng cấp của công nghệ và thiết kế.</span>
                </b>
            </div>

            <div class="row">
                <?php foreach ($data_all_car_by_car_ids_to_display_luxury as $data) : ?>
                    <div class="col-md-6 mt-4">
                        <a href="/car-shop/product/<?= $data['car_id'] ?>">
                            <div class="card card-custom__home-page text-white">
                                <div class="card-shadow__home-page"></div>
                                <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                                    <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="card-img" alt="mb">
                                <?php else : ?>
                                    <img src="/car-shop/assets/imgs/no-img.jpg" alt="mb" class="card-img">
                                <?php endif; ?>
                                <div class="card-img-overlay">
                                    <h2 class="card-title"><?= $data['car_name'] ?></h2>
                                    <p class="card-text"><?= $data['car_describe'] ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

    </div>

    <?php
    include_once __DIR__ . '/../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../resources/globalScript/globalScript.php';
    ?>

</body>

</html>