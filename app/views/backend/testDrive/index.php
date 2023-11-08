<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php'; ?>
    <?php include_once __DIR__ . '/../../resources/layouts/sideBarStyle.php'; ?>
    <?php include_once __DIR__ . '/../../resources/layouts/footerStyles.php'; ?>
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

            <div class="col-9 position-relative">
                <nav class="navbar mb-4 shadow sticky-top rounded-3 toolbar-custom">
                    <div class="container-fluid justify-content-start">
                        <span class="fs-5"><b>Danh sách lái thử</b></span>
                        <button type="button" class="btn btn-sm btn-primary ms-auto btn-add" data-bs-toggle="modal" data-bs-target="#contactModal">
                            Liên hệ hỗ trợ
                        </button>
                    </div>
                </nav>

                <div id="spinner" class="spinner-border position-absolute spinner-custom" role="status"></div>

                <div id="container-danhsach" class="p-2 invisible">
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
                            <?php foreach ($data_user_test_drive as $data) : ?>
                                <tr>
                                    <td class="text-end"><?= $data['user_test_drive_id'] ?></td>
                                    <td><?= $data['user_test_drive_fullname'] ?></td>
                                    <td><?= $data['car_name'] ?></td>
                                    <td><?= $data['user_test_drive_day'] ?></td>
                                    <td><?= $data['user_test_drive_time'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="contactModalLabel">Liên hệ hỗ trợ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>Nếu bạn cần sự trợ giúp, hãy liên hệ với chúng tôi qua các phương thức: </div>
                    <div class="mt-2">Điện thoại:<b> 0123456789</b></div>
                    <div>Email: <b>carshop.support@carshop.com.vn</b></div>
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
                    [3, "desc"]
                ],
                pageLength: 50,
                language: {
                    url: '/car-shop/assets/plugin/datatables-language/vi.json',
                },
            });
        });

        // ----------------------- Loadings ------------------------------
        const danhSach = document.getElementById('container-danhsach');
        const spinner = document.getElementById('spinner');

        setTimeout(function() {
            danhSach.classList.remove('invisible');
            spinner.classList.add('invisible');
        }, 200)
    </script>

</body>

</html>