<?php
date_default_timezone_set('Etc/GMT-7');
session_start();
require_once "php/dbconnect.php";
require_once "php/validator/userValidator.php";
require_once "php/validator/staffValidator.php";
require_once "php/auth/loginCheck.php";
require_once "php/auth/getUserInfo.php";
require_once "php/helpFunctions/dbFunction.php";
require_once "php/helpFunctions/arrayFunctions.php";
require_once "php/helpFunctions/correctWord.php";
require_once "php/helpFunctions/percent.php";

