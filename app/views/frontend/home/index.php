<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/frontend/home/homePageStyle.php' ?>
    <title>Trang chủ</title>
</head>

<body>

    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>

    <div class="container-lg pt-3 push-footer-down-page">
        <?php if (empty($data_all_car_by_car_ids_to_display_carouse) && empty($data_all_car_by_car_ids_to_display_salling)) : ?>
            <h1>Oh no!</h1>
        <?php else : ?>
            <div class="d-flex justify-content-center">
                <div id="carouselExampleCaptions" class="carousel card slide rounded-3" data-bs-ride="carousel">

                    <div class="carousel-inner">

                        <?php foreach ($data_all_car_by_car_ids_to_display_carouse as $index => $data) : ?>
                            <a href="/car-shop/product/<?= $data['car_id'] ?>">
                                <div class="carousel-item carousel-item-custom__home-page <?php if ($index == 0) echo "active" ?>">
                                    <div class="carousel-shadow"></div>
                                    <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="d-block" alt="mercedes_class_a">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1><a class="text-white" href="#"><?= $data['car_name'] ?></a></h1>
                                        <p><?= $data['car_describe'] ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <h2 class="mt-4">Top xe bán chạy trong mỗi dòng xe</h2>

            <div class="row row-cols-2">
                <?php
                foreach ($data_all_car_by_car_ids_to_display_salling as $data) : ?>
                    <div class="col mt-4">
                        <a href="/car-shop/product/<?= $data['car_id'] ?>">
                            <div class="card card-custom__home-page text-white">
                                <div class="card-shadow"></div>
                                <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="card-img" alt="mb">
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
    include_once 'app/views/frontend/layouts/footer.php';
    ?>

    <?php
    include_once 'app/views/resources/script/script.php';
    ?>

</body>

</html>