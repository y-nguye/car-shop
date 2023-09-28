<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/frontend/account/accountPagesStyle.php' ?>
    <title>Tài khoản</title>
</head>

<body>
    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>

    <div class="push-footer-down-page">

        <div class="bg-light">
            <div class="container-lg">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="pt-3 pb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="text-dark mb-0">Xin chào, <?= $lastName ?></h3>
                                <a href="/car-shop/account/logout">Đăng xuất</a>
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
                    <div class="col-1"></div>
                    <div class="col-3">
                        <form name="formAvatar" method="post" action="/car-shop/account/edit-avatar" enctype="multipart/form-data">
                            <input type="file" name="user_avt" id="avatarInput" style="display: none;" accept="image/*" />
                            <div class="avatar-container rounded-circle ms-3">
                                <img id="avatar" class="rounded-circle border border-1 avatar" src="/car-shop/assets/imgs/avt/<?php if ($user_avt) echo $user_avt;
                                                                                                                                else echo "no-avt.jpg" ?>" alt="">
                                <div class="rounded-circle d-flex align-items-center justify-content-center avatar-edit"><i class="bi bi-camera fs-1 text-white"></i></div>
                                <div class="update-button-group">
                                    <button type="submit" name="btnOkUpdateAvatar" class="btn btn-outline-secondary btn-ok-update-avatar"><i class="bi bi-check2"></i></i></button>
                                    <button type="button" class="btn btn-outline-secondary btn-cancer-update-avatar"><i class="bi bi-x-lg"></i></button>
                                </div>
                            </div>
                        </form>
                        <h5 class="mt-3 ms-3"><?= $user_fullname ?></h5>
                        <div class="mt-3 ms-3">
                            <span><?= $user_email ?></span>
                        </div>
                        <div class="ms-3 text-secondary">
                            <span>@<?= $user_username ?></span>
                        </div>
                        <a class="mt-1 nav-link" href="/car-shop/account">
                            Thông tin cá nhân
                        </a>
                        <?php if ($user_is_admin) : ?>
                            <a class="nav-link" href="/car-shop/admin">
                                Truy cập hệ thống quản trị
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-7 body-content-info">

                        <h3 class="ms-3">Đơn yêu cầu đặt cọc</h3>
                        <div class="ms-3 mb-3">
                            <span>Trạng thái và thông tin đơn hàng của bạn, nếu có sai sót hãy liên hệ với chúng tôi</span>
                        </div>
                        <div class="d-flex flex-wrap">

                            <?php if (empty($data_all_user_deposit)) : ?>
                                <div class="m-3 bg-light shadow-sm rounded w-100">
                                    <div class="p-2 d-flex align-items-center justify-content-center">
                                        <span class="fs-3">Hiện bạn chưa có đơn yêu cầu nào..</span>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php foreach ($data_all_user_deposit as $data) : ?>
                                <div class="m-3 bg-light shadow-sm rounded w-100">
                                    <div class="p-2 d-flex align-items-center">
                                        <?php if (empty($data['car_img_filename'])) : ?>
                                            <img src="/car-shop/assets/imgs/no-img.jpg" class="rounded-3 me-4 img-car-deposit" alt="img-car-deposit">
                                        <?php else : ?>
                                            <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="rounded-3 me-4 img-car-deposit" alt="img-car-deposit">
                                        <?php endif; ?>

                                        <div class="d-flex flex-column pe-3 border-end min-width-250px">
                                            <span>Tên xe: <?= $data['car_name'] ?></span>
                                            <span>Mã đơn hàng: <?= $data['user_deposit_id'] ?></span>
                                            <span>Ngày: <?= $data['user_deposit_at'] ?></span>
                                        </div>

                                        <div class="ms-3 d-flex flex-column">
                                            <span><?= $data['user_deposit_where'] ?></span>
                                            <span>Phương thức: <?= $data['pay_method_name'] ?></span>
                                            <span>Phí đặt cọc: <?= number_format($data['user_deposit_price'], 0, ',', '.') ?></span>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once 'app/views/frontend/layouts/footer.php';
    ?>

    <?php
    include_once 'app/views/resources/script/script.php';
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