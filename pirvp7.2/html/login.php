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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&family=Oswald:wght@300;500;700&display=swap"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="http://localhost/pirvp7/pirvp7.2/html/index.php"
           class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <h4 class="nav-link">Интернет-магазин</h4>
        </a>

        <ul class="nav nav-pills">
            <?php
            if (checkRole($mysqli) === 'guest'):
                ?>
                <li class="nav-item"><a href='#' class="nav-link">Гость</a></li>
                <li class="nav-item"><a href='register.php' class="nav-link">Зарегистрироваться</a></li>
                <li class="nav-item"><a href='login.php' class="nav-link">Войти</a></li>
            <?php
            elseif (checkRole($mysqli) === 'admin'):
                ?>
                <li class="nav-item"><a href='#' class="nav-link">Админ</a></li>
                <li class="nav-item"><a class="nav-link" href='../php/Auth/logout.php'>Выйти</a></li>
            <?php
            elseif (checkRole($mysqli) === 'authorized'):
                ?>
                <li class="nav-item"><a href='#' class="nav-link">Вошедший</a></li>
                <li class="nav-item"><a class="nav-link" href='../php/Auth/logout.php'>Выйти</a></li>
            <?php
            endif;
            ?>
        </ul>
    </header>

    <?php include '../php/auth/login.php'; ?>
    <h1 class="text-center" style="margin-top: 40px;">Авторизация</h1>
    <div style="margin: 20px 0px;" class=" mb3 col-8 text-danger"><h3 class="text-center"><?= $message ?? ''; ?></h3></div>
    <form method="post">
        <div class="d-flex flex-column align-items-center">
            <div style="margin-bottom: 30px;" class="mb3 col-8">
                <label class="form-label"><h3>Имя</h3></label>
                <input class="form-control" type="text" name="name" required>
            </div>
            <div style="margin-bottom: 30px;" class="mb3 col-8">
                <label class="form-label"><h3>Фамилия</h3></label>
                <input class="form-control" type="text" name="lastname" required>
            </div>
            <div class="mb3 col-8">
                <label class="form-label"><h3>Пароль</h3></label>
                <input class="form-control" type="password" name="password" required>

                <input style="margin-top: 50px;" type="submit" class="btn btn-lg btn-primary " name="submit"
                       value="Вход">
            </div>
        </div>

    </form>
</div>

</body>
</html>


