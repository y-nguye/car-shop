<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/styles/styles.php'; ?>
    <?php include_once __DIR__ . '/storePagesStyles.php'; ?>
    <title>Đăng ký lái thử</title>
</head>

<body>
    <div id="overlay" class=""></div>

    <?php
    include_once __DIR__ . '/../../resources/layouts/header.php'
    ?>

    <div class="container-lg pt-3 push-footer-down-page">

        <div class="d-flex align-items-center justify-content-between">
            <h2 class="mb-0">Đặt lịch hẹn</h2>
            <div id="spinner" class="spinner-border visually-hidden" role="status"></div>
        </div>
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
                <div id="liveAlertPlaceholder" class="text-start"></div>
                <form id="formSignUpTestDrive" method="post" action="/car-shop/test-drive/register">
                    <div class="pt-2">
                        <label for="user_province_id" class="text-dark m-0">Địa điểm lái thử</label>
                        <select name="user_province_id" id="user_province_id" class="form-select mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                            <option selected value="">---Chọn---</option>
                            <?php foreach ($data_all_user_province as $value) { ?>
                                <option value="<?= $value['user_province_id'] ?>"> <?= $value['user_province_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="pt-2 mt-2">
                        <label for="user_test_drive_day">Ngày dự kiến</label>
                        <input type="date" name="user_test_drive_day" id="user_test_drive_day" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                    </div>
                    <div class="pt-2 mt-2">
                        <label for="user_test_drive_time">Thời gian dự kiến</label>
                        <input type="time" name="user_test_drive_time" id="user_test_drive_time" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                    </div>

                    <h3 class="mt-4">Thông tin khách hàng</h3>

                    <div class="pt-2">
                        <label for="user_test_drive_fullname">Tên đầy đủ</label>
                        <?php if ($user_test_drive_fullname) : ?>
                            <input type="text" name="user_test_drive_fullname" id="user_test_drive_fullname" class="form-control mt-2" value="<?= $user_test_drive_fullname ?>" readonly />
                        <?php else : ?>
                            <input type="text" name="user_test_drive_fullname" id="user_test_drive_fullname" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                        <?php endif; ?>
                    </div>

                    <div class="pt-2 mt-2">
                        <label for="user_test_drive_tel">Số điện thoại</label>
                        <?php if ($user_test_drive_tel) : ?>
                            <input type="text" name="user_test_drive_tel" id="user_test_drive_tel" class="form-control mt-2" value="<?= $user_test_drive_tel ?>" readonly />
                        <?php else : ?>
                            <input type="text" name="user_test_drive_tel" id="user_test_drive_tel" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                        <?php endif; ?>
                    </div>

                    <div class="pt-2 mt-2">
                        <label for="user_test_drive_email">Email</label>
                        <?php if ($user_test_drive_email) : ?>
                            <input type="email" name="user_test_drive_email" id="user_test_drive_email" class="form-control mt-2" value="<?= $user_test_drive_email ?>" readonly />
                        <?php else : ?>
                            <input type="email" name="user_test_drive_email" id="user_test_drive_email" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                        <?php endif; ?>
                    </div>

                    <input type="hidden" name="car_id" value="<?= $data_car['car_id'] ?>" />

                    <div class="mt-4 d-flex  align-items-center justify-content-between">
                        <label for="checkbox-have-driver-license" style="user-select: none;"><input type="checkbox" id="checkbox-have-driver-license" class="form-check-input me-1" /> Tôi đã có giấy phép lái xe ô tô </label>
                        <button type="submit" name="btnTestDriveRegister" class="btn btn-primary btn-test-drive-register disabled">Đăng ký</button>
                    </div>
                </form>
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
        const overlay = document.getElementById('overlay');
        const spinner = document.getElementById('spinner');
        const userFullname = document.getElementById('user_test_drive_fullname');
        const userTel = document.getElementById('user_test_drive_tel');
        const userEmail = document.getElementById('user_test_drive_email');

        const checkboxHaveDriverLicense = document.getElementById('checkbox-have-driver-license');
        const btnTestDriveRegister = document.querySelector('.btn-test-drive-register');

        $(document).ready(function() {
            $('#formSignUpTestDrive').validate({
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
                    user_province_id: {
                        // required: true,
                    },
                    user_test_drive_day: {
                        required: true,
                    },
                    user_test_drive_time: {
                        required: true,
                    },
                    user_test_drive_fullname: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                    },
                    user_test_drive_tel: {
                        required: true,
                        minlength: 10,
                        maxlength: 15,
                    },
                    user_test_drive_email: {
                        required: true,
                        email: true,
                        maxlength: 100,
                    },
                },
                messages: {
                    user_province_id: {
                        required: "Không được để trống",
                    },
                    user_test_drive_day: {
                        required: "Không được để trống",
                    },
                    user_test_drive_time: {
                        required: "Không được để trống",
                    },
                    user_test_drive_fullname: {
                        required: "Không được để trống",
                        minlength: "Tên quá ngắn",
                        maxlength: "Tên quá dài",
                    },
                    user_test_drive_tel: {
                        required: "Không được để trống",
                        minlength: "Số điện thoại không hợp lệ",
                        maxlength: "Số điện thoại không hợp lệ",
                    },
                    user_test_drive_email: {
                        required: "Không được để trống",
                        email: "Vui lòng nhập đúng định dạng email",
                        maxlength: "Email tối đa 100 kí tự",
                    },
                }
            });
        });

        function preventOperation() {
            spinner.classList.remove("visually-hidden");
            overlay.classList.add("overlay");

            userFullname.setAttribute("readonly", "");
            userTel.setAttribute("readonly", "");
            userEmail.setAttribute("readonly", "");

            btnTestDriveRegister.classList.add("disabled");
        }

        // -------------- Kích hoạt nút Đăng ký khi đã chọn có bằng lái --------------
        checkboxHaveDriverLicense.addEventListener('change', function() {
            if (this.checked) btnTestDriveRegister.classList.remove('disabled');
            else btnTestDriveRegister.classList.add('disabled');
        });

        // -------------- Ngăn chặn nhập kí tự chữ cái vào ô điện thoại --------------
        document.getElementById("user_test_drive_tel").addEventListener("keypress", function(e) {
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