<?php
// Подключаем базу данных
require_once '../connect.php';

// Если есть флаг на регистрацию, то добавляем пользователя в базу данных
if (!empty($_POST['submit']) && $_POST['submit'] == 'Регистрация') {
    // Очищаем пришедшие данные от HTML и PHP тегов
    $name = strip_tags($_POST['name']);
    $FIO = strip_tags($_POST['FIO']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $password2 = strip_tags($_POST['password2']);

    // Проверяем данные
    $count = 0;
    $query = "SELECT * FROM users WHERE  email = '$email'";
    $res = mysqli_query($mysqli, $query);

    if ($res->{'num_rows'} != 0) {
        $message = "Такой пользователь уже существует";
        $count++;
    }

    // Если всё корректно, то добавляем его в базу данных и перенаправляем на главную страницу
    if ($count < 1) {
        $query = "INSERT INTO users (FIO, email, password, role) VALUES ('$FIO','$email','$password',0)";
        $res = mysqli_query($mysqli, $query);
        if (!$res) die (mysqli_error($mysqli));
        header('Location: login.php');
    }

}
?>