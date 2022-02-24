<?php

function numberLength(string $field): bool
{
    if (mb_strlen($field) === 11) {
        return true;
    }
    return false;
}

function isNumber(string $field): bool
{
    if (preg_match('/^[1234567890]+$/', $field)) {
        return true;
    }
    return false;
}

function correctDate(string $field): bool
{
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])T(0[0-9]|[1][0-9]|[2][0-4]):(0[0-9]|[1-5][0-9])$/", $field)) {
        return false;
    }
    return true;
}

function maxSale(string $field): bool
{
    if ($field > 100) {
        return false;
    }
    return true;
}

function existOwner(string $field, $database): bool
{
    $field = explode(" ", $field);
    if (count($field) != 3) {
        return false;
    }

    $name = $field[0];
    $lastname = $field[1];
    $phone_number = $field[2];
    $query = "SELECT * FROM owners WHERE name LIKE '$name' and lastname LIKE '$lastname' and phone_number LIKE '$phone_number'";
    $res = checkResult($database,$query);

    if ($res->{'num_rows'} === 0) {
      return false;
    }
    return true;
}

function existCar(string $field, $database): bool
{
    $field = explode(" ", $field);
    if (count($field) != 4) {
        return false;
    }

    $brand = $field[0];
    $model = $field[1];
    $number = $field[2]." ".$field[3];
    $query = "SELECT * FROM cars WHERE brand LIKE '$brand' and model LIKE '$model' and number LIKE '$number'";
    $res = checkResult($database,$query);

    if ($res->{'num_rows'} === 0) {
        return false;
    }
    return true;
}

function existPlace(string $field, $database): bool
{
    $field = explode(" ", $field);
    if (count($field) != 3) {
        return false;
    }

    $title = $field[0];
    $area = $field[1]." ".$field[2];
    $query = "SELECT * FROM places WHERE title LIKE '$title' and area LIKE '$area'";
    $res = checkResult($database,$query);

    if ($res->{'num_rows'} === 0) {
        return false;
    }
    return true;
}