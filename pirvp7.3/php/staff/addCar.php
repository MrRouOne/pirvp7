<?php
require_once '../connect.php';
if (!empty($_POST['submit']) && $_POST['submit'] == 'Добавить') {
    arrayStripTags($_POST);
    $res = checkResult($mysqli, "SELECT * FROM cars WHERE brand LIKE '$brand'and model LIKE '$model' and owner LIKE '$owner'");
    $messages = [];

    if ($res->{'num_rows'} != 0) {
        $messages[] = "Такой автомобиль уже существует!<br>";
    }

    if (empty($owner)) {
        $messages[] = "Выбирете владельца!<br>";
    }

    if (count($messages) < 1) {
        checkResult($mysqli, "INSERT INTO cars (brand, model,color, number,owner) VALUES ('$brand','$model','$color','$number','$owner')");
        $messages[] = "<div style='color: green;'>Автомобиль успешно добавлен!</div>";
    }
}