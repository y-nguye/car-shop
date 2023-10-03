<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../../resources/styles/styles.php'; ?>
    <?php include_once __DIR__ . '/mailSentStyles.php'; ?>
    <title>Có lỗi xảy ra</title>
</head>

<body>

    <?php
    include_once __DIR__ . '/../../../resources/layouts/header.php';
    ?>

    <div class="container-lg pt-3 push-footer-down-page">
        <h2 class="mb-0">Mail xác nhận gặp lỗi</h2>
        <hr>
        <div class="w-100 text-center">
            <div class="mt-5">
                <i class="bi bi-envelope-slash text-secondary icon-box"></i>
                <h1 class="mb-0 mt-3">Có lỗi xảy ra.</h1>
                <br>
                <span class="fs-5"><?= $error ?></span>
            </div>
        </div>
    </div>


    <?php
    include_once __DIR__ . '/../../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../../resources/script/script.php';
    ?>

    <script>
    </script>

</body>

</html>