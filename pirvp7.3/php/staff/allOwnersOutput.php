<?php
require_once '../connect.php';

$resOwners = checkResult($mysqli, "SELECT * FROM owners");
$bool = false;

while ($row = mysqli_fetch_assoc($resOwners)) {
    $bool = true;
    arrayKeyToVariable($row);
    $phone_number = numberOutput($phone_number);

    echo "<div style='margin: 40px 0;' class='card'>
        <div class='card-body'>
        <h3 class='text-center'>$name $lastname</h3>
        <h4 class='card-title'>$phone_number</h4>";

    $resCar = checkResult($mysqli, "SELECT * FROM cars WHERE owner = '$id'");

    while ($rowCar = mysqli_fetch_assoc($resCar)) {
        arrayKeyToVariable($rowCar);
        $carSVG = carSVG($color);
        $resOrder = checkResult($mysqli, "SELECT * FROM orders WHERE car = '$id'");

        echo "<div style='margin-top: 40px;' class='card'>
        <div class='card-body'>
            <h4 class='card-title'>$brand $model <span style='margin-left: 10px;'>$carSVG</span></h4>
            <h4 class='card-title'>$number</h4>";

        if ($resOrder->{'num_rows'} > 0) {
            echo "<h4 class='card-title text-danger'>На стоянке</h4>";
        }
        echo "</div></div>";
}
echo "</div></div>";
}
if (!$bool) {
    echo "<h2>Нет владельцев</h2>";
}