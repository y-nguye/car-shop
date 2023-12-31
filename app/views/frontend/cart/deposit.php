<?php get_header('Yêu cầu đặt cọc', 'cart/cartPagesStyles', $this); ?>

<div id="overlay"></div>

<div class="container-lg pt-3 push-footer-down-page">
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">Thông tin khách hàng đặt cọc</h2>
        <div id="spinner" class="spinner-border visually-hidden" role="status"></div>
    </div>

    <hr>

    <div class="row">

        <div class="col-md-8 d-flex flex-column align-items-center">
            <a href="<?= BASE_URL ?>/product/<?= $data_car['car_id'] ?>" class="text-center w-100">
                <?php if ($data_car['car_img_filename'] && file_exists(__DIR__ . '/../../../../assets/uploads/' . $data_car['car_img_filename'])) : ?>
                    <img src="<?= BASE_URL ?>/assets/uploads/<?= $data_car['car_img_filename'] ?>" class="img-car-on-pay" alt="img-car-on-pay">
                <?php else : ?>
                    <img src="<?= BASE_URL ?>/assets/imgs/no-img.jpg" class="rounded-3 img-car-on-pay" alt="img-car-on-pay">
                <?php endif; ?>
            </a>
            <h1 class="mt-4"><?= $data_car['car_name'] ?></h1>
            <span class="text-center fs-4"><?= $data_car['car_describe'] ?></span>
        </div>

        <div class="col-md-4">

            <form name="formDeposit" id="formDeposit" method="post" action="<?= BASE_URL ?>/cart/deposit/deposit-required">
                <div id="liveAlertPlaceholder" class="text-start"></div>

                <div class="pt-2">
                    <label for="user_fullname">Họ và tên</label>
                    <?php if ($data_user_fullname) : ?>
                        <input type="text" name="user_fullname" id="user_fullname" class="form-control mt-2" value="<?= $data_user_fullname ?>" readonly />
                    <?php else : ?>
                        <input type="text" name="user_fullname" id="user_fullname" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                    <?php endif; ?>
                </div>

                <div class="pt-2 mt-2">
                    <label for="user_tel">Số điện thoại</label>
                    <?php if ($data_user_tel) : ?>
                        <input type="text" name="user_tel" id="user_tel" class="form-control mt-2" value="<?= $data_user_tel ?>" readonly />
                    <?php else : ?>
                        <input type="text" name="user_tel" id="user_tel" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                    <?php endif; ?>
                </div>

                <div class="pt-2 mt-2">
                    <label for="user_email">Email</label>
                    <?php if ($data_user_email) : ?>
                        <input type="email" name="user_email" id="user_email" class="form-control mt-2" value="<?= $data_user_email ?>" readonly />
                    <?php else : ?>
                        <input type="email" name="user_email" id="user_email" class="form-control mt-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" />
                    <?php endif; ?>
                </div>

                <div class="pt-2 mt-2">
                    <label for="user_province_id">Ký hợp đồng tại</label>
                    <select class="form-select mt-2" id="user_province_id" name="user_province_id" readonly>
                        <?php foreach ($data_all_user_province as $data) : ?>
                            <?php if ($data['user_province_id'] == $data_user_province_id) : ?>
                                <option selected value="<?= $data['user_province_id'] ?>">Showroom <?= $data['user_province_name'] ?></option>
                            <?php else : ?>
                                <option value="<?= $data['user_province_id'] ?>">Showroom <?= $data['user_province_name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="pt-2 mt-2">
                    <label class="">Phương thức thanh toán <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-info-circle"></i></a></label>
                    <?php foreach ($data_all_pay_method as $index => $data) : ?>
                        <div class="form-check mt-2">
                            <label class="form-check-label" for="<?= $data['pay_method_id'] ?>" style="user-select: none;">
                                <input class="form-check-input" type="radio" name="pay_method_id" id="<?= $data['pay_method_id'] ?>" value="<?= $data['pay_method_id'] ?>" <?php if ($index == 0) echo "checked" ?>>
                                <?= $data['pay_method_name'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>

                </div>

                <div class="mt-3">
                    <hr>
                    <div class="d-flex align-items-center justify-content-between text-secondary">
                        <h6 class="m-0">Tổng chi phí đã dự tính:</h6>
                        <div class="text-end"><?= number_format($data_car['total_price'], 0, ',', '.') ?> ₫</div>
                    </div>
                </div>
                <div class="pb-2">
                    <div class="pt-3 pb-3 d-flex align-items-center justify-content-between">
                        <h6 class="m-0">Chi phí cọc trước 10%:</h6>
                        <div class="text-end fs-3"><?= number_format($depositPrice, 0, ',', '.') ?> ₫</div>
                    </div>
                </div>

                <input type="hidden" name="car_id" value="<?= $data_car['car_id'] ?>" />
                <input type="hidden" name="user_deposit_total_price" value="<?= $data_car['total_price'] ?>" />
                <input type="hidden" name="user_deposit_price" value="<?= $depositPrice ?>" />

                <div class="d-flex flex-column align-items-center justify-content-between">
                    <button type="submit" name="btnDeposit" id="btn-deposit" class="btn btn-primary w-100">
                        Yêu cầu đặt cọc
                    </button>
                    <a id="btn-back-to-registration-fee" class="mt-3" href="<?= BASE_URL ?>/cart/registration-fee/<?= $car_id ?>">Quay về tính toán</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">THÔNG TIN VỀ THANH TOÁN</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <b>I. MUA XE TRẢ THẲNG</b> <br />
                <b>1.</b> Bên mua thanh toán cho Bên bán làm 02 đợt cụ thể như sau: <br />
                - Lần 1: Bên mua đặt cọc cho bên bán số tiền 10% giá trị của xe và ký hợp đồng mua bán xe với bên bán và thanh toán số tiền còn lại trong vòng 5 ngày kể từ ngày ký hợp đồng.<br />
                - Lần 2: Bên mua thanh toán số tiền còn lại của hợp đồng trước khi Bên bán bàn giao xe và đầy đủ hồ sơ xe.<br />
                <b>2.</b> Bên mua thanh toán cho Bên bán bằng đồng Việt Nam theo hình thức tiền mặt hoặc chuyển khoản vào tài khoản của Bên mua (tùy theo thỏa thuận của các bên).<br />
                <b>3.</b> Trong trường hợp thanh toán bằng tiền mặt, việc thanh toán phải thực hiện trực tiếp tại phòng thu ngân của Bên bán. Bên bán phải xuất Phiếu thu tiền mặt, trong đó ghi rõ số tiền Bên mua thanh toán và có đầy đủ chữ ký của người có thẩm quyền của bên bán.<br /><br />
                <b>II. MUA XE TRẢ GÓP</b> <br />
                Bên Mua thanh toán thành 3 đợt như sau:<br />
                <b>Đợt 1:</b> Bên mua đặt cọc cho Bên bán số tiền 10% ngay sau khi ký hợp đồng. Trong 5 ngày nếu bên bán không nhận được giấy bảo lãnh cho vay của ngân hàng thì bên bán có quyền chấm dứt hợp đồng và bán chiếc xe đó cho khách hàng khác.<br />

                <b>Đợt 2:</b> Bên mua thanh toán phần đối ứng cho Bên bán (đã bao gồm tiền đặt cọc) ngay sau khi nhận giấy bảo lãnh chấp nhận cho vay của Ngân hàng. Lúc đó bên bán sẽ làm thủ tục đăng ký xe.<br />
                Sau khi đăng ký xe với tên chủ sở hữu Bên mua, vì bất cứ lý do gì mà Bên mua không ký nhận nợ và làm các thủ tục cần thiết với ngân hàng để ngân hàng thanh toán cho Bên bán số tiền Ngân hàng đã cam kết thì Bên mua có trách nhiệm:<br />

                - Thanh toán cho Bên bán số tiền còn thiếu, hoặc chuyển quyền sở hữu cho bên thứ 3 trong thời gian sớm nhất nhưng không được quá 5 ngày kể từ ngày đăng ký xe. Bên mua chỉ bàn giao xe sau khi đã nhận đủ 100% giá trị hợp đồng.<br />

                - Bên mua sẽ phải thanh toán mọi khoản chi phí phát sinh như: tiền lãi tính theo lãi vay Ngân hàng của số tiền ngân hàng đã cam kết, tiền thuê chỗ trông giữ, bảo quản xe, thuế trước bạ, lệ phí đăng ký xe, lệ phí công chứng và các khoản chi phí khác,…. Đồng thời Bên mua cũng phải chịu khoản chênh lệch giữa giá trị hợp đồng ban đầu và giá trị hợp đồng giữa Bên bán với Bên thứ ba (đơn vị mua mới)<br />

                <b>Đợt 3:</b> Số tiền còn lại của hợp đồng là số tiền Ngân hàng chấp thuận cho Bên mua vay sẽ được Ngân hàng thanh toán trước khi Bên bán bàn giao xe cùng toàn bộ giấy tờ xe đã đăng ký.<br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<?php
include_once __DIR__ . '/../../resources/layouts/footer.php';
?>

<script>
    const overlay = document.getElementById('overlay');
    const spinner = document.getElementById('spinner');
    const userFullname = document.getElementById('user_fullname');
    const userTel = document.getElementById('user_tel');
    const btnDeposit = document.getElementById('btn-deposit');
    const btnBackToRegistrationFee = document.getElementById('btn-back-to-registration-fee');

    $(document).ready(function() {
        $('#formDeposit').validate({
            errorClass: "is-invalid",
            errorPlacement: function(error, element) {
                element.attr("data-bs-original-title", error.text());
            },
            success: function(element) {
                element.removeAttr("data-bs-original-title");
            },
            submitHandler: function(form) {
                preventOperation();
                form.submit();
            },
            rules: {
                user_fullname: {
                    required: true,
                    minlength: 3,
                    maxlength: 50,
                },
                user_tel: {
                    required: true,
                    minlength: 10,
                    maxlength: 15,
                },
                user_email: {
                    required: true,
                    email: true,
                    maxlength: 100,
                },
            },
            messages: {
                user_fullname: {
                    required: "Không được để trống",
                    minlength: "Tên quá ngắn",
                    maxlength: "Tên quá dài",
                },
                user_tel: {
                    required: "Không được để trống",
                    minlength: "Số điện thoại không hợp lệ",
                    maxlength: "Số điện thoại không hợp lệ",
                },
                user_email: {
                    required: "Không được để trống",
                    email: "Vui lòng nhập đúng định dạng email",
                    maxlength: "Email quá dài",
                },
            }
        });
    });

    function preventOperation() {
        spinner.classList.remove("visually-hidden");
        overlay.classList.add("overlay");

        userFullname.setAttribute("readonly", "");
        userTel.setAttribute("readonly", "");

        btnDeposit.classList.add("disabled");
        btnBackToRegistrationFee.classList.add("disabled-btn-back-to-registration-fee__pay-page");
    }

    // -------------- Alert hiển thị khi bị lỗi thêm dữ liệu ------------------
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder');

    function showAlert(message, type) {
        var wrapper = document.createElement('div');
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        alertPlaceholder.appendChild(wrapper);
    }
</script>

</body>

</html>