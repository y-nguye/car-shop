<?php
require_once __DIR__ . '/AccessController.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class StoreController extends AccessController
{
    private $emailSendName = "nhyd23021@cusc.ctu.edu.vn";
    private $emailSendPassword = "nguyeny@cu\$c";

    public function index($DB)
    {
        $DB['db_cars']->connect();

        // Lựa chọn để hiển thị HomePage
        $data_all_car_by_car_ids_to_display_carouse = $DB['db_cars']->getAllDataWithSecondImg([57, 49, 54, 55, 60]);
        $data_all_car_by_car_ids_to_display_salling = $DB['db_cars']->getAllDataWithSecondImg([48, 64, 65, 67]);
        $data_all_car_by_car_ids_to_display_four_newest = $DB['db_cars']->getAllDataWithSecondImg(null, 4);
        $data_all_car_by_car_ids_to_display_luxury = $DB['db_cars']->getAllDataWithSecondImg([60, 54, 59], 4);

        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include_once __DIR__ . "/../views/frontend/store/index.php";
        $DB['db_cars']->disconnect();
    }

    public function type($DB, $type)
    {
        $type = $type['name'];
        $DB['db_cars']->connect();
        // Lấy dữ liệu loại xe, sử dụng chung cho việc phân loại và hiển thị
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        $isExistType = false;

        foreach ($data_all_car_type as $data) {
            if ($this->convertToSlug($data['car_type_name']) == $type) {
                $isExistType = true;
                // Lấy dữ liệu theo loại 
                $nameType = $data['car_type_name'];
                $data_all_with_img = $DB['db_cars']->getAllDataWithFirstImg($data['car_type_id']);
            }
        }

        if (!$isExistType) {
            $this->pageNotFound();
        }

        include_once __DIR__ . "/../views/frontend/store/type.php";
        $DB['db_cars']->disconnect();
    }

    public function product($DB, $vars)
    {
        $car_id = $vars['id'];
        $DB['db_cars']->connect();
        $data_car = $DB['db_cars']->getDataByID($car_id);

        // Kiểm soát truy cập
        $this->checkNull($data_car['car_id']);

        $DB['db_car_img']->connect();
        $data_all_car_img = $DB['db_car_img']->getAllDataByCarID($car_id);
        $data_all_with_img = $DB['db_cars']->getAllDataWithFirstImg($data_car['car_type_id'], $car_id, 3);

        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include_once __DIR__ . "/../views/frontend/store/product.php";
        $DB['db_cars']->disconnect();

        $this->showToastTestDriveResult();

        if (isset($_POST['btnRegistrationFee'])) {

            $data_car_img_filename = $DB['db_car_img']->getFirstDataByCarID($car_id);
            $DB['db_car_img']->disconnect();

            $carInfo = [
                'car_id' => $_POST['car_id'],
                'car_name' => $_POST['car_name'],
                'car_price' => $_POST['car_price'],
                'car_describe' => $_POST['car_describe'],
                'car_img_filename' => implode('', $data_car_img_filename),
            ];

            $this->addItemsToCart($DB, $carInfo);

            $_SESSION['from-registration-fee'] = true;
            echo '<script>location.href = "/car-shop/cart/registration-fee/' . $car_id . '"</script>';
        }

        if (isset($_POST['btnAddCarToCart'])) {

            $data_car_img_filename = $DB['db_car_img']->getFirstDataByCarID($car_id);
            $DB['db_car_img']->disconnect();

            $carInfo = [
                'car_id' => $_POST['car_id'],
                'car_name' => $_POST['car_name'],
                'car_price' => $_POST['car_price'],
                'car_describe' => $_POST['car_describe'],
                'car_img_filename' => implode('', $data_car_img_filename),
            ];

            $this->addItemsToCart($DB, $carInfo);

            echo '<script>location.href = "/car-shop/product/' . $car_id . '"</script>';
        }
    }

    public function service($DB)
    {
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include_once __DIR__ . "/../views/frontend/store/service.php";
    }

    public function support($DB)
    {
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include_once __DIR__ . "/../views/frontend/store/support.php";
    }

    public function testDrive($DB, $vars)
    {
        $car_id = $vars['id'];

        $DB['db_cars']->connect();
        $data_car = $DB['db_cars']->getDataByID($car_id);
        $DB['db_cars']->disconnect();

        // Nếu không có dữ liệu xe này
        $this->checkNull($data_car['car_id']);

        $DB['db_car_img']->connect();
        $DB['db_user_province']->connect();

        $data_car_img_filename = $DB['db_car_img']->getFirstDataByCarID($car_id);
        $data_all_user_province = $DB['db_user_province']->getAllData();

        $user_test_drive_fullname = null;
        $user_test_drive_tel = null;
        $user_test_drive_email = null;

        if (isset($_SESSION['logged'])) {
            $user_test_drive_fullname = $_SESSION["user_fullname"];
            $user_test_drive_tel = $_SESSION["user_tel"];
            $user_test_drive_email = $_SESSION["user_email"];
        }

        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include_once __DIR__ . "/../views/frontend/store/testDrive.php";

        // Validate: báo lỗi (Nếu có)
        $this->getErrorsFromSessionAndShowAlert();

        $DB['db_car_img']->disconnect();
        $DB['db_user_province']->disconnect();
    }

    public function testDriveRegisterpRequired($DB)
    {
        if (!isset($_POST['btnTestDriveRegister'])) $this->pageNotFound();

        $DB['db_cars']->connect();
        $DB['db_user_province']->connect();

        $car_id = $_POST['car_id'];
        $user_province_id = $_POST['user_province_id'];

        $data_car = $DB['db_cars']->getDataByID($car_id);
        $data_user_province = $DB['db_user_province']->getDataByID($user_province_id);

        $DB['db_cars']->disconnect();
        $DB['db_user_province']->disconnect();

        $user_test_drive_where = $data_user_province['user_province_name'];
        $user_test_drive_day = $_POST['user_test_drive_day'];
        $user_test_drive_time = $_POST['user_test_drive_time'];
        $user_test_drive_fullname = $_POST['user_test_drive_fullname'];
        $user_test_drive_tel = $_POST['user_test_drive_tel'];
        $user_test_drive_email = $_POST['user_test_drive_email'];

        $userTestDriveInfo = [
            'user_test_drive_where' => $user_test_drive_where,
            'user_test_drive_day' => $user_test_drive_day,
            'user_test_drive_time' => $user_test_drive_time,
            'user_test_drive_fullname' => $user_test_drive_fullname,
            'user_test_drive_tel' => $user_test_drive_tel,
            'user_test_drive_email' => $user_test_drive_email,
        ];

        $errors = $this->validationServerSide($userTestDriveInfo);

        if (empty($errors)) {

            $user_test_drive_where = 'Showroom ' . $user_test_drive_where;

            $DB['db_user_test_drive']->connect();
            $DB['db_user_test_drive']->setData(
                $user_test_drive_day,
                $user_test_drive_time,
                $user_test_drive_where,
                $user_test_drive_fullname,
                $user_test_drive_tel,
                $user_test_drive_email,
                $car_id
            );

            $user_test_drive_id = $DB['db_user_test_drive']->id;

            // Thêm thông tin mới vào dữ liệu lái thử
            $userTestDriveInfo['user_test_drive_id'] = $user_test_drive_id;
            $userTestDriveInfo['user_test_drive_where'] = $user_test_drive_where;
            $userTestDriveInfo['data_car'] = $data_car;

            $this->sendMailTestDriveRequired($userTestDriveInfo);

            $DB['db_user_test_drive']->disconnect();

            echo '<script>location.href = "/car-shop/product/' . $car_id . '"</script>';
        } else {
            $this->setErrorsToSession($errors);
            echo '<script>location.href = "/car-shop/test-drive/' . $car_id . '"</script>';
        }
    }

    // ---------------- Các phương thức private ----------------
    // Giúp cho khả năng hiểu code dễ dàng hơn
    // bằng cách gom lại những nhiệm vụ dài lê thê
    // vào trong các phương thức private

    private function getAllCarTypesForHeader($DB)
    {
        $DB['db_car_type']->connect();
        $data_all_car_type = $DB['db_car_type']->getAllData();
        $DB['db_car_type']->disconnect();
        return $data_all_car_type;
    }

    private function showToastTestDriveResult()
    {
        // Hiển thị toast
        if (isset($_SESSION['test-drive-success'])) {
            if ($_SESSION['test-drive-success'] == true) echo '<script>toastBody.textContent = "Đăng ký lái thử thành công";</script>';
            if ($_SESSION['test-drive-success'] == false) echo '<script>toastBody.textContent = "Đăng ký lái thử thất bại";</script>';
            echo '<script>toast.show();</script>';
            unset($_SESSION['test-drive-success']);
        }
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

    private function addItemsToCart($DB, $carInfo)
    {
        $cart = [];
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }

        $cart[$carInfo['car_id']] = array(
            'car_id' => $carInfo['car_id'],
            'car_name' => $carInfo['car_name'],
            'car_price' => $carInfo['car_price'],
            'car_describe' => $carInfo['car_describe'],
            'car_img_filename' => $carInfo['car_img_filename'],
        );

        $_SESSION['cart'] = $cart;
        $this->addItemsToCartDataBase($DB, $cart);
    }

    private function addItemsToCartDataBase($DB, $cart)
    {
        if (isset($_SESSION['logged']) && $_SESSION['logged']) {
            $user_id = $_SESSION['user_id'];
            $DB['db_user_cart_item']->connect();
            // Thêm sản phẩm vào database giỏ người dùng
            foreach ($cart as $data) {
                // thêm những sản phẩm không có trong database
                $resultCheck = $DB['db_user_cart_item']->checkDataByUserIDAndCarID($user_id, $data['car_id']);
                if ($resultCheck) continue;
                $DB['db_user_cart_item']->setData($user_id, $data['car_id']);
            }
            $DB['db_user_cart_item']->disconnect();
        }
    }

    private function sendMailTestDriveRequired($userTestDriveInfo)
    {
        $user_test_drive_fullname = $userTestDriveInfo['user_test_drive_fullname'];
        $user_test_drive_email = $userTestDriveInfo['user_test_drive_email'];

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
            $mail->addAddress($user_test_drive_email, $user_test_drive_fullname);       // Thêm địa chỉ email người nhận

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Đăng ký lái thử thành công';
            $mail->Body    = $this->contentMailTestDrive($userTestDriveInfo);
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

            $_SESSION['test-drive-success'] = true;
        } catch (Exception $e) {
            $_SESSION['test-drive-success'] = false;
        }
    }

    private function contentMailTestDrive($userTestDriveInfo)
    {
        $user_test_drive_id = $userTestDriveInfo['user_test_drive_id'];
        $user_test_drive_day = $userTestDriveInfo['user_test_drive_day'];
        $user_test_drive_time = $userTestDriveInfo['user_test_drive_time'];
        $user_test_drive_where = $userTestDriveInfo['user_test_drive_where'];
        $user_test_drive_fullname = $userTestDriveInfo['user_test_drive_fullname'];
        $data_car = $userTestDriveInfo['data_car'];
        $car_name = $data_car['car_name'];

        // ----------------------- Viết nội dung Mail -----------------------
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
                .fs-7 {
                    font-size: 13px;
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

        $contentMailTestDriveRequestHasBeenConfirmed = <<<EOT
            $styleMail
            <div class="container-general">
                <div class="container-header">
                    <div class="container-logo-header">
                        <svg width="24" height="24" fill="currentColor" class="bi bi-car-front-fill logo-icon-car" viewBox="0 0 16 16">
                            <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                        </svg>
                        CAR-SHOP
                    </div>
                    <h1 class="header mt-1">Đăng ký lái thử thành công</h1>
                </div>

                <div class="container-body">
                    <div class="mb-1">Xin chào khách hàng $user_test_drive_fullname</div>
                    <div class="mb-2">
                        Bạn vừa đăng ký lái thử về sản phẩm <b>$car_name</b>
                    </div>
                    <hr>
                    <div class="mb-1 mt-2">
                        THÔNG TIN ĐĂNG KÝ LÁI THỬ
                    </div>

                    <table>
                    <tbody>

                    <tr>
                        <td>Tên xe: </td>
                            <td>$car_name</td>
                        </tr>

                        <tr>
                            <td>Mã đăng ký: </td>
                            <td>#$user_test_drive_id</td>
                        </tr>

                        <tr>
                            <td>Địa điểm lái thử: </td>
                            <td>$user_test_drive_where</td>
                        </tr>

                        <tr>
                            <td>Ngày dự kiến: </td>
                            <td>$user_test_drive_day</td>
                        </tr>

                        <tr>
                            <td class="pe-3">Thời gian dự kiến: </td>
                            <td>$user_test_drive_time</td>
                        </tr>

                    </tbody>
                    </table>

                    <hr class="mt-2">

                    <div class="mb-1 mt-2">
                        BƯỚC KẾ TIẾP
                    </div>
                    <div class="mb-1 mt-2">
                        Trong vòng 24h tiếp theo, nhân viên của chúng tôi sẽ gọi điện và xác nhận đăng ký, xin quý khách vui lòng nhấc máy.
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

                    <div class="footer-container fs-7">
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

        return $contentMailTestDriveRequestHasBeenConfirmed;
    }

    private function validationServerSide($userTestDriveInfo)
    {
        $user_test_drive_where = $userTestDriveInfo['user_test_drive_where'];
        $user_test_drive_day = $userTestDriveInfo['user_test_drive_day'];
        $user_test_drive_time = $userTestDriveInfo['user_test_drive_time'];
        $user_test_drive_fullname = $userTestDriveInfo['user_test_drive_fullname'];
        $user_test_drive_tel = $userTestDriveInfo['user_test_drive_tel'];
        $user_test_drive_email = $userTestDriveInfo['user_test_drive_email'];

        // Validation phía server
        $errors = [];

        // 1. Kiểm tra địa điểm
        // Rule: required
        if (empty($user_test_drive_where)) {
            $errors['user_test_drive_where'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_test_drive_where,
                'msg' => 'Vui lòng chọn địa điểm',
            ];
        }

        // 2. Kiểm tra ngày dự kiến
        // Rule: required
        if (empty($user_test_drive_day)) {
            $errors['user_test_drive_day'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_test_drive_day,
                'msg' => 'Vui lòng chọn ngày dự kiến',
            ];
        }

        // 3. Kiểm tra thời gian dự kiến
        // Rule: required
        if (empty($user_test_drive_time)) {
            $errors['user_test_drive_time'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_test_drive_time,
                'msg' => 'Vui lòng chọn thời gian dự kiến',
            ];
        }

        // 4. Kiểm tra ô tên người dùng
        // Rule: required
        if (empty($user_test_drive_fullname)) {
            $errors['user_test_drive_fullname'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_test_drive_fullname,
                'msg' => 'Vui lòng nhập tên đầy đủ',
            ];
        }
        // Rule: minlength 3
        elseif (strlen($user_test_drive_fullname) < 3) {
            $errors['user_test_drive_fullname'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $user_test_drive_fullname,
                'msg' => 'Tên đầy đủ phải tối thiểu 3 kí tự',
            ];
        }
        // Rule: maxlength 50
        elseif (strlen($user_test_drive_fullname) > 50) {
            $errors['user_test_drive_fullname'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $user_test_drive_fullname,
                'msg' => 'Tên đầy đủ tối đa có 50 ký tự',
            ];
        }

        // 5. Kiểm tra số điện thoại
        // Rule: required
        if (empty($user_test_drive_tel)) {
            $errors['user_test_drive_tel'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_test_drive_tel,
                'msg' => 'Vui lòng nhập số điện thoại',
            ];
        }
        // Rule: isNumber
        elseif (!is_numeric($user_test_drive_tel)) {
            $errors['user_test_drive_tel'][] = [
                'rule' => 'isNumber',
                'rule_value' => true,
                'value' => $user_test_drive_tel,
                'msg' => 'Số điện thoại không hợp lệ',
            ];
        }
        // Rule: minlength 10
        elseif (strlen($user_test_drive_tel) < 10) {
            $errors['user_test_drive_tel'][] = [
                'rule' => 'minlength',
                'rule_value' => 10,
                'value' => $user_test_drive_tel,
                'msg' => 'Số điện thoại không hợp lệ',
            ];
        }
        // Rule: maxlength
        elseif (strlen($user_test_drive_tel) > 15) {
            $errors['user_test_drive_tel'][] = [
                'rule' => 'maxlength',
                'rule_value' => 15,
                'value' => $user_test_drive_tel,
                'msg' => 'Số điện thoại không hợp lệ',
            ];
        }

        // 6. Kiểm tra email
        // Rule: required
        if (empty($user_test_drive_email)) {
            $errors['user_test_drive_email'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_test_drive_email,
                'msg' => 'Vui lòng nhập email',
            ];
        }
        // Rule: Định dạng email
        elseif (!filter_var($user_test_drive_email, FILTER_VALIDATE_EMAIL)) {
            $errors['user_test_drive_email'][] = [
                'rule' => 'is_email',
                'rule_value' => true,
                'value' => $user_test_drive_email,
                'msg' => 'Vui lòng nhập đúng định dạng email',
            ];
        }
        // Rule: maxlength 100
        elseif (strlen($user_test_drive_email) > 100) {
            $errors['user_test_drive_email'][] = [
                'rule' => 'maxlength',
                'rule_value' => 100,
                'value' => $user_test_drive_email,
                'msg' => 'Email tối đa có 100 ký tự',
            ];
        }
        return $errors;
    }

    private function convertToSlug($str, $delimiter = '-')
    {
        $unwanted_array = [
            'á' => 'a',
            'à' => 'a',
            'ả' => 'a',
            'ã' => 'a',
            'ạ' => 'a',
            'ă' => 'a',
            'ắ' => 'a',
            'ằ' => 'a',
            'ẳ' => 'a',
            'ẵ' => 'a',
            'ặ' => 'a',
            'â' => 'a',
            'ấ' => 'a',
            'ầ' => 'a',
            'ẩ' => 'a',
            'ẫ' => 'a',
            'ậ' => 'a',
            'đ' => 'd',
            'é' => 'e',
            'è' => 'e',
            'ẻ' => 'e',
            'ẽ' => 'e',
            'ẹ' => 'e',
            'ê' => 'e',
            'ế' => 'e',
            'ề' => 'e',
            'ể' => 'e',
            'ễ' => 'e',
            'ệ' => 'e',
            'í' => 'i',
            'ì' => 'i',
            'ỉ' => 'i',
            'ĩ' => 'i',
            'ị' => 'i',
            'ó' => 'o',
            'ò' => 'o',
            'ỏ' => 'o',
            'õ' => 'o',
            'ọ' => 'o',
            'ô' => 'o',
            'ố' => 'o',
            'ồ' => 'o',
            'ổ' => 'o',
            'ỗ' => 'o',
            'ộ' => 'o',
            'ơ' => 'o',
            'ớ' => 'o',
            'ờ' => 'o',
            'ở' => 'o',
            'ỡ' => 'o',
            'ợ' => 'o',
            'ú' => 'u',
            'ù' => 'u',
            'ủ' => 'u',
            'ũ' => 'u',
            'ụ' => 'u',
            'ư' => 'u',
            'ứ' => 'u',
            'ừ' => 'u',
            'ử' => 'u',
            'ữ' => 'u',
            'ự' => 'u',
            'ý' => 'y',
            'ỳ' => 'y',
            'ỷ' => 'y',
            'ỹ' => 'y',
            'ỵ' => 'y',
        ];

        $str = strtr($str, $unwanted_array);

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
}
