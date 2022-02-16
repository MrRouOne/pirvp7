<?php
// Подключаем сессию и базу данных
require_once '../connect.php';

// Если есть флаг на авторизацию, то авторизируем пользователя
if (!empty($_POST['submit']) && $_POST['submit'] == 'Добавить') {
    // Очищаем пришедшие данные от HTML и PHP тегов
    $id = strip_tags($_POST['id']);

    // Создаём запрос на пользователя с введёнными данными
    $query = "INSERT INTO service_carts (user, service) VALUES ('$USER_ID','$id')";
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));

}
?>