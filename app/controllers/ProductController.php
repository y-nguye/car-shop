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
        // UPDATES
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
            $car_added_day = $_POST['car_added_day'];
            $car_deleted = $_POST['car_deleted'];
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
            if (strlen($car_name) < 3) {
                $errors['car_name'][] = [
                    'rule' => 'minlength',
                    'rule_value' => 3,
                    'value' => $car_name,
                    'msg' => 'Tên sản phẩm phải tối thiểu 3 kí tự',
                ];
            }

            // Rule: maxlength 10
            if (strlen($car_name) > 50) {
                $errors['car_name'][] = [
                    'rule' => 'minlength',
                    'rule_value' => 100,
                    'value' => $car_name,
                    'msg' => 'Tên sản phẩm tối đa có 50 ký tự',
                ];
            }

            // Người dùng không vi phạm quy luật nào cả --> tiến hành lưu
            if (count($errors) == 0) {

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

                // Lấy id của sản phẩm vừa thêm
                $new_car_id = $DB['db_cars']->id;

                date_default_timezone_set('Asia/Ho_Chi_Minh');

                $car_img_filename = $_POST['car_img_filename'];

                if (!empty($_FILES['car_img_filename']['name'])) {
                    $uploadDir = __DIR__ . '/../../assets/uploads/';
                    // name của thẻ input chọn file
                    $newFileName = date('Ymd_His') . '_' . $_FILES['car_img_filename']['name'];

                    if (is_writable($uploadDir)) {
                        echo "Thư mục có quyền ghi";
                    } else {
                        echo "Thư mục không có quyền ghi";
                    }

                    if (move_uploaded_file($_FILES['car_img_filename']['tmp_name'], $uploadDir . $newFileName)) {
                        echo "Di chuyển thành công";
                    } else {
                        // Có lỗi xảy ra
                        $error = error_get_last();
                        echo "Lỗi: " . $error['message'] . ". Không thể thêm hình ảnh";
                    }

                    $DB['db_car_img']->setData($newFileName, $new_car_id);
                }

                // Trở về danh sách
                echo '<script>location.href = "./"</script>';
            }
            // Alert lỗi ra màng hình cho người dùng
            else echo "<script>
                        var alertPlaceholder = document.getElementById('liveAlertPlaceholder');

                        function showAlert(message, type) {
                            var wrapper = document.createElement('div');
                            wrapper.innerHTML = '<div class=\"alert alert-' + type + ' alert-dismissible\" role=\"alert\">' + message + '<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>';

                            alertPlaceholder.appendChild(wrapper);
                        }

                        showAlert('Lỗi khi thêm dữ liệu!', 'danger');
                    </script>";
        }
    }

    public function edit($DB, $vars)
    {
        $car_id = implode('', $vars);

        $DB['db_cars']->connect();
        $DB['db_car_seat']->connect();
        $DB['db_car_fuel']->connect();
        $DB['db_car_type']->connect();
        $DB['db_transmission']->connect();
        $DB['db_car_producer']->connect();
        $DB['db_car_img']->connect();

        $data_car = $DB['db_cars']->getData($car_id);
        $data_car_seat = $DB['db_car_seat']->getAllData();
        $data_car_type = $DB['db_car_type']->getAllData();
        $data_car_fuel = $DB['db_car_fuel']->getAllData();
        $data_car_transmission = $DB['db_car_transmission']->getAllData();
        $data_car_producer = $DB['db_car_producer']->getAllData();
        $data_car_img = $DB['db_car_img']->getData($car_id);

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

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $car_img_filename = $_POST['car_img_filename'];

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

            // if (!empty($_FILES['car_img_filename']['name'])) {
            //     $uploadDir = __DIR__ . '/../../assets/uploads/';

            //     // name của thẻ input chọn file
            //     $newFileName = date('Ymd_His') . '_' . $_FILES['car_img_filename']['name'];

            //     if (is_writable($uploadDir)) {
            //         echo "Thư mục có quyền ghi";
            //     } else {
            //         echo "Thư mục không có quyền ghi";
            //     }

            //     if (move_uploaded_file($_FILES['car_img_filename']['tmp_name'], $uploadDir . $newFileName)) {
            //         echo "Di chuyển thành công";
            //     } else {
            //         // Có lỗi xảy ra
            //         $error = error_get_last();
            //         echo "Lỗi: " . $error['message'];
            //     }

            //     $DB['db_car_img']->updateData($data_car_img['car_img_id'], $newFileName, $car_id);

            // }
            echo '<script>location.href = "../"</>';
        }
    }

    public function softDelete($DB)
    {
        if (isset($_POST['btnDelete'])) {
            $DB['db_cars']->connect();
            $DB['db_cars']->softDelete($_POST['car_ids']);
            echo '<script>location.href = "./"</script>';
        }
    }

    public function trash($DB)
    {
        $DB['db_cars']->connect();
        $data_cars = $DB['db_cars']->getAllDataDeleted();
        include __DIR__ . "/../views/backend/product/trash.php";
    }

    public function restore($DB)
    {
        if (isset($_POST['btnRestore'])) {
            $DB['db_cars']->connect();
            $DB['db_cars']->restore($_POST['car_ids']);
            echo '<script>location.href = "./"</script>';
        }
    }

    public function forceDelete($DB)
    {
        if (isset($_POST['btnForceDelete'])) {
            $DB['db_cars']->connect();
            $DB['db_cars']->forceDelete($_POST['car_ids']);
            echo '<script>location.href = "./"</script>';
        }
    }
}
