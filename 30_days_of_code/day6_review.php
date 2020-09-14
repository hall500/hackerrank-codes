<?php
$handle = fopen("php://stdin", "r");

/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$t = fgets($handle);

for($i = 0; $i < $t; $i++) { 
    $input = trim(fgets($handle));
    $even = ''; 
    $odd = '';
    
    for($j = 0; $j < strlen($input); $j++) {
        if(($j % 2) == 0) {
            $even .= $input[$j];
        }
        else {
            $odd .= $input[$j];
        }
    }

    printf("%s %s\n", $even, $odd);
}
fclose($handle);
?>