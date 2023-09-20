<?php

session_start();

class ProductController
{
    public function index($DB)
    {
        $DB['db_cars']->connect();
        $data_cars = $DB['db_cars']->getAllData();
        include_once __DIR__ . "/../views/backend/product/index.php";
        $DB['db_cars']->disconnect();
    }

    public function add($DB)
    {
        // UPDATES
        // Kết nối và lấy dữ liệu
        $DB['db_cars']->connect();
        $DB['db_car_seat']->connect();
        $DB['db_car_fuel']->connect();
        $DB['db_car_type']->connect();
        $DB['db_car_transmission']->connect();
        $DB['db_car_producer']->connect();
        $DB['db_car_img']->connect();

        $data_car_seat = $DB['db_car_seat']->getAllData();
        $data_car_type = $DB['db_car_type']->getAllData();
        $data_car_fuel = $DB['db_car_fuel']->getAllData();
        $data_car_transmission = $DB['db_car_transmission']->getAllData();
        $data_car_producer = $DB['db_car_producer']->getAllData();

        // USES
        include_once __DIR__ . "/../views/backend/product/add.php";

        // MANIPULATES
        if (isset($_POST['btnAdd'])) {

            $car_name = $_POST['car_name'];
            $car_price = $_POST['car_price'];
            $car_quantity = $_POST['car_quantity'];
            $car_describe = $_POST['car_describe'];
            $car_detail_describe = $_POST['car_detail_describe'];
            $car_seat_id = empty($_POST['car_seat_id']) ? 'NULL' : $_POST['car_seat_id'];
            $car_fuel_id = empty($_POST['car_fuel_id']) ? 'NULL' : $_POST['car_fuel_id'];
            $car_type_id = empty($_POST['car_type_id']) ? 'NULL' : $_POST['car_type_id'];
            $car_transmission_id = empty($_POST['car_transmission_id']) ? 'NULL' : $_POST['car_transmission_id'];
            $car_producer_id = empty($_POST['car_producer_id']) ? 'NULL' : $_POST['car_producer_id'];

            // Validation phía server
            $errors = []; // Giả sự người dùng chưa vi phạm lỗi nào hết...

            // 1. Kiểm tra ô tên sản phẩm
            // Rule: required
            if (empty($car_name)) {
                $errors['car_name'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_name,
                    'msg' => 'Vui lòng nhập tên sản phẩm',
                ];
            }
            // Rule: minlength 2
            else if (strlen($car_name) < 3) {
                $errors['car_name'][] = [
                    'rule' => 'minlength',
                    'rule_value' => 3,
                    'value' => $car_name,
                    'msg' => 'Tên sản phẩm phải tối thiểu 3 kí tự',
                ];
            }
            // Rule: maxlength 10
            else if (strlen($car_name) > 50) {
                $errors['car_name'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 100,
                    'value' => $car_name,
                    'msg' => 'Tên sản phẩm tối đa có 50 ký tự',
                ];
            }


            // 2. Kiểm tra ô giá xe
            // Rule: required
            if (empty($car_price)) {
                $errors['car_price'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_price,
                    'msg' => 'Vui lòng nhập giá sản phẩm',
                ];
            }
            // Rule: isNumber
            elseif (!is_numeric($car_price)) {
                $errors['car_price'][] = [
                    'rule' => 'is_number',
                    'rule_value' => true,
                    'value' => $car_price,
                    'msg' => 'Giá sản phẩm phải là dạng số',
                ];
            }
            // Rule: minlength 7 - lấy phần nguyên
            elseif (strlen(((int)$car_price)) < 7) {
                $errors['car_price'][] = [
                    'rule' => 'minlength',
                    'rule_value' => 7,
                    'value' => $car_price,
                    'msg' => 'Giá sản phẩm phải tối thiểu 7 số nguyên',
                ];
            }
            // Rule: maxlength 10 - lấy phần nguyên
            elseif (strlen(((int)$car_price)) > 12) {
                $errors['car_price'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 12,
                    'value' => $car_price,
                    'msg' => 'Giá sản phẩm chỉ tối đa 12 số nguyên',
                ];
            }


            // 3. Kiểm tra ô số lượng
            // Rule: required
            if (empty($car_quantity)) {
                $errors['car_quantity'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_quantity,
                    'msg' => 'Vui lòng nhập số lượng',
                ];
            }
            // Rule: isNumber
            elseif (!is_numeric($car_quantity)) {
                $errors['car_quantity'][] = [
                    'rule' => 'is_number',
                    'rule_value' => true,
                    'value' => $car_quantity,
                    'msg' => 'Số lượng phải là dạng số nguyên',
                ];
            }
            // Rule: isNumber integer
            elseif (($car_quantity - intval($car_quantity) != 0)) {
                $errors['car_quantity'][] = [
                    'rule' => 'is_number',
                    'rule_value' => true,
                    'value' => $car_quantity,
                    'msg' => 'Số lượng phải là dạng số nguyên',
                ];
            }
            // Rule: maxlength 2
            elseif (strlen(((int)$car_quantity)) > 2) {
                $errors['car_quantity'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 2,
                    'value' => $car_quantity,
                    'msg' => 'Số lượng tối đa là 99',
                ];
            }


            // 4. Kiểm tra dòng xe
            // Rule: required
            if ($car_type_id == 'NULL') {
                $errors['car_type_id'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_type_id,
                    'msg' => 'Vui lòng chọn dòng xe',
                ];
            }

            // 5. Kiểm tra số chỗ ngồi
            // Rule: required
            if ($car_seat_id == 'NULL') {
                $errors['car_seat_id'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_seat_id,
                    'msg' => 'Vui lòng chọn chỗ ngồi cho xe',
                ];
            }

            // 6. Kiểm tra loại hộp số
            // Rule: required
            if ($car_transmission_id == 'NULL') {
                $errors['car_transmission_id'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_transmission_id,
                    'msg' => 'Vui lòng chọn loại hộp số cho xe',
                ];
            }

            // 6. Kiểm tra mô tả ngắn
            // Rule: required
            if (empty($car_describe)) {
                $errors['car_describe'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_describe,
                    'msg' => 'Vui lòng nhập mô tả ngắn',
                ];
            }
            // Rule: minlength 10
            else if (strlen($car_describe) < 10) {
                $errors['car_describe'][] = [
                    'rule' => 'minlength',
                    'rule_value' => 10,
                    'value' => $car_describe,
                    'msg' => 'Mô tả ngắn sản phẩm phải tối thiểu 10 kí tự',
                ];
            }
            // Rule: maxlength 10
            else if (strlen($car_describe) > 200) {
                $errors['car_describe'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 200,
                    'value' => $car_describe,
                    'msg' => 'Mô tả ngắn sản phẩm tối đa có 200 ký tự',
                ];
            }

            // 7. Kiểm tra mô tả chi tiết
            // Rule: required
            if (empty($car_detail_describe)) {
                $errors['car_detail_describe'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_detail_describe,
                    'msg' => 'Vui lòng nhập mô tả chi tiết',
                ];
            }
            // Rule: minlength 10
            else if (strlen($car_detail_describe) < 100) {
                $errors['car_detail_describe'][] = [
                    'rule' => 'minlength',
                    'rule_value' => 100,
                    'value' => $car_detail_describe,
                    'msg' => 'Mô tả chi tiết sản phẩm phải tối thiểu 100 kí tự',
                ];
            }
            // Rule: maxlength 10
            else if (strlen($car_detail_describe) > 5000) {
                $errors['car_detail_describe'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 5000,
                    'value' => $car_detail_describe,
                    'msg' => 'Mô tả chi tiết sản phẩm tối đa có 5000 ký tự',
                ];
            }

            // Người dùng không vi phạm quy luật nào cả --> tiến hành lưu
            if (empty($errors)) {

                $DB['db_cars']->setData(
                    $car_name,
                    $car_price,
                    $car_quantity,
                    $car_describe,
                    $car_detail_describe,
                    $car_seat_id,
                    $car_fuel_id,
                    $car_type_id,
                    $car_transmission_id,
                    $car_producer_id
                );
                $new_car_id = $DB['db_cars']->id; // Lấy id của sản phẩm vừa thêm

                if (!empty($_FILES['car_img_filename']['name'][0])) {
                    $uploadDir = __DIR__ . '/../../assets/uploads/';
                    $DB['db_car_img']->setData($_FILES['car_img_filename'], $new_car_id, $uploadDir);
                }

                // Ngắt kết nối cho các đối tượng con
                $DB['db_cars']->disconnect();
                $DB['db_car_seat']->disconnect();
                $DB['db_car_fuel']->disconnect();
                $DB['db_car_type']->disconnect();
                $DB['db_car_transmission']->disconnect();
                $DB['db_car_producer']->disconnect();
                $DB['db_car_img']->disconnect();

                // Trở về danh sách
                echo '<script>location.href = "./"</script>';
            }
            // Ngược lại có lỗi, in ra bằng Alert
            else {
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

    public function edit($DB, $vars)
    {
        $car_id = implode('', $vars);

        // Kết nối và lấy dữ liệu
        $DB['db_cars']->connect();
        $DB['db_car_seat']->connect();
        $DB['db_car_fuel']->connect();
        $DB['db_car_type']->connect();
        $DB['db_car_transmission']->connect();
        $DB['db_car_producer']->connect();
        $DB['db_car_img']->connect();

        $data_car = $DB['db_cars']->getData($car_id);
        $data_car_seat = $DB['db_car_seat']->getAllData();
        $data_car_type = $DB['db_car_type']->getAllData();
        $data_car_fuel = $DB['db_car_fuel']->getAllData();
        $data_car_transmission = $DB['db_car_transmission']->getAllData();
        $data_car_producer = $DB['db_car_producer']->getAllData();
        $data_car_img = $DB['db_car_img']->getAllData($car_id);

        include __DIR__ . "/../views/backend/product/edit.php";

        if (isset($_POST['btnEdit'])) {

            $car_name = $_POST['car_name'];
            $car_price = $_POST['car_price'];
            $car_quantity = $_POST['car_quantity'];
            $car_describe = $_POST['car_describe'];
            $car_detail_describe = $_POST['car_detail_describe'];
            $car_seat_id = empty($_POST['car_seat_id']) ? 'NULL' : $_POST['car_seat_id'];
            $car_fuel_id = empty($_POST['car_fuel_id']) ? 'NULL' : $_POST['car_fuel_id'];
            $car_type_id = empty($_POST['car_type_id']) ? 'NULL' : $_POST['car_type_id'];
            $car_transmission_id = empty($_POST['car_transmission_id']) ? 'NULL' : $_POST['car_transmission_id'];
            $car_producer_id = empty($_POST['car_producer_id']) ? 'NULL' : $_POST['car_producer_id'];

            // Validation phía server
            $errors = []; // Giả sự người dùng chưa vi phạm lỗi nào hết...

            // 1. Kiểm tra ô tên sản phẩm
            // Rule: required
            if (empty($car_name)) {
                $errors['car_name'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_name,
                    'msg' => 'Vui lòng nhập tên sản phẩm',
                ];
            }
            // Rule: minlength 2
            else if (strlen($car_name) < 3) {
                $errors['car_name'][] = [
                    'rule' => 'minlength',
                    'rule_value' => 3,
                    'value' => $car_name,
                    'msg' => 'Tên sản phẩm phải tối thiểu 3 kí tự',
                ];
            }
            // Rule: maxlength 10
            else if (strlen($car_name) > 50) {
                $errors['car_name'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 50,
                    'value' => $car_name,
                    'msg' => 'Tên sản phẩm tối đa có 50 ký tự',
                ];
            }


            // 2. Kiểm tra ô giá xe
            // Rule: required
            if (empty($car_price)) {
                $errors['car_price'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_price,
                    'msg' => 'Vui lòng nhập giá sản phẩm',
                ];
            }
            // Rule: isNumber
            elseif (!is_numeric($car_price)) {
                $errors['car_price'][] = [
                    'rule' => 'is_number',
                    'rule_value' => true,
                    'value' => $car_price,
                    'msg' => 'Giá sản phẩm phải là dạng số',
                ];
            }
            // Rule: minlength 7 - lấy phần nguyên
            elseif (strlen(((int)$car_price)) < 7) {
                $errors['car_price'][] = [
                    'rule' => 'minlength',
                    'rule_value' => 7,
                    'value' => $car_price,
                    'msg' => 'Giá sản phẩm phải tối thiểu 7 số nguyên',
                ];
            }
            // Rule: maxlength 10 - lấy phần nguyên
            elseif (strlen(((int)$car_price)) > 12) {
                $errors['car_price'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 12,
                    'value' => $car_price,
                    'msg' => 'Giá sản phẩm chỉ tối đa 12 số nguyên',
                ];
            }


            // 3. Kiểm tra ô số lượng
            // Rule: required
            if (empty($car_quantity)) {
                $errors['car_quantity'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_quantity,
                    'msg' => 'Vui lòng nhập số lượng',
                ];
            }
            // Rule: isNumber
            elseif (!is_numeric($car_quantity)) {
                $errors['car_quantity'][] = [
                    'rule' => 'is_number',
                    'rule_value' => true,
                    'value' => $car_quantity,
                    'msg' => 'Số lượng phải là dạng số nguyên',
                ];
            }
            // Rule: isNumber integer
            elseif (($car_quantity - intval($car_quantity) != 0)) {
                $errors['car_quantity'][] = [
                    'rule' => 'is_number',
                    'rule_value' => true,
                    'value' => $car_quantity,
                    'msg' => 'Số lượng phải là dạng số nguyên',
                ];
            }
            // Rule: maxlength 2
            elseif (strlen(((int)$car_quantity)) > 2) {
                $errors['car_quantity'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 2,
                    'value' => $car_quantity,
                    'msg' => 'Số lượng tối đa là 99',
                ];
            }


            // 4. Kiểm tra dòng xe
            // Rule: required
            if ($car_type_id == 'NULL') {
                $errors['car_type_id'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_type_id,
                    'msg' => 'Vui lòng chọn dòng xe',
                ];
            }

            // 5. Kiểm tra số chỗ ngồi
            // Rule: required
            if ($car_seat_id == 'NULL') {
                $errors['car_seat_id'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_seat_id,
                    'msg' => 'Vui lòng chọn chỗ ngồi cho xe',
                ];
            }

            // 6. Kiểm tra loại hộp số
            // Rule: required
            if ($car_transmission_id == 'NULL') {
                $errors['car_transmission_id'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_transmission_id,
                    'msg' => 'Vui lòng chọn loại hộp số cho xe',
                ];
            }

            // 6. Kiểm tra mô tả ngắn
            // Rule: required
            if (empty($car_describe)) {
                $errors['car_describe'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_describe,
                    'msg' => 'Vui lòng nhập mô tả ngắn',
                ];
            }
            // Rule: minlength 10
            else if (strlen($car_describe) < 10) {
                $errors['car_describe'][] = [
                    'rule' => 'minlength',
                    'rule_value' => 10,
                    'value' => $car_describe,
                    'msg' => 'Mô tả ngắn sản phẩm phải tối thiểu 10 kí tự',
                ];
            }
            // Rule: maxlength 10
            else if (strlen($car_describe) > 200) {
                $errors['car_describe'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 200,
                    'value' => $car_describe,
                    'msg' => 'Mô tả ngắn sản phẩm tối đa có 200 ký tự',
                ];
            }

            // 7. Kiểm tra mô tả chi tiết
            // Rule: required
            if (empty($car_detail_describe)) {
                $errors['car_detail_describe'][] = [
                    'rule' => 'required',
                    'rule_value' => true,
                    'value' => $car_detail_describe,
                    'msg' => 'Vui lòng nhập mô tả chi tiết',
                ];
            }
            // Rule: minlength 10
            else if (strlen($car_detail_describe) < 100) {
                $errors['car_detail_describe'][] = [
                    'rule' => 'minlength',
                    'rule_value' => 100,
                    'value' => $car_detail_describe,
                    'msg' => 'Mô tả chi tiết sản phẩm phải tối thiểu 100 kí tự',
                ];
            }
            // Rule: maxlength 10
            else if (strlen($car_detail_describe) > 5000) {
                $errors['car_detail_describe'][] = [
                    'rule' => 'maxlength',
                    'rule_value' => 5000,
                    'value' => $car_detail_describe,
                    'msg' => 'Mô tả chi tiết sản phẩm tối đa có 5000 ký tự',
                ];
            }

            $DB['db_cars']->updateData(
                $car_id,
                $car_name,
                $car_price,
                $car_quantity,
                $car_describe,
                $car_detail_describe,
                $car_seat_id,
                $car_fuel_id,
                $car_type_id,
                $car_transmission_id,
                $car_producer_id
            );

            if (!empty($_FILES['car_img_filename']['name'][0])) {
                $uploadDir = __DIR__ . '/../../assets/uploads/';
                $DB['db_car_img']->updateData($data_car_img, $_FILES['car_img_filename'], $car_id, $uploadDir);
            }

            // Ngắt kết nối cho các đối tượng con
            $DB['db_cars']->disconnect();
            $DB['db_car_seat']->disconnect();
            $DB['db_car_fuel']->disconnect();
            $DB['db_car_type']->disconnect();
            $DB['db_car_transmission']->disconnect();
            $DB['db_car_producer']->disconnect();
            $DB['db_car_img']->disconnect();

            echo '<script>location.href = "../"</script>';
        }
    }

    public function softDelete($DB)
    {
        if (isset($_POST['btnDelete'])) {
            $DB['db_cars']->connect();
            $DB['db_cars']->softDelete($_POST['car_ids']);
            echo '<script>location.href = "./"</script>';
            $DB['db_cars']->disconnect();
        }
    }

    public function trash($DB)
    {
        $DB['db_cars']->connect();
        $data_cars = $DB['db_cars']->getAllDataDeleted();
        include __DIR__ . "/../views/backend/product/trash.php";
        $DB['db_cars']->disconnect();
    }

    public function restore($DB)
    {
        if (isset($_POST['btnRestore'])) {
            $DB['db_cars']->connect();
            $DB['db_cars']->restore($_POST['car_ids']);
            echo '<script>location.href = "./"</script>';
            $DB['db_cars']->disconnect();
        }
    }

    public function forceDelete($DB)
    {
        if (isset($_POST['btnForceDelete'])) {
            $DB['db_cars']->connect();
            $DB['db_cars']->forceDelete($_POST['car_ids']);
            echo '<script>location.href = "./"</script>';
            $DB['db_cars']->disconnect();
        }
    }
}
