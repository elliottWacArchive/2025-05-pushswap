<?php

require_once 'functions.php';

$la = array_map('intval', array_slice($argv, 1));
$lb = [];
$output = [];

function is_sorted($arr)
{
    for ($i = 0; $i < count($arr) - 1; $i++) {
        if ($arr[$i] > $arr[$i + 1]) {
            return false;
        }
    }
    return true;
}

function is_reverse_sorted($arr)
{
    for ($i = 0; $i < count($arr) - 1; $i++) {
        if ($arr[$i] < $arr[$i + 1]) {
            return false;
        }
    }
    return true;
}

function find_min_index($arr)
{
    $minIndex = 0;
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $arr[$minIndex]) {
            $minIndex = $i;
        }
    }
    return $minIndex;
}

function push_swap(&$la, &$lb, &$output)
{
    $pushSwap = new PushSwap($la, $lb);
    if (is_sorted($la)) {
        return;
    }
    $lenla = count($la);

    for ($e = 0; $e < $lenla; $e++) {
        $minLa = find_min_index($la);
        $ta = count($la);
        for ($i = 0; $i < $ta - $e; $i++) {
            if ($i == $minLa) {
                if ($e == 0) {
                    $pushSwap->ra();
                    $output[] = 'ra';
                }
            } else {
                $pushSwap->pb();
                $output[] = 'pb';
            }
            // echo implode(' ', $la) . "\n";
            // echo implode(' ', $lb) . "\n";
            // echo '-------------------' . "TA : tour $i/$ta\n\n";
        }
        $minLb = find_min_index($lb);
        $tb = count($lb);
        for ($i = 0; $i < $tb; $i++) {
            if ($i == $minLb) {
                $pushSwap->pa();
                $output[] = 'pa';
                $pushSwap->ra();
                $output[] = 'ra';
            } else {
                $pushSwap->pa();
                $output[] = 'pa';
            }
            // echo implode(' ', $la) . "\n";
            // echo implode(' ', $lb) . "\n";
            // echo '-------------------' . "TB : tour $i/$tb\n\n";
        }
    }
}

push_swap($la, $lb, $output);
// echo implode(' ', $la) . "\n";
echo implode(' ', $output) . "\n";
