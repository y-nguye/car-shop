<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/styles/styles.php'; ?>
    <?php include_once __DIR__ . '/cartPagesStyles.php'; ?>
    <title>Tính toán chi phí</title>
</head>

<body>

    <?php
    include_once __DIR__ . '/../../resources/layouts/header.php'
    ?>

    <div class="container-lg pt-3 push-footer-down-page">

        <h2>Tính toán chi phí</h2>

        <hr>

        <div class="row">

            <div class="col-md-8 d-flex flex-column align-items-center">
                <a href="/car-shop/product/<?= $data_car['car_id'] ?>" class="text-center w-100">
                    <?php if ($data_car['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data_car['car_img_filename'])) : ?>
                        <img src="/car-shop/assets/uploads/<?= $data_car['car_img_filename'] ?>" class="img-car-on-registration-fee" alt="img-car-on-cart">
                    <?php else : ?>
                        <img src="/car-shop/assets/imgs/no-img.jpg" class="rounded-3 img-car-on-registration-fee" alt="img-car-on-cart">
                    <?php endif; ?>
                </a>
                <h1 class="mt-4"><?= $data_car['car_name'] ?></h1>
                <span class="text-center fs-4"><?= $data_car['car_describe'] ?></span>
            </div>

            <div class="col-md-4">
                <form method="post" action="/car-shop/cart/deposit/<?= $car_id ?>">
                    <div class="pt-2">
                        <div class="mb-4 d-flex align-items-center justify-content-between text-secondary">
                            <h6 class="m-0">Giá tính phí trước bạ</h6>
                            <div id="car_price" class="text-end fs-6"><?= number_format($data_car['car_price'], 0, ',', '.') ?> ₫</div>
                        </div>
                        <hr>
                    </div>

                    <div class="pt-2 mt-2">
                        <label for="user_province_id" class="text-dark m-0">Nơi đăng ký xe - Thuế trước bạ</label>
                        <select name="user_province_id" id="user_province_id" class="form-select mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                            <option selected value="">---Chọn---</option>
                            <?php foreach ($data_all_user_province as $data) : ?>
                                <option value="<?= $data['user_registration_fee'] ?>"> <?= $data['user_province_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="user_registration_fee_display" class="text-end pb-3 fs-5">---</div>
                    </div>

                    <div>
                        <label for="road_traffic_fee" class="text-dark m-0">Gói phí lưu hành đường bộ</label>
                        <select id="road_traffic_fee" class="form-select mt-2">
                            <option value="130000" selected>1 tháng</option>
                            <option value="780000">6 tháng</option>
                            <option value="1560000">12 tháng</option>
                            <option value="2280000">18 tháng</option>
                            <option value="3000000">24 tháng</option>
                            <option value="3660000">30 tháng</option>
                        </select>
                        <div id="road_traffic_fee_display" class="text-end pb-3 fs-5">---</div>
                    </div>

                    <div>
                        <label class="text-dark m-0">Bảo hiểm trách nhiệm DS (01 năm):</label>
                        <div class="text-end fs-5"><?= number_format(340000, 0, ',', '.') ?> ₫</div>
                    </div>

                    <div class="pb-3">
                        <hr>
                        <h5 class="m-0">Tổng chi phí dự tính:</h5>
                        <div id="total_price_display" class="text-end pt-3 pb-3 fs-3">---</div>
                        <input type="hidden" name="total_price" id="total_price" />
                    </div>

                    <div class="d-flex flex-column align-items-center justify-content-between">
                        <button type="submit" name="btnDeposits" id="btn-deposits" class="btn btn-primary w-100 disabled">Yêu cầu đặt cọc</button>
                        <a class="mt-3" href="/car-shop/cart">Quay về giỏ hàng</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div id="toast-car-added-to-the-cart" class="toast align-items-center text-white bg-primary fixed-top toast-custom" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Xe đã được thêm vào giỏ hàng.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>


    <?php
    include_once __DIR__ . '/../../resources/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/../../resources/script/script.php';
    ?>

    <script>
        // -------------------- Toast hiển thị đã thêm giỏ hàng --------------------
        const toastCarAddedToTheCart = document.getElementById('toast-car-added-to-the-cart');
        const toast = new bootstrap.Toast(toastCarAddedToTheCart);

        toastCarAddedToTheCart.addEventListener('shown.bs.toast', function() {
            setTimeout(function() {
                toast.hide();
            }, 3000);
        });


        // -------------------- Dự toán chi phí cà cập nhật hiển thị --------------------
        const carPrice = document.getElementById('car_price');
        const registrationFee = document.getElementById('user_province_id');
        const registrationFeeDisplay = document.getElementById('user_registration_fee_display');
        const roadTrafficFee = document.getElementById('road_traffic_fee');
        const roadTrafficFeeDisplay = document.getElementById('road_traffic_fee_display');
        const totalPrice = document.getElementById('total_price');
        const totalPriceDisplay = document.getElementById('total_price_display');
        const btnDeposits = document.getElementById('btn-deposits');

        var numberCarPrice = 0;
        var numberRegistrationFee = 0;
        var numberRoadTrafficFee = 0;
        var sum = 0;

        registrationFee.addEventListener('change', function() {
            registrationFeeValue = parseFloat(this.value);

            if (!registrationFeeValue) {
                registrationFeeDisplay.textContent = "---";
                totalPriceDisplay.textContent = "---";
                totalPrice.value = null;
                btnDeposits.classList.add('disabled');
                return;
            }

            btnDeposits.classList.remove('disabled');

            numberCarPrice = parseInt(carPrice.textContent.replace(/\./g, '').replace(' ₫', ''));
            numberRoadTrafficFee = parseInt(roadTrafficFee.value);

            sum = numberCarPrice * registrationFeeValue + numberRoadTrafficFee + 340000;
            numberRegistrationFee = numberCarPrice * (registrationFeeValue - 1);

            let formattedNumber = sum.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });

            let formattedRegistrationFee = numberRegistrationFee.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });

            let formattedRoadTrafficFee = numberRoadTrafficFee.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });

            registrationFeeDisplay.textContent = formattedRegistrationFee;
            roadTrafficFeeDisplay.textContent = formattedRoadTrafficFee;
            totalPriceDisplay.textContent = formattedNumber;
            totalPrice.value = sum;
        });

        roadTrafficFee.addEventListener('change', function() {
            numberRoadTrafficFee = parseInt(this.value);
            let formattedRoadTrafficFee = numberRoadTrafficFee.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });
            roadTrafficFeeDisplay.textContent = formattedRoadTrafficFee;

            if (numberRegistrationFee) {
                registrationFeeValue = parseFloat(registrationFee.value);

                if (!registrationFeeValue) {
                    totalPrice.value = null;
                    btnDeposits.classList.add('disabled');
                    return;
                }

                btnDeposits.classList.remove('disabled');
                numberCarPrice = parseInt(carPrice.textContent.replace(/\./g, '').replace(' ₫', ''));
                sum = numberCarPrice * registrationFeeValue + numberRoadTrafficFee + 340000;

                let formattedNumber = sum.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });

                totalPriceDisplay.textContent = formattedNumber;
                totalPrice.value = sum;
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            numberRoadTrafficFee = parseInt(roadTrafficFee.value);
            let formattedRoadTrafficFee = numberRoadTrafficFee.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });
            roadTrafficFeeDisplay.textContent = formattedRoadTrafficFee;
        });
    </script>

</body>

</html>