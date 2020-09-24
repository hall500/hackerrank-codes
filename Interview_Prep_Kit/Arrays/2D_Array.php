
<?php

// Complete the hourglassSum function below.
function sumGlass(&$hourGlass, &$i, &$j){
    $sum = $hourGlass[$i + 1][$j + 1];
    for($k = 0; $k < 3; $k++){
        $sum += $hourGlass[$i][$j + $k];
        $sum += $hourGlass[$i + 2][$j + $k];
    }
    return $sum;
}

function hourglassSum($arr) {
    $n = count($arr);
    $max = -63;
    for($i = 0; $i < ($n - 2); $i++){
        for($j = 0; $j < ($n - 2); $j++){
            $sum = sumGlass($arr, $i, $j);
            if($sum > $max) $max = $sum;
        }
    }
    return $max;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$arr = array();

for ($i = 0; $i < 6; $i++) {
    fscanf($stdin, "%[^\n]", $arr_temp);
    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = hourglassSum($arr);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
