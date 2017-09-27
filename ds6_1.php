<?php
  Class Point{
    public $x;
    public $y;
    function initialize($x,$y){
      $this -> x = $x;
      $this -> y = $y;
    }
    function move($moveX,$moveY){
      $this -> x += $moveX;
      $this -> y += $moveY;
    }
    function printPoint(){
      echo "(".$this -> x.",".$this -> y.")";
    }
  }
  $point = new Point;
	$point->initialize(3,5);
	$point->move(2,4);
	$point->printPoint();
 ?>
