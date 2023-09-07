<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'app/views/resources/css/styles.php' ?>
    <link href="./productPageStyle.css" rel="stylesheet" type="text/css" />
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
                            <a href="./" class="nav-link sidebar-item active">
                                <i class="bi bi-grid me-2"></i>
                                Quản lý sản phẩm
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link sidebar-item">
                                <i class="bi bi-person me-2"></i>
                                Quản lý khách hàng
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link sidebar-item">
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

                <nav class="navbar navbar-light bg-light rounded-3 mb-4">
                    <form class="container-fluid justify-content-start">
                        <a href="./add">
                            <button class="btn btn-sm btn-outline-secondary me-2" type="button">
                                <i class="bi bi-plus-circle"></i>
                                Thêm
                            </button>
                        </a>
                        <a href="./product/edit">
                            <button class="btn btn-sm btn-outline-secondary me-2" type="button">
                                <i class="bi bi-pencil"></i>
                                Sửa
                            </button>
                        </a>
                        <button class="btn btn-sm btn-outline-danger" type="button"><i class="bi bi-trash"></i> Xoá</button>
                    </form>
                </nav>

                <table id="danhsach" class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th><input id="checkbox-all" class="form-check-input" type="checkbox" value=""></th>
                            <th>Mã</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Mô tả ngắn</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data_cars as $value) { ?>
                            <tr name="carsID">
                                <td><input class="form-check-input" type="checkbox" value=""></td>
                                <td><?= $value['car_id'] ?></td>
                                <td><?= $value['car_name'] ?></td>
                                <td><?= number_format($value['car_price'], 0, '.', '.') . ' đ<br/>' ?></td>
                                <td><?= $value['sp_mota_ngan'] ?></td>
                                <td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <?php
    include_once 'app/views/resources/script/script.php';
    ?>

    <script>
        var checkboxAll = document.getElementById('checkbox-all');
        var carItemCheckboxNodelist = document.querySelectorAll("tr[name='carsID']");
        // Spread operator
        var carItemCheckbox = [...carItemCheckboxNodelist];

        carItemCheckboxNodelist.forEach(function(tr) {
            tr.addEventListener('click', function(event) {
                var target = event.target;
                if (!target.matches("input[type='checkbox']")) {
                    this.querySelectorAll("input[type='checkbox']").forEach(function(checkbox) {
                        checkbox.checked = !checkbox.checked;
                    });
                    console.log(tr);
                }
                var isNotCheckedAll = carItemCheckbox.some(x => x.querySelector("input[type='checkbox']").checked === false);
                checkboxAll.checked = !isNotCheckedAll;
            });
        });

        checkboxAll.addEventListener('change', function(event) {
            var isCheckedAll = this.checked;
            carItemCheckbox.forEach((x) => {
                const checkbox = x.querySelector("input[type='checkbox']");
                checkbox.checked = isCheckedAll;
            });
        });
    </script>

</body>

</html>