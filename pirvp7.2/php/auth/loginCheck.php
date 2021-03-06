<?php
// Подключаем сессию и базу данных
require_once '../connect.php';

function checkRole($mysqli): string
{
    if (!empty($_SESSION['email'])) {
        $email = strip_tags($_SESSION['email']);

        $row = mysqli_fetch_assoc(checkResult($mysqli,"SELECT * FROM users WHERE email LIKE '$email'"));

        if ($row['role'] == 0) {
            return 'authorized';
        }

        if ($row['role'] == 1) {
            return 'admin';
        }
    }
    return "guest";
}

function isAdmin($mysqli) {
    if (checkRole($mysqli) === 'admin') {
        return true;
    }
    return false;
}

function isAuthorized($mysqli) {
    if (checkRole($mysqli) === 'authorized') {
        return true;
    }
    return false;
}