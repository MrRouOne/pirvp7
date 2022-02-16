<?php
// Подключаем сессию и базу данных
require_once '../connect.php';

// Если есть флаг на авторизацию, то авторизируем пользователя
if (!empty($_POST['submit']) && $_POST['submit'] == 'Удалить') {
    // Очищаем пришедшие данные от HTML и PHP тегов
    $id = strip_tags($_POST['id']);

    // Создаём запрос на пользователя с введёнными данными
    $query = "DELETE FROM service_carts WHERE id='$id'";
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));

}
?>