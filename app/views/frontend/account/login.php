<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'app/views/resources/css/styles.php' ?>
    <title>Đăng nhập</title>
</head>

<body>
    <?php
    include_once 'app/views/resources/layouts/header.php'
    ?>

    <div class="container-lg text-center">

        <form method="post" action="">
            <div class="container mt-5 d-flex flex-column justify-content-center" style="width: 25rem;">
                <h3 class="text-dark mb-4">Đăng nhập vào cửa hàng</h3>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="">
                    <label for="floatingInput">Tên đăng nhập hoặc email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Mật khẩu</label>
                </div>
                <button type="submit" name="loginBtn" class="btn btn-secondary p-3">Đăng nhập</button>
                <span class="mt-3">Chưa có tài khoản? <a href="/car-shop/account/signup">tạo ngay nào</a></span>
            </div>
        </form>

    </div>
</body>

</html>