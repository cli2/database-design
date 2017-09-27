<?php
  if (isset($_POST["submit"])){
    if (strlen($_POST["content"]===0)){
      die("message");
    }
    if ($_POST["type"]=="Text"){
      echo $_POST["content"];
    } elseif ($_POST["type"]=="Mood"){
      echo "I feel so".$_POST["content"];
    } else {
      echo "Visit this link!".$_POST["content"];
    }
  }
 ?>
<form class="" action="" method="POST">
  <input type="radio" name="type" value="Text" checked />Text<br>
  <input type="radio" name="type" value="Mood" />Mood<br>
  <input type="radio" name="type" value="Link" />Link<br>
  <input type="text" name="content" value="" /><br>
  <input type="submit" name="submit" value="submit" />
</form>
