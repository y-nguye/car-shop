<?php
session_start();

class Controller
{
    protected $DB;
    protected $emailSendName;
    protected $emailSendPassword;

    public function __construct($DB)
    {
        $this->DB = $DB;
        $this->emailSendName = $_ENV['EMAIL_HOST'];
        $this->emailSendPassword = $_ENV['EMAIL_PASSWORD'];
    }

    protected function authentication()
    {
        if (!isset($_SESSION["logged"])) {
            echo '<script>location.href = "' . BASE_URL . '/account/login"</script>';
            die();
        }

        if (isset($_SESSION["logged"]) && !$_SESSION["logged"]) {
            echo '<script>location.href = "' . BASE_URL . '/account/login"</script>';
            die();
        }
    }

    protected function authorization()
    {
        if (isset($_SESSION["user_is_admin"]) && !$_SESSION["user_is_admin"]) {
            $this->pageNotFound();
        }
    }

    protected function checkNull($var)
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
