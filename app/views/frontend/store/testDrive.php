<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/frontend/store/storePagesStyle.php' ?>
    <title>Đăng ký lái thử</title>
</head>

<body>

    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>

    <div class="container-lg pt-3 push-footer-down-page">

        <h2>Đặt lịch hẹn</h2>

        <hr>

        <div class="row">
            <div class="col-8 d-flex flex-column align-items-center">
                <a href="/car-shop/product/<?= $data_car['car_id'] ?>">
                    <?php if (empty($data_car_img_filename['car_img_filename'])) : ?>
                        <img src="/car-shop/assets/imgs/no-img.jpg" class="rounded-3 img-car-on-test-drive__test-drive-page" alt="img-car-on-test-drive__test-drive-page">
                    <?php else : ?>
                        <img src="/car-shop/assets/uploads/<?= $data_car_img_filename['car_img_filename'] ?>" class="img-car-on-test-drive__test-drive-page" alt="img-car-on-test-drive__test-drive-page">
                    <?php endif; ?>
                </a>
                <h1 class="mt-4"><?= $data_car['car_name'] ?></h1>
                <span class="text-center fs-4"><?= $data_car['car_describe'] ?></span>
            </div>

            <div class="col-4">
                <form id="formSignUpTestDrive" method="post" action="">
                    <div id="liveAlertPlaceholder" class="text-start"></div>
                    <div class="pt-2">
                        <label for="user_test_drive_day">Ngày dự kiến</label>
                        <input type="date" name="user_test_drive_day" id="user_test_drive_day" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                    </div>
                    <div class="pt-2 mt-2">
                        <label for="user_test_drive_time">Thời gian dự kiến</label>
                        <input type="time" name="user_test_drive_time" id="user_test_drive_time" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                    </div>

                    <h3 class="mt-4">Thông tin khách hàng</h3>

                    <div class="pt-2">
                        <label for="user_fullname">Tên đầy đủ *</label>
                        <?php if ($data_user_fullname) : ?>
                            <input type="text" name="user_fullname" id="user_fullname" class="form-control mt-2" value="<?= $data_user_fullname ?>" readonly />
                        <?php else : ?>
                            <input type="text" name="user_fullname" id="user_fullname" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                        <?php endif; ?>
                    </div>

                    <div class="pt-2 mt-2">
                        <label for="user_tel">Số điện thoại *</label>
                        <?php if ($data_user_tel) : ?>
                            <input type="text" name="user_tel" id="user_tel" class="form-control mt-2" value="<?= $data_user_tel ?>" readonly />
                        <?php else : ?>
                            <input type="text" name="user_tel" id="user_tel" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                        <?php endif; ?>
                    </div>

                    <div class="pt-2 mt-2">
                        <label for="user_email">Email</label>
                        <?php if ($data_user_tel) : ?>
                            <input type="email" name="user_email" id="user_email" class="form-control mt-2" value="<?= $data_user_email ?>" readonly />
                        <?php else : ?>
                            <input type="email" name="user_email" id="user_email" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                        <?php endif; ?>
                    </div>

                    <div class="mt-4 d-flex  align-items-center justify-content-between">
                        <label for="checkbox-have-driver-license" style="user-select: none;"><input type="checkbox" id="checkbox-have-driver-license" class="form-check-input me-1" /> Tôi đã có giấy phép lái xe ô tô </label>
                        <button type="submit" name="btnSignUpTestDrive" class="btn btn-primary btn-sign-up-test-drive disabled">Đăng ký</button>
                    </div>
                </form>
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
        $(document).ready(function() {
            $('#formSignUpTestDrive').validate({
                errorClass: "is-invalid",
                errorPlacement: function(error, element) {
                    element.attr("data-bs-original-title", error.text());
                },
                success: function(element) {
                    element.removeAttr("data-bs-original-title");
                },
                rules: {
                    user_test_drive_day: {
                        required: true,
                    },
                    user_test_drive_time: {
                        required: true,
                    },
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
                    user_email: {
                        email: true,
                        maxlength: 100,
                    },
                },
                messages: {
                    user_test_drive_day: {
                        required: "Không được để trống",
                    },
                    user_test_drive_time: {
                        required: "Không được để trống",
                    },
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
                    user_email: {
                        email: "Vui lòng nhập đúng định dạng email",
                        maxlength: "Email tối đa 100 kí tự",
                    },
                }
            });
        });

        // -------------- Kích hoạt nút Đăng ký khi đã chọn có bằng lái --------------
        const checkboxHaveDriverLicense = document.getElementById('checkbox-have-driver-license');
        const btnSignUpTestDrive = document.querySelector('.btn-sign-up-test-drive');
        checkboxHaveDriverLicense.addEventListener('change', function() {
            if (this.checked) btnSignUpTestDrive.classList.remove('disabled');
            else btnSignUpTestDrive.classList.add('disabled');
        });

        // -------------- Ngăn chặn nhập kí tự chữ cái vào ô điện thoại --------------
        document.getElementById("user_tel").addEventListener("keypress", function(e) {
            var charCode = (e.which) ? e.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                e.preventDefault();
            }
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