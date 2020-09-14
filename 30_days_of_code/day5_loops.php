<?php

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

for($i = 1; $i <= 10; $i++){
    print $n . " x ". $i . " = " . $n * $i . "\n";
}

fclose($stdin);