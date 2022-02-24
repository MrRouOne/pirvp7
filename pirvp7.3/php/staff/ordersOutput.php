<?php
require_once '../connect.php';
$closePlace = [];
$res = checkResult($mysqli, "SELECT * FROM orders");

while ($row = mysqli_fetch_assoc($res)) {
    arrayKeyToVariable($row);
    $closePlace[] = $place;
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

    $resOwner = checkResult($mysqli, "SELECT * FROM owners WHERE id = '$owner'");
    $rowOwner = mysqli_fetch_assoc($resOwner);
    arrayKeyToVariable($rowOwner);
    $phone_number = numberOutput($phone_number);

    $carSVG = "<svg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
	        width='40px' height='40px' viewBox='0 0 79.536 79.536' style='enable-background:new 0 0 79.536 79.536;'
	        xml:space='preserve'><g>
            <path style='fill:$color;' d='M15.532,56.706c-3.977,0-7.213-3.242-7.213-7.197c0-3.998,3.236-7.224,7.213-7.224
            c3.987,0,7.226,3.226,7.226,7.224C22.758,53.463,19.519,56.706,15.532,56.706z M15.532,45.604c-2.128,0-3.876,1.75-3.876,3.883
            c0,2.129,1.748,3.879,3.876,3.879c2.141,0,3.886-1.75,3.886-3.879C19.418,47.354,17.673,45.604,15.532,45.604z M64.137,56.706
            c-3.987,0-7.219-3.242-7.219-7.197c0-3.998,3.231-7.224,7.219-7.224c3.977,0,7.208,3.226,7.208,7.224
            C71.345,53.463,68.113,56.706,64.137,56.706z M64.137,45.604c-2.144,0-3.895,1.75-3.895,3.883c0,2.129,1.751,3.879,3.895,3.879
            c2.139,0,3.884-1.75,3.884-3.879C68.021,47.354,66.275,45.604,64.137,45.604z M78.138,44.091c0-7.011-4.365-7.842-4.365-7.842
            c-6.426-0.912-17.496-1.38-17.496-1.38c-1.016-1.766-5.707-12.039-8.44-12.039c-0.911,0-20.508,0-23.975,0
            c-3.472,0-9.167,10.024-10.413,12.285c0,0-4.36,0.758-6.416,1.219c-1.142,0.265-4.301,0.324-4.301,9.155H0v3.997h6.654
            c0-4.908,3.982-8.885,8.878-8.885c4.914,0,8.886,3.977,8.886,8.885h30.827c0-4.908,3.967-8.885,8.892-8.885
            c4.898,0,8.875,3.977,8.875,8.885h6.524v-5.396H78.138z M35.589,34.191H21.751c1.872-5.831,5.339-9.994,6.801-9.994
            c1.841,0,7.037,0,7.037,0V34.191z M38.168,34.191v-9.994c0,0,7.141,0,8.974,0c1.854,0,5.893,8.461,7.032,10.625L38.168,34.191z'/>
            </g></svg>";

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
    if (in_array($id, $closePlace)) {
        echo "<div class='col text-center d-flex flex-column justify-content-center align-items-center' 
              style='min-height: 200px; min-width: $width; background-color: #c52d3b; 
              border: 1px solid #9a202d;'><h4 style='color: white;'>$title</h4><h4 style='color: white;'>$area</h4></div>";
    } else {
        echo "<div class='col text-center d-flex flex-column justify-content-center align-items-center' 
              style='min-height: 200px; min-width: $width; background-color: #c6c6c6; 
              border: 1px solid gray;'><h4>$title</h4><h4>$area</h4></div>";
    }
}
echo "</div>";


