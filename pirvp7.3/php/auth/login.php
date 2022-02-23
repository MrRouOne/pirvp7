<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Вход') {
    arrayStripTags($_POST);

    $row = mysqli_fetch_assoc(checkResult($mysqli, "SELECT * FROM users WHERE email LIKE '$email' and password LIKE '$password'"));

    if ($row['email'] == $email and $row['password'] == $password) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('Location: index.php');
    }
    $message = "Введены некорректные данные!";
}
