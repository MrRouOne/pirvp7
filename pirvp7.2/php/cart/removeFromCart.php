<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Удалить') {
    $id = strip_tags($_POST['id']);

    checkResult($mysqli,"DELETE FROM service_carts WHERE id='$id'");
}