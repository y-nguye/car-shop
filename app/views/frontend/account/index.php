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
                    <img class="rounded-circle border border-1 ms-3" src="/car-shop/assets/imgs/avt/avt-1.jpg" alt="" style="width: 150px; aspect-ratio: 1/1;">
                    <h5 class="mt-3 ms-3">Nguyễn Hoài Ý</h5>
                    <div class="ms-3">
                        <span>nguyenhoaiy7@gmail.com</span>
                    </div>
                    <div class="d-flex flex-column flex-shrink-0 p-3 sticky-top custom-sidebar" style="width: 90%;">
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link btn-personInfo active">
                                    Thông tin cá nhân
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link sidebar-item btn-cartInfo">
                                    Thông tin đơn hàng
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link sidebar-item btn-cartInfo" href="/car-shop/admin">
                                    Truy cập hệ thống quản trị
                                </a>
                            </li>
                        </ul>
                    </div>
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
        const sidebarItems = document.querySelectorAll('.nav-link');
        const btnPersonInfo = document.querySelector('.btn-personInfo');
        const btnCartInfo = document.querySelector('.btn-cartInfo');
        const bodyContentInfo = document.querySelector('.body-content-info');
        const btnUpdate = document.querySelector('.btn-update');
        const editForm = document.querySelector('.edit-form');

        btnPersonInfo.addEventListener('click', () => {
            sidebarItems.forEach(x => {
                x.classList.remove('active');
            })
            btnPersonInfo.classList.add('active');
            // lấy nội dung của tệp PHP bằng Fetch API.
            fetch('/car-shop/app/views/frontend/account/components/personInfo.php')
                .then(response => response.text())
                .then(data => {
                    bodyContentInfo.innerHTML = data;

                    const btnUpdate = document.querySelector('.btn-update');
                    const editForm = document.querySelector('.edit-form');

                    editForm.addEventListener('change', () => {
                        formChanged = true;
                        btnUpdate.classList.add('active');
                    });
                })
                .catch(error => console.error('Error:', error));
        });

        btnCartInfo.addEventListener('click', () => {
            sidebarItems.forEach(x => {
                x.classList.remove('active');
            })
            btnCartInfo.classList.add('active');
            fetch('/car-shop/app/views/frontend/account/components/orderInfo.php')
                .then(response => response.text())
                .then(data => {
                    bodyContentInfo.innerHTML = data;

                })
                .catch(error => console.error('Error:', error));
        });

        editForm.addEventListener('change', () => {
            formChanged = true;
            btnUpdate.classList.add('active');
        });
    </script>

</body>

</html>