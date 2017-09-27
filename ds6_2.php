<?php
  Class Dad {
    public $t;
    public $current = 0;
    function threshold($t){
      $this -> t = $t;
    }
    function areWeThere(){
      if ($this -> current < $this -> t){
        if (rand(1,2)==1){
          echo "We'll be there soon!"."<br>";
        } else{
          echo "Almost!"."<br>";
        }
      } else{
        echo "BE QUIET!"."<br>";
      }
      $this -> current += 1;
    }
  }
  $dad = new Dad;
	$dad->threshold(5);
	for ($i=0; $i<7; $i++){
	   print $dad->areWeThere();
  }
 ?>
