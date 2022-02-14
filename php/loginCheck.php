<?php
// Подключаем сессию и базу данных
require_once '../connect.php';

function checkRole($mysqli): string
{
    if (!empty($_SESSION['name']) and !empty($_SESSION['lastname'])) {

        $name = strip_tags($_SESSION['name']);
        $lastname = strip_tags($_SESSION['lastname']);

        $query = "SELECT * FROM users WHERE name LIKE '$name' and lastname LIKE '$lastname'";

        $res = mysqli_query($mysqli, $query);
        if (!$res) die (mysqli_error($mysqli));
        $row = mysqli_fetch_assoc($res);

        if ($row['role'] == 0) {
            return 'authorized';
        }

        if ($row['role'] == 1) {
            return 'admin';
        }
    }
    return "guest";
}

?>