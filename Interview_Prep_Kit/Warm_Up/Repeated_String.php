<?php

// Complete the repeatedString function below.
function repeatedString($s, $n) {
    $instr = substr_count($s, "a");
    $len = strlen($s);
    $reps = intval($n / $len);
    $instr *= $reps;
    $mod = $n % $len;
    if($mod != 0){
        $instr += substr_count(substr($s, 0, $mod), "a");
    }
    return $instr;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$s = '';
fscanf($stdin, "%[^\n]", $s);

fscanf($stdin, "%ld\n", $n);

$result = repeatedString($s, $n);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
