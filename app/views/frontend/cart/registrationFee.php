<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/frontend/cart/cartPagesStyle.php' ?>
    <title>Tính toán chi phí</title>
</head>

<body>

    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>

    <div class="container-lg pt-3 push-footer-down-page">

        <h2 class="">Tính toán chi phí</h2>

        <hr>

        <div class="row">

            <div class="col-8 d-flex flex-column align-items-center">
                <a href="/car-shop/product/<?= $data_car['car_id'] ?>">
                    <?php if (empty($data_cart['car_img_filename'])) : ?>
                        <img src="/car-shop/assets/imgs/no-img.jpg" class="rounded-3 img-car-on-registration-fee" alt="img-car-on-cart">
                    <?php else : ?>
                        <img src="/car-shop/assets/uploads/<?= $data_car['car_img_filename'] ?>" class="img-car-on-registration-fee" alt="img-car-on-cart">
                    <?php endif; ?>
                </a>
                <h1 class="mt-4"><?= $data_car['car_name'] ?></h1>
                <span class="text-center fs-4"><?= $data_car['car_describe'] ?></span>
            </div>

            <div class="col-4">
                <form method="post" action="/car-shop/cart/pay/<?= $car_id ?>">
                    <div class="pt-2">
                        <div class="mb-4 d-flex align-items-center justify-content-between text-secondary">
                            <h6 class="m-0">Giá tính phí trước bạ</h6>
                            <div id="car_price" class="text-end fs-6"><?= number_format($data_car['car_price'], 0, ',', '.') ?> ₫</div>
                        </div>
                        <hr>
                    </div>

                    <div class="pt-2 mt-2">
                        <label for="user_province_id" class="text-dark m-0">Nơi đăng ký xe</label>
                        <select name="user_province_id" id="user_province_id" class="form-select mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                            <option selected value="">---Chọn---</option>
                            <?php foreach ($data_all_user_province as $value) { ?>
                                <option value="<?= $value['user_registration_fee'] ?>"> <?= $value['user_province_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="pt-2 mt-2">
                        <label for="road_traffic_fees" class="text-dark m-0">Gói phí lưu hành đường bộ</label>
                        <select id="road_traffic_fees" class="form-select mt-2">
                            <option value="130000" selected>1 tháng</option>
                            <option value="780000">6 tháng</option>
                            <option value="1560000">12 tháng</option>
                            <option value="2280000">18 tháng</option>
                            <option value="3000000">24 tháng</option>
                            <option value="3660000">30 tháng</option>
                        </select>
                    </div>

                    <div class="pt-2 mt-2">
                        <label class="text-dark m-0">Phí đăng kiểm:</label>
                        <div class="text-end fs-5"><?= number_format(340000, 0, ',', '.') ?> ₫</div>
                    </div>

                    <div class="pb-3">
                        <hr>
                        <h5 class="m-0">Tổng chi phí dự tính:</h5>
                        <div id="total_price_display" class="text-end pt-3 pb-3 fs-3">---</div>
                        <input type="hidden" name="total_price" id="total_price" />
                    </div>

                    <div class="d-flex flex-column align-items-center justify-content-between">
                        <button type="submit" name="btnDeposits" class="btn btn-primary w-100 btn-deposits disabled">Tiến hành đặt cọc</button>
                        <a class="mt-3" href="/car-shop/cart">Quay về giỏ hàng</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- HTML cho một toast -->
    <div id="toast-car-added-to-the-cart" class="toast align-items-center text-white bg-primary fixed-top toast-custom" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Xe đã được thêm vào giỏ hàng.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>


    <?php
    include_once 'app/views/frontend/layouts/footer.php';
    ?>

    <?php
    include_once 'app/views/resources/script/script.php';
    ?>

    <script>
        const carPrice = document.getElementById('car_price');
        const userRegistrationFee = document.getElementById('user_province_id');
        const roadTrafficFees = document.getElementById('road_traffic_fees');
        const totalPriceDisplay = document.getElementById('total_price_display');
        const totalPrice = document.getElementById('total_price');
        const btnDeposits = document.querySelector('.btn-deposits');

        var numberCarPrice = 0;
        var numberRegistrationFee = 0;
        var numberRoadTrafficFees = 0;
        var sum = 0;

        userRegistrationFee.addEventListener('change', function() {
            numberCarPrice = parseInt(carPrice.textContent.replace(/\./g, '').replace(' ₫', ''));
            numberRegistrationFee = parseFloat(this.value);
            numberRoadTrafficFees = parseInt(roadTrafficFees.value);

            sum = numberCarPrice * numberRegistrationFee + numberRoadTrafficFees + 340000;

            if (numberRegistrationFee) btnDeposits.classList.remove('disabled');
            else btnDeposits.classList.add('disabled');

            let formattedNumber = sum.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });

            totalPriceDisplay.textContent = formattedNumber;
            totalPrice.value = sum;
        });

        roadTrafficFees.addEventListener('change', function() {
            if (numberRegistrationFee) {
                numberCarPrice = parseInt(carPrice.textContent.replace(/\./g, '').replace(' ₫', ''));
                numberRegistrationFee = parseFloat(userRegistrationFee.value);
                numberRoadTrafficFees = parseInt(this.value);

                sum = numberCarPrice * numberRegistrationFee + numberRoadTrafficFees + 340000;

                let formattedNumber = sum.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });

                totalPriceDisplay.textContent = formattedNumber;
                totalPrice.value = sum;
            }
        });

        const toastCarAddedToTheCart = document.getElementById('toast-car-added-to-the-cart');
        const toast = new bootstrap.Toast(toastCarAddedToTheCart);

        toastCarAddedToTheCart.addEventListener('shown.bs.toast', function() {
            setTimeout(function() {
                toast.hide();
            }, 3000);
        });
    </script>

</body>

</html>