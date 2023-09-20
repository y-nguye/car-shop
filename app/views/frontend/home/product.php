<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/css/styles.php' ?>
    <?php include_once 'app/views/frontend/home/homePageStyle.php' ?>
    <title>Chi tiết xe</title>
</head>

<body>
    <?php
    include_once 'app/views/frontend/layouts/header.php';
    ?>

    <div class="container-lg mt-3">

        <div class="row">
            <div class="col-7">
                <img src="/car-shop/assets/imgs/no-img.jpg" alt="" class="rounded-3 mb-3 img-large">
                <div class="d-flex align-items-center justify-content-center">
                    <?php foreach ($data_car_img as $data) : ?>
                        <?php if ($data['car_img_filename']) : ?>
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" alt="" class="rounded-3 m-1 img-small">
                                <div class="dot-img-small"></div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="d-flex flex-column col-5 ps-5">

                <h1><?= $data_car['car_name'] ?></h1>
                <div class=""><span class="fs-3"><?= number_format($data_car['car_price'], 0, ',', '.') ?> VNĐ</span></div>


                <div class="mt-4 mb-4 border-start border-end ">
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <span>Kiểu dáng</span>
                                <span class="mt-2 p-1 fs-4"><?= $data_car['car_type_name'] ?></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <span>Số chỗ ngồi</span>
                                <span class="mt-2 p-1 fs-4"><?= $data_car['car_seat'] ?></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <span>Loại hộp số</span>
                                <span class="text-center p-1 mt-2 fs-4"><?= $data_car['car_transmission'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <p class="text-justify mt-2 fs-5"><?= $data_car['car_describe'] ?></p>
                </div>

                <div class="mt-auto">
                    <button class="btn btn-primary mb-2 w-100">Dự toán</button>
                    <div class="d-flex">
                        <button class="btn btn-outline-primary w-50 me-2">Thêm vào giỏ hàng</button>
                        <button class="btn btn-outline-secondary w-50">Đăng kí lái thử</button>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row mt-3">
            <h4 class="">Thông tin sản phẩm</h4>
            <p class="text-justify mt-2"><?= $data_car['car_detail_describe'] ?></p>
        </div>

    </div>

    <?php
    include_once 'app/views/frontend/layouts/footer.php';
    ?>

    <script>
        const imgSmall = document.querySelectorAll('.img-small');
        const imgLarge = document.querySelector('.img-large');
        const dots = document.querySelectorAll('.dot-img-small');

        document.addEventListener('DOMContentLoaded', function() {
            console.log(imgSmall[0].src);
            imgLarge.src = imgSmall[0].src;
            imgSmall[0].nextElementSibling.classList.add('dot-img-small-active');
        });

        imgSmall.forEach(x => {
            x.addEventListener('click', () => {
                if (imgLarge.src != x.src) {
                    imgLarge.style.opacity = '0';
                    setTimeout(() => {
                        imgLarge.src = x.src;
                        imgLarge.style.opacity = '1';
                    }, 200)
                    dots.forEach(x => {
                        x.classList.remove('dot-img-small-active');
                    });
                    x.nextElementSibling.classList.add('dot-img-small-active');
                }
            });
        });
    </script>


</body>

</html>