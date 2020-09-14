<?php
$handle = fopen ("php://stdin","r");
$i = 4;
$d = 4.0;
$s = "HackerRank ";
// Declare second integer, double, and String variables.
  $first = 0;
  $second = 0.0;
  $third = "";
  // Read and save an integer, double, and String to your variables.
  trim(fscanf(STDIN, "%d\n", $first));
  trim(fscanf(STDIN, "%f\n", $second));
  $third = trim(fgets(STDIN));
  // Print the sum of both integer variables on a new line.
  print $i + $first . "\n";
  // Print the sum of the double variables on a new line.
  print number_format($d + $second,1) . "\n";
  // Concatenate and print the String variables on a new line
  // The 's' variable above should be printed first.
  print $s . $third . "\n";
fclose($handle);
?>