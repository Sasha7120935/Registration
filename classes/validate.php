<?php

namespace Classes;

class Validate
{

    public static function validateEmail()
    {

        if (empty($_POST['email'])) {
            echo '';
        } else {
            $email =  Validate::validate(($_POST['email']));
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Invalid email format!';
            }
        }
    }

    public static function validatePassword()
    {
        if (empty($_POST['pwd'])) {
            echo '';
        } else {
            $pwd =  Validate::validate(($_POST['pwd']));
            if ($_POST['conPwd'] === $_POST['pwd']) {
                echo '';
            } else {
                echo 'Password does not match';
            }
        }
    }


    public static function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        return htmlspecialchars($data);

    }

}