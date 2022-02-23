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
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])T(0[1-9]|[1][0-9]|[2][0-4]):(0[1-9]|[1-5][0-9])$/", $field)) {
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