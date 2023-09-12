<?php

class ErrorController
{
    public function notFound()
    {
        include __DIR__ . "/../views/frontend/error/index.php";
    }
}
