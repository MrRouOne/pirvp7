<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="viewport" content="width=device-width">
    <title>4</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&family=Oswald:wght@300;500;700&display=swap"
          rel="stylesheet">
</head>
<body>
<div class="wrap_add">
<?php include '../php/login.php'; ?>

<h1>Вход</h1>
<form action="" method="post">
    <label><p>Имя</p> <input type="text" name="name" required></label>
    <label><p>Фамилия</p> <input type="text" name="lastname" required></label>
    <label><p>Пароль</p> <input type="text" name="password" required></label>
    <input type="submit" name="submit" value="Авторизация">
</form>
</div>
</body>
</html>