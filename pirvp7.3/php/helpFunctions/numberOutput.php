<?php

function numberOutput($field)
{
    $field = str_split($field);
    $number = $field['0'] . " (" . $field['1'] . $field['2'] . $field['3'] . ") " . $field['4'] . $field['5'] .
        $field['6'] . "-" . $field['7'] . $field['8'] . "-" . $field['9'] . $field['10'];
    return $number;
}