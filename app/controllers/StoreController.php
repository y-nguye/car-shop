<?php
session_start();

class StoreController
{
    public function index($DB)
    {
        $DB['db_cars']->connect();
        $DB['db_car_type']->connect();
        $DB['db_car_img']->connect();

        $data_all_car_by_car_ids_to_display_carouse = $DB['db_cars']->getAllDataWithSecondImgByCarIDs([51, 49, 54, 64]);
        $data_all_car_by_car_ids_to_display_salling = $DB['db_cars']->getAllDataWithSecondImgByCarIDs([48, 49, 54, 64]);
        $data_all_car_by_car_ids_to_display_four_newest = $DB['db_cars']->getAllDataWithSecondImgByFourNewUpdate();

        // Hiển thị header
        $data_all_car_type = $DB['db_car_type']->getAllData();

        include __DIR__ . "/../views/frontend/store/index.php";

        $DB['db_cars']->disconnect();
        $DB['db_car_type']->disconnect();
    }

    public function type($DB, $type)
    {
        // Chuyển mảng thành chuỗi
        $type = implode('', $type);
        $DB['db_cars']->connect();
        $DB['db_car_type']->connect();

        $data_all_car_type = $DB['db_car_type']->getAllData();

        foreach ($data_all_car_type as $value) {
            if ($this->convertToSlug($value['car_type_name']) == $type) {
                // Lấy dữ liệu theo loại 
                $nameType = $value['car_type_name'];
                $data_all_with_img = $DB['db_cars']->getAllDataWithFirstImgByCarTypeID($value['car_type_id']);
            }
        }
        include __DIR__ . "/../views/frontend/store/type.php";
    }

    public function product($DB, $vars)
    {
        $car_id = $vars['id'];
        $DB['db_cars']->connect();
        $DB['db_car_img']->connect();
        $DB['db_car_type']->connect();
        $DB['db_car_seat']->connect();
        $DB['db_car_transmission']->connect();
        $DB['db_car_fuel']->connect();
        $DB['db_car_producer']->connect();

        $data_car = $DB['db_cars']->getDataByID($car_id);
        $data_all_car_img = $DB['db_car_img']->getAllDataByCarID($car_id);
        $data_car_type = $DB['db_car_type']->getDataByID($data_car['car_type_id']);
        $data_car_seat = $DB['db_car_seat']->getDataByID($data_car['car_seat_id']);
        $data_car_transmission = $DB['db_car_transmission']->getDataByID($data_car['car_transmission_id']);
        $data_car_fuel = $DB['db_car_fuel']->getDataByID($data_car['car_fuel_id']);
        $data_car_producer = $DB['db_car_producer']->getDataByID($data_car['car_producer_id']);

        // Hiển thị header
        $data_all_car_type = $DB['db_car_type']->getAllData();

        include_once __DIR__ . "/../views/frontend/store/product.php";

        if (isset($_POST['btnRegistrationFee'])) {

            $car_id = $_POST['car_id'];
            $car_name = $_POST['car_name'];
            $car_price = $_POST['car_price'];

            $data_car_img_filename = $DB['db_car_img']->getFirstDataByCarID($car_id);
            $car_img_filename = implode('', $data_car_img_filename);

            $cart = [];
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }

            $cart[$car_id] = array(
                'car_id' => $car_id,
                'car_name' => $car_name,
                'car_price' => $car_price,
                'car_img_filename' => $car_img_filename,
            );

            $_SESSION['cart'] = $cart;
            $_SESSION['from-registration-fee'] = true;
            echo '<script>location.href = "/car-shop/cart/registration-fee/' . $car_id . '"</script>';
        }

        if (isset($_POST['btnAddCarToCart'])) {

            $car_id = $_POST['car_id'];
            $car_name = $_POST['car_name'];
            $car_price = $_POST['car_price'];
            $car_type_name = $_POST['car_type_name'];
            $car_seat = $_POST['car_seat'];
            $car_transmission = $_POST['car_transmission'];
            $car_fuel = $_POST['car_fuel'];
            $car_producer_name = $_POST['car_producer_name'];

            $data_car_img_filename = $DB['db_car_img']->getFirstDataByCarID($car_id);
            $car_img_filename = implode('', $data_car_img_filename);

            $cart = [];
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }

            $cart[$car_id] = array(
                'car_id' => $car_id,
                'car_name' => $car_name,
                'car_price' => $car_price,
                'car_img_filename' => $car_img_filename,
            );

            $_SESSION['cart'] = $cart;
            echo '<script>location.href = "/car-shop/product/' . $car_id . '"</script>';
        }
    }

    public function service($DB, $type)
    {
        $type = implode('', $type);
        echo $type;
        // include __DIR__ . "/../views/backend/product/index.php";
    }

    public function support($DB, $type)
    {
        $type = implode('', $type);
        echo $type;
        // include __DIR__ . "/../views/backend/product/index.php";
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
