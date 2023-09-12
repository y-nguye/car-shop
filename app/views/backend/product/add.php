<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/css/styles.php' ?>
    <?php include_once 'app/views/backend/product/productPageStyle.php'; ?>
    <title>Danh sách sản phẩm</title>
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

                <form id="formAdd" name="formAdd" method="post" action="" enctype="multipart/form-data">

                    <nav class="navbar mb-4 shadow-sm sticky-top rounded-3 custom-toolbar">
                        <div class="d-flex justify-content-start">
                            <button type="button" class="btn btn-sm ms-2 me-2 btn-go-back-header">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                            <span class="fs-5"><b>Thêm sản phẩm</b></span>
                        </div>
                    </nav>


                    <div class="p-2">

                        <div id="liveAlertPlaceholder"></div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="car_name" class="form-label">Tên xe *</label>
                                    <input type="text" name="car_name" id="car_name" class="form-control" />
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Dòng xe *</label>
                                    <select class="form-select" name="car_type_id">
                                        <option selected value="">---Chọn---</option>
                                        <?php foreach ($data_car_type as $value) { ?>
                                            <option value="<?= $value['car_type_id'] ?>"> <?= $value['car_type_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Số chỗ ngồi *</label>
                                    <select class="form-select" name="car_seat_id">
                                        <option selected value="">---Chọn---</option>
                                        <?php foreach ($data_car_seat as $value) { ?>
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
                                        <?php foreach ($data_car_fuel as $value) { ?>
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
                                        <input type="text" name="car_price" id="car_price" class="form-control" />
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-2">
                                <div class="form-group">
                                    <label for="car_quantity" class="form-label">Số lượng *</label>
                                    <input type="text" name="car_quantity" id="car_quantity" class="form-control" />
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Hãng sản xuất</label>
                                    <select class="form-select" name="car_producer_id">
                                        <option selected value="">---Chọn---</option>
                                        <?php foreach ($data_car_producer as $value) { ?>
                                            <option value="<?= $value['car_producer_id'] ?>"> <?= $value['car_producer_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Loại hộp số *</label>
                                    <select class="form-select" name="car_transmission_id">
                                        <option selected value="">---Chọn---</option>
                                        <?php foreach ($data_car_transmission as $value) { ?>
                                            <option value="<?= $value['car_transmission_id'] ?>"> <?= $value['car_transmission'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="car_describe" class="form-label">Mô tả ngắn *</label>
                            <textarea type="text" name="car_describe" id="car_describe" class="form-control"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="car_detail_describe" class="form-label">Mô tả chi tiết</label>
                            <textarea type="text" name="car_detail_describe" id="car_detail_describe" class="form-control"></textarea>
                        </div>


                        <div class="form-group mt-3">
                            <label for="car_img_filename" class="form-label">Hình ảnh sản phẩm</label>
                            <input type="file" name="car_img_filename[]" id="car_img_filename" class="form-control" multiple />
                        </div>

                        <div class="container text-center">
                            <div id="image-preview-container" class="form-group mt-3">
                                <img src="/car-shop/assets/imgs/no-img.jpg" alt="no-img" id="preview-img" class="preview-img" />
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-start mb-3">
                            <button type="submit" name="btnAdd" id="liveAlertBtn" class="btn btn-primary disabled btn-add">Thêm</button>
                            <button type="button" id="backToTop" class="btn btn-secondary ms-auto me-3">Lên đầu trang</button>
                            <button type="button" class="btn btn-danger btn-go-back">Quay lại</button>
                        </div>

                        <div class="modal fade" id="goBackModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận quay lại</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Dữ liệu đã được điền sẽ mất. Bạn thật sự muốn quay lại danh sách chứ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" name="btnGoBack" class="btn btn-danger btn-go-back__confirm">Quay lại</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Chờ đã..</button>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                    const image = document.createElement('img');
                    image.src = e.target.result;
                    image.classList.add('preview-img');
                    imagePreviewContainer.appendChild(image);
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


        const formAdd = document.getElementById('formAdd');
        const btnAdd = document.querySelector('.btn-add');
        const btnGoBack = document.querySelector('.btn-go-back');
        const btnGoBackHeader = document.querySelector('.btn-go-back-header');
        const btnGoBackConfirm = document.querySelector('.btn-go-back__confirm');
        // Tạo một biến để theo dõi trạng thái sự thay đổi
        let formChanged = false;

        // Bắt đầu theo dõi sự thay đổi trên các trường input
        formAdd.addEventListener('change', () => {
            changeAttributeHandler();
        });

        // Bắt đầu theo dõi sự thay đổi trên trường CKEDITOR
        CKEDITOR.instances.car_detail_describe.on('change', function() {
            changeAttributeHandler();
        });

        // -------------- Nút "Quay lại" ------------------
        btnGoBack.addEventListener("click", () => {
            if (!formChanged) {
                window.location.href = "/car-shop/admin/product";
            }
        });

        // -------------- Nút xác nhận "Quay lại" ------------------
        btnGoBackConfirm.addEventListener("click", () => {
            window.location.href = "/car-shop/admin/product";
        });

        // -------------- Nút "Trở về đầu trang" ------------------
        document.getElementById("backToTop").addEventListener("click", function(event) {
            window.scrollTo({
                top: 0,
                behavior: "smooth" // Cuộn mượt
            });
        });


        const goBackModal = new bootstrap.Modal(document.getElementById('goBackModal'));

        // Bắt sự kiện beforeunload để hiển thị thông báo xác nhận
        window.addEventListener("beforeunload", function(e) {
            if (formChanged) {
                // Hiển thị thông báo xác nhận
                var confirmationMessage = "Bạn có chắc chắn muốn rời khỏi trang? Dữ liệu bạn đã nhập có thể không được lưu lại.";

                // Thêm thông báo vào sự kiện
                // e.returnValue = confirmationMessage;

                // Trả về thông báo để hiển thị trong trình duyệt
                // return confirmationMessage;
                // $('#goBackModal').modal('show');
                goBackModal.show();
                // Ngăn trình duyệt hiển thị thông báo mặc định
                e.preventDefault();


                // Thêm sự kiện cho nút "Xác Nhận" trong modal
                // document.getElementById('confirmLeave').addEventListener('click', function() {
                //     // Đặt lại biến isDataChanged thành false để cho phép rời khỏi trang
                //     isDataChanged = false;
                //     // Đóng modal
                //     $('#confirmationModal').modal('hide');
                //     // Rời khỏi trang
                //     window.location.href = 'https://google.com'; // Thay đổi URL tùy ý
                // });
            }
        });

        function changeAttributeHandler() {
            formChanged = true;
            btnAdd.classList.remove('disabled');
            btnGoBack.setAttribute("data-bs-target", "#goBackModal");
            btnGoBack.setAttribute("data-bs-toggle", "modal");
            // btnGoBackHeader.setAttribute("data-bs-target", "#goBackModal");
            // btnGoBackHeader.setAttribute("data-bs-toggle", "modal");
        };

        // Validation
        $(function() {
            $('#formAdd').validate({
                errorClass: "is-invalid",
                errorPlacement: function(error, element) {},
                rules: {
                    car_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
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
                },
            });
        });
    </script>

</body>

</html>