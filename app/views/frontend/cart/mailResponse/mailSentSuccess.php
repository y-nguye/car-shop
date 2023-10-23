<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../../resources/globalStyles/globalStyles.php'; ?>
    <?php include_once __DIR__ . '/mailSentStyles.php'; ?>
    <title>Yêu cầu thành công</title>
</head>

<body>

    <?php
    include_once __DIR__ . '/../../../resources/layouts/header.php';
    ?>

    <div class="container-lg pt-3 push-footer-down-page">
        <h2 class="mb-0">Yêu cầu đặt cọc thành công</h2>
        <hr>
        <div class="w-100 text-center">
            <div class="mt-5">
                <i class="bi bi-box-seam text-secondary icon-box"></i>
                <h1 class="mb-0 mt-3">Cảm ơn quý khách đã lựa chọn chúng tôi.</h1>
                <br>
                <span class="fs-5">Yêu cầu của quý khách sẽ được xử lý trong vòng 24h tiếp theo.</span>
            </div>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/../../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../../resources/script/script.php';
    ?>
</body>

</html>