<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/styles/styles.php' ?>
    <?php include_once 'app/views/backend/deposit/depositPagesStyle.php'; ?>
    <title>Danh sách đơn hàng</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">
                <?php
                $item_select = "deposit";
                include_once 'app/views/backend/layout/sidebar.php';
                ?>
            </div>

            <div class="col-9">
                <nav class="navbar mb-4 shadow-sm sticky-top rounded-3 toolbar-custom">
                    <div class="container-fluid justify-content-start">
                        <span class="fs-5"><b>Các đơn yêu cầu</b></span>
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
                                <th>Mã xe</th>
                                <th>Phí đặt cọc</th>
                                <th>Liên hệ</th>
                                <th>Thanh toán</th>
                                <th class="text-center">Xem</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data_user_deposit as $value) { ?>
                                <tr class="car_item_row">
                                    <td class="text-center">
                                        <?= $value['user_deposit_id'] ?>
                                        <input type="hidden" name="user_deposit_id" value="<?= $value['user_deposit_id'] ?>" data-user_deposit_id="<?= $value['user_deposit_id'] ?>">
                                    </td>
                                    <td><?= $value['user_deposit_fullname'] ?></td>
                                    <td class="text-center"><?= $value['car_id'] ?></td>
                                    <td class="text-end"><?= number_format($value['user_deposit_price'], 0, '.', '.') . ' đ<br/>' ?></td>
                                    <td class="text-center"><?php if ($value['user_deposit_is_contacted']) echo "✅";
                                                            else echo "❌"; ?>
                                    </td>
                                    <td class="text-center"><?php if ($value['user_deposit_is_payed']) echo "✅";
                                                            else echo "❌"; ?></td>
                                    <td class="text-center">

                                        <a href="/car-shop/admin/deposit/see-more/<?= $value['user_deposit_id'] ?>" class="p-2"><i class="bi bi-eye"></i></a>

                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php
    include_once 'app/views/frontend/layouts/footer.php';
    ?>

    <?php
    include_once 'app/views/resources/script/script.php';
    ?>

    <script>
        $(function() {
            $('#danhsach').DataTable({
                searching: true,
                columnDefs: [{
                    targets: [6],
                    orderable: false,
                    searchable: false
                }],
                language: {
                    url: '/car-shop/assets/plugin/datatables-language/vi.json',
                },
            });
        });
    </script>

</body>

</html>