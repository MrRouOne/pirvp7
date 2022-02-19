<?php
// Подключаем сессию и базу данных
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Оформить заказ') {
// Получаем все записи из таблицы
    $query = "SELECT * FROM service_carts WHERE user = '$USER_ID'";

    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));

    $query_create = "INSERT INTO orders(user) VALUES ('$USER_ID')";
    $res_create = mysqli_query($mysqli, $query_create);
    if (!$res_create) die (mysqli_error($mysqli));

    $order_id = mysqli_insert_id($mysqli);

// Выводим информацию
    while ($row = mysqli_fetch_assoc($res)) {
        $service = $row['service'];
        $cart_id = $row['id'];
        $price = (mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT price FROM services WHERE id='$service'")))['price'];
        mysqli_query($mysqli, "INSERT INTO service_orders(orders, service, price) VALUES ('$order_id', '$service','$price')");
        mysqli_query($mysqli, "DELETE FROM service_carts WHERE id = '$cart_id'");

    }
}
?>