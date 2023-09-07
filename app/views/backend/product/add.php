<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'app/views/resources/css/styles.php' ?>
    <link href="/car-shop/app/views/backend/product/productPageStyle.css" rel="stylesheet" type="text/css" />
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">

                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light rounded-3 custom-sidebar">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <i class="bi bi-car-front-fill fs-4 ms-2 me-2"></i><span class="fs-4">Admin</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link sidebar-item">
                                <i class=" bi bi-house-door me-2"></i>
                                Trang chủ
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link sidebar-item active">
                                <i class="bi bi-grid me-2"></i>
                                Quản lý sản phẩm
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link sidebar-item">
                                <i class="bi bi-person me-2"></i>
                                Quản lý khách hàng
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link sidebar-item">
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

                <nav class="navbar navbar-light bg-light rounded-3 mb-4">
                    <div class="container-fluid">
                        <a href="./" class="">
                            <button class="btn btn-sm btn-outline-secondary" type="button">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                        </a>
                        <div class="mx-auto">
                            <span class="d-inline-block"><b>Thêm sản phẩm</b></span>
                        </div>
                        <button class="btn btn-sm btn-outline-light" type="button">
                            <i class="bi bi-emoji-dizzy"></i>
                        </button>
                    </div>
                </nav>


                <form name="formThemMoi" id="formThemMoi" method="post" action="" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="car_name" class="form-label">Tên xe</label>
                                <input type="text" name="car_name" id="car_name" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="form-label">Dòng xe</label>
                                <select class="custom-select form-control" name="car_type_id">
                                    <option selected>--- Chọn dòng xe ---</option>
                                    <?php foreach ($data_car_types as $value) { ?>
                                        <option value="<?= $value['car_type_id'] ?>"> <?= $value['car_type_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="car_price" class="form-label">Giá xe</label>
                                <input type="text" name="car_price" id="car_price" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="car_quantity" class="form-label">Số lượng</label>
                                <input type="text" name="car_quantity" id="car_quantity" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">Hãng sản xuất</label>
                                <select class="custom-select form-control" name="car_producer_id">
                                    <option selected>--- Chọn hãng ---</option>
                                    <?php foreach ($data_car_producer as $value) { ?>
                                        <option value="<?= $value['car_producer_id'] ?>"> <?= $value['car_producer_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">Số chỗ ngồi</label>
                                <select class="custom-select form-control" name="car_seat_id">
                                    <option selected>--- Chọn chỗ ngồi ---</option>
                                    <?php foreach ($data_car_seat as $value) { ?>
                                        <option value="<?= $value['car_seat_id'] ?>"> <?= $value['car_seat'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">Nhiên liệu</label>
                                <select class="custom-select form-control" name="car_fuel_id">
                                    <option selected>--- Chọn nhiên liệu ---</option>
                                    <?php foreach ($data_car_fuel as $value) { ?>
                                        <option value="<?= $value['car_fuel_id'] ?>"> <?= $value['car_fuel_type'] ?></option>
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
                        <label for="car_img" class="form-label">Thêm hình ảnh</label>
                        <input type="file" name="car_img" id="car_img" class="form-control" />
                    </div>

                    <div class="form-group mx-auto mt-3">
                        <img src="/car-shop/assets/imgs/no-img.jpg" alt="img" id="preview-img" class=" rounded" style="width: 300px; aspect-ratio: 16/9; object-fit: cover;" />
                    </div>

                    <button name="btnAdd" type="submit" class="btn btn-primary mt-4">Lưu</button>

                </form>
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
            const fileInput = document.getElementById('car_img');
            const img = document.getElementById('preview-img');
            reader.onload = function(e) {
                img.src = e.target.result;
            };
            fileInput.addEventListener('change', function(e) {
                const f = e.target.files[0];
                reader.readAsDataURL(f);
            });
        })();
    </script>

</body>

</html>