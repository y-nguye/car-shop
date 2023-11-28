<?php get_header('Hỗ trợ', 'store/storePagesStyles', $this); ?>

<div class="container-lg pt-3 position-relative push-footer-down-page">
    <img src="<?= BASE_URL ?>/assets/imgs/support/getsupport-bg.jpg" alt="repair-services-1" class="rounded-3 support-img__support-page">
    <h1 class="text-center ms-2 mt-5 position-absolute top-0">Nhận sự hỗ trợ bạn cần.</h1>
    <div class="position-absolute container-content-banner__support-page">
        <p class="ms-2 content-banner__support-page">Hãy cung cấp một số thông tin chi tiết, chúng tôi sẽ đưa ra giải pháp tốt nhất. Kết nối qua điện thoại, email và các phương thức khác.</p>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-md-4 pt-5 text-center border-end d-flex flex-column">
            <i class="bi bi-telephone-inbound-fill fs-1"></i>
            <span class="mt-3 fs-5">Kinh doanh: 0123456789</span>
            <span class="fs-5">Dịch vụ: 9876543210</span>
        </div>

        <div class="col-md-4 pt-5 text-center border-end d-flex flex-column">
            <i class="bi bi-envelope-fill fs-1"></i>
            <span class="mt-3 fs-5">carshop.support@carshop.com.vn</span>
        </div>

        <div class="col-md-4 pt-5 text-center d-flex flex-column">
            <i class="bi bi-clock-fill fs-1"></i>
            <span class="mt-3 fs-5"><b>Kinh doanh</b></span>
            <span class="mt-3 fs-5">Thứ 2 - Thứ 6: 7h00 - 19h00</span>
            <span class="mt-1 fs-5">Thứ 7 - Chủ nhật: 7h00 - 17h00</span>
            <span class="mt-3 fs-5"><b>Dịch vụ</b></span>
            <span class="mt-1 fs-5">Thứ 2 - Thứ 7 : 8h00 - 17h00</span>
        </div>
    </div>
</div>

<?php
include_once __DIR__ . '/../../resources/layouts/footer.php';
?>

</body>

</html>