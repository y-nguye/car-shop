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
                <div class="col-1"></div>
            </div>
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
                            <?php if ($user_avt && file_exists(__DIR__ . '/../../../../assets/imgs/avt/' . $user_avt)) : ?>
                                <img id="avatar" class="rounded-circle border border-1 avatar" src="<?= BASE_URL ?>/assets/imgs/avt/<?= $user_avt ?>" alt="avt">
                            <?php else : ?>
                                <img id="avatar" class="rounded-circle border border-1 avatar" src="<?= BASE_URL ?>/assets/imgs/avt/no-avt.jpg" alt="no-avt">
                            <?php endif ?>
                            <div class="rounded-circle d-flex align-items-center justify-content-center avatar-edit"><i class="bi bi-camera fs-1 text-white"></i></div>
                            <div class="update-button-group">
                                <button type="submit" name="btnOkUpdateAvatar" class="btn btn-ok-update-avatar"><i class="bi bi-check2"></i></i></button>
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
                        <a href="<?= BASE_URL ?>/account/deposit">
                            Xem đơn hàng
                        </a>
                    </div>
                    <?php if ($user_is_admin) : ?>
                        <div class="mb-2">
                            <a href="<?= BASE_URL ?>/admin">
                                Truy cập hệ thống quản trị
                            </a>
                        </div>
                    <?php endif; ?>

                    <form id="deleteForm" method="post" action="">
                        <div class="mb-2">
                            <a class="text-danger" href="" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Xoá tài khoản
                            </a>
                        </div>

                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xoá tài khoản</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="user_password" class="col-form-label">Vui lòng nhập mật khẩu:</label>
                                            <input type="password" name="user_password" class="form-control" id="user_password" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" name="btnDelete" class="btn btn-danger btn-delete__confirm">Xoá</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-7 body-content-info">

                    <h3>Thông tin cá nhân</h3>
                    <div class="mb-3 text-justify">
                        <span>Quản lý thông tin cá nhân của bạn, bao gồm số điện thoại và địa chỉ email mà chúng tôi có thể sử dụng để liên hệ với bạn.</span>
                    </div>
                    <div id="liveAlertPlaceholder" class="text-start"></div>

                    <form name="editForm" id="editForm" class="edit-form" method="post" action="<?= BASE_URL ?>/account/edit-person-info">
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="mb-2 bg-light shadow-sm rounded">
                                    <div class="rounded-3 p-3 pt-2 text-dark">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="text-dark m-0">Tên đầy đủ</h5>
                                            <i class="bi bi-person text-primary fs-4"></i>
                                        </div>
                                        <input type="text" name="user_fullname" class="form-control mt-3" value="<?= $user_fullname ?>" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="mb-2 bg-light shadow-sm rounded">
                                    <div class="rounded-3 p-3 pt-2 text-dark">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="text-dark m-0">Số điện thoại</h5>
                                            <i class="bi bi-telephone text-primary fs-4"></i>
                                        </div>
                                        <input type="text" name="user_tel" class="form-control mt-3" value="<?= $user_tel ?>" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="mb-2 bg-light shadow-sm rounded">
                                    <div class="rounded-3 p-3 pt-2 text-dark">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="text-dark m-0">Nơi đăng kí xe</h5>
                                            <i class="bi bi-geo-alt text-primary fs-4"></i>
                                        </div>
                                        <select class="form-select mt-3" name="user_province_id">
                                            <?php foreach ($data_all_user_province as $data) : ?>
                                                <?php if ($data['user_province_id'] == $user_province_id) : ?>
                                                    <option selected value="<?= $data['user_province_id'] ?>"> <?= $data['user_province_name'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $data['user_province_id'] ?>"> <?= $data['user_province_name'] ?></option>
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

    $(document).ready(function() {
        $('#editForm').validate({
            errorClass: "is-invalid",
            errorPlacement: function(error, element) {
                element.attr("data-bs-original-title", error.text());
            },
            success: function(element) {
                element.removeAttr("data-bs-original-title");
            },
            submitHandler: function(form) {
                preventOperation();
                form.submit();
            },
            rules: {
                user_fullname: {
                    required: true,
                    minlength: 3,
                    maxlength: 50,
                },
                user_tel: {
                    required: true,
                    minlength: 10,
                    maxlength: 15,
                },
                user_password: {
                    required: true,
                }
            },
            messages: {
                user_fullname: {
                    required: "Không được để trống",
                    minlength: "Tên quá ngắn",
                    maxlength: "Tên quá dài",
                },
                user_tel: {
                    required: "Không được để trống",
                    minlength: "Số điện thoại không hợp lệ",
                    maxlength: "Số điện thoại không hợp lệ",
                },
                user_password: {
                    required: "Không được để trống",
                },
            }
        });
    });

    $(document).ready(function() {
        $('#deleteForm').validate({
            errorClass: "is-invalid",
            errorPlacement: function(error, element) {
                element.attr("data-bs-original-title", error.text());
            },
            success: function(element) {
                element.removeAttr("data-bs-original-title");
            },
            submitHandler: function(form) {
                preventOperation();
                form.submit();
            },
            rules: {
                user_password: {
                    required: true,
                }
            },
            messages: {
                user_password: {
                    required: "Không được để trống",
                },
            }
        });
    });

    // -------------- Alert hiển thị khi bị lỗi thêm dữ liệu ------------------
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder');

    function showAlert(message, type) {
        var wrapper = document.createElement('div');
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        alertPlaceholder.appendChild(wrapper);
    }
</script>

</body>

</html>