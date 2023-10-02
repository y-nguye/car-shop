<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/styles/styles.php'; ?>
    <?php include_once __DIR__ . '/depositPagesStyles.php'; ?>
    <title>Danh sách đơn hàng</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">
                <?php
                $item_select = "deposit";
                include_once __DIR__ . '/../../resources/layouts/sidebar.php';
                ?>
            </div>

            <div class="col-9">
                <nav class="navbar mb-4 shadow-sm sticky-top rounded-3 toolbar-custom">
                    <div class="container-fluid justify-content-start">
                        <span class="fs-5"><b>Thông tin đơn yêu cầu</b></span>
                        <button type="button" class="btn btn-sm btn-primary ms-auto btn-add" href="/car-shop/admin">
                            <i class="bi bi-telephone"></i>
                            Liên hệ
                        </button>
                    </div>
                </nav>

                <div class="p-2">

                    <form id="formUpdate" method="post" action="">
                        <div class="row">
                            <h4 class="mb-3">Trạng thái</h4>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Đã liên hệ</label>
                                    <select class="form-select" name="user_deposit_is_contacted">
                                        <?php if (!$user_deposit['user_deposit_is_contacted']) : ?>
                                            <option value="0" <?= 'selected' ?>>Chưa liên hệ</option>
                                            <option value="1">Đã liên hệ</option>
                                        <?php else : ?>
                                            <option value="0">Chưa liên hệ</option>
                                            <option value="1" <?= 'selected' ?>>Đã liên hệ</option>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Đã thanh toán</label>
                                    <select class="form-select" name="user_deposit_is_payed">
                                        <?php if (!$user_deposit['user_deposit_is_payed']) : ?>
                                            <option value="0" <?= 'selected' ?>> Chưa thanh toán </option>
                                            <option value="1"> Đã thanh toán </option>
                                        <?php else : ?>
                                            <option value="0"> Chưa thanh toán </option>
                                            <option value="1" <?= 'selected' ?>> Đã thanh toán </option>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="d-flex align-items-end h-100">
                                    <button type="submit" name="btnUpdate" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row mt-3">
                        <h4 class="mt-4 mb-3">Thông tin</h4>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="user_deposit_fullname" class="form-label">Tên khách hàng</label>
                                <input type="text" name="user_deposit_fullname" id="user_deposit_fullname" class="form-control" value="<?= $user_deposit['user_deposit_fullname'] ?>" disabled />
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="user_deposit_tel" class="form-label">Số điện thoại</label>
                                <input type="text" name="user_deposit_tel" id="user_deposit_tel" class="form-control" value="<?= $user_deposit['user_deposit_tel'] ?>" disabled />
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="user_deposit_email" class="form-label">Email</label>
                                <input type="text" name="user_deposit_email" id="user_deposit_email" class="form-control" value="<?= $user_deposit['user_deposit_email'] ?>" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="user_deposit_total_price" class="form-label">Tổng tiền đã dự toán</label>
                                <div class="input-group">
                                    <input type="text" name="user_deposit_total_price" id="user_deposit_total_price" class="form-control" value="<?= number_format($user_deposit['user_deposit_total_price'], 0, ',', '.') ?>" disabled />
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="user_deposit_id" class="form-label">Mã đơn yêu cầu</label>
                                <input type="text" name="user_deposit_id" id="user_deposit_id" class="form-control" value="#<?= $user_deposit['user_deposit_id'] ?>" disabled />
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="user_deposit_at" class="form-label">Ngày yêu cầu</label>
                                <input type="text" name="user_deposit_at" id="user_deposit_at" class="form-control" value="<?= $user_deposit['user_deposit_at'] ?>" disabled />
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="user_deposit_price" class="form-label">Tiền đặt cọc</label>
                                <div class="input-group">
                                    <input type="text" name="user_deposit_price" id="user_deposit_price" class="form-control" value="<?= number_format($user_deposit['user_deposit_price'], 0, ',', '.') ?>" disabled />
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="pay_method_name" class="form-label">Phương thức thanh toán</label>
                                <input type="text" name="pay_method_name" id="pay_method_name" class="form-control" value="<?= $user_deposit['pay_method_name'] ?>" disabled />
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="user_deposit_where" class="form-label">Địa điểm bàn giao</label>
                                <input type="text" name="user_deposit_where" id="user_deposit_where" class="form-control" value="<?= $user_deposit['user_deposit_where'] ?>" disabled />
                            </div>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <h4 class="mt-4 mb-3">Thông tin sản phẩm</h4>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="car_id" class="form-label">Mã xe</label>
                                <input type="text" name="car_id" id="car_id" class="form-control" value="#<?= $user_deposit['car_id'] ?>" disabled />
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="car_name" class="form-label">Tên xe</label>
                                <input type="text" name="car_name" id="car_name" class="form-control" value="<?= $user_deposit['car_name'] ?>" disabled />
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="car_price" class="form-label">Giá xe trước bạ</label>
                                <div class="input-group">
                                    <input type="text" name="car_price" id="car_price" class="form-control" value="<?= number_format($user_deposit['car_price'], 0, ',', '.') ?>" disabled />
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                            </div>
                        </div>

                        <div class="container text-center mt-5">
                            <div id="image-preview-container" class="form-group">
                                <img src="/car-shop/assets/uploads/<?= $user_deposit['car_img_filename'] ?>" alt="no-img" id="preview-img" class="preview-img" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php
    include_once __DIR__ . '/../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../resources/script/script.php';
    ?>

    <script>

    </script>

</body>

</html>