<?php
// Подключаем сессию и базу данных
require_once '../connect.php';

// Если есть флаг на авторизацию, то авторизируем пользователя
if (!empty($_POST['submit']) && $_POST['submit'] == 'Вход') {
    // Очищаем пришедшие данные от HTML и PHP тегов
    $name = strip_tags($_POST['name']);
    $lastname = strip_tags($_POST['lastname']);
    $password = strip_tags($_POST['password']);

    // Создаём запрос на пользователя с введёнными данными
    $query = "SELECT * FROM users WHERE name LIKE '$name' and lastname LIKE '$lastname' and password LIKE '$password'";
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    $row = mysqli_fetch_assoc($res);

    // Если есть пользователь с такими данными, то записываем их в сессию
    // и перенаправляем пользователя на главную страницу, иначе выдаём ошибку
    if ($row['name'] == $name and $row['lastname'] == $lastname and $row['password'] == $password) {
        $_SESSION['name'] = $name;
        $_SESSION['lastname'] = $lastname;
        header('Location: index.php');
    } else {
        $message = "Введены некорректные данные!";
    }
}
?>