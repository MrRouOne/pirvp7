<?php
// Подключаем сессию и базу данных
require_once '../connect.php';

// Получаем все записи из таблицы
$query = "SELECT * FROM orders WHERE user = '$USER_ID'";

$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));
// Выводим информацию
$bool = false;
while ($row = mysqli_fetch_assoc($res)) {
    $bool = true;
    $priceAll = 0;
    $id = $row['id'];
    echo "<div style='margin: 40px 0;' class='card'>
        <div class='card-body'>
        <h3 class='text-center'>Заказ № $id</h3>";

    $query2 = "SELECT * FROM service_orders WHERE orders = '$id'";
    $res2 = mysqli_query($mysqli, $query2);
    if (!$res2) die (mysqli_error($mysqli));
    while ($row2 = mysqli_fetch_assoc($res2)) {
        $service = $row2['service'];

        $query3 = "SELECT * FROM services WHERE id = '$service'";
        $res3 = mysqli_query($mysqli, $query3);
        if (!$res3) die (mysqli_error($mysqli));

        $row3 = mysqli_fetch_assoc($res3);
        $title = $row3['title'];
        $description = $row3['description'];
        $price = $row3['price'];
        $priceAll += $price;
        // Если сессия не пуста (пользователь авторизован), то разрешаем пользователю редактировать
        // и удалять запись, иначе просто выводим информацию
        echo "<div style='margin-top: 40px;' class='card'>
        <div class='card-body'>
            <h4 class='card-title'>$title</h4>
            <p class='card-text'>$description</p>
            <p class='card-text text-danger'>$price руб.</p>
            </div></div>";

    }
    echo "<h4 style='margin-top: 20px;'>Общая стоимость - $priceAll руб.</h4> </div></div>";
}
if (!$bool) {
    echo "<h2>Нет заказов</h2>";
}
?>