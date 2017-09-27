<?php
  $length = rand(5,10);
  $ar = array();
  for ($i=0; $i<$length; $i++) {
    $ar[$i] = rand(0,100);
  }
  if ($ar[0]<=$ar[$length-1]) {
    for ($i=0; $i<$length; $i++) {
      echo $ar[$i]," ";
    }
  }
?>
