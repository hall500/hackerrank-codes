<?php

class Solution {
  function mean(&$array){
      $sum = 0;
      $n = count($array);
      foreach($array as $value){
          $sum += $value;
      }
      return $sum / $n;
  }

  function std_deviation(&$array){
    $sq_sum = 0;
    $n = count($array);
    $mean = $this->mean($array);
    foreach($array as $value){
      $sq_sum += pow(($value - $mean), 2);
    }
    return sqrt($sq_sum / $n);
  }
}

function read_data(&$handle){
  $data = fgets($handle);
  $data = explode(" ", $data);
  return array_map(function($i){ return intval($i); }, $data);
}

$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($_fp, " %d", $n);
$data = read_data($_fp);
$obj = new Solution();
$deviation = $obj->std_deviation($data);
printf("%.1f", $deviation);

fclose($_fp);
?>