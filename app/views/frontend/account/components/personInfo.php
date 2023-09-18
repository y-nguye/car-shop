<?php
$user_info = [
    ['Tên đầy đủ', '<i class="bi bi-person text-primary fs-4"></i>', 'user_fullname', $data_user['user_fullname']],
    ['Địa chỉ', '<i class="bi bi-geo-alt text-primary fs-4"></i>', 'user_address', $data_user['user_address']],
    ['Số điện thoại', '<i class="bi bi-telephone text-primary fs-4"></i>', 'user_tel', $data_user['user_tel']],
];
?>

<h3 class="ms-3">Thông tin cá nhân</h3>
<div class="ms-3 mb-3">
    <span>Quản lý thông tin cá nhân của bạn, bao gồm số điện thoại và địa chỉ email mà chúng tôi có thể sử dụng để liên hệ với bạn.</span>
</div>
<form name="editForm" class="edit-form" method="post" action="/car-shop/account/edit-person-info">
    <div class="d-flex flex-wrap">
        <?php foreach ($user_info as $i => $data) { ?>
            <div class="col-6">
                <div class="m-3 bg-light shadow-sm rounded card-custom" style="aspect-ratio: 4/1;">
                    <div class="rounded-3 p-3 pt-2 text-dark">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="text-dark m-0"><?= $user_info[$i][0] ?></h5>
                            <?= $user_info[$i][1] ?>
                        </div>
                        <input type="text" name="<?= $user_info[$i][2] ?>" class="form-control mt-3" value="<?= $user_info[$i][3] ?>" />
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="d-flex align-items-center justify-content-end">
        <button type="submit" name="btnEdit" class="btn btn-primary align-self-end mt-3 me-3 btn-update">Cập nhật</button>
    </div>
</form>