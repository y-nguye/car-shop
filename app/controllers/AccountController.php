<?php

session_start();

class AccountController
{
    public function index($DB)
    {
        if (!isset($_SESSION["logged"])) {
            echo '<script>location.href = "/car-shop/account/login"</script>';
            die();
        }

        if (isset($_SESSION["logged"]) && !$_SESSION["logged"]) {
            echo '<script>location.href = "/car-shop/account/login"</script>';
            die();
        }

        $DB['db_user']->connect();
        $DB['db_car_type']->connect();
        $data_user = $DB['db_user']->getData($_SESSION["user_username"]);
        $data_car_type = $DB['db_car_type']->getAllData();

        $lastName = strrchr($_SESSION['user_fullname'], ' ');
        include_once __DIR__ . "/../views/frontend/account/index.php";

        $DB['db_car_type']->disconnect();
    }

    public function login($DB)
    {
        if (isset($_SESSION["logged"]) && $_SESSION["logged"]) {
            echo '<script>location.href = "/car-shop/account"</script>';
            die();
        }

        $DB['db_user']->connect();
        $DB['db_car_type']->connect();

        $data_car_type = $DB['db_car_type']->getAllData();
        include_once __DIR__ . "/../views/frontend/account/login.php";

        if (isset($_POST["loginBtn"])) {
            $username = $_POST["user_username"];
            $password = $_POST["user_password"];

            $data_user = $DB['db_user']->getData($username);

            if ($data_user && password_verify($password, $data_user["user_password"])) {
                // Đăng nhập thành công
                $_SESSION["logged"] = true;
                $_SESSION["user_id"] = $data_user["user_id"];
                $_SESSION["user_fullname"] = $data_user["user_fullname"];
                $_SESSION["user_tel"] = $data_user["user_tel"];
                $_SESSION["user_address"] = $data_user["user_address"];
                $_SESSION["user_email"] = $data_user["user_email"];
                $_SESSION["user_username"] = $data_user["user_username"];
                $_SESSION["user_avt"] = $data_user["user_avt"];
                $_SESSION["user_is_admin"] = $data_user["user_is_admin"];

                $_SESSION['cart'] = 2;

                if ($_SESSION["user_is_admin"]) {
                    $DB['db_user']->disconnect();
                    echo '<script>location.href = "/car-shop/admin"</script>';
                } else {
                    echo '<script>location.href = "/car-shop/cart"</script>';
                }
            } else {
                // Đăng nhập thất bại
                echo    "<script>
                        showAlert('Tên đăng nhập hoặc mật khẩu không đúng', 'danger');
                        </script>";
            }
        }
    }

    public function logout($DB)
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
        echo '<script>location.href = "/car-shop"</script>';
    }

    public function signup($DB)
    {
        if (isset($_SESSION["logged"]) && $_SESSION["logged"]) {
            echo '<script>location.href = "/car-shop/account"</script>';
            die();
        }

        $DB['db_user']->connect();
        $DB['db_car_type']->connect();
        $data_car_type = $DB['db_car_type']->getAllData();

        include_once __DIR__ . "/../views/frontend/account/signup.php";

        if (isset($_POST["signupBtn"])) {

            $user_fullname = $_POST["user_fullname"];
            $user_tel = $_POST["user_tel"];
            $user_address = $_POST["user_address"];
            $user_email = $_POST["user_email"];
            $user_username = $_POST["user_username"];
            $user_password = $_POST["user_password"];
            $user_password_confirm = $_POST["user_password_confirm"];

            // Validation phía server
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
            // Rule: maxlength 100
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
                    'rule' => 'isNumber',
                    'rule_value' => true,
                    'value' => $user_tel,
                    'msg' => 'Vui lòng nhập số điện thoại hợp lệ',
                ];
            }
            // Rule: maxlength
            elseif (strlen($user_tel) > 15) {
                $errors['user_tel'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 15,
                    'value' => $user_tel,
                    'msg' => 'Số điện thoại quá dài',
                ];
            }

            // 3. Kiểm tra địa chỉ
            // Rule: required
            if (empty($user_address)) {
                $errors['user_address'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $user_address,
                    'msg' => 'Vui lòng nhập địa chỉ',
                ];
            }
            // Rule: maxlength 100
            elseif (strlen($user_address) > 100) {
                $errors['user_address'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 100,
                    'value' => $user_address,
                    'msg' => 'Địa chỉ tối đa có 100 ký tự',
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
                    'rule' => 'isEmail',
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
                    'rule' => 'checkMatch',
                    'rule_value' => true,
                    'value' => $user_password_confirm,
                    'msg' => 'Mật khẩu nhập lại không khớp',
                ];
            }

            if (empty($errors)) {
                // Hash bằng thuật toán bcrypt
                $hashedPassword = password_hash($user_password, PASSWORD_BCRYPT);
                $DB['db_user']->setData($user_username, $hashedPassword, $user_fullname, $user_tel, $user_email, $user_address);
                $DB['db_user']->disconnect();
                echo '<script>location.href = "/car-shop/account/login"</script>';
                die();
            } else {
                $errorMsg = '';
                foreach ($errors as $fields) {
                    foreach ($fields as $field) {
                        $errorMsg = $errorMsg . "<li>" . $field['msg'] . "</li>";
                    };
                };
                echo "<script>
                        showAlert('" . $errorMsg . "', 'danger');
                    </script>";
            }
        }
    }

    public function emailCheck($DB)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $DB['db_user']->connect();
            $emailExists = $DB['db_user']->checkDataByEmail($_POST['user_email']);

            if ($emailExists) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    public function usernameCheck($DB)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $DB['db_user']->connect();
            $usernameExists = $DB['db_user']->checkDataByUsername($_POST['user_username']);

            if ($usernameExists) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }


    public function editPersonInfo($DB)
    {
        if (isset($_POST["btnEdit"])) {
            $DB['db_user']->connect();
            $user_fullname = $_POST["user_fullname"];
            $user_tel = $_POST["user_tel"];
            $user_address = $_POST["user_address"];
            $DB['db_user']->updateData($_SESSION["user_id"], $user_fullname, $user_tel, $user_address);
            $DB['db_user']->disconnect();
            echo '<script>location.href = "/car-shop/account"</script>';
        }
    }

    public function editAvatar($DB)
    {
        if (isset($_POST["btnOkUpdateAvatar"])) {
            $uploadDir = __DIR__ . '/../../assets/imgs/avt/';
            $DB['db_user']->connect();
            $data_user = $DB['db_user']->getData($_SESSION["user_username"]);
            $DB['db_user']->updateAvatar($_SESSION["user_id"], $_FILES['user_avt'], $data_user['user_avt'], $uploadDir);
            echo '<script>location.href = "/car-shop/account"</script>';
        }
    }
}
