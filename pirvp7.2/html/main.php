<?php require_once '../connect.php'; ?>
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


        <?php if (checkRole($mysqli) === 'guest'): ?>
            <div class="dropdown text-end">
                <a style="margin-top: 15px; margin-right: 100px;" href="#"
                   class="d-block link-dark text-decoration-none dropdown-toggle"
                   id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    Гость
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="register.php">Зарегистрироваться</a></li>
                    <li><a class="dropdown-item" href="login.php">Войти</a></li>
                </ul>
            </div>
        <?php elseif (isAdmin($mysqli)): ?>
            <div class="dropdown text-end">
                <a style="margin-top: 15px; margin-right: 100px;" href="#"
                   class="d-block link-dark text-decoration-none dropdown-toggle"
                   id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $USER_FIO ?>
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="serviceAdd.php">Добавить товар</a></li>
                    <li><a class="dropdown-item" href="orderAll.php">Заказы</a></li>
                    <li><a class="dropdown-item" href="../php/Auth/logout.php">Выйти</a></li>
                </ul>
            </div>
        <?php elseif (isAuthorized($mysqli)): ?>
            <div class="dropdown text-end">
                <a style="margin-top: 15px; margin-right: 100px;" href="#"
                   class="d-block link-dark text-decoration-none dropdown-toggle"
                   id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $USER_FIO ?>
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="cart.php">Корзина</a></li>
                    <li><a class="dropdown-item" href="order.php">Заказы</a></li>
                    <li><a class="dropdown-item" href="../php/Auth/logout.php">Выйти</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </header>
