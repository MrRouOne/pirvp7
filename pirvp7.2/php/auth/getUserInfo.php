<?php
// Подключаем сессию и базу данных
require_once '../connect.php';

if (!empty($_SESSION['email'])) {
    $email = strip_tags($_SESSION['email']);

    $query = "SELECT * FROM users WHERE email LIKE '$email'";

    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    $row = mysqli_fetch_assoc($res);

    $USER_ID = $row['id'];
    $USER_FIO = $row['FIO'];
    $USER_email = $row['email'];
    $USER_role = $row['role'];
}

?>