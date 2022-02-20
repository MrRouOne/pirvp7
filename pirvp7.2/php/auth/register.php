<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Регистрация') {
    $name = strip_tags($_POST['name']);
    $FIO = strip_tags($_POST['FIO']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $password2 = strip_tags($_POST['password2']);

    $count = 0;
    $res = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '$email'");

    if ($res->{'num_rows'} != 0) {
        $messages[] = "Такой пользователь уже существует!<br>";
        $count++;
    }

    if (!russianSymbol($FIO)) {
        $messages[] = "ФИО должно быть на русском!<br>";
        $count++;
    }

    if (!minLength($password)) {
        $messages[] = "Пароль должен содержать не менее 6 символов!<br>";
        $count++;
    }

    if (!passwordsRepeatCheck($password, $password2)) {
        $messages[] = "Пароли не совпадают!<br>";
        $count++;
    }

    if ($count < 1) {
        checkResult($mysqli,"INSERT INTO users (FIO, email, password, role) VALUES ('$FIO','$email','$password',0)");
        header('Location: login.php');
    }
}