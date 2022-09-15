<?php

namespace Classes;

class Registration
{
    protected $name;
    protected $surname;
    protected $email;
    protected $pwd;
    protected $conPwd;

    public function __construct($name, $surname, $email, $pwd, $conPwd)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->conPwd = $conPwd;
    }

    public static function validateEmail()
    {

        if (empty($_POST['email'])) {
            echo '';
        } else {
            $email =  Registration::validate(($_POST['email']));
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
            $pwd =  Registration::validate(($_POST['pwd']));
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
        $data = htmlspecialchars($data);
        return $data;

    }

}