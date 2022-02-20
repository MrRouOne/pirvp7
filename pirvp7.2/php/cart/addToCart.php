<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Добавить') {
    $id = strip_tags($_POST['id']);

    checkResult($mysqli,"INSERT INTO service_carts (user, service) VALUES ('$USER_ID','$id')");
}