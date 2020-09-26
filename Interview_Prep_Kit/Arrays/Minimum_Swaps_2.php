<?php

// Complete the minimumSwaps function below.
function swap(&$a, &$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function minimumSwaps($arr) {
    $len =  count($arr);
    $count = 0;
    for($i = 0; $i < $len; $i++){
        if($arr[$i] != ($i + 1)){
            while($arr[$i] != ($i + 1)){
                swap($arr[$i], $arr[$arr[$i] - 1]);
                $count++;
            }
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$res = minimumSwaps($arr);

fwrite($fptr, $res . "\n");

fclose($stdin);
fclose($fptr);
