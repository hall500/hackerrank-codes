<?php

$handle = fopen ("php://stdin", "r");
function factorial($n) {
    // Complete this function
}

fscanf($handle, "%i",$n);
$result = factorial($n);
echo $result . "\n";

?>