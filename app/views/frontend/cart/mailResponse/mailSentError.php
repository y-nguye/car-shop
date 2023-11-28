<?php get_header('Có lỗi xảy ra', 'cart/mailResponse/mailSentStyles', $this); ?>

<div class="container-lg pt-3 push-footer-down-page">
    <h2 class="mb-0">Mail xác nhận gặp lỗi</h2>
    <hr>
    <div class="w-100 text-center">
        <div class="mt-5">
            <i class="bi bi-envelope-slash text-secondary icon-box"></i>
            <h1 class="mb-0 mt-3">Ô không! Có lỗi xảy ra.</h1>
            <div class="fs-5 mt-2">Đôi khi sẽ có lỗi xảy ra, đó không phải lỗi của bạn đâu!</div>
            <div class="fs-5">Đừng lo, yêu cầu của bạn đã thành công, trong vòng 24h tiếp theo chúng tôi sẽ liên lạc với bạn.</div>
            <br />
            <span class="fs-5"><?= $error ?></span>
        </div>
    </div>
</div>


<?php
include_once __DIR__ . '/../../../resources/layouts/footer.php';
?>

</body>

</html>