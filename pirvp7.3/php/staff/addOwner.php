<?php
require_once '../connect.php';
if (!empty($_POST['submit']) && $_POST['submit'] == 'Добавить') {
    arrayStripTags($_POST);
    $messages = [];

    $res = checkResult($mysqli, "SELECT * FROM owners WHERE phone_number = '$phone_number'");
    if ($res->{'num_rows'} != 0) {
        $messages[] = "Владелец уже существует!<br>";
    }

    if (!russianSymbol($name)) {
        $messages[] = "Имя должно быть на русском!<br>";
    }

    if (!russianSymbol($lastname)) {
        $messages[] = "Фамилия должна быть на русском!<br>";
    }

    if (!isNumber($phone_number)) {
        $messages[] = "Номер должен содержать только цифры!<br>";
    }

    if (!numberLength($phone_number)) {
        $messages[] = "Номер должен содержать 11 цифр!<br>";
    }

    if (count($messages) < 1) {
        checkResult($mysqli, "INSERT INTO owners (name, lastname, phone_number) VALUES ('$name','$lastname','$phone_number')");
        $messages[] = "<div style='color: green;'>Владелец успешно добавлен!</div>";
    }
}