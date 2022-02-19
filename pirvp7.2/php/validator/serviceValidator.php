<?php

function integerSymbol(string $field): bool
{
    if (preg_match('/^[1234567890]+$/', $field)) {
        return true;
    }
    return false;
}