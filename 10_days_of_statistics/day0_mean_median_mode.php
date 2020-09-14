<?php

class Solution {
    function mean(&$array){
        $sum = 0;
        $n = count($array);
        foreach($array as $value){
            $sum += $value;
        }
        return $sum / $n;
    }

    function median(&$array){
        $n = count($array);
        $mid = $n / 2;
        return ($n % 2 == 0) ? ($array[$mid - 1] + $array[$mid])/2 : $array(ceil($mid - 1));
    }

    function mode(&$array){
        $dictionary = [];
        $freq = 0;
        $mode = 0;
        foreach($array as $value){
            $dictionary[$value] = isset($dictionary[$value]) ? $dictionary[$value] + 1 : 1;
            $mode = ($freq < $dictionary[$value]) ? $value : $mode;
            $freq = ($freq < $dictionary[$value]) ? $dictionary[$value] : $freq;
        }
        return $mode;
    }
}

$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($_fp, "%d", $n);
$temp = fgets($_fp);
$data = explode(" ", $temp);
$data = array_map(function($i){ return intval($i); }, $data);
sort($data);
$obj = new Solution();
print($obj->mean($data));
print("\n");
print($obj->median($data));
print("\n");
print_r($obj->mode($data));
print("\n");
?>
