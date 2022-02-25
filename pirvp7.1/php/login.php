<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Авторизация') {
    $name = strip_tags($_POST['name']);
    $lastname = strip_tags($_POST['lastname']);
    $password = strip_tags($_POST['password']);

    $query = "SELECT * FROM users WHERE name LIKE '$name' and lastname LIKE '$lastname' and password LIKE '$password'";
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    $row = mysqli_fetch_assoc($res);

    if ($row['name'] == $name and $row['lastname'] == $lastname and $row['password'] == $password) {
        $_SESSION['name'] = $name;
        $_SESSION['lastname'] = $lastname;
        header('Location: index.php');
    } else {
        echo "<h2 class='red'>Введены некорректные данные!</h2>";
    }
}
?>