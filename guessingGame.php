<?php
  function guessingGame($guess){
    $i = rand(0,5);
    if ($guess==$i){
      return "right";
    } else{
      return "wrong";
    }
  }
  print guessingGame(4);
 ?>
