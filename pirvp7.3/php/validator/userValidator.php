<?php


function russianSymbol(string $field): bool
{
    if (preg_match('/^[йцукенгшщзхъфывапролджэячсмитьбюёЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁ ]+$/', $field)) {
        return true;
    }
    return false;
}

function length(string $field): bool
{
    if (mb_strlen($field) > 2 and mb_strlen($field) <= 20) {
        return true;
    }
    return false;
}

function loginValidator(string $field): bool
{
    if (!russianSymbol($field) or !length($field)) {
        return false;
    }
    return true;
}


function passwordsRepeatCheck(string $password, string $password2): bool
{
    if ($password === $password2) {
        return true;
    }
    return false;
}

function minLength(string $field): bool
{
    if (mb_strlen($field) < 6) {
        return false;
    }
    return true;
}

