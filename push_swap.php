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
    $lenla = count($la);
    if (is_sorted($la)) {
        return;
    } elseif ($lenla == 2) {
        if ($la[0] > $la[1]) {
            swap($la);
            $output[] = 'sa';
        }
    } elseif ($lenla == 3) {
        three_elements_sort($la, $output);
        return;
    }
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

function three_elements_sort(&$la, &$output)
{
    $pushSwap = new PushSwap($la); 

    if ($la[0] > $la[1] && $la[1] < $la[2] && $la[0] < $la[2]) {
        $pushSwap->sa();
        $output[] = 'sa';
    }
    else if ($la[0] > $la[1] && $la[1] < $la[2] && $la[0] > $la[2]) {
        $pushSwap->ra();
        $output[] = 'ra';
    }
    else if ($la[0] > $la[1] && $la[1] > $la[2]) {
        $pushSwap->sa();
        $output[] = 'sa';
        $pushSwap->rra();
        $output[] = 'rra';
    }
    else if ($la[0] < $la[1] && $la[1] > $la[2] && $la[0] < $la[2]) {
        $pushSwap->sa();
        $output[] = 'sa';
        $pushSwap->ra();
        $output[] = 'ra';
    }
    else if ($la[0] < $la[1] && $la[1] > $la[2] && $la[0] > $la[2]) {
        $pushSwap->rra();
        $output[] = 'rra';
    }
}

push_swap($la, $lb, $output);
// echo implode(' ', $la) . "\n";
echo implode(' ', $output) . "\n";
