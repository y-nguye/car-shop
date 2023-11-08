<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php'; ?>
    <?php include_once __DIR__ . '/../../resources/layouts/sideBarStyle.php'; ?>
    <?php include_once __DIR__ . '/../../resources/layouts/footerStyles.php'; ?>
    <?php include_once __DIR__ . '/productPagesStyles.php'; ?>
    <title>Thêm hãng xe</title>
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

                <nav class="navbar mb-4 shadow sticky-top rounded-3 toolbar-custom">
                    <div class="container-fluid d-flex justify-content-start ps-2">
                        <button type="button" class="btn btn-sm btn-go-back-header">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <span class="fs-5 ms-2"><b>Thêm hãng sản xuất</b></span>
                        <button type="button" class="btn btn-sm btn-outline-danger ms-auto btn-delete disabled" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </nav>


                <div class="p-2">


                    <form id="formAddProducer" name="formAddProducer" method="post" action="">
                        <div class="row">
                            <div class="col-5">

                                <div class="form-group mb-3">
                                    <label for="car_producer_name" class="form-label">Tên hãng</label>
                                    <input type="text" name="car_producer_name" id="car_producer_name" class="form-control remove-space-first" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                                </div>
                                <div class="d-flex justify-content-start mb-3">
                                    <button type="submit" name="btnAddProducer" id="liveAlertBtn" class="btn btn-primary ms-auto disabled btn-add-car-producer">Thêm</button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xoá</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn thật sự muốn xoá chứ? Dữ liệu sẽ không thể khôi phục
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="btnDeleteProducer" class="btn btn-danger btn-delete__confirm">Xoá</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="liveAlertPlaceholder"></div>
                            </div>

                            <div class="col-7">
                                <div class="form-group mb-3">
                                    <label class="form-label"><b>Danh sách hãng đã thêm</b></label>
                                    <table id="danhsach" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="max-width: 30px"><input id="checkbox-all" class="form-check-input" type="checkbox" value="" /></th>
                                                <th>Mã</th>
                                                <th>Tên hãng</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($data_all_car_producer as $data) { ?>
                                                <tr class="car_producer_item_row">
                                                    <td name="checkbox-td" class="text-center"><input class="form-check-input" type="checkbox" name="car_producer_ids[]" value="<?= $data['car_producer_id'] ?>"></td>
                                                    <td><?= $data['car_producer_id'] ?></td>
                                                    <td><?= $data['car_producer_name'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/../../resources/layouts/footer.php';
    ?>

    <script>
        $(function() {
            $('#danhsach').DataTable({
                searching: true,
                order: [
                    [1, "asc"]
                ],
                columnDefs: [{
                    targets: [0],
                    orderable: false,
                    searchable: false
                }],
                language: {
                    url: '/car-shop/assets/plugin/datatables-language/vi.json',
                },
            });
        });

        // -------------- Alert hiển thị khi bị lỗi thêm dữ liệu ------------------
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder');

        function showAlert(message, type) {
            var wrapper = document.createElement('div');
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            alertPlaceholder.appendChild(wrapper);
        }

        const formAddProducer = document.getElementById('formAddProducer');
        const inputCarProducerName = document.getElementById('car_producer_name');
        const btnAddProducer = document.querySelector('.btn-add-car-producer');
        const btnGoBackHeader = document.querySelector('.btn-go-back-header');

        // Bắt đầu theo dõi sự thay đổi trên các trường input
        inputCarProducerName.addEventListener('change', function() {
            if (this.value) btnAddProducer.classList.remove('disabled')
            else btnAddProducer.classList.add('disabled');
        });

        // -------------- Nút "Quay lại" ------------------
        btnGoBackHeader.addEventListener("click", () => {
            // window.history.back();
            window.location.href = pathname;
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

        // ---------------------------------------------------------------------

        const btnDelete = document.querySelector('.btn-delete');
        const btnDeleteConfrim = document.querySelector('.btn-delete__confirm');
        const checkboxAll = document.getElementById('checkbox-all');
        const checkboxTd = document.querySelectorAll("td[name='checkbox-td']");
        const checkboxItemsNodelist = document.querySelectorAll('.car_producer_item_row');
        const checkboxItems = [...checkboxItemsNodelist]; // Spread operator

        // // -------------- Nút "Xác nhận xoá" ------------------
        // btnDeleteConfrim.addEventListener('click', () => {
        //     carsForm.action = '/car-shop/admin/product/delete';
        //     carsForm.submit();
        // });

        // ----------------------------- Xử lý các sự kiện checkbox -----------------------------------
        checkboxAll.addEventListener('change', function() {
            var isCheckedAll = this.checked;
            checkboxItems.forEach((x) => {
                const checkbox = x.querySelector("input[name='car_producer_ids[]']");
                checkbox.checked = isCheckedAll;
            });
            activeRowBackground();
            buttonOnToolBarActiveByCheckbox();
        });

        checkboxItems.forEach(function(rowListItem) {
            rowListItem.addEventListener('click', function(e) {
                var target = e.target;

                // Loại bỏ xung đột khi click vào thẻ input
                if (!target.matches("input[name='car_producer_ids[]']") && !target.matches("td[name='checkbox-td']")) {
                    const checkbox = this.querySelector("input[name='car_producer_ids[]']");
                    const checkboxItemsChecked = document.querySelectorAll("input[name='car_producer_ids[]']:checked");
                    checkboxItemsChecked.forEach(x => x.checked = false);
                    checkbox.checked = !checkbox.checked;
                    checkboxItemsChecked.forEach(x => x.closest("tr").classList.remove("table-active"));
                }

                var isNotCheckedAll = checkboxItems.some((x) => {
                    return x.querySelector("input[name='car_producer_ids[]']").checked === false;
                });

                checkboxAll.checked = !isNotCheckedAll;
                activeRowBackground();
                buttonOnToolBarActiveByCheckbox();
            });
        });

        checkboxTd.forEach(td => {
            td.addEventListener("click", function(e) {
                var target = e.target;
                if (!target.matches("input[name='car_producer_ids[]']")) {
                    const checkbox = this.querySelector("input[name='car_producer_ids[]']");
                    const checkboxItemsChecked = document.querySelectorAll("input[name='car_producer_ids[]']:checked");
                    checkbox.checked = !checkbox.checked;
                    checkboxItemsChecked.forEach(x => x.closest("tr").classList.remove("table-active"));
                }
            });
        })

        function buttonOnToolBarActiveByCheckbox() {
            const checkboxItemsChecked = document.querySelectorAll("input[name='car_producer_ids[]']:checked");
            if (checkboxItemsChecked.length == 0) {
                btnDelete.classList.add('disabled');
            } else {
                btnDelete.classList.remove('disabled');
            }
        }

        function activeRowBackground() {
            const checkboxItemsChecked = document.querySelectorAll("input[name='car_producer_ids[]']:checked");
            checkboxItems.forEach(x => x.closest("tr").classList.remove("table-active"));
            checkboxItemsChecked.forEach(x => x.closest("tr").classList.add("table-active"));
        }


        // ----------------------------- Validate -----------------------------------
        $(document).ready(function() {
            $('#formAddProducer').validate({
                errorClass: "is-invalid",
                errorPlacement: function(error, element) {
                    element.attr("data-bs-original-title", error.text());
                },
                success: function(element) {
                    element.removeAttr("data-bs-original-title");
                },
                rules: {
                    car_producer_name: {
                        maxlength: 100,
                        remote: {
                            url: "/car-shop/admin/product/add-producer-check",
                            type: "post",
                            data: {
                                username: function() {
                                    return $("#car_producer_name").val();
                                }
                            }
                        }
                    },
                },
                messages: {
                    car_producer_name: {
                        maxlength: "Tên hãng quá dài",
                        remote: "Tên hãng đã tồn tại",
                    },
                }
            });
        });
    </script>

</body>

</html>