<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/backend/product/productPagesStyle.php'; ?>
    <title>Trang chủ Admin</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">
                <?php
                $item_select = "admin";
                include_once 'app/views/backend/layout/sidebar.php';
                ?>
            </div>

            <div class="col-9">
                <nav class="navbar mb-4 shadow-sm sticky-top rounded-3 toolbar-custom">
                    <div class="container-fluid justify-content-start">
                        <span class="fs-5"><b>Trang chủ Admin</b></span>
                        <button type="button" class="btn btn-sm btn-primary ms-auto btn-add" href="/car-shop/admin">
                            <i class="bi bi-telephone"></i>
                            Liên hệ
                        </button>
                    </div>
                </nav>

                <h1 class="m-0 ms-4">Xin chào admin, <?= $lastName ?></h1>

                <div class="mt-5">

                    <div class="d-flex justify-content-center">

                        <a class="border border-primary rounded-3 me-3" href="/car-shop/admin/product/add">
                            <div class="card bg-light" style="width: 15rem; aspect-ratio: 1/1;">
                                <div class="card-body text-center d-flex flex-column justify-content-center">
                                    <i class="bi bi-plus-circle fs-1"></i>
                                    <h5 class="card-title pt-3">Thêm xe</h5>
                                </div>
                            </div>
                        </a>

                        <a class="border border-primary rounded-3 ms-3" href="/car-shop/admin">
                            <div class="card bg-light" style="width: 15rem; aspect-ratio: 1/1;">
                                <div class="card-body text-center d-flex flex-column justify-content-center">
                                    <i class="bi bi-person-fill-gear fs-1"></i>
                                    <h5 class="card-title pt-3">Quản lí admin</h5>
                                </div>
                            </div>
                        </a>

                    </div>

                </div>


            </div>
        </div>
    </div>

    <?php
    include_once 'app/views/resources/layouts/footer.php';
    ?>

    <?php
    include_once 'app/views/resources/script/script.php';
    ?>

</body>

</html>