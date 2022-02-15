<?php
// Вводим необходимую информацию
$host = 'localhost';
$database = 'pirvp7.2';
$user = 'root';
$password = '';

// Отменяем вывод ощибок и подключаем базу данных
error_reporting(0);

$mysqli = mysqli_connect($host, $user, $password, $database);

// Если БД не подключилась, выводим ошибку
if (!$mysqli) {
    echo 'Ошибка соединения: ' . mysqli_connect_error() . '<br>';
    echo 'Код ошибки: ' . mysqli_connect_errno();
}
?>