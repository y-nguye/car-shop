<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/styles/styles.php'; ?>
    <?php include_once __DIR__ . '/accountPagesStyles.php'; ?>
    <title>Tài khoản</title>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../resources/layouts/header.php'
    ?>

    <?php
    $user_info = [
        ['Tên đầy đủ', '<i class="bi bi-person text-primary fs-4"></i>', 'user_fullname', $user_fullname],
        ['Số điện thoại', '<i class="bi bi-telephone text-primary fs-4"></i>', 'user_tel', $user_tel],
    ];
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
                                    <button type="submit" name="btnOkUpdateAvatar" class="btn btn-ok-update-avatar"><i class="bi bi-check2"></i></i></button>
                                    <button type="button" class="btn btn-cancer-update-avatar"><i class="bi bi-x-lg"></i></button>
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
                        <a class="mt-1 nav-link" href="/car-shop/account/deposit">
                            Xem đơn hàng
                        </a>
                        <?php if ($user_is_admin) : ?>
                            <a class="nav-link" href="/car-shop/admin">
                                Truy cập hệ thống quản trị
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-7 body-content-info">

                        <h3 class="ms-3">Thông tin cá nhân</h3>
                        <div class="ms-3 mb-3">
                            <span>Quản lý thông tin cá nhân của bạn, bao gồm số điện thoại và địa chỉ email mà chúng tôi có thể sử dụng để liên hệ với bạn.</span>
                        </div>
                        <form name="editForm" class="edit-form" method="post" action="/car-shop/account/edit-person-info">
                            <div class="d-flex flex-wrap">
                                <?php foreach ($user_info as $i => $data) : ?>
                                    <div class="col-6">
                                        <div class="m-3 bg-light shadow-sm rounded card-custom" style="aspect-ratio: 4/1;">
                                            <div class="rounded-3 p-3 pt-2 text-dark">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5 class="text-dark m-0"><?= $user_info[$i][0] ?></h5>
                                                    <?= $user_info[$i][1] ?>
                                                </div>
                                                <input type="text" name="<?= $user_info[$i][2] ?>" class="form-control mt-3" value="<?= $user_info[$i][3] ?>" />
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                <div class="col-6">
                                    <div class="m-3 bg-light shadow-sm rounded card-custom" style="aspect-ratio: 4/1;">
                                        <div class="rounded-3 p-3 pt-2 text-dark">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="text-dark m-0">Nơi đăng kí xe</h5>
                                                <i class="bi bi-geo-alt text-primary fs-4"></i>
                                            </div>
                                            <select class="form-select mt-3" name="user_province_id">
                                                <?php foreach ($data_all_user_province as $value) : ?>
                                                    <?php if ($value['user_province_id'] == $user_province_id) : ?>
                                                        <option selected value="<?= $value['user_province_id'] ?>"> <?= $value['user_province_name'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $value['user_province_id'] ?>"> <?= $value['user_province_name'] ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex align-items-center justify-content-end">
                                <button type="submit" name="btnEdit" class="btn btn-primary align-self-end mt-3 me-3 btn-update">Cập nhật</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../resources/script/script.php';
    ?>

    <script>
        const btnUpdate = document.querySelector('.btn-update');
        const editForm = document.querySelector('.edit-form');

        editForm.addEventListener('change', () => {
            formChanged = true;
            btnUpdate.classList.add('active');
        });


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