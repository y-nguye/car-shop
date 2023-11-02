<?php
require_once __DIR__ . '/AccessController.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class CartController extends AccessController
{
    private $emailSendName = "nhyd23021@cusc.ctu.edu.vn";
    private $emailSendPassword = "nguyeny@cu\$c";

    public function index()
    {
        $cart = [];
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }
        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader();
        include_once __DIR__ . "/../views/frontend/cart/index.php";
    }

    public function delete($vars)
    {
        $car_id = $vars['id'];

        // Không có sản phẩm trong giỏ hàng thì không truy cập được
        if (!isset($_SESSION['cart'][$car_id])) $this->pageNotFound();

        $this->DB['db_user_cart_item']->connect();
        $this->DB['db_user_cart_item']->deleteData($car_id);
        $this->DB['db_user_cart_item']->disconnect();

        unset($_SESSION['cart'][$car_id]);
        echo '<script>location.href = "/car-shop/cart"</script>';
    }

    public function registrationFee($vars)
    {
        $car_id = $vars['id'];

        // Không có sản phẩm trong giỏ hàng thì không truy cập được
        if (!isset($_SESSION['cart'][$car_id])) $this->pageNotFound();

        $this->DB['db_user_province']->connect();
        $data_all_user_province = $this->DB['db_user_province']->getAllData();

        // Lấy dữ liệu xe từ SESSION
        $data_car = $this->getDataCarFromSessionByCarID($car_id);

        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader();
        include_once __DIR__ . "/../views/frontend/cart/registrationFee.php";

        // Hiển thị toast
        if (isset($_SESSION['from-registration-fee']) && $_SESSION['from-registration-fee']) {
            echo '<script>toast.show();</script>';
            unset($_SESSION['from-registration-fee']);
        }
    }

    public function deposit($vars)
    {
        $car_id = $vars['id'];

        // Nếu không có thao tác nhấn nút "tiến hành đặt cọc" và validate không có lỗi thì trở về trang tính toán
        if (!isset($_POST['btnDeposits']) && !isset($_SESSION['errors'])) {
            echo '<script>location.href = "/car-shop/cart/registration-fee/' . $car_id . '"</script>';
            die();
        }

        // Lấy dữ liệu xe từ SESSION
        $data_car = $this->getDataCarFromSessionByCarID($car_id);

        // Nếu có sự thay đổi về tổng chi phí dự toán thì cập nhật lại session
        // Điều này tránh lỗi khi validate có lỗi sẽ quay trở lại trang, khi đó sẽ không có biến $_POST['total_price'] từ form tính tổng dự toán
        if (isset($_POST['total_price'])) {
            $total_price = floatval($_POST['total_price']);

            // Thêm tổng giá vào SESSION
            $data_car = array(
                'car_id' => $data_car['car_id'],
                'car_name' => $data_car['car_name'],
                'car_price' => $data_car['car_price'],
                'car_describe' => $data_car['car_describe'],
                'car_img_filename' => $data_car['car_img_filename'],
                'total_price' => $total_price,
            );

            $_SESSION['cart'][$car_id] = $data_car;
        }

        $data_user_fullname = null;
        $data_user_tel = null;
        $data_user_email = null;
        $data_user_province_id = null;

        if (isset($_SESSION['logged'])) {
            $data_user_fullname = $_SESSION["user_fullname"];
            $data_user_tel = $_SESSION["user_tel"];
            $data_user_email = $_SESSION["user_email"];
            $data_user_province_id = $_SESSION["user_province_id"];
        }

        $this->DB['db_user_province']->connect();
        $this->DB['db_pay_method']->connect();
        $data_all_user_province = $this->DB['db_user_province']->getAllData();
        $data_all_pay_method = $this->DB['db_pay_method']->getAllData();

        $depositPrice = $data_car['total_price'] * 0.1;

        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader();
        include_once __DIR__ . "/../views/frontend/cart/deposit.php";

        // Validate: báo lỗi (Nếu có)
        $this->getErrorsFromSessionAndShowAlert();

        $this->DB['db_user_province']->disconnect();
        $this->DB['db_pay_method']->disconnect();
    }

    public function depositRequired()
    {
        // Tránh truy cập trái phép
        // Nếu không nhấn nút xác nhận đặt cọc thì không vào được
        if (!isset($_POST['btnDeposit'])) $this->pageNotFound();

        $this->DB['db_cars']->connect();
        $this->DB['db_user_province']->connect();
        $this->DB['db_user_deposit']->connect();
        $this->DB['db_pay_method']->connect();

        $car_id = $_POST['car_id'];
        $user_deposit_fullname = $_POST['user_fullname'];
        $user_deposit_tel = $_POST['user_tel'];
        $user_deposit_email = $_POST['user_email'];
        $user_deposit_total_price = $_POST['user_deposit_total_price'];
        $user_deposit_price = $_POST['user_deposit_price'];

        $pay_method_id = $_POST['pay_method_id'];
        $data_pay_method = $this->DB['db_pay_method']->getDataByID($pay_method_id);
        $pay_method_name = $data_pay_method['pay_method_name'];

        $depositInfo = [
            'user_deposit_fullname' => $user_deposit_fullname,
            'user_deposit_tel' => $user_deposit_tel,
            'user_deposit_email' => $user_deposit_email,
            'user_deposit_total_price' => $user_deposit_total_price,
            'user_deposit_price' => $user_deposit_price,
        ];

        $errors = $this->validationSeverSide($depositInfo);

        if (empty($errors)) {
            $user_deposit_where = $this->DB['db_user_province']->getDataByID($_POST['user_province_id']);
            $user_deposit_where = 'Showroom ' . $user_deposit_where["user_province_name"];

            isset($_SESSION['user_id']) ? $user_id = $_SESSION["user_id"] : $user_id = "NULL";

            $this->DB['db_user_deposit']->setData(
                $user_deposit_fullname,
                $user_deposit_tel,
                $user_deposit_email,
                $user_deposit_total_price,
                $user_deposit_price,
                $user_deposit_where,
                $pay_method_id,
                $user_id,
                $car_id
            );

            // Lấy id của đơn đăt cọc vừa thêm
            $user_deposit_id = $this->DB['db_user_deposit']->id;

            // Lấy dữ liệu xe từ SESSION
            $data_car = $this->getDataCarFromSessionByCarID($car_id);

            // Thời gian yêu cầu đặt cọc
            $user_deposit_at = date('d/m/Y');
            // Cộng thêm 5 ngày
            $user_deposit_adding_5_day = $this->addFiveDays($user_deposit_at);

            // Thêm các thông tin mới
            $depositInfo['user_deposit_id'] = $user_deposit_id;
            $depositInfo['user_deposit_where'] = $user_deposit_where;
            $depositInfo['user_deposit_at'] = $user_deposit_at;
            $depositInfo['user_deposit_adding_5_day'] = $user_deposit_adding_5_day;
            $depositInfo['pay_method_name'] = $pay_method_name;
            $depositInfo['data_car'] = $data_car;

            $this->sendMailDepositRequired($depositInfo);

            $this->DB['db_cars']->disconnect();
            $this->DB['db_user_province']->disconnect();
            $this->DB['db_user_deposit']->disconnect();
            $this->DB['db_pay_method']->disconnect();
        } else {
            $this->setErrorsToSession($errors);
            echo '<script>location.href = "/car-shop/cart/deposit/' . $car_id . '"</script>';
        }
    }

    public function mailSendSuccess()
    {
        if (isset($_SESSION['mail-send-success']) && $_SESSION['mail-send-success']) {
            $data_all_car_type = $this->getAllCarTypesForHeader();
            include_once __DIR__ . "/../views/frontend/cart/mailResponse/mailSentSuccess.php";
            unset($_SESSION['mail-send-success']);
        } else {
            $this->pageNotFound();
        }
    }
    public function mailSendError()
    {
        if (isset($_SESSION['mail-send-success']) && !$_SESSION['mail-send-success']) {
            $error = $_GET['error'];
            $data_all_car_type = $this->getAllCarTypesForHeader();
            include_once __DIR__ . "/../views/frontend/cart/mailResponse/mailSentError.php";
            unset($_SESSION['mail-send-success']);
        } else {
            $this->pageNotFound();
        }
    }

    // ---------------- Các phương thức private ----------------

    private function getAllCarTypesForHeader()
    {
        $this->DB['db_car_type']->connect();
        $data_all_car_type = $this->DB['db_car_type']->getAllData();
        $this->DB['db_car_type']->disconnect();
        return $data_all_car_type;
    }

    private function getDataCarFromSessionByCarID($car_id)
    {
        $data_car = [];
        if (isset($_SESSION['cart'])) {
            $data_car = $_SESSION['cart'][$car_id];
        }
        return $data_car;
    }

    private function setErrorsToSession($errors)
    {
        $errorMsg = '';
        foreach ($errors as $fields) {
            foreach ($fields as $field) {
                $errorMsg = $errorMsg . "<li>" . $field['msg'] . "</li>";
            };
        };
        $_SESSION['errors'] = $errorMsg;
    }

    private function getErrorsFromSessionAndShowAlert()
    {
        if (isset($_SESSION['errors'])) {
            echo "<script>showAlert('" . $_SESSION['errors'] . "', 'danger');</script>";
            unset($_SESSION['errors']);
        }
    }

    private function addFiveDays($user_deposit_at)
    {
        $deposit_at_timestamp = strtotime(str_replace('/', '-', $user_deposit_at)); // Chuyển đổi định dạng ngày tháng
        $deposit_adding_5_day_timestamp = strtotime('+5 days', $deposit_at_timestamp); // Cộng thêm 5 ngày
        $user_deposit_adding_5_day = date('d/m/Y', $deposit_adding_5_day_timestamp); // Chuyển timestamp thành ngày tháng năm
        return $user_deposit_adding_5_day;
    }

    private function validationSeverSide($depositInfo)
    {
        $user_deposit_fullname = $depositInfo['user_deposit_fullname'];
        $user_deposit_tel = $depositInfo['user_deposit_tel'];
        $user_deposit_email = $depositInfo['user_deposit_email'];

        // Validation phía server
        $errors = [];

        // 1. Kiểm tra ô tên người dùng
        // Rule: required
        if (empty($user_deposit_fullname)) {
            $errors['user_deposit_fullname'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_deposit_fullname,
                'msg' => 'Vui lòng nhập tên đầy đủ',
            ];
        }
        // Rule: minlength 3
        elseif (strlen($user_deposit_fullname) < 3) {
            $errors['user_deposit_fullname'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $user_deposit_fullname,
                'msg' => 'Tên đầy đủ phải tối thiểu 3 kí tự',
            ];
        }
        // Rule: maxlength 50
        elseif (strlen($user_deposit_fullname) > 50) {
            $errors['user_deposit_fullname'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $user_deposit_fullname,
                'msg' => 'Tên đầy đủ tối đa có 50 ký tự',
            ];
        }

        // 2. Kiểm tra số điện thoại
        // Rule: required
        if (empty($user_deposit_tel)) {
            $errors['user_deposit_tel'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_deposit_tel,
                'msg' => 'Vui lòng nhập số điện thoại',
            ];
        }
        // Rule: isNumber
        elseif (!is_numeric($user_deposit_tel)) {
            $errors['user_deposit_tel'][] = [
                'rule' => 'isNumber',
                'rule_value' => true,
                'value' => $user_deposit_tel,
                'msg' => 'Số điện thoại không hợp lệ',
            ];
        }
        // Rule: minlength 10
        elseif (strlen($user_deposit_tel) < 10) {
            $errors['user_deposit_tel'][] = [
                'rule' => 'minlength',
                'rule_value' => 10,
                'value' => $user_deposit_tel,
                'msg' => 'Số điện thoại không hợp lệ',
            ];
        }
        // Rule: maxlength
        elseif (strlen($user_deposit_tel) > 15) {
            $errors['user_deposit_tel'][] = [
                'rule' => 'maxlength',
                'rule_value' => 15,
                'value' => $user_deposit_tel,
                'msg' => 'Số điện thoại không hợp lệ',
            ];
        }

        // 3. Kiểm tra email
        // Rule: required
        if (empty($user_deposit_email)) {
            $errors['user_deposit_email'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_deposit_email,
                'msg' => 'Vui lòng nhập email',
            ];
        }
        // Rule: Định dạng email
        elseif (!filter_var($user_deposit_email, FILTER_VALIDATE_EMAIL)) {
            $errors['user_deposit_email'][] = [
                'rule' => 'is_email',
                'rule_value' => true,
                'value' => $user_deposit_email,
                'msg' => 'Vui lòng nhập đúng định dạng email',
            ];
        }
        // Rule: maxlength 100
        elseif (strlen($user_deposit_email) > 100) {
            $errors['user_deposit_email'][] = [
                'rule' => 'maxlength',
                'rule_value' => 100,
                'value' => $user_deposit_email,
                'msg' => 'Email tối đa có 100 ký tự',
            ];
        }
        return $errors;
    }

    private function sendMailDepositRequired($depositInfo)
    {
        $user_deposit_fullname = $depositInfo['user_deposit_fullname'];
        $user_deposit_email = $depositInfo['user_deposit_email'];
        $data_car = $depositInfo['data_car'];
        $car_id = $data_car['car_id'];

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();                        // Sử dụng giao thức SMTP
            $mail->Host       = 'smtp.gmail.com';   // Đặt máy chủ SMTP
            $mail->SMTPAuth   = true;               // Bật xác thực SMTP
            $mail->Username   = $this->emailSendName; // Tên đăng nhập SMTP
            $mail->Password   = $this->emailSendPassword;           // Mật khẩu SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Bật mã hóa TLS ẩn danh
            $mail->Port       = 465;                // Cổng SMTP
            $mail->CharSet = "UTF-8";
            $mail->setLanguage('vi');
            //Recipients
            $mail->setFrom($this->emailSendName, 'Car-shop Store');           // Thiết lập địa chỉ email nguồn (từ đâu gửi email) và tên người gửi
            $mail->addAddress($user_deposit_email, $user_deposit_fullname);       // Thêm địa chỉ email người nhận

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Yêu cầu đặt cọc thành công';
            $mail->Body    = $this->contentMailDepost($depositInfo);
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

            // Kiểm soát truy cập 
            $_SESSION['mail-send-success'] = true;
            // Xoá khỏi giỏ hàng
            unset($_SESSION['cart'][$car_id]);
            echo '<script>location.href = "/car-shop/cart/deposit/mail-send-success"</script>';
        } catch (Exception $e) {
            // Kiểm soát truy cập 
            $_SESSION['mail-send-success'] = false;
            echo '<script>location.href = "/car-shop/cart/deposit/mail-send-error?error=' . $mail->ErrorInfo . '"</script>';
        }
    }

    private function contentMailDepost($depositInfo)
    {
        $user_deposit_id = $depositInfo['user_deposit_id'];
        $user_deposit_fullname = $depositInfo['user_deposit_fullname'];
        $user_deposit_total_price = $depositInfo['user_deposit_total_price'];
        $user_deposit_price = $depositInfo['user_deposit_price'];
        $user_deposit_where = $depositInfo['user_deposit_where'];
        $user_deposit_at = $depositInfo['user_deposit_at'];
        $user_deposit_adding_5_day = $depositInfo['user_deposit_adding_5_day'];
        $pay_method_name = $depositInfo['pay_method_name'];
        $data_car = $depositInfo['data_car'];

        $car_name = $data_car['car_name'];
        $car_price = $data_car['car_price'];

        $user_deposit_total_price = number_format($user_deposit_total_price, 0, ',', '.') . ' ₫';
        $user_deposit_price = number_format($user_deposit_price, 0, ',', '.') . ' ₫';
        $car_price = number_format($car_price, 0, ',', '.') . ' ₫';

        // ----------------------- Viết hoá đơn -----------------------
        $styleMail = <<<EOT
            <style>
                .container-general{
                    max-width: 600px;
                    margin: auto;
                }
                .container-logo-header{
                    display: flex;
                    align-items: center;
                }
                .logo-icon-car {
                    margin-right: 10px;
                }
                .container-header{
                    width: 100%;
                }
                .header {
                    text-align:center;
                    padding: 20px;
                    color: white;
                    background-color: #21a366;
                }
                .footer-container {
                    text-align:center;
                    padding: 20px;

                    background-color: #f0f0f0;
                }
                .fs-3 {
                    font-size: 18px;
                }
                .fs-2 {
                    font-size: 13px;
                }
                .pt-1 {
                    padding-top: 8px;
                }
                .pe-3 {
                    padding-right: 18px;
                }
                .mt-1 {
                    margin-top: 8px;
                }
                .mt-2 {
                    margin-top: 16px;
                }
                .mb-1 {
                    margin-bottom: 8px;
                }
                .mb-2 {
                    margin-bottom: 16px
                }
            </style>
        EOT;

        $contentMailDepositRequestHasBeenConfirmed = <<<EOT
            $styleMail
            <div class="container-general">
                <div class="container-header">
                    <div class="container-logo-header">
                        <svg width="24" height="24" fill="currentColor" class="bi bi-car-front-fill logo-icon-car" viewBox="0 0 16 16">
                            <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                        </svg>
                        CAR-SHOP
                    </div>
                    <h1 class="header mt-1">Yêu cầu đặt cọc thành công</h1>
                </div>

                <div class="container-body">
                    <div class="mb-1">Xin chào khách hàng $user_deposit_fullname</div>
                    <div class="mb-2">
                        Bạn vừa có một yêu cầu đặt cọc về sản phẩm <b>$car_name</b>
                    </div>
                    <hr>
                    <div class="mb-1 mt-2">
                        THÔNG TIN ĐƠN ĐẶT CỌC
                    </div>

                    <table>
                    <tbody>
                        <tr>
                            <td>Mã đơn hàng: </td>
                            <td>#$user_deposit_id</td>
                        </tr>

                        <tr>
                            <td>Ngày đặt: </td>
                            <td>$user_deposit_at</td>
                        </tr>

                        <tr>
                            <td>Tên sản phẩm: </td>
                            <td>$car_name</td>
                        </tr>

                        <tr>
                            <td>Giá trước bạ: </td>
                            <td>$car_price</td>
                        </tr>

                        <tr>
                            <td class="pe-3">Tổng chi phí đã dự toán: </td>
                            <td>$user_deposit_total_price</td>
                        </tr>
                        <tr>
                            <td>Phương thức thanh toán: </td>
                            <td><b>$pay_method_name</b></td>
                        </tr>
                        <tr>
                            <td class="pt-1 fs-3"><b>Chi phí cọc trước: </b></td>
                            <td class="pt-1 fs-3"><b>$user_deposit_price</b></td>
                        </tr>

                    </tbody>
                    </table>
                    <hr class="mt-2">
                    <div class="mb-1 mt-2">
                        BƯỚC KẾ TIẾP
                    </div>
                    <div class="mb-1 mt-2">
                        Trong vòng 24h tiếp theo, nhân viên của chúng tôi sẽ gọi điện và xác nhận đơn đặt cọc, xin quý khách vui lòng chờ đợi.
                    </div>
                    <div class="mb-1 mt-2">
                        Quý khách vui lòng đến trực tiếp tại <b>$user_deposit_where</b> để thanh toán tiền đặt cọc tại phòng thu ngân và tiến hành ký hợp đồng mua xe trước ngày <b>$user_deposit_adding_5_day</b>.
                    </div>
                    <div class="mb-1 mt-2">
                        Trong vòng 5 ngày kế tiếp kể từ ngày hoàn tất hợp đồng đặt cọc, chúng tôi sẽ cố gắng bàn giao xe đến quý khách.
                    </div>

                    ---

                    <div class="mt-1">
                        Cảm ơn quý khách đã lựa chọn chúng tôi.
                    </div>

                    <div class="mt-1">
                        Trân trọng
                    </div>
                    <div class="mb-2">
                    Đội ngũ Car-shop
                    </div>

                    <div class="footer-container fs-2">
                        <div>
                            Điện thoại hỗ trợ: 0123456789
                        </div>
                        <div class="mt-2">
                            Đây là email tự động. Vui lòng không trả lời email này. 
                            Thêm carshop.support@carshop.com.vn vào danh bạ email của bạn để đảm bảo bạn luôn nhận được email từ chúng tôi.
                        </div>
                    </div>
                </div>
            </div>
        EOT;

        return $contentMailDepositRequestHasBeenConfirmed;
    }
}
