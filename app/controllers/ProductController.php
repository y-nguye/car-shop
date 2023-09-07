<?php

class ProductController
{
    public function index($DB)
    {
        // Kết nối Database
        $DB['db_cars']->connect();
        // Truy xuất dữ liệu
        $data_cars = $DB['db_cars']->getAllData();
        include_once __DIR__ . "/../views/backend/product/index.php";
    }

    public function add($DB)
    {
        // Kết nối Database
        $DB['db_cars']->connect();
        $DB['db_car_seat']->connect();
        $DB['db_car_fuel']->connect();
        $DB['db_car_types']->connect();
        $DB['db_car_producer']->connect();

        $data_car_seat = $DB['db_car_seat']->getAllData();
        $data_car_types = $DB['db_car_types']->getAllData();
        $data_car_fuel = $DB['db_car_fuel']->getAllData();
        $data_car_producer = $DB['db_car_producer']->getAllData();

        include_once __DIR__ . "/../views/backend/product/add.php";

        // if (isset($_POST['add-btn'])) {
        //     $name = $_POST['sp_ten'];
        //     $price = $_POST['sp_gia'];
        //     $DB['db_cars']->setData($name, $price);
        //     header("location: ../product");
        // }

        if (isset($_POST['btnAdd'])) {
            $car_name = $_POST['car_name'];
            $car_price = $_POST['car_price'];
            $car_quantity = $_POST['car_quantity'];
            $car_describe = $_POST['car_describe'];
            $car_detail_describe = $_POST['car_detail_describe'];
            $car_img = $_POST['car_img'];
            $car_added_day = $_POST['car_added_day'];
            $car_deleted = $_POST['car_deleted'];
            $car_seat_id = empty($_POST['car_seat_id']) ? 'NULL' : $_POST['car_seat_id'];
            $car_fuel_id = empty($_POST['car_fuel_id']) ? 'NULL' : $_POST['car_fuel_id'];
            $car_type_id = empty($_POST['car_type_id']) ? 'NULL' : $_POST['car_type_id'];
            $car_producer_id = empty($_POST['car_producer_id']) ? 'NULL' : $_POST['car_producer_id'];


            // Validation phía server
            // $errors = []; // Giả sự người dùng chưa vi phạm lỗi nào hết...
            // // 1. Kiểm tra ô tên sản phẩm
            // // Rule: required
            // if (empty($car_name)) {
            //     $errors[][] = [
            //         'rule' => 'required',
            //         'rule_value' => true,
            //         'value' => $car_name,
            //         'msg' => 'Vui lòng nhập tên sản phẩm',
            //     ];
            // }

            // // Rule: minlength 2
            // if (strlen($car_name) < 3) {
            //     $errors[][] = [
            //         'rule' => 'minlength',
            //         'rule_value' => 3,
            //         'value' => $car_name,
            //         'msg' => 'Tên sản phẩm phải có 3 ký tự trở lên',
            //     ];
            // }

            // // Rule: maxlength 10
            // if (strlen($car_name) > 100) {
            //     $errors[][] = [
            //         'rule' => 'minlength',
            //         'rule_value' => 100,
            //         'value' => $car_name,
            //         'msg' => 'Tên sản phẩm tối đa có 100 ký tự',
            //     ];
            // }

            // Người dùng không vi phạm quy luật nào cả --> tiến hành lưu
            // if (count($errors) == 0) {

            // Thực thi câu lệnh truy vấn
            // mysqli_query($conn, $sql_insert);

            $DB['db_cars']->setData(
                $car_name,
                $car_price,
                $car_quantity,
                $car_describe,
                $car_detail_describe,
                $car_img,
                $car_seat_id,
                $car_fuel_id,
                $car_type_id,
                $car_producer_id
            );

            // Trở về danh sách
            echo '<script>location.href = "./"</script>';
            // }
        }
    }

    public function edit($DB, $vars)
    {
        $id = implode('', $vars);
        include __DIR__ . "/../views/backend/product/edit.php";
    }

    public function delete($DB, $vars)
    {
        $id = implode('', $vars);
        include __DIR__ . "/../views/backend/product/delete.php";
    }
}
