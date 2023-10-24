<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php'; ?>
    <?php include_once __DIR__ . '/storePagesStyles.php'; ?>
    <title>Dòng xe <?= $nameType ?></title>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../resources/layouts/header.php'
    ?>

    <div class="container-lg pt-3 pb-3 push-footer-down-page">
        <div class="row">
            <?php if (empty($data_all_with_img)) : ?>
                <h2>Xin lỗi, chúng tôi không còn dòng xe này...</h2>
            <?php else : ?>
                <?php foreach ($data_all_with_img as $data) : ?>
                    <div class="col-md-4 mb-4">
                        <a href="/project/car-shop/product/<?= $data['car_id'] ?>">
                            <div class="d-flex flex-column align-items-center justify-content-center text-dark rounded-3 p-2 card-custom__type-page">
                                <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                                    <img src="/project/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="card-img-top img-on-card__type-page rounded-3" alt="img-card">
                                <?php else : ?>
                                    <img src="/project/car-shop/assets/imgs/no-img.jpg" class="card-img-top img-on-card__type-page rounded-3" alt="img-card">
                                <?php endif; ?>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= $data['car_name'] ?></h5>
                                    <p class="card-text">Giá từ <?= number_format($data['car_price'], 0, ',', '.') ?> ₫</p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../resources/globalScript/globalScript.php';
    ?>

</body>

</html>