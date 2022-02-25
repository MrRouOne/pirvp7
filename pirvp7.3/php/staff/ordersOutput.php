<?php
require_once '../connect.php';
$occupiedPlace = [];
$res = checkResult($mysqli, "SELECT * FROM orders");

while ($row = mysqli_fetch_assoc($res)) {
    arrayKeyToVariable($row);
    $occupiedPlace[] = $place;
    $entry_date = date("d.m.Y в H:i ", strtotime($entry_date));
    $day = correctWord($period, "день", "дня", "дней");
    $sum = subtractPercent($cost, $sale);

    $button_delete = "<form action='index.php' method='post'>
                    <input  type='hidden' name='id' value=$id>
                    <input  type='submit' class='btn btn-danger' name='submit' value='Удалить'>
                    </form>";

    $resPlace = checkResult($mysqli, "SELECT * FROM places WHERE id = '$place'");
    $rowPlace = mysqli_fetch_assoc($resPlace);
    arrayKeyToVariable($rowPlace);

    $resCar = checkResult($mysqli, "SELECT * FROM cars WHERE id = '$car'");
    $rowCar = mysqli_fetch_assoc($resCar);
    arrayKeyToVariable($rowCar);
    $carSVG = carSVG($color);

    $resOwner = checkResult($mysqli, "SELECT * FROM owners WHERE id = '$owner'");
    $rowOwner = mysqli_fetch_assoc($resOwner);
    arrayKeyToVariable($rowOwner);
    $phone_number = numberOutput($phone_number);

    echo "<div style='margin-top: 40px;' class='card'>
            <div class='card-body'>
            <h4 class='card-title'>Место $title ($area)</h4>
            <p class='card-text'>Было забронировано <b>$name $lastname</b> на <b>$brand $model ($number) <span style='margin-right: 10px;'>$carSVG</span></b> 
            $entry_date сроком на $period $day.</p>
            <p class='card-text'>Стоимость с учётом скидки - $sum руб. <span class='text-danger'>Задолженность - $arrears руб.</span></p>     
            <p class='card-text'>Чтобы обратиться к владельцу позвоните на номер $phone_number</p>     
            $button_delete                        
        </div>
    </div>";
}

// Карта мест

$resPlaceAll = checkResult($mysqli, "SELECT * FROM places");
echo "<h1 class='text-center' style='margin-top: 60px;'>Карта парковки</h1>
          <div class='d-flex' style='margin-top: 40px;'><div style='background-color: #c52d3b; 
              border: 1px solid #9a202d; width: 30px; height: 30px;'></div><p>ᅠ- Забранированное местоᅠᅠᅠ</p>
          <div style='background-color: #c6c6c6; 
              border: 1px solid gray; width: 30px; height: 30px;'></div><p>ᅠ- Свободное место</p></div>
          <div class='row' style='margin-top: 40px;'>";

while ($rowPlaceAll = mysqli_fetch_assoc($resPlaceAll)) {
    arrayKeyToVariable($rowPlaceAll);
    $width = $area * 20 . "px";
    $squareC = "black";
    $squareBC = "#c6c6c6";
    $squareBorder = "gray";
    if (in_array($id, $occupiedPlace)) {
        $squareC = "white";
        $squareBC = "#c52d3b";
        $squareBorder = "#9a202d";
    }
    echo "<div class='col text-center d-flex flex-column justify-content-center align-items-center' 
          style='min-height: 200px; min-width: $width; background-color: $squareBC; 
          border: 1px solid $squareBorder;'><h4 style='color:$squareC;' >$title</h4><h4 style='color:$squareC;'>$area</h4></div>";
}
echo "</div>";


