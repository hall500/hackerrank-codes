<?php

function factorial($n){
    if($n <= 1) return 1;  
    else return $n * factorial($n - 1);  
}

function nCr($n, $r){
    return factorial($n)/(factorial($r) * factorial($n - $r));
}

function binomialProbability($x, $n, $p){
    return nCr($n, $x) * pow($p, $x) * pow((1 - $p), ($n - $x));
}

$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$a = preg_split("/ /", fgets($_fp));
$a = array_map(function($i){ return (float) $i; }, $a);

$n = 6;
$p = $a[0]/($a[0] + $a[1]);

$bin = 0;
for($i = 3; $i < 7; $i++){
    $bin += binomialProbability($i, $n, $p);
}

printf("%.3f", $bin);

fclose($_fp);
?>
