<?php
session_start();
require_once "../php/dbconnect.php";
require_once "../php/helpFunctions/dbFunction.php";

if (!empty($_SESSION['email'])) {
    $email = strip_tags($_SESSION['email']);

    $row = mysqli_fetch_assoc(checkResult($mysqli,  "SELECT * FROM users WHERE email LIKE '$email'"));

    $USER_ID = $row['id'];
    $USER_name = $row['name'];
    $USER_lastname = $row['lastname'];
    $USER_email = $row['email'];
    $USER_role = $row['role'];
}