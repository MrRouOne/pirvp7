<?php
session_start();
require_once "../php/dbconnect.php";
require_once "../php/helpFunctions/dbFunction.php";

if (!empty($_SESSION['email'])) {
    $email = strip_tags($_SESSION['email']);

    $row = mysqli_fetch_assoc(checkResult($mysqli,  "SELECT * FROM users WHERE email LIKE '$email'"));

    $USER_ID = $row['id'];
    $USER_NAME = $row['name'];
    $USER_LASTNAME = $row['lastname'];
    $USER_EMAIL = $row['email'];
    $USER_ROLE = $row['role'];
}