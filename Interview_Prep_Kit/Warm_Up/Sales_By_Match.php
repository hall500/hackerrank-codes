<?php

// Complete the sockMerchant function below.
function sockMerchant($n, $ar) {
    $colors = [];
    $pairs = 0;
    for($i = 0; $i < $n; $i++){
        if(isset($colors[$ar[$i]])){
            $colors[$ar[$i]] += 1;
        }else{
            $colors[$ar[$i]] = 1;
        }
    }
    foreach($colors as $index => $value){
        $pairs += (int) ($value/2);
    }
    return $pairs;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $ar_temp);

$ar = array_map('intval', preg_split('/ /', $ar_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = sockMerchant($n, $ar);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
