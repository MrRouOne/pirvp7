<?php

function arrayStripTags(array $array) {
    foreach ($array as $key => $value) {
        global $$key;
        $$key = strip_tags($value);
    }
}

function arrayKeyToVariable(array $array) {
    foreach ($array as $key => $value) {
        global $$key;
        $$key = $value;
    }
}

