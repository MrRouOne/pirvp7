<?php
// Подключаем сессию
session_start();

// Очищаем сессию
session_unset();
session_destroy();

// Перенаправляем пользователя на главную страницу
header('Location: ../html/index.php');
?>