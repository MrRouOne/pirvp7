<?php

function checkResult($database, $query)
{
    $res = mysqli_query($database, $query);
    if (!$res) die (mysqli_error($database));
    return $res;
}

