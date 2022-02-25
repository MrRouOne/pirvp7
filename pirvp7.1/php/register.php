<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Регистрация') {
    $name = strip_tags($_POST['name']);
    $lastname = strip_tags($_POST['lastname']);
    $password = strip_tags($_POST['password']);

    $count = 0;
    $query = "SELECT * FROM users WHERE name = '$name' AND lastname = '$lastname'";
    $res = mysqli_query($mysqli, $query);

    if (!loginValidator($name)) {
        echo "<h2 class='red'>Некорректные данные имени</h2>";
        $count++;
    }

    if (!loginValidator($lastname)) {
        echo "<h2 class='red'>Некорректные данные фамилии</h2>";
        $count++;
    }

    if ($res->{'num_rows'} != 0) {
        echo "<h2 class='red'>Такой пользователь уже существует</h2>";
        $count++;
    }

    if ($count < 1) {
        $query = "INSERT INTO users (name,lastname, password,role) VALUES ('$name','$lastname','$password',0)";
        $res = mysqli_query($mysqli, $query);
        if (!$res) die (mysqli_error($mysqli));
        header('Location: index.php');
    }
}
?>