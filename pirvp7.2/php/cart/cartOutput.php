<?php
require_once '../connect.php';

$resServiceCarts = checkResult($mysqli, "SELECT * FROM service_carts WHERE user = '$USER_ID'");

$priceAll = 0;
$bool = false;
while ($row = mysqli_fetch_assoc($resServiceCarts)) {
    $bool = true;
    $service = $row['service'];
    $id = $row['id'];

    $resServices = checkResult($mysqli, "SELECT * FROM services WHERE id = '$service'");

    $row2 = mysqli_fetch_assoc($resServices);
    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];

    $button = "<form action='cart.php' method='post'>
                    <input  type='hidden' name='id' value=$id>
                    <input  type='submit' class='btn btn-danger' name='submit' value='Удалить'>
                    </form>";

    echo "<div style='margin-top: 40px;' class='card'>
        <div class='card-body'>
            <h4 class='card-title'>$title</h4>
            <p class='card-text'>$description</p>
            <p class='card-text text-danger'>$price руб.</p>          
            $button   
        </div>
    </div>";
    $priceAll += $price;
}
if ($bool) {
    echo "<div style='margin: 50px 0;' class='d-flex justify-content-end'><h4>Общая стоимость - $priceAll руб.</h4> 
      <form style='margin-left: 20px;' action='order.php' method='post'>
            <input  type='submit' class='btn btn-primary' name='submit' value='Оформить заказ'>
      </form>";
} else {
    echo "<h2>Корзина пуста</h2>";
}