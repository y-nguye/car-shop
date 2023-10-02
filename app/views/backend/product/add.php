<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/styles/styles.php'; ?>
    <?php include_once __DIR__ . '/productPagesStyles.php'; ?>
    <title>Thêm xe</title>
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

                <form id="formAdd" name="formAdd" method="post" action="" enctype="multipart/form-data">
                    <nav class="navbar mb-4 shadow-sm sticky-top rounded-3 toolbar-custom">
                        <div class="container-fluid ps-2">
                            <button type="button" class="btn btn-sm btn-go-back-header">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                            <span class="fs-5 ms-2"><b>Thêm xe</b></span>

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
                                    <input type="text" name="car_name" id="car_name" class="form-control remove-space-first" placeholder="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="car_engine" class="form-label">Động cơ *</label>
                                    <input type="text" name="car_engine" id="car_engine" class="form-control remove-space-first" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Dòng xe *</label>
                                    <select class="form-select" name="car_type_id" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                                        <option selected value="">---Chọn---</option>
                                        <?php foreach ($data_all_car_type as $value) { ?>
                                            <option value="<?= $value['car_type_id'] ?>"> <?= $value['car_type_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Số chỗ ngồi *</label>
                                    <select class="form-select" name="car_seat_id" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                                        <option selected value="">---Chọn---</option>
                                        <?php foreach ($data_all_car_seat as $value) { ?>
                                            <option value="<?= $value['car_seat_id'] ?>"> <?= $value['car_seat'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Nhiên liệu</label>
                                    <select class="form-select" name="car_fuel_id">
                                        <option selected value="">---Chọn---</option>
                                        <?php foreach ($data_all_car_fuel as $value) { ?>
                                            <option value="<?= $value['car_fuel_id'] ?>"> <?= $value['car_fuel'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="car_price" class="form-label">Giá xe *</label>
                                    <div class="input-group">
                                        <input type="text" name="car_price" id="car_price" class="form-control remove-space-first" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="car_quantity" class="form-label">Số lượng *</label>
                                    <input type="text" name="car_quantity" id="car_quantity" class="form-control remove-space-first" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Hãng sản xuất</label>
                                    <select class="form-select" name="car_producer_id">
                                        <option selected value="">---Chọn---</option>
                                        <?php foreach ($data_all_car_producer as $value) { ?>
                                            <option value="<?= $value['car_producer_id'] ?>"> <?= $value['car_producer_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Loại hộp số *</label>
                                    <select class="form-select" name="car_transmission_id" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
                                        <option selected value="">---Chọn---</option>
                                        <?php foreach ($data_all_car_transmission as $value) { ?>
                                            <option value="<?= $value['car_transmission_id'] ?>"> <?= $value['car_transmission'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="car_describe" class="form-label">Mô tả ngắn *</label>
                            <textarea type="text" name="car_describe" id="car_describe" class="form-control remove-space-first" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for=" car_detail_describe" class="form-label">Mô tả chi tiết *</label>
                            <textarea type="text" name="car_detail_describe" id="car_detail_describe" class="form-control"></textarea>
                        </div>


                        <div class="form-group mt-3">
                            <label for="car_img_filename" class="form-label">Hình ảnh sản phẩm</label>
                            <input type="file" name="car_img_filename[]" id="car_img_filename" class="form-control" multiple />
                        </div>

                        <div class="container text-center">
                            <div id="image-preview-container" class="form-group mt-3">
                                <div class="preview-img-container-item">
                                    <img src="/car-shop/assets/imgs/no-img.jpg" alt="no-img" id="preview-img" class="preview-img" />
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-start mb-3">
                            <button type="button" class="btn btn-danger btn-go-back">Quay lại</button>
                            <button type="button" id="backToTop" class="btn btn-secondary ms-auto me-3">Lên đầu trang</button>
                            <button type="submit" name="btnAdd" class="btn btn-primary disabled btn-add">Thêm</button>
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
    include_once __DIR__ . '/../../resources/script/script.php';
    ?>

    <script>
        // Phiên bản 4.22
        CKEDITOR.replace('car_detail_describe');

        // -------------- Hiển thị hình ảnh ngay sau khi chọn ------------------
        const fileInput = document.getElementById('car_img_filename');
        const imagePreviewContainer = document.getElementById('image-preview-container');

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

                    imageContainerItem.classList.add('preview-img-container-item');
                    image.classList.add('preview-img');

                    if (i == 0) imageTitle.textContent = 'Hình đại diện';
                    else imageTitle.textContent = i;

                    imageContainerItem.appendChild(image);
                    imageContainerItem.appendChild(imageTitle);
                    imagePreviewContainer.appendChild(imageContainerItem);
                };
                reader.readAsDataURL(file);
            }
        });

        // -------------- Alert hiển thị khi bị lỗi thêm dữ liệu ------------------
        var alertPlaceholder = document.getElementById('liveAlertPlaceholder');

        function showAlert(message, type) {
            var wrapper = document.createElement('div');
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            alertPlaceholder.appendChild(wrapper);
        }

        // -------------- Theo dõi thay đổi trên form ------------------------
        const formAdd = document.getElementById('formAdd');
        const btnAdd = document.querySelector('.btn-add');
        const btnAddProducer = document.querySelector('.btn-add-car-producer');
        const btnGoBack = document.querySelector('.btn-go-back');
        const btnGoBackHeader = document.querySelector('.btn-go-back-header');
        // Tạo một biến để theo dõi trạng thái sự thay đổi
        let formChanged = false;

        // Bắt đầu theo dõi sự thay đổi trên các trường input
        formAdd.addEventListener('change', () => {
            formChanged = true;
            btnAdd.classList.remove('disabled');
        });

        //  Bắt đầu theo dõi sự thay đổi trên trường CKEDITOR
        CKEDITOR.instances.car_detail_describe.on('change', function() {
            formChanged = true;
            btnAdd.classList.remove('disabled');
        });

        btnAdd.addEventListener("click", () => {
            formChanged = false;
        });
        // -------------- Nút "Quay lại" ------------------
        btnGoBack.addEventListener("click", () => {
            window.history.back();
        });
        btnGoBackHeader.addEventListener("click", () => {
            window.history.back();
        });

        // -------------- Nút "Thêm hãng xe" ------------------
        btnAddProducer.addEventListener("click", () => {
            window.location.href = "/car-shop/admin/product/add-producer";

        });

        // -------------- Nút "Trở về đầu trang" ------------------
        document.getElementById("backToTop").addEventListener("click", function(event) {
            window.scrollTo({
                top: 0,
                behavior: "smooth" // Cuộn mượt
            });
        });

        // -------------- Bắt sự kiện beforeunload để hiển thị thông báo xác nhận --------------
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
        const inputElementNodelist = document.querySelectorAll('.remove-space-first');

        inputElementNodelist.forEach(x => {
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
            $('#formAdd').validate({
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
                },
                success: function(element) {
                    console.log(element);
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
                        maxlength: 15,
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
                        maxlength: 'Tối đa 15 kí tự',
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