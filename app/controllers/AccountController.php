<?php
session_start();
require_once __DIR__ . '/AccessController.php';

class AccountController extends AccessController
{
    public function index($DB)
    {
        $this->authentication();

        $user_username  = $_SESSION["user_username"];
        $user_fullname  = $_SESSION['user_fullname'];
        $user_tel       = $_SESSION['user_tel'];
        $user_email     = $_SESSION['user_email'];
        $user_avt       = $_SESSION['user_avt'];
        $user_province_id = $_SESSION["user_province_id"];
        $user_is_admin  = $_SESSION['user_is_admin'];

        $lastName = strrchr($_SESSION['user_fullname'], ' ');

        $DB['db_user_province']->connect();
        $data_all_user_province = $DB['db_user_province']->getAllData();

        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include_once __DIR__ . "/../views/frontend/account/index.php";

        $DB['db_user_province']->disconnect();
    }

    public function deposit($DB)
    {
        $this->authentication();

        $DB['db_cars']->connect();
        $DB['db_user_deposit']->connect();

        $user_username  = $_SESSION["user_username"];
        $user_fullname  = $_SESSION['user_fullname'];
        $user_email     = $_SESSION['user_email'];
        $user_avt       = $_SESSION['user_avt'];
        $user_is_admin  = $_SESSION['user_is_admin'];

        $user_id = $_SESSION["user_id"];
        $data_all_user_deposit = $DB['db_user_deposit']->getAllDataByUserID($user_id);

        $lastName = strrchr($_SESSION['user_fullname'], ' ');

        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include_once __DIR__ . "/../views/frontend/account/deposit.php";

        $DB['db_user']->disconnect();
        $DB['db_user_province']->disconnect();
    }

    public function login($DB)
    {
        // Nếu đã đăng nhập thì chuyển sang trang cá nhân
        if (isset($_SESSION["logged"]) && $_SESSION["logged"]) {
            echo '<script>location.href = "/car-shop/account"</script>';
            die();
        }

        $DB['db_user']->connect();

        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include_once __DIR__ . "/../views/frontend/account/login.php";

        if (isset($_POST["loginBtn"])) {
            $username = $_POST["user_username"];
            $password = $_POST["user_password"];

            $data_user = $DB['db_user']->getData($username);
            $DB['db_user']->disconnect();

            if ($data_user && password_verify($password, $data_user["user_password"])) {
                // Đăng nhập thành công
                $_SESSION["logged"]             = true;
                $_SESSION["user_id"]            = $data_user["user_id"];
                $_SESSION["user_fullname"]      = $data_user["user_fullname"];
                $_SESSION["user_tel"]           = $data_user["user_tel"];
                $_SESSION["user_province_id"]   = $data_user["user_province_id"];
                $_SESSION["user_email"]         = $data_user["user_email"];
                $_SESSION["user_username"]      = $data_user["user_username"];
                $_SESSION["user_avt"]           = $data_user["user_avt"];
                $_SESSION["user_is_admin"]      = $data_user["user_is_admin"];

                $this->syncDataCart($DB);

                if ($_SESSION["user_is_admin"]) {
                    echo '<script>location.href = "/car-shop/admin"</script>';
                } else {
                    echo '<script>window.history.back();</script>';
                }
            } else {
                // Đăng nhập thất bại
                echo "<script>showAlert('Tên đăng nhập hoặc mật khẩu không đúng', 'danger');</script>";
            }
        }
    }

    public function logout()
    {
        unset($_SESSION["logged"]);
        unset($_SESSION["user_id"]);
        unset($_SESSION["user_fullname"]);
        unset($_SESSION["user_tel"]);
        unset($_SESSION["user_address"]);
        unset($_SESSION["user_email"]);
        unset($_SESSION["user_username"]);
        unset($_SESSION["user_avt"]);
        unset($_SESSION["user_is_admin"]);
        unset($_SESSION['cart']);
        echo '<script>window.history.back();</script>';
    }

    public function signup($DB)
    {
        // Nếu đã đăng nhập
        if (isset($_SESSION["logged"]) && $_SESSION["logged"]) {
            echo '<script>location.href = "/car-shop/account"</script>';
            die();
        }

        $DB['db_user']->connect();
        $DB['db_user_province']->connect();
        $data_all_user_province = $DB['db_user_province']->getAllData();

        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include_once __DIR__ . "/../views/frontend/account/signup.php";
        $DB['db_user_province']->disconnect();

        if (isset($_POST["signupBtn"])) {

            $user_fullname = $_POST["user_fullname"];
            $user_tel = $_POST["user_tel"];
            $user_province_id = $_POST["user_province_id"];
            $user_email = $_POST["user_email"];
            $user_username = $_POST["user_username"];
            $user_password = $_POST["user_password"];
            $user_password_confirm = $_POST["user_password_confirm"];

            $signUpInfo = [
                'user_fullname' => $user_fullname,
                'user_tel' => $user_tel,
                'user_province_id' => $user_province_id,
                'user_email' => $user_email,
                'user_username' => $user_username,
                'user_password' => $user_password,
                'user_password_confirm' => $user_password_confirm
            ];

            // Validation phía server
            $errors = $this->validationServerSide($DB, $signUpInfo);

            if (empty($errors)) {
                // Hash bằng thuật toán bcrypt
                $hashedPassword = password_hash($user_password, PASSWORD_BCRYPT);
                $DB['db_user']->setData($user_username, $hashedPassword, $user_fullname, $user_tel, $user_email, $user_address);
                $DB['db_user']->disconnect();
                echo '<script>location.href = "/car-shop/account/login"</script>';
                die();
            } else {
                $this->showErrorsAlert($errors);
            }
        }
    }

    public function editPersonInfo($DB)
    {
        if (isset($_POST["btnEdit"])) {
            $DB['db_user']->connect();
            $user_fullname      = $_POST["user_fullname"];
            $user_tel           = $_POST["user_tel"];
            $user_province_id   = $_POST["user_province_id"];

            $DB['db_user']->updateData($_SESSION["user_id"], $user_fullname, $user_tel, $user_province_id);
            $DB['db_user']->disconnect();

            // Cập nhật lại session
            $_SESSION["user_fullname"] = $user_fullname;
            $_SESSION["user_tel"] = $user_tel;
            $_SESSION["user_province_id"] = $user_province_id;

            echo '<script>location.href = "/car-shop/account"</script>';
        } else {
            $this->pageNotFound();
        }
    }

    public function editAvatar($DB)
    {
        if (isset($_POST["btnOkUpdateAvatar"])) {
            if (isset($_FILES['user_avt'])) {
                $uploadDir = __DIR__ . '/../../assets/imgs/avt/';
                $DB['db_user']->connect();
                // Lấy hình cũ
                $data_user_avt_old = $_SESSION["user_avt"];
                // Cập nhật
                $DB['db_user']->updateAvatar($_SESSION["user_id"], $_FILES['user_avt'], $data_user_avt_old, $uploadDir);
                // Lấy hình mới
                $data_user = $DB['db_user']->getData($_SESSION["user_username"]);
                // Cập nhật lại session
                $_SESSION["user_avt"] = $data_user['user_avt'];
                $DB['db_user']->disconnect();
                echo '<script>location.href = "/car-shop/account"</script>';
            }
        } else {
            $this->pageNotFound();
        }
    }

    public function usernameCheck($DB)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $DB['db_user']->connect();
            $usernameExists = $DB['db_user']->checkDataByUsername($_POST['user_username']);

            if ($usernameExists) echo 'false';
            else echo 'true';

            $DB['db_user']->disconnect();
        } else {
            $this->pageNotFound();
        }
    }

    public function emailCheck($DB)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $DB['db_user']->connect();
            $emailExists = $DB['db_user']->checkDataByEmail($_POST['user_email']);

            if ($emailExists) echo 'false';
            else echo 'true';

            $DB['db_user']->disconnect();
        } else {
            $this->pageNotFound();
        }
    }

    // ---------------- Các phương thức private ----------------
    // Giúp cho khả năng hiểu code dễ dàng hơn
    // bằng cách gom lại những nhiệm vụ dài lê thê
    // vào trong các phương thức private.

    // Vì vậy, có thể không cần đọc code trong private cũng có thể hiểu cách hoạt động của code public.
    // -------

    private function getAllCarTypesForHeader($DB)
    {
        $DB['db_car_type']->connect();
        $data_all_car_type = $DB['db_car_type']->getAllData();
        $DB['db_car_type']->disconnect();
        return $data_all_car_type;
    }

    private function showErrorsAlert($errors)
    {
        $errorMsg = '';
        foreach ($errors as $fields) {
            foreach ($fields as $field) {
                $errorMsg = $errorMsg . "<li>" . $field['msg'] . "</li>";
            };
        };
        echo "<script>showAlert('" . $errorMsg . "', 'danger');</script>";
    }

    private function syncDataCart($DB)
    {
        if (isset($_SESSION['logged']) && $_SESSION['logged']) {
            $user_id = $_SESSION['user_id'];
            $cart = [];
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }

            // Nếu trước khi đăng nhập có những sản phẩm trong giỏ thì thêm các sản phẩm đó vào database tài khoản người dùng
            $this->addItemsToCartDataBase($DB, $cart);

            $DB['db_user_cart_item']->connect();
            $data_user_cart_item = $DB['db_user_cart_item']->getAllDataByUserID($user_id);
            // Đồng bộ dữ liệu database giỏ hàng của người dùng đã lưu
            foreach ($data_user_cart_item as $data) {
                $cart[$data['car_id']] = array(
                    'car_id' => $data['car_id'],
                    'car_name' => $data['car_name'],
                    'car_price' => $data['car_price'],
                    'car_describe' => $data['car_describe'],
                    'car_img_filename' => $data['car_img_filename'],
                );
            }
            $_SESSION['cart'] = $cart;
            $DB['db_user_cart_item']->disconnect();
        }
    }

    private function addItemsToCartDataBase($DB, $cart)
    {
        if (isset($_SESSION['logged']) && $_SESSION['logged']) {
            $user_id = $_SESSION['user_id'];
            $DB['db_user_cart_item']->connect();
            // Thêm sản phẩm vào database giỏ người dùng (thêm những sản phẩm không có trong database)
            foreach ($cart as $data) {
                $resultCheck = $DB['db_user_cart_item']->checkDataByUserIDAndCarID($user_id, $data['car_id']);
                if ($resultCheck) continue;
                $DB['db_user_cart_item']->setData($user_id, $data['car_id']);
            }
            $DB['db_user_cart_item']->disconnect();
        }
    }

    private function validationServerSide($DB, $signUpInfo)
    {

        $user_fullname = $signUpInfo['user_fullname'];
        $user_tel = $signUpInfo['user_tel'];
        $user_province_id = $signUpInfo['user_province_id'];
        $user_email = $signUpInfo['user_email'];
        $user_username = $signUpInfo['user_username'];
        $user_password = $signUpInfo['user_password'];
        $user_password_confirm = $signUpInfo['user_password_confirm'];

        $errors = []; // Giả sự người dùng chưa vi phạm lỗi nào hết...
        // 1. Kiểm tra ô tên người dùng
        // Rule: required
        if (empty($user_fullname)) {
            $errors['user_fullname'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_fullname,
                'msg' => 'Vui lòng nhập tên đầy đủ',
            ];
        }
        // Rule: minlength 3
        elseif (strlen($user_fullname) < 3) {
            $errors['user_fullname'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $user_fullname,
                'msg' => 'Tên đầy đủ phải tối thiểu 3 kí tự',
            ];
        }
        // Rule: maxlength 50
        elseif (strlen($user_fullname) > 50) {
            $errors['user_fullname'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $user_fullname,
                'msg' => 'Tên đầy đủ tối đa có 50 ký tự',
            ];
        }


        // 2. Kiểm tra số điện thoại
        // Rule: required
        if (empty($user_tel)) {
            $errors['user_tel'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_tel,
                'msg' => 'Vui lòng nhập số điện thoại',
            ];
        }
        // Rule: isNumber
        elseif (!is_numeric($user_tel)) {
            $errors['user_tel'][] = [
                'rule' => 'is_number',
                'rule_value' => true,
                'value' => $user_tel,
                'msg' => 'Số điện thoại không hợp lệ',
            ];
        }
        // Rule: minlength 10
        elseif (strlen($user_tel) < 10) {
            $errors['user_tel'][] = [
                'rule' => 'minlength',
                'rule_value' => 10,
                'value' => $user_tel,
                'msg' => 'Số điện thoại không hợp lệ',
            ];
        }
        // Rule: maxlength
        elseif (strlen($user_tel) > 15) {
            $errors['user_tel'][] = [
                'rule' => 'maxlength',
                'rule_value' => 15,
                'value' => $user_tel,
                'msg' => 'Số điện thoại không hợp lệ',
            ];
        }

        // 3. Kiểm tra nơi đăng kiểm xe
        // Rule: required
        if (empty($user_province_id)) {
            $errors['user_province_id'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_province_id,
                'msg' => 'Vui lòng chọn nơi đăng kí xe',
            ];
        }

        // 4. Kiểm tra email
        // Rule: required
        if (empty($user_email)) {
            $errors['user_email'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_email,
                'msg' => 'Vui lòng nhập email',
            ];
        }
        // Rule: Định dạng email
        elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $errors['user_email'][] = [
                'rule' => 'is_email',
                'rule_value' => true,
                'value' => $user_email,
                'msg' => 'Vui lòng nhập đúng định dạng email',
            ];
        }
        // Rule: maxlength 100
        elseif (strlen($user_email) > 100) {
            $errors['user_email'][] = [
                'rule' => 'maxlength',
                'rule_value' => 100,
                'value' => $user_email,
                'msg' => 'Email tối đa có 100 ký tự',
            ];
        }
        // Rule: exists email
        elseif ($DB['db_user']->checkDataByEmail($_POST['user_email'])) {
            $errors['user_email'][] = [
                'rule' => 'exists',
                'rule_value' => true,
                'value' => $user_email,
                'msg' => 'Email đã tồn tại',
            ];
        }

        // 5. Kiểm tra tài khoản người dùng
        // Rule: required
        if (empty($user_username)) {
            $errors['user_username'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_username,
                'msg' => 'Vui lòng nhập tên người dùng',
            ];
        }
        // Rule: minlength 6
        elseif (strlen($user_username) < 6) {
            $errors['user_username'][] = [
                'rule' => 'minlength',
                'rule_value' => 6,
                'value' => $user_username,
                'msg' => 'Tên tài khoản phải tối thiểu 6 kí tự',
            ];
        }
        // Rule: maxlength 100
        elseif (strlen($user_username) > 100) {
            $errors['user_username'][] = [
                'rule' => 'maxlength',
                'rule_value' => 100,
                'value' => $user_username,
                'msg' => 'Tên tài khoản tối đa 100 ký tự',
            ];
        }

        // Rule: exists username
        elseif ($DB['db_user']->checkDataByUsername($_POST['user_username'])) {
            $errors['user_username'][] = [
                'rule' => 'exists',
                'rule_value' => true,
                'value' => $user_username,
                'msg' => 'Tên tài khoản đã tồn tại',
            ];
        }

        // 6. Kiểm tra mật khẩu
        // Rule: required
        if (empty($user_password)) {
            $errors['user_password'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $user_password,
                'msg' => 'Vui lòng nhập mật khẩu',
            ];
        }
        // Rule: minlength 6
        elseif (strlen($user_password) < 6) {
            $errors['user_password'][] = [
                'rule' => 'minlength',
                'rule_value' => 6,
                'value' => $user_password,
                'msg' => 'Mật khẩu phải tối thiểu 6 kí tự',
            ];
        }

        // 7. Kiểm tra mật khẩu nhập lại
        if ($user_password !== $user_password_confirm) {
            $errors['user_password'][] = [
                'rule' => 'check_match',
                'rule_value' => true,
                'value' => $user_password_confirm,
                'msg' => 'Mật khẩu nhập lại không khớp',
            ];
        }
        return $errors;
    }
}
