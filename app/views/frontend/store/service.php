<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php'; ?>
    <?php include_once __DIR__ . '/storePagesStyles.php'; ?>
    <title>Trang chủ</title>
</head>

<body>

    <?php
    include_once __DIR__ . '/../../resources/layouts/header.php'
    ?>

    <div class="container-lg pt-3 push-footer-down-page">
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <button class="nav-link text-dark nav-link__service-page repair-services active" aria-current="page">Dịch vụ sửa chữa</button>
            </li>
            <li class="nav-item">
                <button class="nav-link text-dark nav-link__service-page periodic-maintenance">Bảo dưỡng định kì</button>
            </li>
            <li class="nav-item">
                <button class="nav-link text-dark nav-link__service-page guarantee">Chế độ bảo hành</button>
            </li>
        </ul>

        <div id="content">
            <?php include_once 'app/views/frontend/store/components/repairServices.php' ?>
        </div>

    </div>

    <?php
    include_once __DIR__ . '/../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../resources/globalScript/globalScript.php';
    ?>

    <script>
        const navItem = document.querySelectorAll('.nav-link__service-page');

        navItem.forEach(x => {
            x.addEventListener('click', function() {
                navItem.forEach(y => {
                    y.classList.remove('active');
                })
                x.classList.add('active');

                var uri = 'repairServices';

                if (x.classList.contains('repair-services')) {
                    uri = 'repairServices';
                }

                if (x.classList.contains('periodic-maintenance')) {
                    uri = 'periodicMaintenance';
                }

                if (x.classList.contains('guarantee')) {
                    uri = 'guarantee';
                }

                // Sử dụng phương thức AJAX để tải nội dung từ tệp PHP
                $.ajax({
                    url: "/car-shop/app/views/frontend/store/components/" + uri + ".php",
                    type: "GET",
                    dataType: "html", // Loại dữ liệu muốn nhận lại
                    success: function(response) {
                        $("#content").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        })
    </script>

</body>

</html>