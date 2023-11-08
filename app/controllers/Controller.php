<?php
session_start();

class Controller
{
    public $DB;

    public function __construct($DB = null)
    {
        $this->DB = $DB;
    }

    public function authentication()
    {
        if (!isset($_SESSION["logged"])) {
            echo '<script>location.href = "/car-shop/account/login"</script>';
            die();
        }

        if (isset($_SESSION["logged"]) && !$_SESSION["logged"]) {
            echo '<script>location.href = "/car-shop/account/login"</script>';
            die();
        }
    }

    public function authorization()
    {
        if (isset($_SESSION["user_is_admin"]) && !$_SESSION["user_is_admin"]) {
            $this->pageNotFound();
        }
    }

    public function checkNull($var)
    {
        if (!$var) {
            $this->pageNotFound();
        }
    }

    public function pageNotFound()
    {
        http_response_code(404);
        include_once __DIR__ . "/../views/resources/notFound/index.php";
        die();
    }

    public function getAllCarTypesForHeader()
    {
        $this->DB['db_car_type']->connect();
        $data_all_car_type = $this->DB['db_car_type']->getAllData();
        $this->DB['db_car_type']->disconnect();
        return $data_all_car_type;
    }
}
