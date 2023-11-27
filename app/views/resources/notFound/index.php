<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php'; ?>
    <?php include_once __DIR__ . '/notFoundPageStyle.php' ?>
    <title>Page Not Found</title>
</head>

<body>
    <div class="container-lg">
        <div class="d-flex flex-column text-center container-custom__not-found-page">
            <h1 class="mt-5 mb-4">Không thể tìm thấy trang bạn đang tìm kiếm.</h1>
            <a class="mb-5" href="<?= BASE_URL ?>/"><i class="bi bi-chevron-left"></i> Trở về trang chủ</a>
        </div>
    </div>
</body>

</html>