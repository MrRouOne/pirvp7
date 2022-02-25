<?php

function checkResult($database, $query)
{
    $res = mysqli_query($database, $query);
    if (!$res) die (mysqli_error($database));
    return $res;
}

function getOwner($field, $database)
{
    $field = explode(" ", $field);
    $name = $field[0];
    $lastname = $field[1];
    $phone_number = $field[2];

    $query = "SELECT * FROM owners WHERE name LIKE '$name' and lastname LIKE '$lastname' and phone_number LIKE '$phone_number'";
    $res = checkResult($database, $query);
    $row = mysqli_fetch_assoc($res);
    return $row['id'];
}

function getCar($field, $database)
{
    $field = explode(" ", $field);
    $brand = $field[0];
    $model = $field[1];
    $number = $field[2] . " " . $field[3];

    $query = "SELECT * FROM cars WHERE brand LIKE '$brand' and model LIKE '$model' and number LIKE '$number'";
    $res = checkResult($database, $query);
    $row = mysqli_fetch_assoc($res);
    return $row['id'];
}

function getPlace(string $field, $database)
{
    $field = explode(" ", $field);
    $title = $field[0];
    $area = $field[1] . " " . $field[2];

    $query = "SELECT * FROM places WHERE title LIKE '$title' and area LIKE '$area'";
    $res = checkResult($database, $query);
    $row = mysqli_fetch_assoc($res);
    return $row['id'];
}