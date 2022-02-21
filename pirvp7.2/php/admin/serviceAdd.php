<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Добавить') {
    arrayStripTags($_POST);

    $count = 0;
    $res = checkResult($mysqli, "SELECT * FROM services WHERE title LIKE '$title' and description LIKE '$description' and price LIKE '$price'");

    if ($res->{'num_rows'} != 0) {
        $messages[] = "Такой товар уже существует!<br>";
        $count++;
    }

    if (!integerSymbol($price)) {
        $messages[] = "Цена должна быть числом!<br>";
        $count++;
    }

    if ($count < 1) {
        checkResult($mysqli,"INSERT INTO services (title, description, price) VALUES ('$title','$description','$price')");
        header('Location: index.php');
    }
}