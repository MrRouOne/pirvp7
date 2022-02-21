<?php

$arr = ['name'=>'Иван','email'=>'ivan@gmail.com','age'=>15];

function arrayKeyToVariabl($array) {
    foreach ($array as $key => $value) {
        $$key = $value;
    }
}
arrayKeyToVariabl($arr);

echo $email;