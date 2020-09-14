<?php
class Solution {
  function spread(&$elements, &$freqs){
    $S = [];
    foreach($elements as $index => $value){
      for($i = 0; $i < $freqs[$index]; $i++){
        $S[] = $value;
      }
    }
    sort($S);
    return $S;
  }

  function median(&$elements){
      $n = count($elements);
      $mid = (($n % 2) == 0) ? ($n / 2) - 1 : ceil($n / 2) - 1;
      return (($n % 2) == 0) ? ($elements[$mid] + $elements[($mid + 1)])/2 : $elements[$mid];
  }

  function Q3(&$elements){
      $n = count($elements) / 2;
      $mid = ((count($elements) % 2) == 0) ? $n - 1 : floor($n);
      $data = array_filter($elements, function($value, $index) use ($mid) {
          return ($index > $mid);
      }, ARRAY_FILTER_USE_BOTH);
      return array_values($data);
  }

  function Q1(&$elements){
      $n = count($elements) / 2;
      $mid = ((count($elements) % 2) == 0) ? floor($n) : $n - 1;
      $data = array_filter($elements, function($value, $index) use ($mid) {
          return ($index < $mid);
      }, ARRAY_FILTER_USE_BOTH);
      return array_values($data);
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
$elements = read_data($_fp);
$freqs = read_data($_fp);
$obj = new Solution();
$sp_data = $obj->spread($elements, $freqs);
$q1 = $obj->Q1($sp_data);
$q3 = $obj->Q3($sp_data);
$inter_range = $obj->median($q3) - $obj->median($q1);
printf("%.1f", $inter_range);

fclose($_fp);
?>