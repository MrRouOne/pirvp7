<?php

function integerCheck(string $field): bool
{
    if (is_int($field)) {
        return true;
    }
    return false;
}

$gg = 23;
if (integerCheck($gg)) {
    echo "12";
} else {
    echo "13";
}
