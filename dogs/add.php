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
    if (strlen($_POST['name'])<1 || strlen($_POST['breed'])<1 || strlen($_POST['owner'])<1 || strlen($_POST['email'])<1 || strlen($_POST['age'])<1){
      $_SESSION['failure'] = "All fields are required";
      header("Location: add.php");
      return;
    } elseif (! is_numeric($_POST['age'])){
      $_SESSION['failure'] = "Year must be numeric";
      header("Location: add.php");
      return;
    } elseif (strpos($_POST['email'], '@') === false){
      $_SESSION['failure'] = "Email must contain an @ sign";
      header("Location: add.php");
      return;
    } else{
      $_SESSION['success'] = "Record added";
      $stmt = $pdo->prepare('INSERT INTO dogs
          (name, breed, owner, email, age) VALUES ( :mk, :md, :yr, :mi, :age)');
      $stmt->execute(array(
          ':mk' => $_POST['name'],
          ':md' => $_POST['breed'],
          ':yr' => $_POST['owner'],
          ':mi' => $_POST['email'],
          ':age' => $_POST['age'])
      );
      header('Location:index.php');
      return;
    }
  }

?>

<html>
<head>
<title>Chong Li - Dogs Database</title>
<?php
require_once "bootstrap.php";
?>
</head>
<body>
<div class="container">
<?php
  echo "<h1>Tracking Dog for ".$_SESSION['id']."<h1>";
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
  <p>Name:
  <input type="text" name="name" size="40"/></p>
  <p>Breed:
  <input type="text" name="breed" size="40"/></p>
  <p>Owner Name:
  <input type="text" name="owner" size="40"/></p>
  <p>Owner Email:
  <input type="text" name="email" size="40"/></p>
  <p>Age:
  <input type="text" name="age" size="40"/></p>
  <input type="submit" name='add' value="Add">
  <input type="submit" name="cancel" value="Cancel">
</form>
<p>
</div>
</body>
</html>
