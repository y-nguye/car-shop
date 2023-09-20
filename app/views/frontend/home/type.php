<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'app/views/resources/css/styles.php' ?>
    <title><?= $dataNameType ?></title>
</head>

<body>
    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>

    <div class="container-lg pt-3 push-footer-down-page">
        <div class="row">

            <?php foreach ($data as $data) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['car_name'] ?></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/car-shop/type-<?= $type ?>/<?= $data['car_id'] ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>

    <?php
    include_once 'app/views/frontend/layouts/footer.php';
    ?>


</body>

</html>