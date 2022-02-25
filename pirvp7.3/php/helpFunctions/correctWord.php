<?php

function correctWord($field, $output1, $output2, $output3)
{
    if ($field >= 11 and $field <= 14) {
        return $output3;
    }
    if ($field % 10 === 1) {
        return $output1;
    }

    if ($field % 10 > 1 and $field % 10 < 5) {
        return $output2;
    }

    if ($field % 10 > 4 and $field % 10 <= 9 or $field % 10 === 0) {
        return $output3;
    }

}
