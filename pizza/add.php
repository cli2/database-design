<?php
session_start();
require_once "pdo.php";
if ( ! isset($_SESSION['id'])) {
    die('ACCESS DENIED');
}
if ( isset($_POST['cancel']) ) {
    header('Location: index.php');
    return;
}
if ( isset($_POST['add']) ) {
    if (strlen($_POST['store'])<1 || strlen($_POST['address'])<1 || strlen($_POST['rating'])<1 || strlen($_POST['best'])<1){
      $_SESSION['failure'] = "All fields are required";
      header("Location: add.php");
      return;
    } elseif (! is_numeric($_POST['rating'])){
      $_SESSION['failure'] = "Year must be numeric";
      header("Location: add.php");
      return;
    } else{
      $_SESSION['success'] = "Record added";
      $stmt = $pdo->prepare('INSERT INTO pizza
          (store, address, rating, best) VALUES ( :mk, :md, :yr, :mi)');
      $stmt->execute(array(
          ':mk' => $_POST['store'],
          ':md' => $_POST['address'],
          ':yr' => $_POST['rating'],
          ':mi' => $_POST['best'])
      );
      header('Location:index.php');
      return;
    }
  }

?>

<html>
<head>
<title>Chong Li - Autos Database</title>
<?php
require_once "bootstrap.php";
?>
</head>
<body>
<div class="container">
<?php
  echo "<h1>Tracking Pizza for ".$_SESSION['id']."<h1>";
  ?>
  <?php
  // Note triple not equals and think how badly double
  // not equals would work here...
  if ( isset($_SESSION['failure'])) {
      // Look closely at the use of single and double quotes
      echo('<p style="color: red;">'.htmlentities($_SESSION['failure'])."</p>\n");
      unset($_SESSION['failure']);
  }

  ?>
<form method="post">
  <p>Store:
  <input type="text" name="store" size="40"/></p>
  <p>Address:
  <input type="text" name="address" size="40"/></p>
  <p>Rating:
  <input type="text" name="rating" size="10"/></p>
  <p>Best Pizza:
  <input type="text" name="best" size="10"/></p>
  <input type="submit" name='add' value="Add">
  <input type="submit" name="cancel" value="Cancel">
</form>
<p>
</div>
</body>
</html>
