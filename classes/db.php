<?php

namespace Classes;

class Db
{
    public static function userDb()
    {
        $sql = "SELECT name, surname, pwd, email, conPwd FROM form";
        $result = Db::connectionDatabase()->query($sql);

        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr = [
                    'name' => $row['name'],
                    'surname' => $row['surname'],
                    'email' => $row['email'],
                    'pwd' => $row['pwd'],
                    'conPwd' => $row['conPwd'],
                ];
            }
        }

        return $arr;
    }

    public static function addToTable()
    {
        if (isset($_POST['login'])) {
            if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['pwd'] && !empty($_POST['conPwd']))) {
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
                $password = $_POST['pwd'];
                $con_password = $_POST['conPwd'];
                $query = "insert into form values('$name', '$surname', '$password', '$email', '$con_password')";
                $run = mysqli_query(Db::connectionDatabase(), $query) or die(mysqli_error(Db::connectionDatabase()));
            }
        }
    }

    public static function connectionDatabase()
    {
        Db::createDatabases();
        $conn = mysqli_connect(
            'localhost',
            'root',
            '1234@Abcd',
            'registration');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "CREATE TABLE form (
                name VARCHAR(30) NOT NULL,
                surname VARCHAR(30) NOT NULL,
                pwd VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                conPwd VARCHAR(50) NOT NULL
               )";
        $conn->query($sql);

        return $conn;
    }

    public static function createDatabases()
    {
        $servername = "localhost";
        $username = "root";
        $password = "1234@Abcd";
        $conn = mysqli_connect($servername, $username, $password);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "CREATE DATABASE registration";
        mysqli_query($conn, $sql);

        return $conn;
    }

}