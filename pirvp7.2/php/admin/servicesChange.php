<?php
// Подключаем базу данных
require_once '../connect.php';

// Если есть флаг на регистрацию, то добавляем пользователя в базу данных
if (!empty($_POST['submit']) && $_POST['submit'] == 'Обновить') {
    // Очищаем пришедшие данные от HTML и PHP тегов
    $id = strip_tags($_POST['id']);
    $title = strip_tags($_POST['title']);
    $description = strip_tags($_POST['description']);
    $price = strip_tags($_POST['price']);

    // Проверяем данные
    $count = 0;
    $query = "SELECT * FROM services WHERE title LIKE '$title' and description LIKE '$description' and price LIKE '$price'";
    $res = mysqli_query($mysqli, $query);

    if ($res->{'num_rows'} != 0) {
        $messages[] = "Такой товар уже существует!<br>";
        $count++;
    }

    if (!integerSymbol($price)) {
        $messages[] = "Цена должна быть числом!<br>";
        $count++;
    }


    // Если всё корректно, то добавляем его в базу данных и перенаправляем на главную страницу
    if ($count < 1) {
        $query = "UPDATE services SET title = '$title', description = '$description', price = '$price' WHERE id = '$id'";
        $res = mysqli_query($mysqli, $query);
        if (!$res) die (mysqli_error($mysqli));
        header('Location: index.php');
    }

}
?>