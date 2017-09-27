<?php
  include "template.php";
 ?>




<!-- <p>
  PHP expressions
</p> -->
<?php
  // error_reporting(E_ERROR | E_PARSE);
  // $x = "15" + 27;
  // $y = 15 + 27;
  // $z = "Chong" + 27;
  // $a = "Chong" . 27;
  // echo "<br>";
  // echo '$x' . " is " . "$x" . "<br>";
  // echo "<div id='y'>" . '$y' . " is " . "$y" . "</div>";
  // echo '$z'." is "."$z" . "<br>";
  // print '$a'." is "."$a";
?>







<!-- <br><br> -->





<p>
  <!-- date() and filemtime() functions -->
</p>
<?php
  // $filename = "template.php";
  // echo "Current time: " . date("F D Y H:i:s.");
  // echo "<br>";
  // echo "$filename was last modified: " . date("F D Y H:i:s.", filemtime($filename));
 ?>








<!-- <br><br> -->













<p>
  Form Handling
</p>
 <form action="formhandle.php" method="GET">
   <input type="text" name="name" value="<b>Default Text</b>">
  <input type="submit" name="submit" value="submit">
 </form>
