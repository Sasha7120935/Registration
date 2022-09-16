<?php

namespace Classes;

class Auth
{
    public static function checkAuth($name, $surname, $email, $password, $conPassword)
    {
        $users = Auth::userDb();

        foreach ($users as $user) {
            if ($user['name'] === $name && $user['surname'] === $surname && $user['email'] === $email && $user['pwd'] === $password && $user['conPwd'] === $conPassword) {
                return true;
            }
        }
        return false;

    }

    public static function getUserLogin()
    {
        $nameFromCookie = isset($_COOKIE['name']) ? $_COOKIE['name'] : '';
        $surnameFromCookie = isset($_COOKIE['surname']) ? $_COOKIE['surname'] : '';
        $emailFromCookie = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
        $passwordFromCookie = isset($_COOKIE['pwd']) ? $_COOKIE['pwd'] : '';
        $conPasswordFromCookie = isset($_COOKIE['conPwd']) ? $_COOKIE['conPwd'] : '';
        if (Auth::checkAuth($nameFromCookie, $surnameFromCookie, $emailFromCookie, $passwordFromCookie,$conPasswordFromCookie)) {
            return $nameFromCookie;
        }
        return null;

    }

    public static function userDb()
    {
        return
            [
                [
                    'name' => 'alek',
                    'surname' => 'alek',
                    'email' => 'alek@gmail.com',
                    'pwd' => '1234@Abcd',
                    'conPwd' => '1234@Abcd'
                ],
                [
                    'name' => 'alek2',
                    'surname' => 'alek2',
                    'email' => 'alek2@gmail.com',
                    'pwd' => '1234@Abcd',
                    'conPwd' => '1234@Abcd'
                ],
                [
                    'name' => 'alek3',
                    'surname' => 'alek3',
                    'email' => 'alek3@gmail.com',
                    'pwd' => '1234@Abcd',
                    'conPwd' => '1234@Abcd',
                ]
            ];
    }

    public static function getWelcome()
    {
        if (!empty($_POST)) {
            $name = $_POST['name'] ?: '';
            $surname = $_POST['surname'] ?: '';
            $email = $_POST['email'] ?: '';
            $password = $_POST['pwd'] ?: '';
            $conPassword = $_POST['conPwd'] ?: '';
            if (Auth::checkAuth($name, $surname, $email, $password, $conPassword)) {
                setcookie('name', $name, 0, '/');
                setcookie('surname', $surname, 0, '/');
                setcookie('email', $email, 0, '/');
                setcookie('pwd', $password, 0, '/');
                setcookie('conPwd', $conPassword, 0, '/');
                header('Location: classes/welcome.php');
            }
        }
    }
}