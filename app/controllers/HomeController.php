<?php
session_start();

class HomeController
{
    public function index($DB)
    {
        $DB['db_cars']->connect();
        $DB['db_car_type']->connect();

        $data_cars = $DB['db_cars']->getAllData();
        $data_car_type = $DB['db_car_type']->getAllData();

        include __DIR__ . "/../views/frontend/home/index.php";

        $DB['db_cars']->disconnect();
        $DB['db_car_type']->disconnect();
    }
    public function type($DB, $type)
    {
        $type = implode('', $type);
        $DB['db_cars']->connect();
        $DB['db_car_type']->connect();
        $data_car_type = $DB['db_car_type']->getAllData();
        foreach ($data_car_type as $value) {
            if ($this->convertToSlug($value['car_type_name']) == $type) {
                // Lấy dữ liệu theo loại 
                $dataNameType = $value['car_type_name'];
                $data = $DB['db_cars']->getDataByChoose($value['car_type_id']);
                // foreach ($data as $data) var_dump($data['car_id']);
            }
        }
        include __DIR__ . "/../views/frontend/home/type.php";
    }
    public function product($DB, $vars)
    {
        $DB['db_cars']->connect();
        $DB['db_car_img']->connect();
        $DB['db_car_type']->connect();

        $data_car = $DB['db_cars']->getData($vars['id']);
        $data_car_type = $DB['db_car_type']->getAllData();
        $data_car_img = $DB['db_car_img']->getAllData($vars['id']);
        // var_dump($data_car_img[0]['car_img_filename']);
        include_once __DIR__ . "/../views/frontend/home/product.php";
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
