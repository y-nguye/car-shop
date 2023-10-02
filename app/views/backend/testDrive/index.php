<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/styles/styles.php'; ?>
    <?php include_once __DIR__ . '/testDrivePageStyle.php'; ?>
    <title>Danh sách lái thử</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">
                <?php
                $item_select = "test-drive";
                include_once __DIR__ . '/../../resources/layouts/sidebar.php';
                ?>
            </div>

            <div class="col-9">
                <nav class="navbar mb-4 shadow-sm sticky-top rounded-3 toolbar-custom">
                    <div class="container-fluid justify-content-start">
                        <span class="fs-5"><b>Danh sách lái thử</b></span>
                        <button type="button" class="btn btn-sm btn-primary ms-auto btn-add" href="/car-shop/admin">
                            <i class="bi bi-telephone"></i>
                            Liên hệ
                        </button>
                    </div>
                </nav>

                <div class="p-2">
                    <table id="danhsach" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Tên khách hàng</th>
                                <th>Tên xe</th>
                                <th>Ngày dự kiến</th>
                                <th>Thời gian dự kiến</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data_user_test_drive as $value) : ?>
                                <tr>
                                    <td><?= $value['user_test_drive_id'] ?></td>
                                    <td><?= $value['user_test_drive_fullname'] ?></td>
                                    <td><?= $value['car_name'] ?></td>
                                    <td><?= $value['user_test_drive_day'] ?></td>
                                    <td><?= $value['user_test_drive_time'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
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
        $(function() {
            $('#danhsach').DataTable({
                searching: true,
                order: [
                    [3, "desc"]
                ],
                pageLength: 50,
                language: {
                    url: '/car-shop/assets/plugin/datatables-language/vi.json',
                },
            });
        });
    </script>

</body>

</html>