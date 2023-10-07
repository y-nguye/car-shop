<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/styles/styles.php'; ?>
    <?php include_once __DIR__ . '/accountPagesStyles.php'; ?>
    <title>Đăng nhập</title>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../resources/layouts/header.php'
    ?>

    <div class="container-lg text-center d-flex flex-column justify-content-center push-footer-down-page">

        <form id="formLogin" method="post" action="">
            <div class="container d-flex flex-column justify-content-center" style="width: 25rem;">
                <h3 class="text-dark mb-4">Đăng nhập vào cửa hàng</h3>
                <div id="liveAlertPlaceholder" class="text-start"></div>
                <div class="form-floating mb-3">
                    <input type="text" name="user_username" class="form-control" id="user_username" placeholder="">
                    <label for="user_username">Tên đăng nhập hoặc email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="user_password" class="form-control" id="user_password" placeholder="Password">
                    <label for="user_password">Mật khẩu</label>
                </div>
                <button type="submit" name="loginBtn" class="btn btn-secondary p-3">Đăng nhập</button>
                <span class="mt-3 mb-5">Chưa có tài khoản? <a href="/car-shop/account/signup">tạo ngay nào</a></span>
            </div>
        </form>

    </div>

    <?php
    include_once __DIR__ . '/../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../resources/script/script.php';
    ?>

    <script>
        $(document).ready(function() {
            $('#formLogin').validate({
                errorClass: "is-invalid",
                errorPlacement: function(error, element) {},
                rules: {
                    user_username: {
                        required: true,
                    },
                    user_password: {
                        required: true,
                        minlength: 6,
                    },
                },
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