<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'app/views/resources/css/styles.php' ?>
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">

                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light rounded-3 custom-sidebar">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <i class="bi bi-car-front-fill fs-4 ms-2 me-2"></i><span class="fs-4">Admin</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="../" class="nav-link sidebar-item">
                                <i class=" bi bi-house-door me-2"></i>
                                Trang chủ
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link sidebar-item">
                                <i class="bi bi-person me-2"></i>
                                Quản lý khách hàng
                            </a>
                        </li>
                        <li>
                            <a href="/car-shop/admin/product" class="nav-link sidebar-item">
                                <i class="bi bi-grid me-2"></i>
                                Quản lý sản phẩm
                            </a>
                        </li>

                        <li>
                            <a href="/car-shop/admin/product/trash" class="nav-link sidebar-item active">
                                <i class="bi bi-trash me-2"></i>
                                Thùng rác
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>mdo</strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-9">

                <form name="formCarTrash" method="post" action="">
                    <nav class="navbar navbar-light bg-light rounded-3 mb-4">
                        <div class="container-fluid justify-content-start">

                            <span class="fs-5"><b>Sản phẩm đã xoá</b></span>

                            <button name="btnRestore" class="btn btn-sm btn-outline-secondary ms-auto me-2 btn-restore disabled">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                Khôi phục
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-danger btn-delete disabled" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </nav>

                    <div class="container-fluid">
                        <table id="danhsach" class="table table-hover table-striped table-bordered">
                            <thead class="table-header-custom">
                                <tr>
                                    <th class="text-center"><input id="checkbox-all" class="form-check-input" type="checkbox" value="" /></th>
                                    <th>Mã</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Ngày xoá</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($data_cars as $value) { ?>
                                    <tr name="car_item_row">
                                        <td class="text-center" name="checkbox-td"><input class="form-check-input" type="checkbox" name="car_ids[]" value="<?= $value['car_id'] ?>" data-car_id="<?= $value['car_id'] ?>"></td>
                                        <td><?= $value['car_id'] ?></td>
                                        <td><?= $value['car_name'] ?></td>
                                        <td><?= number_format($value['car_price'], 0, '.', '.') . ' đ<br/>' ?></td>
                                        <td><?= $value['car_quantity'] ?></td>
                                        <td><?= $value['car_deleted_day'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot></tfoot>
                        </table>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xoá</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Điều này là không thể khôi phục dữ liệu
                                    </div>
                                    <div class="modal-footer">
                                        <button name="btnForceDelete" class="btn btn-danger btn-force-delete__confirm">Xoá vĩnh viễn</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    </div>
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
                }]
            });
        });

        var restoreCarsForm = document.forms['formCarTrash'];
        const btnRestore = document.querySelector('.btn-restore');
        const btnDelete = document.querySelector('.btn-delete');
        const btnForceDelete = document.querySelector('.btn-force-delete__confirm');
        const checkboxAll = document.getElementById('checkbox-all');
        const carItemCheckboxNodelist = document.querySelectorAll("tr[name='car_item_row']");
        const carItemCheckbox = [...carItemCheckboxNodelist]; // Spread operator
        const checkboxTd = document.querySelectorAll("td[name='checkbox-td']");

        // ----------------------------- Xử lý các sự kiện Button -----------------------------------

        btnRestore.addEventListener('click', function() {
            restoreCarsForm.action = '/car-shop/admin/product/trash/restore';
            restoreCarsForm.submit();
        });

        btnForceDelete.addEventListener('click', function() {
            restoreCarsForm.action = '/car-shop/admin/product/trash/force-delete';
            restoreCarsForm.submit();
        });

        // ----------------------------- Xử lý các sự kiện checkbox -----------------------------------

        checkboxAll.addEventListener('change', function() {
            var isCheckedAll = this.checked;
            carItemCheckbox.forEach((x) => {
                const checkbox = x.querySelector("input[name='car_ids[]']");
                checkbox.checked = isCheckedAll;
            });
            toolBarActiveByCheckbox();
        });

        checkboxTd.forEach((x) => {
            x.addEventListener('click', function(e) {
                var target = e.target;
                if (!target.matches("input[name='car_ids[]']")) {
                    const checkbox = this.querySelector("input[name='car_ids[]']");
                    checkbox.checked = !checkbox.checked;
                }

            })
        });

        carItemCheckbox.forEach(function(tr) {
            tr.addEventListener('click', function(e) {
                var target = e.target;

                if (!target.matches("input[name='car_ids[]']") && !target.matches("td[name='checkbox-td']")) {
                    const checkbox = this.querySelector("input[name='car_ids[]']");
                    const checkboxItems = document.querySelectorAll("input[name='car_ids[]']:checked");
                    checkboxItems.forEach(x => x.checked = false);
                    checkbox.checked = !checkbox.checked;
                }

                var isNotCheckedAll = carItemCheckbox.some((x) => {
                    return x.querySelector("input[name='car_ids[]']").checked === false;
                });

                checkboxAll.checked = !isNotCheckedAll;
                toolBarActiveByCheckbox();
            });
        });

        function toolBarActiveByCheckbox() {
            const checkboxItem = document.querySelectorAll("input[name='car_ids[]']:checked");
            if (checkboxItem.length == 0) {
                btnRestore.classList.add('disabled');
                btnDelete.classList.add('disabled');
            } else {
                btnRestore.classList.remove('disabled');
                btnDelete.classList.remove('disabled');
            }
        }
    </script>

</body>

</html>