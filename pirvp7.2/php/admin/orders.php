<?php
require_once '../connect.php';

$resOrders = checkResult($mysqli, "SELECT * FROM orders");
$bool = false;
while ($row = mysqli_fetch_assoc($resOrders)) {
    $bool = true;
    $priceAll = 0;
    $id = $row['id'];

    echo "<div style='margin: 40px 0;' class='card'>
        <div class='card-body'>
        <h3 class='text-center'>Заказ № $id</h3>";

    $resServiceOrders = checkResult($mysqli, "SELECT * FROM service_orders WHERE orders = '$id'");

    $button_delete = "<form action='orderAll.php' method='post'>
                    <input  type='hidden' name='id' value=$id>
                    <input  type='submit' class='btn btn-danger' name='submit' value='Удалить'>
                    </form>";

    while ($row2 = mysqli_fetch_assoc($resServiceOrders)) {
        $service = $row2['service'];
        $priceOrder = $row2['price'];
        $resServices = checkResult($mysqli, "SELECT * FROM services WHERE id = '$service'");

        $row3 = mysqli_fetch_assoc($resServices);
        arrayKeyToVariable($row3);
        $priceAll += $priceOrder;

        echo "<div style='margin-top: 40px;' class='card'>
        <div class='card-body'>
            <h4 class='card-title'>$title</h4>
            <p class='card-text'>$description</p>
            <p class='card-text text-danger'>$priceOrder руб.</p>
            </div></div>";
    }
    echo "<h4 style='margin-top: 20px;'>Общая стоимость - $priceAll руб.</h4>$button_delete</div></div>";
}
if (!$bool) {
    echo "<h2>Нет заказов</h2>";
}