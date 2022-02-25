<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Добавить') {
    arrayStripTags($_POST);

    $res = checkResult($mysqli, "SELECT * FROM places WHERE title = '$title'");
    $messages = [];

    if ($res->{'num_rows'} != 0) {
        $messages[] = "Такое место уже существует!<br>";
    }

    if (!correctArea($area)) {
        $messages[] = "Некорректные данные площади! Введите размерность, а затем единицу измерения.<br>";
    }

    if (count($messages) < 1) {
        checkResult($mysqli, "INSERT INTO places (title, area) VALUES ('$title','$area')");
        $messages[] = "<div style='color: green;'>Место успешно добавлено!</div>";
    }
}