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
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="container" style="margin-bottom: 50px;">
    <div class="d-flex flex-md-row p-3 px-md-4 mb-3 bg-white border-bottom box-shadow justify-content-md-between align-items-center">
        <h2 class="mr-md-auto p-2">
            <a class="text-decoration-none" href="http://localhost/pirvp7/pirvp7.3/html/index.php">Автостоянка</a>
        </h2>

        <?php if (checkRole($mysqli) === 'guest'): ?>
            <a class="btn btn-lg btn-primary" href="login.php">Вход</a>

        <?php elseif (isAdmin($mysqli)): ?>
            <div class="dropdown text-end">
                <a style="margin-top: 15px; margin-right: 100px;" href="#"
                   class="d-block link-dark text-decoration-none dropdown-toggle"
                   id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo "$USER_NAME $USER_LASTNAME"; ?>
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="register.php">Добавить пользователя</a></li>
                    <li><a class="dropdown-item" href="places.php">Добавить место</a></li>
                    <li><a class="dropdown-item" href="../php/Auth/logout.php">Выйти</a></li>
                </ul>
            </div>

        <?php elseif (isAuthorized($mysqli)): ?>
            <div class="dropdown text-end">
                <a style="margin-top: 15px; margin-right: 100px;" href="#"
                   class="d-block link-dark text-decoration-none dropdown-toggle"
                   id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo "$USER_NAME $USER_LASTNAME"; ?>
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="allOwnersAndCars.php">Список владельцев</a></li>
                    <li><a class="dropdown-item" href="owner.php">Добавить владельца</a></li>
                    <li><a class="dropdown-item" href="car.php">Добавить автомобиль</a></li>
                    <li><a class="dropdown-item" href="order.php">Оформить заказ</a></li>
                    <li><a class="dropdown-item" href="../php/Auth/logout.php">Выйти</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
