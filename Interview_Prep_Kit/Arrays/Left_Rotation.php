<?php

// Complete the rotLeft function below.
function rotLeft($a, $d) {
    $len = count($a);
    $result = array_fill(0, $len, 0);
    for($i = 0; $i < $len; $i++){
        $mod = ($i + ($len - $d)) % $len;
        $result[$mod] = $a[$i];
    }
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nd_temp);
$nd = explode(' ', $nd_temp);

$n = intval($nd[0]);

$d = intval($nd[1]);

fscanf($stdin, "%[^\n]", $a_temp);

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = rotLeft($a, $d);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($stdin);
fclose($fptr);
