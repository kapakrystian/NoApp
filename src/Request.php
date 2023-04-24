<?php

namespace App;

class Request
{
    public function redirect(string $page): void
    {
        $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . $page;
        header('Location:' . $url);
        exit;
    }
}
