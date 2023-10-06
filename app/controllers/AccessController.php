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
}
