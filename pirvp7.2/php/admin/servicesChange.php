<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Обновить') {
    arrayStripTags($_POST);

    $query = "SELECT * FROM services WHERE title LIKE '$title' and description LIKE '$description' and price LIKE '$price'";
    $res = checkResult($mysqli, $query);

    if ($res->{'num_rows'} != 0) {
        $messages[] = "Такой товар уже существует!<br>";
    }

    if (!integerSymbol($price)) {
        $messages[] = "Цена должна быть числом!<br>";
    }

    if (count($messages) < 1) {
        $query = "UPDATE services SET title = '$title', description = '$description', price = '$price' WHERE id = '$id'";
        checkResult($mysqli,$query);
        header('Location: index.php');
    }
}