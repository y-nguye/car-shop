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
        <div class="w-100 text-center mt-5">
            <div class="mt-5 h-100">
                <h1 class="mb-0 text-success">Đó là một chiếc xe tuyệt vời!</h1>
                <br />
                <span class="fs-3 mb-0">Cảm ơn bạn đã lựa chọn chúng tôi.</span>
                <br>
                <i class="bi bi-box-seam text-secondary icon-box"></i>
                <br>
                <span class="fs-5">Yêu cầu của bạn đang được xử lý...</span>
                <br />
                <span class="fs-5">Trong vòng 24h tiếp theo chúng tôi sẽ gọi điện xác nhận, bạn vui lòng nhấc máy nhé!</span>
            </div>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/../../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../../resources/globalScript/globalScript.php';
    ?>
</body>

</html>