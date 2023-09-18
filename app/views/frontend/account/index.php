<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/css/styles.php' ?>
    <?php include_once 'app/views/frontend/account/accountPageStyle.php' ?>
    <title>Document</title>
</head>

<body>
    <?php
    include_once 'app/views/resources/layouts/header.php';
    ?>

    <div class="bg-light">
        <div class="container-lg">
            <div class="border-bottom pt-3 pb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="text-dark mb-0">Tài khoản</h3>
                    <a href="/car-shop/account/logout">Đăng xuất</a>
                </div>
            </div>
            <h1 class="pt-5 pb-4">Xin chào, <?= $lastName ?></h1>
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
                            <img id="avatar" class="rounded-circle border border-1 avatar" src="/car-shop/assets/imgs/avt/<?php if ($data_user['user_avt']) echo $data_user['user_avt'];
                                                                                                                            else echo "no-avt.jpg" ?>" alt="">
                            <div class="rounded-circle d-flex align-items-center justify-content-center avatar-edit"><i class="bi bi-camera fs-1 text-white"></i></div>
                            <div class="update-button-group">
                                <button type="submit" name="btnOkUpdateAvatar" class="btn btn-outline-secondary btn-ok-update-avatar"><i class="bi bi-check2"></i></i></button>
                                <button type="button" class="btn btn-outline-secondary btn-cancer-update-avatar"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </div>
                    </form>
                    <h5 class="mt-3 ms-3"><?= $data_user['user_fullname'] ?></h5>
                    <div class="mt-3 ms-3">
                        <span><?= $data_user['user_email'] ?></span>
                    </div>
                    <div class="ms-3 text-secondary">
                        <span>@<?= $data_user['user_username'] ?></span>
                    </div>
                    <?php if ($data_user['user_is_admin']) { ?>
                        <a class="mt-3 nav-link sidebar-item btn-cartInfo" href="/car-shop/admin">
                            Truy cập hệ thống quản trị
                        </a>
                    <?php } ?>
                </div>
                <div class="col-7 body-content-info">

                    <?php include_once 'app/views/frontend/account/components/personInfo.php' ?>

                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>

    <?php
    include_once 'app/views/resources/script/script.php';
    ?>

    <script>
        const btnUpdate = document.querySelector('.btn-update');
        const editForm = document.querySelector('.edit-form');

        editForm.addEventListener('change', () => {
            formChanged = true;
            btnUpdate.classList.add('active');
        });


        // Lấy thẻ input và ảnh đại diện
        const avatarInput = document.getElementById("avatarInput");
        const avatarImage = document.getElementById("avatar");
        const avatarEdit = document.querySelector(".avatar-edit");
        const updateButtonGroup = document.querySelector(".update-button-group");

        var avatarImageBackupSrc = avatarImage.src;

        // Thêm sự kiện click vào ảnh đại diện
        avatarEdit.addEventListener("click", function() {
            // Khi người dùng click vào ảnh đại diện, kích hoạt sự kiện click cho input
            avatarInput.click();
        });

        // Thêm sự kiện change cho input để xử lý khi người dùng chọn ảnh mới
        avatarInput.addEventListener("change", function() {
            const selectedFile = avatarInput.files[0];

            if (selectedFile) {
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
                avatarImage.src = avatarImageBackupSrc;
                updateButtonGroup.classList.remove("update-button-group-active");
            });
        });
    </script>

</body>

</html>