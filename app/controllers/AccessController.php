<?php

class AccessController
{
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
        if (!$_SESSION["user_is_admin"]) {
            $this->notFound();
        }
    }

    public function checkNull($var)
    {
        if (!$var) {
            $this->notFound();
        }
    }

    public function notFound()
    {
        http_response_code(404);
        include_once __DIR__ . "/../views/resources/notFound/index.php";
        die();
    }
}
