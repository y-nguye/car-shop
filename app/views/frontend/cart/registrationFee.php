<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/frontend/cart/cartPageStyle.php' ?>
    <title>Tính toán chi phí</title>
</head>

<body>

    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>
    <div class="push-footer-down-page">


        <div class="container-lg">
            <div class="pt-3 pb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="mb-0">Tính toán chi phí</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-8 d-flex flex-column align-items-center">
                    <img src="/car-shop/assets/uploads/<?= $data_car['car_img_filename'] ?>" class="img-car-on-registration-fee" alt="img-car-on-cart">
                    <h1 class="mt-4"><?= $data_car['car_name'] ?></h1>
                    <span class="fs-4">Mạnh mẽ bên ngoài, tinh xảo bên trong</span>
                </div>

                <div class="col-4">
                    <form method="post" action="">
                        <div class="p-3 pt-2 pb-1">
                            <div class=" d-flex align-items-center justify-content-between text-secondary">
                                <h6 class="m-0">Giá tính phí trước bạ</h6>
                                <div id="car_price" class="text-end fs-6"><?= number_format($data_car['car_price'], 0, ',', '.') ?> ₫</div>
                            </div>
                            <hr>
                        </div>

                        <div class="p-3 pt-1">
                            <h6 class="text-dark m-0">Nơi đăng ký xe</h6>
                            <select class="form-select mt-3" name="user_province_id" id="user_province_id" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                                <option selected value="">---Chọn---</option>
                                <?php foreach ($data_all_user_province as $value) { ?>
                                    <option value="<?= $value['user_registration_fee'] ?>"> <?= $value['user_province_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="p-3 pt-2">
                            <h6 class="text-dark m-0">Gói phí lưu hành đường bộ</h6>
                            <select id="road_traffic_fees" class="form-select mt-3" name="XXX">
                                <option value="130000" selected>1 tháng</option>
                                <option value="780000">6 tháng</option>
                                <option value="1560000">12 tháng</option>
                                <option value="2280000">18 tháng</option>
                                <option value="3000000">24 tháng</option>
                                <option value="3660000">30 tháng</option>
                            </select>
                        </div>

                        <div class="p-3 pt-2">
                            <h6 class="text-dark m-0">Phí đăng kiểm</h6>
                            <div class="text-end fs-5"><?= number_format(340000, 0, ',', '.') ?> ₫</div>
                        </div>

                        <div class="ps-3 pb-3 pe-3">
                            <hr>
                            <h5 class="m-0">Tổng chi phí dự tính</h5>
                            <div id="total_price_display" class="text-end pt-3 pb-3 fs-3">---</div>
                            <input type="hidden" name="total_price" id="total_price" />
                        </div>

                        <div class="d-flex flex-column align-items-center justify-content-between ps-3 pe-3">
                            <button type="submit" name="btnDeposits" class="btn btn-primary w-100 btn-deposits disabled">Tiến hành đặt cọc</button>
                            <a class="mt-3" href="/car-shop/cart">Quay về giỏ hàng</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- HTML cho một toast -->
    <div id="myToast" class="toast align-items-center text-white bg-primary fixed-top toast-custom" role="alert" aria-live="assertive" aria-atomic="true">
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

        const myToast = document.getElementById('myToast');
        const toast = new bootstrap.Toast(myToast);

        myToast.addEventListener('shown.bs.toast', function() {
            setTimeout(function() {
                toast.hide();
            }, 3000);
        });
    </script>

</body>

</html>