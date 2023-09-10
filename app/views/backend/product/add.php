<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/css/styles.php' ?>
    <?php include_once 'app/views/backend/product/productPageStyle.php'; ?>
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">

                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light rounded-3 sticky-top custom-sidebar">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <i class="bi bi-car-front-fill fs-4 ms-2 me-2"></i><span class="fs-4">Admin</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="/car-shop/admin" class="nav-link sidebar-item">
                                <i class=" bi bi-house-door me-2"></i>
                                Trang chủ
                            </a>
                        </li>
                        <li>
                            <a href="/car-shop/admin/user" class="nav-link sidebar-item">
                                <i class="bi bi-person me-2"></i>
                                Quản lý khách hàng
                            </a>
                        </li>
                        <li>
                            <a href="/car-shop/admin/product" class="nav-link sidebar-item active">
                                <i class="bi bi-grid me-2"></i>
                                Quản lý sản phẩm
                            </a>
                        </li>
                        <li>
                            <a href="/car-shop/admin/product/trash" class="nav-link sidebar-item">
                                <i class="bi bi-trash me-2"></i>
                                Thùng rác
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>mdo</strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-9">

                <form name="formAdd" method="post" action="" enctype="multipart/form-data">

                    <nav class="navbar mb-4 shadow-sm sticky-top rounded-3 custom-toolbar">
                        <div class="d-flex justify-content-start">
                            <a class="btn btn-sm ms-2 me-2" href="/car-shop/admin/product">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                            <span class="fs-5"><b>Thêm sản phẩm</b></span>
                        </div>
                    </nav>

                    <div id="liveAlertPlaceholder"></div>

                    <div class="p-2">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="car_name" class="form-label">Tên xe</label>
                                    <input type="text" name="car_name" id="car_name" class="form-control" />
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Dòng xe</label>
                                    <select class="form-select" name="car_type_id">
                                        <option selected>---Chọn---</option>
                                        <?php foreach ($data_car_type as $value) { ?>
                                            <option value="<?= $value['car_type_id'] ?>"> <?= $value['car_type_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Số chỗ ngồi</label>
                                    <select class="form-select" name="car_seat_id">
                                        <option selected>---Chọn---</option>
                                        <?php foreach ($data_car_seat as $value) { ?>
                                            <option value="<?= $value['car_seat_id'] ?>"> <?= $value['car_seat'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Nhiên liệu</label>
                                    <select class="form-select" name="car_fuel_id">
                                        <option selected>---Chọn---</option>
                                        <?php foreach ($data_car_fuel as $value) { ?>
                                            <option value="<?= $value['car_fuel_id'] ?>"> <?= $value['car_fuel'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="car_price" class="form-label">Giá xe</label>
                                    <input type="text" name="car_price" id="car_price" class="form-control" />
                                </div>
                            </div>


                            <div class="col-2">
                                <div class="form-group">
                                    <label for="car_quantity" class="form-label">Số lượng</label>
                                    <input type="text" name="car_quantity" id="car_quantity" class="form-control" />
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Hãng sản xuất</label>
                                    <select class="form-select" name="car_producer_id">
                                        <option selected>---Chọn---</option>
                                        <?php foreach ($data_car_producer as $value) { ?>
                                            <option value="<?= $value['car_producer_id'] ?>"> <?= $value['car_producer_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Loại hộp số</label>
                                    <select class="form-select" name="car_transmission_id">
                                        <option selected>---Chọn---</option>
                                        <?php foreach ($data_car_transmission as $value) { ?>
                                            <option value="<?= $value['car_transmission_id'] ?>"> <?= $value['car_transmission'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="car_describe" class="form-label">Mô tả ngắn</label>
                            <textarea type="text" name="car_describe" id="car_describe" class="form-control"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="car_detail_describe" class="form-label">Mô tả chi tiết</label>
                            <textarea type="text" name="car_detail_describe" id="car_detail_describe" class="form-control"></textarea>
                        </div>


                        <div class="form-group mt-3">
                            <label for="car_img_filename" class="form-label">Thêm hình ảnh chính</label>
                            <input type="file" name="car_img_filename" id="car_img_filename" class="form-control" />
                        </div>

                        <div class="form-group d-flex justify-content-center mt-3">
                            <img src="/car-shop/assets/imgs/no-img.jpg" alt="img" id="preview-img" class="preview-img rounded" />
                        </div>

                        <hr>

                        <div class="d-flex justify-content-start mb-3">
                            <button name="btnAdd" id="liveAlertBtn" class="btn btn-primary">Thêm</button>
                            <button id="backToTop" class="btn btn-secondary ms-auto me-3" type="button">Lên đầu trang</button>
                            <a class="btn btn-danger" href="/car-shop/admin/product">Quay lại</a>
                        </div>

                </form>
            </div>
        </div>
    </div>
    </div>


    <?php
    include_once 'app/views/resources/script/script.php';
    ?>
    <script>
        // Phiên bản 4.22
        CKEDITOR.replace('car_detail_describe');

        (function() {
            const reader = new FileReader();
            const fileInput = document.getElementById('car_img_filename');
            const img = document.getElementById('preview-img');
            reader.onload = function(e) {
                img.src = e.target.result;
            };
            fileInput.addEventListener('change', function(e) {
                const f = e.target.files[0];
                reader.readAsDataURL(f);
            });
        })();

        // Lắng nghe sự kiện click trên liên kết "Trở về đầu trang"
        document.getElementById("backToTop").addEventListener("click", function(event) {
            // Sử dụng scrollTo để cuộn lên đầu trang
            window.scrollTo({
                top: 0,
                behavior: "smooth" // Cuộn mượt
            });
        });
    </script>

</body>

</html>