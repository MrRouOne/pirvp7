<?php

function russianSymbol(string $field): bool {
    if (preg_match('/^[йцукенгшщзхъфывапролджэячсмитьбюёЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁ]+$/', $field)){
        return false;
    }
    return true;
}

function length(string $field): bool
{
    if (strlen($field) > 2 and strlen($field) <= 20){
        return false;
    }
    return true;
}

function loginValidator($field)
{
    if (!russianSymbol($field) and !length($field)) {
        return false;
    }
    return true;
}