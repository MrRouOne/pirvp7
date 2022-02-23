<?php
$host = 'localhost';
$database = 'pirvp7.3';
$user = 'root';
$password = '';

error_reporting(0);

$mysqli = mysqli_connect($host, $user, $password, $database);

if (!$mysqli) {
    echo 'Ошибка соединения: ' . mysqli_connect_error() . '<br>';
    echo 'Код ошибки: ' . mysqli_connect_errno();
}