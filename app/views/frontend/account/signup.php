<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/frontend/account/accountPageStyle.php' ?>
    <title>Đăng kí</title>
</head>

<body>
    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>

    <div class="container-lg text-center">

        <form id="formSignup" name="formSignup" method="post" action="">
            <div class="container pt-5 d-flex flex-column justify-content-center" style="width: 25rem;">
                <h3 class="text-dark mb-4">Đăng kí</h3>
                <div id="liveAlertPlaceholder" class="text-start"></div>

                <div class="form-floating mb-3">
                    <input type="text" name="user_fullname" class="form-control" id="user_fullname" placeholder="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                    <label for="user_fullname">Tên đầy đủ</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="user_tel" class="form-control" id="user_tel" placeholder="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                    <label for="user_tel">Số điện thoại</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="user_address" class="form-control" id="user_address" placeholder="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                    <label for="user_address">Địa chỉ</label>
                </div>
                <div class="form-floating mb-3 text-start">
                    <input type="email" name="user_email" class="form-control" id="user_email" placeholder="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                    <label for="user_email">Email</label>
                </div>
                <div class="form-floating mb-3 text-start">
                    <input type="text" name="user_username" class="form-control" id="user_username" placeholder="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                    <label for="user_username">Tên đăng nhập</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="user_password" class="form-control" id="user_password" placeholder="Password" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                    <label for="user_password">Mật khẩu</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="user_password_confirm" class="form-control" id="user_password_confirm" placeholder="Password" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                    <label for="user_password_confirm">Nhập lại mật khẩu</label>
                </div>
                <button type="submit" name="signupBtn" class="btn btn-secondary p-3">Đăng kí</button>
                <span class="mt-3 pb-5">Đã có tài khoản? <a href="/car-shop/account/login">đăng nhập thôi</a></span>
            </div>
        </form>
    </div>

    <?php
    include_once 'app/views/frontend/layouts/footer.php';
    ?>

    <?php
    include_once 'app/views/resources/script/script.php';
    ?>

    <script>
        $(document).ready(function() {
            $('#formSignup').validate({
                errorClass: "is-invalid",
                errorPlacement: function(error, element) {
                    element.attr("data-bs-original-title", error.text());
                },
                success: function(element) {
                    element.removeAttr("data-bs-original-title");
                },
                rules: {
                    user_fullname: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                    },
                    user_tel: {
                        required: true,
                        maxlength: 15,
                    },
                    user_address: {
                        required: true,
                        maxlength: 100,
                    },
                    user_email: {
                        required: true,
                        email: true,
                        maxlength: 100,
                        remote: {
                            url: "/car-shop/account/email-check",
                            type: "post",
                            data: {
                                username: function() {
                                    $("#user_email").addClass('is-valid');
                                    return $("#user_email").val();
                                }
                            }
                        }
                    },
                    user_username: {
                        required: true,
                        minlength: 6,
                        maxlength: 100,
                        remote: {
                            url: "/car-shop/account/username-check",
                            type: "post",
                            data: {
                                username: function() {
                                    $("#user_username").addClass('is-valid');
                                    return $("#user_username").val();
                                }
                            }
                        }
                    },
                    user_password: {
                        required: true,
                        minlength: 6,
                    },
                    user_password_confirm: {
                        minlength: 6,
                        equalTo: "#user_password"
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
                        maxlength: "Số điện thoại không hợp lệ",
                    },
                    user_address: {
                        required: "Không được để trống",
                        maxlength: "Địa chỉ quá dài",
                    },
                    user_email: {
                        required: "Không được để trống",
                        email: "Không phải định dạng email",
                        maxlength: "Email quá dài",
                        remote: "Email đã tồn tại",
                    },
                    user_username: {
                        required: "Không được để trống",
                        minlength: "Tên tài khoản quá ngắn",
                        maxlength: "Tên tài khoản quá dài",
                        remote: "Tên tài khoản đã tồn tại",
                    },
                    user_password: {
                        required: "Không được để trống",
                        minlength: "Mật khẩu ít nhất 6 kí tự",
                    },
                    user_password_confirm: {
                        minlength: "Mật khẩu ít nhất 6 kí tự",
                        equalTo: "Không khớp",
                    }
                }
            });
        });

        // Ngăn chặn nhập kí tự chữ cái vào ô điện thoại
        document.getElementById("user_tel").addEventListener("keypress", function(e) {
            var charCode = (e.which) ? e.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                e.preventDefault();
            }
        });

        // -------------- Alert hiển thị khi bị lỗi thêm dữ liệu ------------------
        var alertPlaceholder = document.getElementById('liveAlertPlaceholder');

        function showAlert(message, type) {
            var wrapper = document.createElement('div');
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            alertPlaceholder.appendChild(wrapper);
        }
    </script>

</body>

</html>