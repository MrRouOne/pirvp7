<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Регистрация') {
    arrayStripTags($_POST);
    $messages = [];

    $res = checkResult($mysqli, "SELECT * FROM users WHERE email = '$email'");

    if ($res->{'num_rows'} != 0) {
        $messages[] = "Такой пользователь уже существует!<br>";
    }

    if (!russianSymbol($FIO)) {
        $messages[] = "ФИО должно быть на русском!<br>";
    }

    if (!minLength($password)) {
        $messages[] = "Пароль должен содержать не менее 6 символов!<br>";
    }

    if (!passwordsRepeatCheck($password, $password2)) {
        $messages[] = "Пароли не совпадают!<br>";
    }

    if (count($messages) < 1) {
        checkResult($mysqli,"INSERT INTO users (FIO, email, password, role) VALUES ('$FIO','$email','$password',0)");
        header('Location: login.php');
    }
}