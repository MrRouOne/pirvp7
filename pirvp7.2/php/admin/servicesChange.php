<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Обновить') {
    $id = strip_tags($_POST['id']);
    $title = strip_tags($_POST['title']);
    $description = strip_tags($_POST['description']);
    $price = strip_tags($_POST['price']);

    $count = 0;
    $query = "SELECT * FROM services WHERE title LIKE '$title' and description LIKE '$description' and price LIKE '$price'";
    $res = checkResult($mysqli, $query);

    if ($res->{'num_rows'} != 0) {
        $messages[] = "Такой товар уже существует!<br>";
        $count++;
    }

    if (!integerSymbol($price)) {
        $messages[] = "Цена должна быть числом!<br>";
        $count++;
    }

    if ($count < 1) {
        $query = "UPDATE services SET title = '$title', description = '$description', price = '$price' WHERE id = '$id'";
        checkResult($mysqli,$query);
        header('Location: index.php');
    }
}