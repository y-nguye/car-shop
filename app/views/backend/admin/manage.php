<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once __DIR__ . '/../../resources/globalStyles/globalStyles.php'; ?>
    <?php include_once __DIR__ . '/../../resources/layouts/sideBarStyle.php'; ?>
    <?php include_once __DIR__ . '/../../resources/layouts/footerStyles.php'; ?>
    <?php include_once __DIR__ . '/adminPageStyles.php'; ?>
    <title>Quản lý Admin</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">
                <?php
                $item_select = "admin";
                include_once __DIR__ . '/../../resources/layouts/sidebar.php';
                ?>
            </div>

            <div class="col-9">
                <form id="formAdmin" method="post" action="">
                    <nav class="navbar mb-4 shadow sticky-top rounded-3 toolbar-custom">
                        <div class="container-fluid ps-2">
                            <button type="button" class="btn btn-sm btn-go-back-header">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                            <span class="fs-5 ms-2"><b>Quản lý Admin</b></span>
                            <button type="submit" name="btn-save" class="btn btn-sm btn-outline-secondary ms-auto me-2 disabled btn-save">
                                <i class="bi bi-floppy"></i>
                                Lưu
                            </button>
                        </div>
                    </nav>

                    <div class="mt-5">
                        <table id="danhsach" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tên tài khoản</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th class="text-center">Admin</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($data_user as $data) : ?>
                                    <!-- Không in tài khoản đang đăng nhập vào danh sách -->
                                    <?php if ($data['user_username'] == $_SESSION['user_username']) : ?>
                                        <?php continue; ?>
                                    <?php endif; ?>
                                    <tr>
                                        <td class="text-end"><?= $data['user_id'] ?></td>
                                        <td><?= $data['user_fullname'] ?></td>
                                        <td><?= $data['user_username'] ?></td>
                                        <td class="text-end"><?= $data['user_tel'] ?></td>
                                        <td><?= $data['user_email'] ?></td>
                                        <td class="text-center">
                                            <input type="checkbox" class="form-check-input" name="user_ids[]" value="<?= $data['user_id'] ?>" <?php if ($data['user_is_admin']) echo 'checked'; ?>>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Tài khoản đang thao tác luôn được chọn và có dữ liệu-->
                    <input type="hidden" name="user_ids[]" value="<?= $_SESSION['user_id'] ?>">
                </form>
            </div>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/../../resources/layouts/footer.php';
    ?>

    <script>
        $(function() {
            $('#danhsach').DataTable({
                language: {
                    url: '/car-shop/assets/plugin/datatables-language/vi.json',
                },
            });
        });

        const formAdmin = document.getElementById('formAdmin');
        const btnGoBackHeader = document.querySelector('.btn-go-back-header');
        const btnSave = document.querySelector('.btn-save');

        btnGoBackHeader.addEventListener("click", () => {
            window.location.href = "/car-shop/admin";
        });

        formAdmin.addEventListener('change', () => {
            formChanged = true;
            btnSave.classList.remove('disabled');
        });
    </script>

</body>

</html>