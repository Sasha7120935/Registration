<?php

namespace Classes;

class Auth
{
    public static function checkAuth($name, $surname, $email, $password, $conPassword)
    {
        $users = Db::userDb();
        if ($users['name'] === $name && $users['surname'] === $surname && $users['email'] === $email && $users['pwd'] === $password && $users['conPwd'] === $conPassword) {
            return true;
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

        if (Auth::checkAuth($nameFromCookie, $surnameFromCookie, $emailFromCookie, $passwordFromCookie, $conPasswordFromCookie)) {
            return $nameFromCookie;
        }

        return null;

    }

    public static function getWelcome()
    {
        if (!empty($_POST)) {
            $name = $_POST['name'] ?: '';
            $surname = $_POST['surname'] ?: '';
            $email = $_POST['email'] ?: '';
            $password = $_POST['pwd'] ?: '';
            $conPassword = $_POST['conPwd'] ?: '';
            $login = $_POST['login'] ?: '';
            session_start();
            if (Auth::checkAuth($name, $surname, $email, $password, $conPassword)) {
                setcookie('name', $name, 0, '/');
                setcookie('surname', $surname, 0, '/');
                setcookie('email', $email, 0, '/');
                setcookie('pwd', $password, 0, '/');
                setcookie('conPwd', $conPassword, 0, '/');
                header('Location: classes/welcome.php');
            } else {
                setcookie('login', $login, 0, '/');
                $_SESSION['login'] += 1;
                echo '<h3 class="nav" style="color: red; text-align: center">Invalid data entry</h3>';
                if ($_SESSION['login'] > 2) {
                    Db::addToTable();
                    header("Location: wrong.php");
                }
            }

        }
    }

}