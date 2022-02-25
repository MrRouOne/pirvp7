<?php
require_once '../connect.php';

if (!empty($_POST['submit']) && $_POST['submit'] == 'Оформить заказ') {
    $resServiceCarts = checkResult($mysqli, "SELECT * FROM service_carts WHERE user = '$USER_ID'");
    if ($resServiceCarts->{'num_rows'} != 0) {
        checkResult($mysqli, "INSERT INTO orders(user) VALUES ('$USER_ID')");
        $order_id = mysqli_insert_id($mysqli);

        while ($row = mysqli_fetch_assoc($resServiceCarts)) {
            $service = $row['service'];
            $cart_id = $row['id'];
            $price = (mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT price FROM services WHERE id='$service'")))['price'];
            checkResult($mysqli, "INSERT INTO service_orders(orders, service, price) VALUES ('$order_id', '$service','$price')");
            checkResult($mysqli, "DELETE FROM service_carts WHERE id = '$cart_id'");
        }
    }
}