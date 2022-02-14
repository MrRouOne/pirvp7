<?php
// Подключаем базу данных
require_once '../connect.php';

// Если есть флаг на регистрацию, то добавляем пользователя в базу данных
if (!empty($_POST['submit']) && $_POST['submit'] == 'Регистрация') {
    // Очищаем пришедшие данные от HTML и PHP тегов
    $name = strip_tags($_POST['name']);
    $lastname = strip_tags($_POST['lastname']);
    $password = strip_tags($_POST['password']);

    // Проверяем, есть ли пользователь с таким логином
    $query = "SELECT * FROM users WHERE name = '$name' AND lastname = '$lastname'";
    $res = mysqli_query($mysqli, $query);

    if (loginValidator($lastname) and loginValidator($name)) {
        echo "<h2>Некорректные данные</h2>";
    }

    if ($res->{'num_rows'} != 0) {
        echo "<h2>Такой пользователь уже существует</h2>";
    } else {
        // Если пользователя нет, то добавляем его в базу данных и перенаправляем на главную страницу
        $query = "INSERT INTO users (name,lastname, password,role) VALUES ('$name','$lastname','$password',0)";
        $res = mysqli_query($mysqli, $query);
        if (!$res) die (mysqli_error($mysqli));

        header('Location: index.php');
    }
}
?>