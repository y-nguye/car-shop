<?php
get_header($data_car['car_name'], 'store/storePagesStyles', $this);
?>

<div class="overlay bg-dark overlay-custom__product-page">
    <button class="btn-close fs-5 p-3 m-4 bg-gray-light rounded-circle position-absolute btn-close__product-page" aria-label="Close"></button>
    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
        <div id="carouselIndicators__overlay" class="carousel slide carousel-fade slide__product-page--overlay" data-bs-ride="true">
            <div class="carousel-inner">
                <?php if (empty($data_all_car_img[1])) : ?>
                    <div class="carousel-item carousel-item-custom__product-page--overlay active">
                        <img src="/car-shop/assets/imgs/no-img.jpg" alt="" class="d-block w-100">
                    </div>
                <?php endif ?>

                <?php foreach ($data_all_car_img as $index => $data) : ?>
                    <!-- Loại bỏ hình đại diện -->
                    <?php if ($index == 0) continue; ?>
                    <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                        <div class="carousel-item carousel-item-custom__product-page--overlay" data-index="<?= $index ?>">
                            <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" alt="" class="d-block w-100">
                        </div>
                    <?php else : ?>
                        <div class="carousel-item carousel-item-custom__product-page--overlay" data-index="<?= $index ?>">
                            <img src="/car-shop/assets/imgs/no-img.jpg" alt="" class="d-block w-100">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators__overlay" data-bs-slide="prev">
                <span class="carosel-controll-icon__overlay" aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators__overlay" data-bs-slide="next">
                <span class="carosel-controll-icon__overlay" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<div class="container-lg mt-3">
    <div class="row">
        <div class="col-md-7">
            <div class="d-flex">

                <div id="carouselIndicators" class="carousel slide rounded-3 slide__product-page" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <?php foreach ($data_all_car_img as $index => $data) : ?>
                            <?php if (($index == 0)) continue ?>
                            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="<?= $index - 1 ?>" aria-label="Slide <?= $index ?>" <?php if ($index - 1 == 0) : ?> class="active" aria-current="true" <?php endif; ?>></button>
                        <?php endforeach; ?>
                    </div>

                    <div class="carousel-inner">
                        <?php if (empty($data_all_car_img[1])) : ?>
                            <div class="carousel-item carousel-item-custom__product-page active">
                                <img src="/car-shop/assets/imgs/no-img.jpg" alt="" class="d-block w-100">
                            </div>
                        <?php endif ?>

                        <?php foreach ($data_all_car_img as $index => $data) : ?>
                            <!-- Loại bỏ hình đại diện -->
                            <?php if ($index == 0) continue; ?>
                            <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                                <div class="carousel-item carousel-item-custom__product-page <?php if ($index == 1) echo 'active'; ?> " data-index="<?= $index ?>">
                                    <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" alt="" class="d-block w-100">
                                </div>
                            <?php else : ?>
                                <div class="carousel-item carousel-item-custom__product-page" data-index="<?= $index ?>">
                                    <img src="/car-shop/assets/imgs/no-img.jpg" alt="" class="d-block w-100">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>

        <div class="col-md-5 d-flex flex-column ps-5 column-info-car">
            <h1 class="text-dark"><?= $data_car['car_name'] ?></h1>
            <span class="fs-3"><?= number_format($data_car['car_price'], 0, ',', '.') ?> ₫</span>

            <div class="mt-4 pb-3 border-start border-end">
                <div class="row">
                    <div class="col-4">
                        <div class="text-center d-flex flex-column align-items-center justify-content-center">
                            <span>Kiểu dáng</span>
                            <span class="mt-2 p-1 fs-4"><?= $data_car['car_type_name'] ?></span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center d-flex flex-column align-items-center justify-content-center">
                            <span>Số chỗ ngồi</span>
                            <span class="mt-2 p-1 fs-4"><?= $data_car['car_seat'] ?></span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center d-flex flex-column align-items-center justify-content-center">
                            <span>Loại hộp số</span>
                            <span class="text-center p-1 mt-2 fs-4"><?= $data_car['car_transmission'] ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 border-start border-end">
                <div class="row">
                    <div class="col-4">
                        <div class="text-center d-flex flex-column align-items-center justify-content-center">
                            <span>Hãng sản xuất</span>
                            <?php if (empty($data_car['car_producer_name'])) : ?>
                                <span class="mt-2 p-1 fs-4">---</span>
                            <?php else : ?>
                                <span class="mt-2 p-1 fs-4"><?= $data_car['car_producer_name'] ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center d-flex flex-column align-items-center justify-content-center">
                            <span>Nhiên liệu</span>
                            <?php if (empty($data_car['car_fuel'])) : ?>
                                <span class="mt-2 p-1 fs-4">---</span>
                            <?php else : ?>
                                <span class="mt-2 p-1 fs-4"><?= $data_car['car_fuel'] ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center d-flex flex-column align-items-center justify-content-center">
                            <span>Động cơ</span>
                            <span class="mt-2 p-1 fs-4"><?= $data_car['car_engine'] ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <form name="formProductCar" class="d-flex flex-column h-100" method="post" action="">

                <input type="hidden" name="car_id" value="<?= $data_car['car_id'] ?>" />
                <input type="hidden" name="car_name" value="<?= $data_car['car_name'] ?>" />
                <input type="hidden" name="car_price" value="<?= $data_car['car_price'] ?>" />
                <input type="hidden" name="car_describe" value="<?= $data_car['car_describe'] ?>" />

                <div class="mt-auto">
                    <button type="submit" name="btnRegistrationFee" class="btn btn-primary mb-2 w-100">Dự toán chi phí</button>
                    <div class="d-flex">
                        <button type="submit" name="btnAddCarToCart" class="btn btn-outline-primary w-50 me-2">Thêm vào giỏ hàng</button>
                        <a class="btn btn-outline-secondary w-50" href="/car-shop/test-drive/<?= $data_car['car_id'] ?>">Đăng ký lái thử</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="text-center">
        <p class="mt-5 mb-5 fs-4"> <?= $data_car['car_describe'] ?> </p>
    </div>

    <hr>

    <div class="row mt-3">
        <div class="d-flex align-items-center justify-content-center mb-5">
            <?php if (isset($data_all_car_img[0]['car_img_filename']) && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data_all_car_img[0]['car_img_filename'])) : ?>
                <img src="/car-shop/assets/uploads/<?= $data_all_car_img[0]['car_img_filename'] ?>" alt="" class=" w-50">
            <?php else : ?>
                <img src="/car-shop/assets/imgs/no-img.jpg" alt="" class="w-50">
            <?php endif ?>
        </div>
        <h4 class="">Thông tin sản phẩm</h4>
        <p class="text-justify mt-2"><?= $data_car['car_detail_describe'] ?></p>
    </div>

    <hr>

    <div class="row">
        <h4 class="text-secondary">Xem thêm xe cùng dòng</h4>

        <?php foreach ($data_all_with_img as $data) : ?>
            <div class="col-md-4 mb-4">
                <a href="/car-shop/product/<?= $data['car_id'] ?>">
                    <div class="d-flex flex-column align-items-center justify-content-center text-dark rounded-3 p-2 card-custom__type-page">
                        <?php if ($data['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data['car_img_filename'])) : ?>
                            <img src="/car-shop/assets/uploads/<?= $data['car_img_filename'] ?>" class="card-img-top img-on-card__type-page rounded-3" alt="img-card">
                        <?php else : ?>
                            <img src="/car-shop/assets/imgs/no-img.jpg" class="card-img-top img-on-card__type-page rounded-3" alt="img-card">
                        <?php endif; ?>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $data['car_name'] ?></h5>
                            <p class="card-text">Giá từ <?= number_format($data['car_price'], 0, ',', '.') ?> ₫</p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

    </div>

</div>

<!-- HTML cho một toast -->
<div id="toast-result-test-drive" class="toast align-items-center fixed-top bg-light toast-custom" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body"></div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

<?php
include_once __DIR__ . '/../../resources/layouts/footer.php';
?>

<script>
    // -------------------- Toast hiển thị kết quả đăng ký lái thử --------------------
    const toastBody = document.querySelector('.toast-body');
    const toastResultTestDrive = document.getElementById('toast-result-test-drive');
    const toast = new bootstrap.Toast(toastResultTestDrive);

    toastResultTestDrive.addEventListener('shown.bs.toast', function() {
        setTimeout(function() {
            toast.hide();
        }, 3000);
    });

    // -------------------- Hiển thị hình ảnh toàn màn hình ---------------------------
    const body = document.body;
    const overlay = document.querySelector('.overlay');
    const btnClose = document.querySelector('.btn-close');
    const carouselInner = document.querySelectorAll('.carousel-item-custom__product-page');
    const carouselInnerOverlay = document.querySelectorAll('.carousel-item-custom__product-page--overlay');

    carouselInner.forEach(x => {
        x.addEventListener('click', function() {
            carouselInnerOverlay.forEach(y => {
                if (y.classList.contains('active')) y.classList.remove('active');
            });
            const indexImg = x.dataset.index;
            enableViewProduct(indexImg);
        })
    })

    btnClose.addEventListener('click', function() {
        disableViewProduct();
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' || event.key === 'Esc') {
            disableViewProduct();
        }
    });

    function disableViewProduct() {
        overlay.style.opacity = '0';
        body.style.overflow = 'auto';
        // Cho delay thời gian để opacity có hiệu ứng, điều này không tốt cho việc bảo trì code
        setTimeout(function() {
            overlay.style.visibility = 'hidden';
        }, 320)
    }

    function enableViewProduct(indexImg) {
        const imgDisplay = overlay.querySelector(`div[data-index="${indexImg}"]`);
        imgDisplay.classList.add('active');
        overlay.style.opacity = '1';
        body.style.overflow = 'hidden';
        overlay.style.visibility = 'visible';
    }
</script>

</body>

</html>