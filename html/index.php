<?php
require_once '../connect.php';
?>
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
<div class="wrap">
    <?php
    if (checkRole($mysqli) === 'guest'):
        ?>
        <div class="links">
            <a href='register.php'>Зарегистрироваться</a>
            <a href='login.php'>Войти</a>
        </div>
        <h1>Вы гость!</h1>
    <?php
    elseif (checkRole($mysqli) === 'admin'):
        ?>
        <div class="links">
            <a href='../php/logout.php'>Выйти</a>
        </div>
        <h1>Вы админ!</h1>

    <?php
    elseif (checkRole($mysqli) === 'authorized'):
        ?>
        <div class="links">
            <a href='../php/logout.php'>Выйти</a>
        </div>
        <h1>Вы авторизированны!</h1>
    <?php
    endif;
    ?>
</div>

</body>
</html>


