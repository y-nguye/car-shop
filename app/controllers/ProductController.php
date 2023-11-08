<?php
require_once __DIR__ . '/Controller.php';

class ProductController extends Controller
{
    public function index()
    {
        $this->authentication();
        $this->authorization();

        $this->DB['db_cars']->connect();
        $data_cars = $this->DB['db_cars']->getAllData();
        include_once __DIR__ . "/../views/backend/product/index.php";
        $this->DB['db_cars']->disconnect();
        unset($_SESSION['pathname']);
    }

    public function add()
    {
        $this->authentication();
        $this->authorization();

        $this->DB['db_cars']->connect();
        $this->DB['db_car_seat']->connect();
        $this->DB['db_car_fuel']->connect();
        $this->DB['db_car_type']->connect();
        $this->DB['db_car_transmission']->connect();
        $this->DB['db_car_producer']->connect();
        $this->DB['db_car_img']->connect();

        $data_all_car_seat = $this->DB['db_car_seat']->getAllData();
        $data_all_car_type = $this->DB['db_car_type']->getAllData();
        $data_all_car_fuel = $this->DB['db_car_fuel']->getAllData();
        $data_all_car_transmission = $this->DB['db_car_transmission']->getAllData();
        $data_all_car_producer = $this->DB['db_car_producer']->getAllData();

        include_once __DIR__ . "/../views/backend/product/add.php";

        $_SESSION['pathname'] = '/car-shop/admin/product';

        if (isset($_POST['btnAdd'])) {

            $car_name = $_POST['car_name'];
            $car_price = $_POST['car_price'];
            $car_quantity = $_POST['car_quantity'];
            $car_describe = $_POST['car_describe'];
            $car_detail_describe = $_POST['car_detail_describe'];
            $car_engine = $_POST['car_engine'];
            $car_type_id = empty($_POST['car_type_id']) ? 'NULL' : $_POST['car_type_id'];
            $car_seat_id = empty($_POST['car_seat_id']) ? 'NULL' : $_POST['car_seat_id'];
            $car_fuel_id = empty($_POST['car_fuel_id']) ? 'NULL' : $_POST['car_fuel_id'];
            $car_transmission_id = empty($_POST['car_transmission_id']) ? 'NULL' : $_POST['car_transmission_id'];
            $car_producer_id = empty($_POST['car_producer_id']) ? 'NULL' : $_POST['car_producer_id'];

            $carInfo = [
                'car_name' => $car_name,
                'car_price' => $car_price,
                'car_quantity' => $car_quantity,
                'car_describe' => $car_describe,
                'car_detail_describe' => $car_detail_describe,
                'car_engine' => $car_engine,
                'car_type_id' => $car_type_id,
                'car_fuel_id' => $car_fuel_id,
                'car_seat_id' => $car_seat_id,
                'car_transmission_id' => $car_transmission_id,
                'car_producer_id' => $car_producer_id,
            ];

            // Validation phía server
            $errors = $this->validationServerSide($carInfo);

            // Người dùng không vi phạm quy luật nào cả --> tiến hành lưu
            if (empty($errors)) {

                $this->DB['db_cars']->setData(
                    $car_name,
                    $car_price,
                    $car_quantity,
                    $car_describe,
                    $car_detail_describe,
                    $car_engine,
                    $car_type_id,
                    $car_seat_id,
                    $car_fuel_id,
                    $car_transmission_id,
                    $car_producer_id
                );

                // Lấy id của sản phẩm vừa thêm
                $new_car_id = $this->DB['db_cars']->id;

                // Nếu người dùng có thêm ảnh
                if (!empty($_FILES['car_img_filename']['name'][0])) {
                    $uploadDir = __DIR__ . '/../../assets/uploads/';
                    $this->DB['db_car_img']->setData($_FILES['car_img_filename'], $new_car_id, $uploadDir);
                }

                // Ngắt kết nối cho các đối tượng con
                $this->DB['db_cars']->disconnect();
                $this->DB['db_car_type']->disconnect();
                $this->DB['db_car_seat']->disconnect();
                $this->DB['db_car_fuel']->disconnect();
                $this->DB['db_car_transmission']->disconnect();
                $this->DB['db_car_producer']->disconnect();
                $this->DB['db_car_img']->disconnect();

                // Trở về danh sách
                echo '<script>location.href = "./"</script>';
            }
            // Ngược lại có lỗi, in ra bằng Alert
            else {
                $this->showErrorsAlert($errors);
            }
        }
    }

    public function edit($var)
    {
        $this->authentication();
        $this->authorization();

        $car_id = $var['id'];

        // Kết nối và lấy dữ liệu
        $this->DB['db_cars']->connect();
        $data_car = $this->DB['db_cars']->getDataByID($car_id);
        $this->checkNull($data_car);

        $this->DB['db_car_type']->connect();
        $this->DB['db_car_seat']->connect();
        $this->DB['db_car_fuel']->connect();
        $this->DB['db_car_transmission']->connect();
        $this->DB['db_car_producer']->connect();
        $this->DB['db_car_img']->connect();

        // getData thì trả về mảng 1 chiều, getAllData thì trả về mảng 2 chiều
        $data_all_car_img = $this->DB['db_car_img']->getAllDataByCarID($car_id);
        $data_all_car_type = $this->DB['db_car_type']->getAllData();
        $data_all_car_seat = $this->DB['db_car_seat']->getAllData();
        $data_all_car_fuel = $this->DB['db_car_fuel']->getAllData();
        $data_all_car_transmission = $this->DB['db_car_transmission']->getAllData();
        $data_all_car_producer = $this->DB['db_car_producer']->getAllData();

        // Render ra trang
        include_once __DIR__ . "/../views/backend/product/edit.php";

        $_SESSION['pathname'] = '/car-shop/admin/product/edit/' . $car_id . '';

        if (isset($_POST['btnEdit'])) {

            $car_name = $_POST['car_name'];
            $car_price = $_POST['car_price'];
            $car_quantity = $_POST['car_quantity'];
            $car_describe = $_POST['car_describe'];
            $car_detail_describe = $_POST['car_detail_describe'];
            $car_engine = $_POST['car_engine'];
            $car_type_id = empty($_POST['car_type_id']) ? 'NULL' : $_POST['car_type_id'];
            $car_seat_id = empty($_POST['car_seat_id']) ? 'NULL' : $_POST['car_seat_id'];
            $car_fuel_id = empty($_POST['car_fuel_id']) ? 'NULL' : $_POST['car_fuel_id'];
            $car_transmission_id = empty($_POST['car_transmission_id']) ? 'NULL' : $_POST['car_transmission_id'];
            $car_producer_id = empty($_POST['car_producer_id']) ? 'NULL' : $_POST['car_producer_id'];

            $carInfo = [
                'car_name' => $car_name,
                'car_price' => $car_price,
                'car_quantity' => $car_quantity,
                'car_describe' => $car_describe,
                'car_detail_describe' => $car_detail_describe,
                'car_engine' => $car_engine,
                'car_type_id' => $car_type_id,
                'car_seat_id' => $car_seat_id,
                'car_fuel_id' => $car_fuel_id,
                'car_transmission_id' => $car_transmission_id,
                'car_producer_id' => $car_producer_id,
            ];

            // Validation phía server
            $errors = $this->validationServerSide($carInfo);

            // Người dùng không vi phạm quy luật nào cả --> tiến hành lưu
            if (empty($errors)) {

                $this->DB['db_cars']->updateData(
                    $car_id,
                    $car_name,
                    $car_price,
                    $car_quantity,
                    $car_describe,
                    $car_detail_describe,
                    $car_engine,
                    $car_type_id,
                    $car_seat_id,
                    $car_fuel_id,
                    $car_transmission_id,
                    $car_producer_id
                );

                if (!empty($_FILES['car_img_filename']['name'][0])) {
                    $uploadDir = __DIR__ . '/../../assets/uploads/';
                    $this->DB['db_car_img']->updateData($data_all_car_img, $_FILES['car_img_filename'], $car_id, $uploadDir);
                }

                // Ngắt kết nối cho các đối tượng con
                $this->DB['db_cars']->disconnect();
                $this->DB['db_car_type']->disconnect();
                $this->DB['db_car_seat']->disconnect();
                $this->DB['db_car_fuel']->disconnect();
                $this->DB['db_car_transmission']->disconnect();
                $this->DB['db_car_producer']->disconnect();
                $this->DB['db_car_img']->disconnect();

                echo '<script>location.href = "../"</script>';
            } else {
                $this->showErrorsAlert($errors);
            }
        }
    }

    public function softDelete()
    {
        $this->authentication();
        $this->authorization();

        // Kiểm soát truy cập
        if (!isset($_POST['btnDelete'])) $this->pageNotFound();

        $this->DB['db_cars']->connect();
        $this->DB['db_cars']->softDelete($_POST['car_ids']);

        // Xoá sản phẩm trong giỏ hàng
        foreach ($_POST['car_ids'] as $car_id) {
            if (isset($_SESSION['cart'][$car_id])) unset($_SESSION['cart'][$car_id]);
        }

        $this->DB['db_cars']->disconnect();
        echo '<script>location.href = "./"</script>';
    }

    public function trash()
    {
        $this->authentication();
        $this->authorization();

        $this->DB['db_cars']->connect();
        $data_cars = $this->DB['db_cars']->getAllDataDeleted();
        include_once __DIR__ . "/../views/backend/product/trash.php";
        $this->DB['db_cars']->disconnect();
    }

    public function restore()
    {
        if (!isset($_POST['btnRestore'])) $this->pageNotFound();

        $this->DB['db_cars']->connect();
        $this->DB['db_cars']->restore($_POST['car_ids']);
        $this->DB['db_cars']->disconnect();
        echo '<script>location.href = "./"</script>';
    }

    public function forceDelete()
    {
        if (!isset($_POST['btnForceDelete'])) $this->pageNotFound();

        $uploadDir = __DIR__ . '/../../assets/uploads/';
        $this->DB['db_cars']->connect();
        $this->DB['db_cars']->forceDelete($_POST['car_ids'], $uploadDir);
        $this->DB['db_cars']->disconnect();
        echo '<script>location.href = "./"</script>';
    }

    public function addProducer()
    {
        $this->authentication();
        $this->authorization();

        $this->DB['db_car_producer']->connect();
        $data_all_car_producer = $this->DB['db_car_producer']->getAllData();

        include_once __DIR__ . "/../views/backend/product/addProducer.php";

        echo '<script> const pathname = "' . $_SESSION['pathname'] . '";</script>';

        // Thêm hãng xe
        if (isset($_POST['btnAddProducer'])) {
            $car_producer_name = $_POST['car_producer_name'];
            // Validation phía server, maxlength 50
            $errors = $this->validationMaxLengthServerSide($car_producer_name, 50);

            if (empty($errors)) {
                $this->DB['db_car_producer']->setData($car_producer_name);
                $this->DB['db_car_producer']->disconnect();

                echo '<script>location.href = "/car-shop/admin/product/add-producer"</script>';
            } else {
                $this->showErrorsAlert($errors);
            }
        }

        // Xoá hãng xe
        if (isset($_POST['btnDeleteProducer'])) {
            $this->DB['db_car_producer']->deleteData($_POST['car_producer_ids']);
            $this->DB['db_car_producer']->disconnect();

            echo '<script>location.href = "/car-shop/admin/product/add-producer"</script>';
        }
    }

    public function addProducerCheck()
    {
        $this->authentication();
        $this->authorization();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->DB['db_car_producer']->connect();
            $producerExists = $this->DB['db_car_producer']->checkData($_POST['car_producer_name']);

            if ($producerExists) echo 'false';
            else echo 'true';

            $this->DB['db_car_producer']->disconnect();
        }
    }


    // ---------------- Các phương thức private  ----------------

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

    private function validationMaxLengthServerSide($car_producer_name, $maxlength)
    {
        $errors = [];
        // Rule: maxlength
        if (strlen($car_producer_name) > $maxlength) {
            $errors['car_producer_name'][] = [
                'rule' => 'maxlength',
                'rule_value' => $maxlength,
                'value' => $car_producer_name,
                'msg' => 'Tên quá dài',
            ];
        }
        return $errors;
    }

    private function validationServerSide($carInfo)
    {
        $car_name = $carInfo['car_name'];
        $car_price = $carInfo['car_price'];
        $car_quantity = $carInfo['car_quantity'];
        $car_describe = $carInfo['car_describe'];
        $car_detail_describe = $carInfo['car_detail_describe'];
        $car_engine = $carInfo['car_engine'];
        $car_type_id = $carInfo['car_type_id'];
        $car_seat_id = $carInfo['car_seat_id'];
        $car_transmission_id = $carInfo['car_transmission_id'];
        // $car_fuel_id = $carInfo['car_fuel_id'];
        // $car_producer_id = $carInfo['car_producer_id'];

        // Validation phía server
        $errors = [];

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
        // Rule: maxlength 50
        else if (strlen($car_name) > 50) {
            $errors['car_name'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $car_name,
                'msg' => 'Tên sản phẩm tối đa có 100 ký tự',
            ];
        }

        // 2. Kiểm tra ô động cơ
        // Rule: required
        if (empty($car_engine)) {
            $errors['car_engine'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $car_engine,
                'msg' => 'Vui lòng nhập loại động cơ',
            ];
        }


        // 3. Kiểm tra ô giá xe
        // Rule: required
        if (empty($car_price)) {
            $errors['car_price'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $car_price,
                'msg' => 'Vui lòng nhập giá sản phẩm',
            ];
        }
        // Rule: is_number
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
        // Rule: maxlength 12 - lấy phần nguyên
        elseif (strlen(((int)$car_price)) > 12) {
            $errors['car_price'][] = [
                'rule' => 'maxlength',
                'rule_value' => 12,
                'value' => $car_price,
                'msg' => 'Giá sản phẩm chỉ tối đa 12 số nguyên',
            ];
        }


        // 4. Kiểm tra ô số lượng
        // Rule: required
        if (empty($car_quantity)) {
            $errors['car_quantity'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $car_quantity,
                'msg' => 'Vui lòng nhập số lượng',
            ];
        }
        // Rule: is_number
        elseif (!is_numeric($car_quantity)) {
            $errors['car_quantity'][] = [
                'rule' => 'is_number',
                'rule_value' => true,
                'value' => $car_quantity,
                'msg' => 'Số lượng phải là dạng số nguyên',
            ];
        }
        // Rule: is_number integer
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


        // 5. Kiểm tra dòng xe
        // Rule: required
        if ($car_type_id == 'NULL') {
            $errors['car_type_id'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $car_type_id,
                'msg' => 'Vui lòng chọn dòng xe',
            ];
        }

        // 6. Kiểm tra số chỗ ngồi
        // Rule: required
        if ($car_seat_id == 'NULL') {
            $errors['car_seat_id'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $car_seat_id,
                'msg' => 'Vui lòng chọn chỗ ngồi cho xe',
            ];
        }

        // 7. Kiểm tra loại hộp số
        // Rule: required
        if ($car_transmission_id == 'NULL') {
            $errors['car_transmission_id'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $car_transmission_id,
                'msg' => 'Vui lòng chọn loại hộp số cho xe',
            ];
        }

        // 8. Kiểm tra mô tả ngắn
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
        // Rule: maxlength 200
        else if (strlen($car_describe) > 200) {
            $errors['car_describe'][] = [
                'rule' => 'maxlength',
                'rule_value' => 200,
                'value' => $car_describe,
                'msg' => 'Mô tả ngắn sản phẩm tối đa có 200 ký tự',
            ];
        }

        // 9. Kiểm tra mô tả chi tiết
        // Rule: required
        if (empty($car_detail_describe)) {
            $errors['car_detail_describe'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $car_detail_describe,
                'msg' => 'Vui lòng nhập mô tả chi tiết',
            ];
        }
        // Rule: minlength 100
        else if (strlen($car_detail_describe) < 100) {
            $errors['car_detail_describe'][] = [
                'rule' => 'minlength',
                'rule_value' => 100,
                'value' => $car_detail_describe,
                'msg' => 'Mô tả chi tiết sản phẩm phải tối thiểu 100 kí tự',
            ];
        }
        // Rule: maxlength 5000
        else if (strlen($car_detail_describe) > 5000) {
            $errors['car_detail_describe'][] = [
                'rule' => 'maxlength',
                'rule_value' => 5000,
                'value' => $car_detail_describe,
                'msg' => 'Mô tả chi tiết sản phẩm tối đa có 5000 ký tự',
            ];
        }

        return $errors;
    }
}
