<?php

// Complete the minimumBribes function below.
function minimumBribes($q) {
    $len = count($q);
    $ans = 0;
    for($i = 0; $i < $len; $i++){
        if($q[$i] - ($i+1) > 2){
            print("Too chaotic\n");
            return;
        }
        for($j = $q[$i] - 2; $j < $i; $j++){
            if($q[$j] > $q[$i]) $ans++;
        }
    }
    print($ans . "\n");
    return;
}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%d\n", $n);

    fscanf($stdin, "%[^\n]", $q_temp);

    $q = array_map('intval', preg_split('/ /', $q_temp, -1, PREG_SPLIT_NO_EMPTY));

    minimumBribes($q);
}

fclose($stdin);
