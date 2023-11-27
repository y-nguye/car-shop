<?php get_header('Tài khoản', 'account/accountPagesStyles', $this); ?>

<div class="push-footer-down-page">

    <div class="bg-light">
        <div class="container-lg">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="pt-3 pb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="text-dark mb-0">Xin chào, <?= $lastName ?></h3>
                            <a href="<?= BASE_URL ?>/account/logout">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <div class="container-lg">
        <div class="pt-4">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <form name="formAvatar" method="post" action="<?= BASE_URL ?>/account/edit-avatar" enctype="multipart/form-data">
                        <input type="file" name="user_avt" id="avatarInput" style="display: none;" accept="image/*" />
                        <div class="avatar-container rounded-circle">
                            <?php if ($user_avt && $user_avt && file_exists(__DIR__ . '/../../../../assets/imgs/avt/' . $user_avt)) : ?>
                                <img id="avatar" class="rounded-circle border border-1 avatar" src="<?= BASE_URL ?>/assets/imgs/avt/<?= $user_avt ?>" alt="avt">
                            <?php else : ?>
                                <img id="avatar" class="rounded-circle border border-1 avatar" src="<?= BASE_URL ?>/assets/imgs/avt/no-avt.jpg" alt="no-avt">
                            <?php endif ?>
                            <div class="rounded-circle d-flex align-items-center justify-content-center avatar-edit"><i class="bi bi-camera fs-1 text-white"></i></div>
                            <div class="update-button-group">
                                <button type="submit" name="btnOkUpdateAvatar" class="btn btn-ok-update-avatar"><i class="bi bi-check2"></i></button>
                                <button type="button" class="btn btn-cancer-update-avatar"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </div>
                    </form>

                    <h5 class="mt-3"><?= $user_fullname ?></h5>
                    <div class="mt-3">
                        <span><?= $user_email ?></span>
                    </div>
                    <div class="text-secondary">
                        <span>@<?= $user_username ?></span>
                    </div>
                    <div class="mt-3 mb-2">
                        <a href="<?= BASE_URL ?>/account">
                            Thông tin cá nhân
                        </a>
                    </div>

                    <?php if ($user_is_admin) : ?>
                        <div class="mb-2">
                            <a href="<?= BASE_URL ?>/admin">
                                Truy cập hệ thống quản trị
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="col-md-7">

                    <h3>Các đơn yêu cầu đặt cọc</h3>
                    <div class="mb-3">
                        <span>Danh sách các đơn yêu cầu đặt cọc của bạn, nếu có sai sót hãy liên hệ với chúng tôi</span>
                    </div>
                    <div class="rounded-3 container-deposit-list">
                        <div class="d-flex flex-wrap">
                            <div class="col-md-12">
                                <?php if (empty($data_all_user_deposit)) : ?>
                                    <div class="w-100">
                                        <div class="p-2 d-flex justify-content-center bg-light">
                                            <span class="fs-3">Hiện bạn chưa có đơn yêu cầu nào...</span>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php foreach ($data_all_user_deposit as $index => $data) : ?>
                                    <div class="me-2 bg-light shadow-sm rounded w-100 <?php if (count($data_all_user_deposit) - 1 != $index) echo "mb-3" ?>">
                                        <div class="p-2 d-flex align-items-center">
                                            <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                                                <img src="<?= BASE_URL ?>/assets/uploads/<?= $data['car_img_filename'] ?>" class="rounded-3 me-4 img-car-deposit" alt="img-car-deposit">
                                            <?php else : ?>
                                                <img src="<?= BASE_URL ?>/assets/imgs/no-img.jpg" class="rounded-3 me-4 img-car-deposit" alt="img-car-deposit">
                                            <?php endif; ?>


                                            <div class="d-flex flex-column pe-3 border-end min-width-250px">
                                                <span><b><?= $data['car_name'] ?></b></span>
                                                <span>Mã đơn hàng: #<?= $data['user_deposit_id'] ?></span>
                                                <?php $timestamp = strtotime($data['user_deposit_at']); ?>
                                                <span>Ngày: <?= date("d/m/Y", $timestamp);  ?></span>
                                            </div>

                                            <div class="ms-3 d-flex flex-column">
                                                <span><?= $data['user_deposit_where'] ?></span>
                                                <span>Phương thức: <?= $data['pay_method_name'] ?></span>
                                                <span>Phí đặt cọc: <?= number_format($data['user_deposit_price'], 0, ',', '.')  ?> ₫</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>

<?php
include_once __DIR__ . '/../../resources/layouts/footer.php';
?>

<script>
    const avatarInput = document.getElementById("avatarInput");
    const avatarImage = document.getElementById("avatar");
    const avatarEdit = document.querySelector(".avatar-edit");
    const updateButtonGroup = document.querySelector(".update-button-group");
    const avatarImageBackupSrc = avatarImage.src;

    avatarEdit.addEventListener("click", function() {
        // Khi người dùng click vào ảnh đại diện, kích hoạt sự kiện click cho input
        avatarInput.click();
    });

    avatarInput.addEventListener("change", function() {
        const selectedFile = avatarInput.files[0];
        console.log(selectedFile);
        if (selectedFile) {
            console.log('Hello');
            // Kiểm tra xem người dùng đã chọn ảnh chưa
            const reader = new FileReader();

            reader.onload = function(e) {
                // Hiển thị ảnh mới lên ảnh đại diện
                avatarImage.src = e.target.result;
                updateButtonGroup.classList.add("update-button-group-active");
            };

            reader.readAsDataURL(selectedFile);
        }

        document.querySelector(".btn-cancer-update-avatar").addEventListener("click", function() {
            avatarInput.value = null;
            avatarImage.src = avatarImageBackupSrc;
            updateButtonGroup.classList.remove("update-button-group-active");
        });
    });
</script>

</body>

</html>