<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'app/views/resources/css/styles.php' ?>
    <link href="/car-shop/app/views/backend/product/productPageStyle.css" rel="stylesheet" type="text/css" />
    <title>Sửa sản phẩm</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">

                <?php
                $item_select = "product";
                include_once 'app/views/backend/layout/sidebar.php';
                ?>

            </div>

            <div class="col-9">

                <form name="formEdit" id="formEdit" method="post" action="" enctype="multipart/form-data">

                    <nav class="navbar navbar-light bg-light rounded-3 mb-4">
                        <div class="container-fluid justify-content-start">
                            <a class="btn btn-sm btn-outline-secondary  me-3" href="../">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                            <span class="fs-5"><b>Sửa sản phẩm</b></span>

                            <button type="button" class="btn btn-sm btn-outline-light">
                                <i class="bi bi-emoji-dizzy"></i>
                            </button>
                        </div>
                    </nav>


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="car_name" class="form-label">Tên xe</label>
                                <input type="text" name="car_name" id="car_name" class="form-control" value="<?= $data_car['car_name'] ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="form-label">Dòng xe</label>
                                <select class="custom-select form-control" name="car_type_id">
                                    <option>--- Chọn dòng xe ---</option>
                                    <?php foreach ($data_car_type as $value) { ?>
                                        <?php if ($value['car_type_id'] == $data_car['car_type_id']) { ?>
                                            <option selected value="<?= $value['car_type_id'] ?>"> <?= $value['car_type_name'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $value['car_type_id'] ?>"> <?= $value['car_type_name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="car_price" class="form-label">Giá xe</label>
                                <input type="text" name="car_price" id="car_price" class="form-control" value="<?= $data_car['car_price'] ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="car_quantity" class="form-label">Số lượng</label>
                                <input type="text" name="car_quantity" id="car_quantity" class="form-control" value="<?= $data_car['car_quantity'] ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">Hãng sản xuất</label>
                                <select class="custom-select form-control" name="car_producer_id">
                                    <?php foreach ($data_car_producer as $value) { ?>
                                        <?php if ($value['car_producer_id'] == $data_car['car_producer_id']) { ?>
                                            <option selected value="<?= $value['car_producer_id'] ?>"> <?= $value['car_producer_name'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $value['car_producer_id'] ?>"> <?= $value['car_producer_name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">Số chỗ ngồi</label>
                                <select class="custom-select form-control" name="car_seat_id">
                                    <?php foreach ($data_car_seat as $value) { ?>
                                        <?php if ($value['car_seat_id'] == $data_car['car_seat_id']) { ?>
                                            <option selected value="<?= $value['car_seat_id'] ?>"> <?= $value['car_seat'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $value['car_seat_id'] ?>"> <?= $value['car_seat'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">Nhiên liệu</label>
                                <select class="custom-select form-control" name="car_fuel_id">
                                    <?php foreach ($data_car_fuel as $value) { ?>
                                        <?php if ($value['car_fuel_id'] == $data_car['car_fuel_id']) { ?>
                                            <option selected value="<?= $value['car_fuel_id'] ?>"> <?= $value['car_fuel'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $value['car_fuel_id'] ?>"> <?= $value['car_fuel'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="car_describe" class="form-label">Mô tả ngắn</label>
                        <textarea type="text" name="car_describe" id="car_describe" class="form-control"><?= $data_car['car_describe'] ?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="car_detail_describe" class="form-label">Mô tả chi tiết</label>
                        <textarea type="text" name="car_detail_describe" id="car_detail_describe" class="form-control"><?= $data_car['car_detail_describe'] ?></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="car_img_filename" class="form-label">Thêm hình ảnh</label>
                        <input type="file" name="car_img_filename" id="car_img_filename" class="form-control" />
                    </div>

                    <div class="form-group mx-auto mt-3">
                        <img src="/car-shop/assets/uploads/<?= $data_car_img['car_img_filename'] ?>" alt="img" id="preview-img" class=" rounded" style="width: 300px; aspect-ratio: 16/9; object-fit: cover;" />
                    </div>

                    <button name="btnEdit" type="submit" class="btn btn-primary mt-4">Cập nhật</button>

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
    </script>

</body>

</html>