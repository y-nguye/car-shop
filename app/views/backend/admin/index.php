<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php'; ?>
    <?php include_once __DIR__ . '/adminPageStyles.php'; ?>
    <title>Trang chủ Admin</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">
                <?php
                $item_select = "admin";
                include_once __DIR__ . '/../../resources/layouts/sidebar.php';
                ?>
            </div>

            <div class="col-9">
                <nav class="navbar mb-4 shadow sticky-top rounded-3 toolbar-custom">
                    <div class="container-fluid justify-content-start">
                        <span class="fs-5"><b>Trang chủ Admin</b></span>
                        <button type="button" class="btn btn-sm btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#contactModal">
                            Liên hệ hỗ trợ
                        </button>
                    </div>
                </nav>

                <h1 class="m-0 ms-4">Xin chào admin, <?= $lastName ?></h1>

                <div class="mt-5">

                    <div class="d-flex justify-content-center">

                        <a class="border text-secondary border-secondary rounded-3 me-3 card-custom__admin-page" href="/car-shop/admin/product/add">
                            <div class="card" style="width: 15rem; aspect-ratio: 1/1;">
                                <div class="card-body text-center d-flex flex-column justify-content-center">
                                    <i class="bi bi-plus-circle fs-1"></i>
                                    <h5 class="card-title pt-3">Thêm xe</h5>
                                </div>
                            </div>
                        </a>

                        <a class="border text-secondary border-secondary rounded-3 ms-3 card-custom__admin-page" href="/car-shop/admin/manage">
                            <div class="card" style="width: 15rem; aspect-ratio: 1/1;">
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

    <!-- Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="contactModalLabel">Liên hệ hỗ trợ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>Nếu bạn cần sự trợ giúp, hãy liên hệ với chúng tôi qua các phương thức: </div>
                    <div class="mt-2">Điện thoại:<b> 0123456789</b></div>
                    <div>Email: <b>carshop.support@carshop.com.vn</b></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../resources/globalScript/globalScript.php';
    ?>

</body>

</html>