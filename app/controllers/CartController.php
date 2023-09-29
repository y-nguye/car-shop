<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class CartController
{
    private $emailSendName = "nhyd23021@cusc.ctu.edu.vn";
    private $emailSendPassword = "nguyeny@cu\$c";

    public function index($DB)
    {
        $cart = [];
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }
        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include __DIR__ . "/../views/frontend/cart/index.php";
    }

    public function delete($DB, $vars)
    {
        unset($_SESSION['cart'][$vars['id']]);
        echo '<script>location.href = "/car-shop/cart"</script>';
    }

    public function registrationFee($DB, $vars)
    {
        $car_id = $vars['id'];

        // Không có sản phẩm trong giỏ hàng thì không truy cập được
        if (!isset($_SESSION['cart'][$car_id])) {
            // Đưa vào 404-page
            echo '404-error';
            die();
        }

        $DB['db_user_province']->connect();
        $data_all_user_province = $DB['db_user_province']->getAllData();

        $data_car = [];
        if (isset($_SESSION['cart'])) {
            $data_car = $_SESSION['cart'][$car_id];
        }

        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include __DIR__ . "/../views/frontend/cart/registrationFee.php";

        if (isset($_SESSION['from-registration-fee']) && $_SESSION['from-registration-fee']) {
            echo '<script>toast.show();</script>';
            unset($_SESSION['from-registration-fee']);
        }
    }

    public function pay($DB, $vars)
    {
        $car_id = $vars['id'];

        // Nếu không có thao tác nhấn nút "tiến hành đặt cọc" thì fuckout and die
        if (!isset($_POST['btnDeposits'])) {
            echo '<script>location.href = "/car-shop/cart/registration-fee/' . $car_id . '"</script>';
            die();
        }

        $total_price = floatval($_POST['total_price']);

        $data_car = [];
        if (isset($_SESSION['cart'])) {
            $data_car = $_SESSION['cart'][$car_id];
        }

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

        $DB['db_user_province']->connect();
        $DB['db_pay_method']->connect();
        $data_all_user_province = $DB['db_user_province']->getAllData();
        $data_all_pay_method = $DB['db_pay_method']->getAllData();

        $depositsPrice = $data_car['total_price'] * 0.1;

        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include __DIR__ . "/../views/frontend/cart/pay.php";

        $DB['db_user_province']->disconnect();
        $DB['db_pay_method']->disconnect();
    }

    public function depositRequired($DB)
    {
        // Nếu không nhấn nút xác nhận đặt cọc thì die
        if (!isset($_POST['btnPay'])) {
            echo "404-error";
            die();
        }

        $DB['db_cars']->connect();
        $DB['db_car_img']->connect();
        $DB['db_user_province']->connect();
        $DB['db_user_deposit']->connect();
        $DB['db_pay_method']->connect();

        $car_id = $_POST['car_id'];
        $user_deposit_fullname = $_POST['user_fullname'];
        $user_deposit_tel = $_POST['user_tel'];
        $user_deposit_email = $_POST['user_email'];
        $user_deposit_price = $_POST['user_deposit_price'];

        $pay_method_id = $_POST['pay_method_id'];
        $pay_method = $DB['db_pay_method']->getDataByID($pay_method_id);
        $pay_method_name = $pay_method['pay_method_name'];


        $user_deposit_where = $DB['db_user_province']->getDataByID($_POST['user_province_id']);
        $user_deposit_where = 'Showroom ' . $user_deposit_where["user_province_name"];

        if (isset($_SESSION['user_id'])) $user_id = $_SESSION["user_id"];
        else $user_id = "NULL";

        $DB['db_user_deposit']->setData(
            $user_deposit_fullname,
            $user_deposit_tel,
            $user_deposit_email,
            $user_deposit_price,
            $user_deposit_where,
            $pay_method_id,
            $user_id,
            $car_id
        );

        // Lấy dữ liệu xe từ SESSION
        $data_car = [];
        if (isset($_SESSION['cart'])) {
            $data_car = $_SESSION['cart'][$car_id];
        }
        $car_name = $data_car['car_name'];
        $car_price = $data_car['car_price'];
        $total_price = $data_car['total_price'];

        $car_price = number_format($car_price, 0, ',', '.') . ' ₫';
        $total_price = number_format($total_price, 0, ',', '.') . ' ₫';
        $user_deposit_price = number_format($user_deposit_price, 0, ',', '.') . ' ₫';

        // Lấy id của đơn đăt cọc vừa thêm
        $deposit_id = $DB['db_user_deposit']->id;
        // Thời gian yêu cầu đặt cọc
        $deposit_at = date('d/m/Y');
        // Cộng thêm 5 ngày
        $deposit_at_timestamp = strtotime(str_replace('/', '-', $deposit_at)); // Chuyển đổi định dạng ngày tháng
        $deposit_adding_5_day_timestamp = strtotime('+5 days', $deposit_at_timestamp); // Cộng thêm 5 ngày
        $deposit_adding_5_day = date('d/m/Y', $deposit_adding_5_day_timestamp); // Chuyển timestamp thành ngày tháng năm

        $DB['db_cars']->disconnect();
        $DB['db_car_img']->disconnect();
        $DB['db_user_province']->disconnect();
        $DB['db_user_deposit']->disconnect();
        $DB['db_pay_method']->disconnect();

        // ----------------------- Viết hoá đơn -----------------------
        $stylesDepositRequest = <<<EOT
            <style>
                @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap');
                .container-general{
                    font-family: 'IBM Plex Sans', sans-serif;
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

        $depositRequestHasBeenConfirmed = <<<EOT
            $stylesDepositRequest
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
                            <td>$deposit_id</td>
                        </tr>

                        <tr>
                            <td>Ngày đặt: </td>
                            <td>$deposit_at</td>
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
                            <td>$total_price</td>
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
                        Quý khách vui lòng đến trực tiếp tại <b>$user_deposit_where</b> để thanh toán tiền đặt cọc tại phòng thu ngân và tiến hành ký hợp đồng mua xe trước ngày <b>$deposit_adding_5_day</b>.
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

        $this->sendMailDepositRequired(
            $car_id,
            $depositRequestHasBeenConfirmed,
            $user_deposit_fullname,
            $user_deposit_email
        );
    }

    private function sendMailDepositRequired($car_id, $depositRequestHasBeenConfirmed, $user_deposit_fullname, $user_deposit_email)
    {
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
            $mail->Body    = $depositRequestHasBeenConfirmed;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

            // Kiểm soát truy cập 
            $_SESSION['mail-send-success'] = true;
            echo '<script>location.href = "/car-shop/cart/pay/mail-send-success"</script>';
            unset($_SESSION['cart'][$car_id]);
        } catch (Exception $e) {
            // Kiểm soát truy cập 
            $_SESSION['mail-send-success'] = false;
            echo '<script>location.href = "/car-shop/cart/pay/mail-send-error?error=' . $mail->ErrorInfo . '"</script>';
        }
    }

    public function mailSendSuccess($DB)
    {
        if (isset($_SESSION['mail-send-success']) && $_SESSION['mail-send-success']) {
            $data_all_car_type = $this->getAllCarTypesForHeader($DB);
            include __DIR__ . "/../views/frontend/cart/mail/mailSendSuccess.php";
            unset($_SESSION['mail-send-success']);
        } else {
            echo "Error 404";
        }
    }
    public function mailSendError($DB)
    {
        if (isset($_SESSION['mail-send-success']) && !$_SESSION['mail-send-success']) {
            $error = $_GET['error'];
            $data_all_car_type = $this->getAllCarTypesForHeader($DB);
            include __DIR__ . "/../views/frontend/cart/mail/mailSendError.php";
            unset($_SESSION['mail-send-success']);
        } else {
            echo "Error 404";
        }
    }

    private function getAllCarTypesForHeader($DB)
    {
        $DB['db_car_type']->connect();
        $data_all_car_type = $DB['db_car_type']->getAllData();
        $DB['db_car_type']->disconnect();
        return $data_all_car_type;
    }
}
