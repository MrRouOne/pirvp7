<?php
// Подключаем сессию и базу данных
require_once '../connect.php';

// Если есть флаг на авторизацию, то авторизируем пользователя
if (!empty($_POST['submit']) && $_POST['submit'] == 'Вход') {
    // Очищаем пришедшие данные от HTML и PHP тегов
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    // Создаём запрос на пользователя с введёнными данными
    $query = "SELECT * FROM users WHERE email LIKE '$email' and password LIKE '$password'";
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    $row = mysqli_fetch_assoc($res);

    // Если есть пользователь с такими данными, то записываем их в сессию
    // и перенаправляем пользователя на главную страницу, иначе выдаём ошибку
    if ($row['email'] == $email and $row['password'] == $password) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('Location: index.php');
    } else {
        $message = "Введены некорректные данные!";
    }
}
?>