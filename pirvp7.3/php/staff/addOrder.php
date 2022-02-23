<?php
require_once '../connect.php';
if (!empty($_POST['submit']) && $_POST['submit'] == 'Добавить') {
    arrayStripTags($_POST);
    $resCar = checkResult($mysqli, "SELECT * FROM orders WHERE car = '$car'");
    $resPlace = checkResult($mysqli, "SELECT * FROM orders WHERE place = '$place'");
    $messages = [];
    
    if ($resCar->{'num_rows'} != 0) {
        $messages[] = "Данный автомобиль уже зарегистрирован на стоянке!<br>";
    }

    if ($resPlace->{'num_rows'} != 0) {
        $messages[] = "Данное место уже занято!<br>";
    }

    if (empty($car)) {
        $messages[] = "Выбирете автомобиль!<br>";
    }

    if (empty($place)) {
        $messages[] = "Выбирете место!<br>";
    }

    if (!correctDate($entry_date)) {
        $messages[] = "Введена некорректная дата!<br>";
    }

    if (!isNumber($period)) {
        $messages[] = "Период должен содержать только цифры!<br>";
    }

    if (!isNumber($cost)) {
        $messages[] = "Стоимость должна содержать только цифры!<br>";
    }

    if (!isNumber($sale)) {
        $messages[] = "Скидка должна содержать только цифры!<br>";
    }

    if (!maxSale($sale)) {
        $messages[] = "Скидка не должна превышать 100%!<br>";
    }

    if (!isNumber($arrears)) {
        $messages[] = "Задолженность должна содержать только цифры!<br>";
    }

    if (count($messages) < 1) {
        checkResult($mysqli, "INSERT INTO orders (car, entry_date, period,cost,sale,arrears,place) VALUES 
                   ('$car', '$entry_date', '$period','$cost','$sale','$arrears','$place')");
        $messages[] = "<div style='color: green;'>Заказ успешно добавлен!</div>";
    }
}