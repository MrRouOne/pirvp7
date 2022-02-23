<?php
require_once '../connect.php';

$resOwners = checkResult($mysqli,"SELECT * FROM owners");
$owners = [];
while ($row = mysqli_fetch_assoc($resOwners)) {
    arrayKeyToVariable($row);
    $owners[$id]= "$name $lastname $phone_number";
}


$resCars = checkResult($mysqli,"SELECT * FROM cars");
$cars = [];
while ($row = mysqli_fetch_assoc($resCars)) {
    arrayKeyToVariable($row);
    $cars[$id]= "$brand $model $color ($number)";
}


$resPlaces = checkResult($mysqli,"SELECT * FROM places");
$places = [];
while ($row = mysqli_fetch_assoc($resPlaces)) {
    arrayKeyToVariable($row);
    $places[$id]= "$title ($area)";
}
