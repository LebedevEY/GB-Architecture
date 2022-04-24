<?php
 // Взял массив на 10000 элементов, 1 млн слишком долго обрабатывается.
$arr = range(1, 1000000);

shuffle($arr);

function bubbleSort($array)
{

    for ($i = 0; $i < count($array); $i++) {
        $count = count($array);
        for ($j = $i + 1; $j < $count; $j++) {
            if ($array[$i] > $array[$j]) {
                $temp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $temp;
            }
        }
    }
    return $array;
}

//$start = microtime(true);
//$newArray = bubbleSort($arr);
//echo "Сортировка заняла: ".( microtime(true) - $start).PHP_EOL;
// 2.0450999736786


function combSort($arr)
{
    $gap = count($arr);
    $swap = true;
    while ($gap > 1 || $swap) {
        if ($gap > 1) {
            $gap /= 1.25;
        }
        $swap = false;
        $i = 0;
        while ($i + $gap < count($arr)) {
            if ($arr[$i] > $arr[$i + $gap]) {
                list($arr[$i], $arr[$i + $gap]) = array($arr[$i + $gap], $arr[$i]);
                $swap = true;
            }
            ++$i;
        }
    }
    return $arr;
}

//$start = microtime(true);
//$newArray = combSort($arr);
//echo "Сортировка заняла: ".( microtime(true) - $start).PHP_EOL;
// 0.023661136627197

function treeSort(array $list): array
{
    $tree = new SplMinHeap();
    foreach ($list as $n) {
        $tree->insert($n);
    }
    $list = [];
    while ($tree->valid()) {
        $list[] = $tree->top();
        $tree->next();
    }
    return $list;
}

$start = microtime(true);
$newArray = treeSort($arr);
echo "Сортировка заняла: ".( microtime(true) - $start).PHP_EOL;
// 0.0038118362426758
// 0.62235903739929 при 1 млн. элементов