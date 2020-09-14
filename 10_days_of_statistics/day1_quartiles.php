<?php
function median(&$array){
    $n = count($array);
    $mid = (($n % 2) == 0) ? ($n / 2) - 1 : ceil($n / 2) - 1;
    return (($n % 2) == 0) ? ($array[$mid] + $array[($mid + 1)])/2 : $array[$mid];
}

function upperQuartile(&$array){
    $n = count($array) / 2;
    $mid = ((count($array) % 2) == 0) ? $n - 1 : floor($n);
    $data = array_filter($array, function($value, $index) use ($mid) {
        return ($index > $mid);
    }, ARRAY_FILTER_USE_BOTH);
    return array_values($data);
}

function lowerQuartile(&$array){
    $n = count($array) / 2;
    $mid = ((count($array) % 2) == 0) ? floor($n) : $n - 1;
    $data = array_filter($array, function($value, $index) use ($mid) {
        return ($index < $mid);
    }, ARRAY_FILTER_USE_BOTH);
    return array_values($data);
}

function read_data(&$handle){
    $data = fgets($handle);
    $data = explode(" ", $data);
    return array_map(function($i){ return intval($i); }, $data);
}

$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($_fp, " %d", $n);
$data = read_data($_fp);
sort($data);
print_r($data);
$lower = lowerQuartile($data);
print_r($lower);
print(median($lower));
/* print("\n");
print(median($data));
print("\n");
$upper = upperQuartile($data);
print(median($upper)); */

fclose($_fp);
?>
