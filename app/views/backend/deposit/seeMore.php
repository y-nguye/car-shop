<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php'; ?>
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
                <nav class="navbar mb-4 shadow sticky-top rounded-3 toolbar-custom">
                    <div class="container-fluid ps-2">
                        <button type="button" class="btn btn-sm btn-go-back-header">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <span class="fs-5 ms-2"><b>Thông tin đơn yêu cầu</b></span>
                        <button type="button" class="btn btn-sm btn-primary ms-auto btn-add" data-bs-toggle="modal" data-bs-target="#contactModal">
                            Liên hệ hỗ trợ
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
                                <?php if ($user_deposit['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $user_deposit['car_img_filename'])) : ?>
                                    <img src="/car-shop/assets/uploads/<?= $user_deposit['car_img_filename'] ?>" alt="no-img" id="preview-img" class="preview-img" />
                                <?php else : ?>
                                    <img src="/car-shop/assets/imgs/no-img.jpg" class="rounded-3 preview-img" alt="preview-img">
                                <?php endif; ?>
                            </div>
                        </div>

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

    <script>
        const btnGoBackHeader = document.querySelector('.btn-go-back-header');

        btnGoBackHeader.addEventListener("click", () => {
            window.location = '/car-shop/admin/deposit';
        });
    </script>

</body>

</html>