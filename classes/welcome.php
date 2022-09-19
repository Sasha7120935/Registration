<?php

namespace Classes;

class Welcome
{
    public static function created()
    {
       $name = $_COOKIE['name'];
       $surname = $_COOKIE['name'];
        echo "Dear $name $surname, your account has been created";
    }
}
Welcome::created();