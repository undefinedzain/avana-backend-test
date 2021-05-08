<?php

function getCloseParenthesisIndex($string, $index) {

    if ($string[$index] !== '(') {

        return -1;

    }

    $arr = [];
    for ($i = $index; $i < strlen($string); $i++) { 
    
        if ($string[$i] === '(') {

            $arr[] = $string[$i];

        } else if ($string[$i] === ')') {

            array_pop($arr);

            if (count($arr) === 0) {

                return $i;

            }

        }
    }

    return -1;
}

$testString = "a (b c (d e (f) g) h) i (j k)";

echo getCloseParenthesisIndex($testString, 7);

?>