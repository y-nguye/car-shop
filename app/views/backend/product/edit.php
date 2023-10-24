<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php'; ?>
    <?php include_once __DIR__ . '/productPagesStyles.php'; ?>
    <title>Sửa thông tin xe</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">

                <?php
                $item_select = "product";
                include_once __DIR__ . '/../../resources/layouts/sidebar.php';
                ?>

            </div>

            <div class="col-9">

                <form id="formEdit" name="formEdit" method="post" action="" enctype="multipart/form-data">

                    <nav class="navbar mb-4 shadow sticky-top rounded-3 toolbar-custom">

                        <div class="container-fluid ps-2">

                            <button type="button" class="btn btn-sm btn-go-back-header">
                                <i class="bi bi-chevron-left"></i>
                            </button>

                            <span class="fs-5 ms-2"><b>Sửa thông tin xe</b></span>

                            <button type="button" class="btn btn-sm btn-primary ms-auto btn-add-car-producer">
                                <i class="bi bi-plus-circle"></i>
                                Thêm hãng sản xuất
                            </button>

                        </div>


                    </nav>


                    <div class="p-2">

                        <div id="liveAlertPlaceholder"></div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="car_name" class="form-label">Tên xe *</label>
                                    <input type="text" name="car_name" id="car_name" class="form-control remove-space-first" value="<?= $data_car['car_name'] ?>" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="car_engine" class="form-label">Động cơ *</label>
                                    <input type="text" name="car_engine" id="car_engine" class="form-control remove-space-first" value="<?= $data_car['car_engine'] ?>" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Dòng xe *</label>
                                    <select class="form-select" name="car_type_id" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                                        <option value="">---Chọn---</option>
                                        <?php foreach ($data_all_car_type as $value) : ?>
                                            <?php if ($value['car_type_id'] == $data_car['car_type_id']) : ?>
                                                <option selected value="<?= $value['car_type_id'] ?>"> <?= $value['car_type_name'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $value['car_type_id'] ?>"> <?= $value['car_type_name'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Số chỗ ngồi *</label>
                                    <select class="form-select" name="car_seat_id" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                                        <option value="">---Chọn---</option>
                                        <?php foreach ($data_all_car_seat as $value) : ?>
                                            <?php if ($value['car_seat_id'] == $data_car['car_seat_id']) : ?>
                                                <option selected value="<?= $value['car_seat_id'] ?>"> <?= $value['car_seat'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $value['car_seat_id'] ?>"> <?= $value['car_seat'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Nhiên liệu</label>
                                    <select class="form-select" name="car_fuel_id">
                                        <option value="">---Chọn---</option>
                                        <?php foreach ($data_all_car_fuel as $value) : ?>
                                            <?php if ($value['car_fuel_id'] == $data_car['car_fuel_id']) : ?>
                                                <option selected value="<?= $value['car_fuel_id'] ?>"> <?= $value['car_fuel'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $value['car_fuel_id'] ?>"> <?= $value['car_fuel'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="car_price" class="form-label">Giá xe *</label>
                                    <div class="input-group">
                                        <input type="number" name="car_price" id="car_price" class="form-control remove-space-first" value="<?= $data_car['car_price'] ?>" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="car_quantity" class="form-label">Số lượng *</label>
                                    <input type="number" name="car_quantity" id="car_quantity" class="form-control remove-space-first" value="<?= $data_car['car_quantity'] ?>" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Hãng sản xuất</label>
                                    <select class="form-select" name="car_producer_id">
                                        <option value="">---Chọn---</option>
                                        <?php foreach ($data_all_car_producer as $value) : ?>
                                            <?php if ($value['car_producer_id'] == $data_car['car_producer_id']) : ?>
                                                <option selected value="<?= $value['car_producer_id'] ?>"> <?= $value['car_producer_name'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $value['car_producer_id'] ?>"> <?= $value['car_producer_name'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Loại hộp số *</label>
                                    <select class="form-select" name="car_transmission_id" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                                        <option value="">---Chọn---</option>
                                        <?php foreach ($data_all_car_transmission as $value) : ?>
                                            <?php if ($value['car_transmission_id'] == $data_car['car_transmission_id']) : ?>
                                                <option selected value="<?= $value['car_transmission_id'] ?>"> <?= $value['car_transmission'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $value['car_transmission_id'] ?>"> <?= $value['car_transmission'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="car_describe" class="form-label">Mô tả ngắn *</label>
                            <textarea type="text" name="car_describe" id="car_describe" class="form-control remove-space-first" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover"><?= $data_car['car_describe'] ?></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="car_detail_describe" class="form-label">Mô tả chi tiết *</label>
                            <textarea type="text" name="car_detail_describe" id="car_detail_describe" class="form-control remove-space-first"><?= $data_car['car_detail_describe'] ?></textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label for="car_img_filename" class="form-label">Hình ảnh sản phẩm (Tối đa 24 hình ảnh)</label>
                            <input type="file" name="car_img_filename[]" id="car_img_filename" class="form-control" multiple />
                        </div>

                        <div class="container text-center">
                            <div id="preview-image-containe" class="form-group mt-3">
                                <?php foreach ($data_all_car_img as $index => $img) : ?>
                                    <?php if ($img['car_img_filename'] != NULL) : ?>
                                        <div class="preview-image-container-item">

                                            <!-- Xử lý trường hợp bị mất hình ảnh trong thư mục uploads -->
                                            <?php if ($img['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $img['car_img_filename'])) : ?>
                                                <img src="/project/car-shop/assets/uploads/<?= $img['car_img_filename'] ?>" alt="preview-img" class="preview-img" />
                                            <?php else : ?>
                                                <img src="/project/car-shop/assets/imgs/no-img.jpg" class="rounded-3 preview-img" alt="preview-img">
                                            <?php endif; ?>

                                            <?php if ($index == 0) : ?>
                                                <span>Hình đại diện</span>
                                            <?php else : ?>
                                                <span><?= $index ?></span>
                                            <?php endif; ?>

                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-start mb-3">
                            <button type="button" class="btn btn-danger btn-go-back">Quay lại</button>
                            <button type="button" class="btn btn-secondary ms-auto me-3 btn-back-to-top">Lên đầu trang</button>
                            <button type="submit" name="btnEdit" class="btn btn-primary disabled btn-update">Cập nhật</button>
                        </div>
                    </div>
                </form>
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
        // Phiên bản 4.22
        CKEDITOR.replace('car_detail_describe');

        // -------------- Hiển thị hình ảnh ngay sau khi chọn ------------------
        const formEdit = document.getElementById('formEdit');
        const btnAddProducer = document.querySelector('.btn-add-car-producer');
        const btnUpdate = document.querySelector('.btn-update');
        const btnGoBack = document.querySelector('.btn-go-back');
        const btnGoBackHeader = document.querySelector('.btn-go-back-header');
        const btnBackToTop = document.querySelector('.btn-back-to-top');
        const inputRemoveSpaceFirstNodelist = document.querySelectorAll('.remove-space-first');
        const fileInput = document.getElementById('car_img_filename');
        const imagePreviewContainer = document.getElementById('preview-image-containe');
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder');

        // Thêm sự kiện change cho thẻ input
        fileInput.addEventListener('change', function() {
            // Xóa tất cả hình ảnh hiện có trong container
            imagePreviewContainer.innerHTML = '';

            // Lặp qua từng tệp đã chọn và hiển thị chúng
            for (let i = 0; i < fileInput.files.length; i++) {
                const file = fileInput.files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imageContainerItem = document.createElement('span');
                    const imageTitle = document.createElement('div');
                    const image = document.createElement('img');

                    image.src = e.target.result;

                    imageContainerItem.classList.add('preview-image-container-item');
                    image.classList.add('preview-img');

                    if (i == 0) imageTitle.textContent = 'Ảnh đại diện';
                    else imageTitle.textContent = i;

                    imageContainerItem.appendChild(image);
                    imageContainerItem.appendChild(imageTitle);
                    imagePreviewContainer.appendChild(imageContainerItem);
                };
                reader.readAsDataURL(file);
            }
        });

        // -------------- Alert hiển thị khi bị lỗi thêm dữ liệu ------------------
        function showAlert(message, type) {
            var wrapper = document.createElement('div');
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            alertPlaceholder.appendChild(wrapper);
        }

        // ----------------------------------------------------------------        
        // Tạo một biến để theo dõi trạng thái sự thay đổi
        let formChanged = false;

        // Bắt đầu theo dõi sự thay đổi trên các trường input
        formEdit.addEventListener('change', () => {
            formChanged = true;
            btnUpdate.classList.remove('disabled');
        });

        // Bắt đầu theo dõi sự thay đổi trên trường CKEDITOR
        CKEDITOR.instances.car_detail_describe.on('change', function() {
            formChanged = true;
            btnUpdate.classList.remove('disabled');
        });

        // -------------- Các nút ---------------
        btnAddProducer.addEventListener("click", () => {
            window.location.href = "/project/car-shop/admin/product/add-producer";
        });
        btnGoBack.addEventListener("click", () => {
            window.location.href = "/project/car-shop/admin/product";
        });
        btnGoBackHeader.addEventListener("click", () => {
            window.location.href = "/project/car-shop/admin/product";
        });
        btnBackToTop.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth" // Cuộn mượt
            });
        });


        //-------------- Bắt sự kiện beforeunload để hiển thị thông báo xác nhận --------------
        window.addEventListener("beforeunload", function(e) {
            if (formChanged) {
                // Hiển thị thông báo xác nhận
                var confirmationMessage = "Bạn có chắc chắn muốn rời khỏi trang? Dữ liệu bạn đã nhập có thể không được lưu lại.";
                // Thêm thông báo vào sự kiện
                e.returnValue = confirmationMessage;
                // Trả về thông báo để hiển thị trong trình duyệt
                return confirmationMessage;
            }
        });

        //-------------- Loại bỏ dấu cách đầu tiên khi nhập liệu --------------

        inputRemoveSpaceFirstNodelist.forEach(x => {
            x.addEventListener('input', function() {
                let inputValue = this.value;
                // Loại bỏ dấu cách ở đầu chuỗi
                inputValue = inputValue.trimStart();
                // Đặt lại giá trị của input thành chuỗi đã được xử lý
                this.value = inputValue;
            });
        })

        // Validation
        $(function() {
            result = $('#formEdit').validate({
                errorClass: "is-invalid",
                errorPlacement: function(error, element) {
                    element.attr("data-bs-original-title", error.text());
                    if (element.attr("id") == "car_detail_describe") {
                        $('#cke_car_detail_describe').addClass('ckeditor-invalidate');
                        $('#cke_car_detail_describe').attr("data-bs-toggle", "tooltip");
                        $('#cke_car_detail_describe').attr("data-bs-placement", "right");
                        $('#cke_car_detail_describe').attr("data-bs-trigger", "hover");
                        $('#cke_car_detail_describe').attr("data-bs-original-title", error.text());
                        var tooltip = new bootstrap.Tooltip($('#cke_car_detail_describe'));
                    };
                    // formChanged = true;
                },
                success: function(element) {
                    element.removeAttr("data-bs-original-title");
                    if (element.attr("id") == "car_detail_describe-error") {
                        $('#cke_car_detail_describe').removeClass('ckeditor-invalidate');
                        $('#cke_car_detail_describe').removeAttr("data-bs-toggle");
                        $('#cke_car_detail_describe').removeAttr("data-bs-placement");
                        $('#cke_car_detail_describe').removeAttr("data-bs-trigger");
                        $('#cke_car_detail_describe').removeAttr("data-bs-original-title");
                        var tooltip = new bootstrap.Tooltip($('#cke_car_detail_describe'));
                    }
                },
                submitHandler: function(form) {
                    formChanged = false;
                    form.submit();
                },
                ignore: [],
                rules: {
                    car_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                    },
                    car_engine: {
                        required: true,
                    },
                    car_price: {
                        required: true,
                        minlength: 7,
                        maxlength: 12,
                    },
                    car_quantity: {
                        required: true,
                        maxlength: 2,
                    },
                    car_type_id: {
                        required: true,
                    },
                    car_seat_id: {
                        required: true,
                    },
                    car_transmission_id: {
                        required: true,
                    },
                    car_describe: {
                        required: true,
                        minlength: 10,
                        maxlength: 200,
                    },
                    car_detail_describe: {
                        required: function() {
                            CKEDITOR.instances.car_detail_describe.updateElement();
                        },
                        minlength: 100,
                        maxlength: 5000,
                    }
                },
                messages: {
                    car_name: {
                        required: 'Không được để trống',
                        minlength: 'Tối thiểu 3 kí tự',
                        maxlength: 'Tối đa 50 kí tự',
                    },
                    car_engine: {
                        required: 'Không được để trống',
                    },
                    car_price: {
                        required: 'Không được để trống',
                        minlength: 'Tối thiểu 7 kí tự',
                        maxlength: 'Tối đa 12 kí tự',
                    },
                    car_quantity: {
                        required: 'Không được để trống',
                        maxlength: 'Tối đa 2 kí tự',
                    },
                    car_type_id: {
                        required: 'Chưa chọn',
                    },
                    car_seat_id: {
                        required: 'Chưa chọn',
                    },
                    car_transmission_id: {
                        required: 'Chưa chọn',
                    },
                    car_describe: {
                        required: 'Không được để trống',
                        minlength: 'Tối thiểu 10 kí tự',
                        maxlength: 'Tối đa 200 kí tự',
                    },
                    car_detail_describe: {
                        required: 'Không được để trống',
                        minlength: 'Tối thiểu 100 kí tự',
                        maxlength: 'Tối đa 5000 kí tự',
                    },
                }
            });
        });
    </script>

</body>

</html>