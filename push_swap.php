<?php

require_once 'functions.php';

$la = array_map('intval', array_slice($argv, 1));
$lb = [];
$output = [];

function bubbleSort(&$arr, &$output)
{
    $n = count($arr);
    $pushSwap = new PushSwap($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // swap
                $pushSwap->sa();
                $output[] = 'sa';
            }
        }
    }
}
bubbleSort($la, $output);
echo implode(' ', $output) . "\n";
