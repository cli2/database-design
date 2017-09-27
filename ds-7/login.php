<?php
session_start();
unset($_SESSION["id"]);
if (isset($_POST['submit'])){
  if($_POST['pw']=='abc'){
    $_SESSION['id'] = $_POST['account'];
    header('Location:index.php');
    exit();
  } else{
    $_SESSION['error']="Wrong Password.";
    header('Location:login.php');
    exit();
  }
}

?>
<h1>Please Log In</h1>
<form method="post">
  <p>Account: <input type="text" name="account" value=""></p>
  <p>Password: <input type="text" name="pw" value=""></p>
  <!-- password is umsi -->
  <p><input type="submit" name = "submit" value="Log In">
  <a href="index.php">Cancel</a></p>
</form>
<?php
if(isset($_SESSION['error'])){
  echo $_SESSION['error'];
  unset($_SESSION['error']);
} ?>
