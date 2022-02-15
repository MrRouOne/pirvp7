<?php

function russianSymbol(string $field): bool {
    if (preg_match('/^[йцукенгшщзхъфывапролджэячсмитьбюёЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁ]+$/', $field)){
        return true;
    }
    return false;
}

function length(string $field): bool
{
    if (mb_strlen($field) > 2 and mb_strlen($field) <= 20){
        return true;
    }
    return false;
}

function loginValidator($field)
{
    if (!russianSymbol($field) or !length($field)) {
        return false;
    }
    return true;
}


$lastname = '1';
$name = '1';


if (!loginValidator($lastname) or !loginValidator($name)) {
    echo "<h2 class='red'>Некорректные данные</h2>";
}