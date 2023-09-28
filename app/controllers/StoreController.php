<?php
session_start();

class StoreController
{
    public function index($DB)
    {
        $DB['db_cars']->connect();

        $data_all_car_by_car_ids_to_display_carouse = $DB['db_cars']->getAllDataWithSecondImgByCarIDs([51, 49, 54, 64]);
        $data_all_car_by_car_ids_to_display_salling = $DB['db_cars']->getAllDataWithSecondImgByCarIDs([48, 49, 54, 64]);
        $data_all_car_by_car_ids_to_display_four_newest = $DB['db_cars']->getAllDataWithSecondImgByFourNewUpdate();

        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);

        include __DIR__ . "/../views/frontend/store/index.php";

        $DB['db_cars']->disconnect();
    }

    public function type($DB, $type)
    {
        // Chuyển mảng thành chuỗi
        $type = implode('', $type);
        $DB['db_cars']->connect();
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        $isExistType = false;

        foreach ($data_all_car_type as $data) {
            if ($this->convertToSlug($data['car_type_name']) == $type) {
                $isExistType = true;
                // Lấy dữ liệu theo loại 
                $nameType = $data['car_type_name'];
                $data_all_with_img = $DB['db_cars']->getAllDataWithFirstImgByCarTypeID($data['car_type_id']);
                $DB['db_cars']->disconnect();
            }
        }

        if (!$isExistType) {
            echo "404-error";
            $DB['db_cars']->disconnect();
            die();
        }

        include __DIR__ . "/../views/frontend/store/type.php";

        // $DB['db_cars']->disconnect();
    }

    public function product($DB, $vars)
    {
        $car_id = $vars['id'];
        $DB['db_cars']->connect();
        $data_car = $DB['db_cars']->getDataByID($car_id);

        // Authorization
        if (!$data_car) {
            echo "404-error";
            $DB['db_cars']->disconnect();
            die();
        }

        $DB['db_car_img']->connect();
        $DB['db_car_type']->connect();
        $DB['db_car_seat']->connect();
        $DB['db_car_transmission']->connect();
        $DB['db_car_fuel']->connect();
        $DB['db_car_producer']->connect();

        $data_all_car_img = $DB['db_car_img']->getAllDataByCarID($car_id);
        $data_car_type = $DB['db_car_type']->getDataByID($data_car['car_type_id']);
        $data_car_seat = $DB['db_car_seat']->getDataByID($data_car['car_seat_id']);
        $data_car_transmission = $DB['db_car_transmission']->getDataByID($data_car['car_transmission_id']);
        $data_car_fuel = $DB['db_car_fuel']->getDataByID($data_car['car_fuel_id']);
        $data_car_producer = $DB['db_car_producer']->getDataByID($data_car['car_producer_id']);

        $DB['db_car_type']->disconnect();
        $DB['db_car_seat']->disconnect();
        $DB['db_car_transmission']->disconnect();
        $DB['db_car_fuel']->disconnect();
        $DB['db_car_producer']->disconnect();

        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include_once __DIR__ . "/../views/frontend/store/product.php";

        if (isset($_POST['btnRegistrationFee'])) {

            $car_id = $_POST['car_id'];
            $car_name = $_POST['car_name'];
            $car_price = $_POST['car_price'];
            $car_describe = $_POST['car_describe'];

            $data_car_img_filename = $DB['db_car_img']->getFirstDataByCarID($car_id);
            $car_img_filename = implode('', $data_car_img_filename);
            $DB['db_car_img']->disconnect();

            $this->addToCart($car_id, $car_name, $car_price, $car_describe, $car_img_filename);

            $_SESSION['from-registration-fee'] = true;
            echo '<script>location.href = "/car-shop/cart/registration-fee/' . $car_id . '"</script>';
        }

        if (isset($_POST['btnAddCarToCart'])) {

            $car_id = $_POST['car_id'];
            $car_name = $_POST['car_name'];
            $car_price = $_POST['car_price'];
            $car_describe = $_POST['car_describe'];

            $data_car_img_filename = $DB['db_car_img']->getFirstDataByCarID($car_id);
            $car_img_filename = implode('', $data_car_img_filename);
            $DB['db_car_img']->disconnect();

            $this->addToCart($car_id, $car_name, $car_price, $car_describe, $car_img_filename);

            echo '<script>location.href = "/car-shop/product/' . $car_id . '"</script>';
        }
    }

    public function service($DB)
    {
        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include __DIR__ . "/../views/frontend/store/service.php";
    }

    public function support($DB)
    {
        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include __DIR__ . "/../views/frontend/store/support.php";
    }

    public function testDrive($DB, $vars)
    {
        $car_id = $vars['id'];

        $DB['db_cars']->connect();
        $data_car = $DB['db_cars']->getDataByID($car_id);

        // Authorization
        if (!$data_car) {
            echo "404-error";
            $DB['db_cars']->disconnect();
            die();
        }

        $DB['db_car_img']->connect();
        $data_car_img_filename = $DB['db_car_img']->getFirstDataByCarID($car_id);

        $data_user_fullname = null;
        $data_user_tel = null;
        $data_user_email = null;

        if (isset($_SESSION['logged'])) {
            $data_user_fullname = $_SESSION["user_fullname"];
            $data_user_tel = $_SESSION["user_tel"];
            $data_user_email = $_SESSION["user_email"];
        }

        // Hiển thị header
        $data_all_car_type = $this->getAllCarTypesForHeader($DB);
        include __DIR__ . "/../views/frontend/store/testDrive.php";

        if (isset($_POST['btnSignUpTestDrive'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $user_fullname = $_POST['user_fullname'];
            $user_tel = $_POST['user_tel'];
            $user_email = empty($_POST['user_email']) ? "NULL" : $_POST['user_email'];
            $user_test_drive_day = $_POST['user_test_drive_day'];
            $user_test_drive_time = $_POST['user_test_drive_time'];

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
                    'rule' => 'isNumber',
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

            // 3. Kiểm tra email
            // Rule: Định dạng email
            if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
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

            if (empty($errors)) {

                // Gửi yêu cầu đến database

                var_dump($user_fullname);
                var_dump($user_test_drive_day);
                var_dump($user_test_drive_time);
                echo '<script>location.href = "/car-shop/cart/registration-fee/' . $car_id . '"</script>';
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

        $DB['db_cars']->disconnect();
        $DB['db_car_img']->disconnect();
    }

    private function getAllCarTypesForHeader($DB)
    {
        $DB['db_car_type']->connect();
        $data_all_car_type = $DB['db_car_type']->getAllData();
        $DB['db_car_type']->disconnect();
        return $data_all_car_type;
    }

    private function addToCart($car_id, $car_name, $car_price, $car_describe, $car_img_filename)
    {
        $cart = [];
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }

        $cart[$car_id] = array(
            'car_id' => $car_id,
            'car_name' => $car_name,
            'car_price' => $car_price,
            'car_describe' => $car_describe,
            'car_img_filename' => $car_img_filename,
        );

        $_SESSION['cart'] = $cart;
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
