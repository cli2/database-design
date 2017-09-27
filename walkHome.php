<?php
  $h = "|^|";
  $c = "*";
  $dis = rand(5,10);
  while ($dis>0){
    // print the starting position
    $change = rand(1,5);
    if ($change<=3){
      $dis --;
    } else {
      $dis ++;
    }
    $d = "";
    for ($i=0; $i<$dis; $i++){
      $d = $d."-";
    }
    echo $h.$d.$c."<br>";
  }
 ?>
