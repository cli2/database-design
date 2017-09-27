<?php
session_start();
    if (isset($_SESSION["id"])){
      if (isset($_POST['submit'])){
        $_SESSION["content"][] = $_POST['text'];
        header("Location: index.php");
        return;
      }
      echo "
      <p>Welcome to Tumblr! " . $_SESSION["id"]."</p>
      <p>Post your thoughts here</p>
      <form method = 'POST'>
      <input type = 'text' name = 'text' placeholder = 'your text here'>
      <input type = 'submit' name = 'submit' value = 'post'>
      </form>
      <a href = 'logout.php'>Log out</a><br>";
      if (isset($_SESSION['content'])){
        echo "<p>Your thoughts</p>";
        foreach($_SESSION['content'] as $element){
          echo $element."<br>";
        }
      }
    } else{
      echo "<p>Welcome to Tumblr! <a href='login.php'>Log in</a></p>";
    }
?>
