<?php

class Wrong
{
    public static function redirect()
    {
        session_start();
        session_destroy();
        echo "Please try again later";
        header('refresh: 300 url=index.php');
    }
}

Wrong::redirect();