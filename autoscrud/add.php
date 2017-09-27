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
    if (strlen($_POST['make'])<1 || strlen($_POST['year'])<1 || strlen($_POST['mileage'])<1 || strlen($_POST['model'])<1){
      $_SESSION['failure'] = "All fields are required";
      header("Location: add.php");
      return;
    } elseif (! is_numeric($_POST['mileage'])){
      $_SESSION['failure'] = "Mileage must be numeric";
      header("Location: add.php");
      return;
    } elseif (! is_numeric($_POST['year'])){
      $_SESSION['failure'] = "Year must be numeric";
      header("Location: add.php");
      return;
    } else{
      $_SESSION['success'] = "Record added";
      $stmt = $pdo->prepare('INSERT INTO autos
          (make, model, year, mileage) VALUES ( :mk, :md, :yr, :mi)');
      $stmt->execute(array(
          ':mk' => $_POST['make'],
          ':md' => $_POST['model'],
          ':yr' => $_POST['year'],
          ':mi' => $_POST['mileage'])
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
  echo "<h1>Tracking Autos for ".$_SESSION['id']."<h1>";
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
  <p>Make:
  <input type="text" name="make" size="40"/></p>
  <p>Model:
  <input type="text" name="model" size="40"/></p>
  <p>Year:
  <input type="text" name="year" size="10"/></p>
  <p>Mileage:
  <input type="text" name="mileage" size="10"/></p>
  <input type="submit" name='add' value="Add">
  <input type="submit" name="cancel" value="Cancel">
</form>
<p>
</div>
</body>
</html>
