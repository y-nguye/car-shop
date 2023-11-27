<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php'; ?>
    <?php include_once __DIR__ . '/../../resources/layouts/sideBarStyle.php'; ?>
    <?php include_once __DIR__ . '/../../resources/layouts/footerStyles.php'; ?>
    <?php include_once __DIR__ . '/depositPagesStyles.php'; ?>
    <title>Quản lý đơn đặt cọc</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">
                <?php
                $item_select = "deposit";
                include_once __DIR__ . '/../../resources/layouts/sidebar.php';
                ?>
            </div>

            <div class="col-9 position-relative">
                <nav class="navbar mb-4 shadow sticky-top rounded-3 toolbar-custom">
                    <div class="container-fluid justify-content-start">
                        <span class="fs-5"><b>Danh sách các đơn yêu cầu đặt cọc</b></span>
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
                                <th class="col-w-50px">Mã xe</th>
                                <th>Phí đặt cọc</th>
                                <th class="col-w-50px">Liên hệ</th>
                                <th class="col-w-70px">Thanh toán</th>
                                <th class="text-center col-w-50px">Xem</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data_user_deposit as $data) : ?>
                                <tr class="car_item_row">
                                    <td class="text-end">
                                        <?= $data['user_deposit_id'] ?>
                                        <input type="hidden" name="user_deposit_id" value="<?= $data['user_deposit_id'] ?>" data-user_deposit_id="<?= $data['user_deposit_id'] ?>">
                                    </td>
                                    <td><?= $data['user_deposit_fullname'] ?></td>
                                    <td class="text-end"><?= $data['car_id'] ?></td>
                                    <td class="text-end"><?= number_format($data['user_deposit_price'], 0, '.', '.') . ' đ<br/>' ?></td>
                                    <td class="text-center"><?php if ($data['user_deposit_is_contacted']) echo '<i class="bi bi-check-circle-fill green-check"></i>';
                                                            else echo ''; ?>
                                    </td>
                                    <td class="text-center"><?php if ($data['user_deposit_is_payed']) echo '<i class="bi bi-check-circle-fill green-check"></i>';
                                                            else echo ''; ?></td>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>/admin/deposit/see-more/<?= $data['user_deposit_id'] ?>" class="p-2">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>

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
            var table = $('#danhsach').DataTable({
                searching: true,
                columnDefs: [{
                    targets: [6],
                    orderable: false,
                    searchable: false
                }],
                pageLength: 50,
                language: {
                    url: '<?= BASE_URL ?>/assets/plugin/datatables-language/vi.json',
                },
            });
        });

        const danhSach = document.getElementById('container-danhsach');
        const spinner = document.getElementById('spinner');

        setTimeout(function() {
            danhSach.classList.remove('invisible');
            spinner.classList.add('invisible');
        }, 200)
    </script>

</body>

</html>