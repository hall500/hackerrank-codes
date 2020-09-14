<?php

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $N);

$is_odd = (($N % 2) != 0);

if($is_odd){
    print "Weird";
}elseif(!$is_odd && $N >= 2 && $N <= 5){
    print "Not Weird";
}elseif(!$is_odd && $N >= 6 && $N <= 20){
    print "Weird";
}elseif(!$is_odd && $N > 20){
    print "Not Weird";
}

fclose($stdin);
