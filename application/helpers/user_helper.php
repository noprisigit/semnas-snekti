<?php

function generatecode() {
    $code = "";
    $i = 0;
    
    while($i < 5) {
        $code .= array_rand(0, 9);
        $i++;
    }
    return $code;
}