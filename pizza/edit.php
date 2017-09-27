<?php
require_once "pdo.php";
session_start();
if ( ! isset($_SESSION['id'])) {
    die('ACCESS DENIED');
}
if ( isset($_POST['cancel']) ) {
    header('Location: index.php');
    return;
}
if ( isset($_POST['save'])) {

    // Data validation should go here (see edit.php)
    if (strlen($_POST['store'])<1 || strlen($_POST['address'])<1 || strlen($_POST['rating'])<1 || strlen($_POST['best'])<1){
      $_SESSION['failure'] = "All fields are required";
      header("Location: edit.php?pizza_id=".$_GET['pizza_id']);
      return;
    } elseif (! is_numeric($_POST['rating'])){
      $_SESSION['failure'] = "Year must be numeric";
      header("Location: edit.php?pizza_id=".$_GET['pizza_id']);
      return;
    } else{
      $sql = "UPDATE pizza SET store = :make,
              address = :model, rating = :year, best = :mileage
              WHERE pizza_id = :pizza_id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
          ':make' => $_POST['store'],
          ':model' => $_POST['address'],
          ':year' => $_POST['rating'],
          ':mileage' => $_POST['best'],
          ':pizza_id' => $_GET['pizza_id']));
      $_SESSION['success'] = 'Record updated';
      header( 'Location: index.php' ) ;
      return;
    }
}

// Guardian should go here (see edit.php)

$stmt = $pdo->prepare("SELECT * FROM pizza where pizza_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['pizza_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for pizza_id';
    header( 'Location: index.php' ) ;
    return;
}

$n = htmlentities($row['store']);
$md = htmlentities($row['address']);
$y = htmlentities($row['rating']);
$mi = htmlentities($row['best']);
$pizza_id = $row['pizza_id'];
?>
<html>
<head>
<title>Chong Li - pizza Database</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Editing Automobile</h1>
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
<p>Make<input type="text" name="store" size="40" value="<?= $n ?>"/></p>
<p>Model<input type="text" name="address" size="40" value="<?= $md ?>"/></p>
<p>Year<input type="text" name="rating" size="10" value="<?= $y ?>"/></p>
<p>Mileage<input type="text" name="best" size="10" value="<?= $mi ?>"/></p>
<input type="hidden" name="pizza_id" value="<?= $pizza_id ?>">
<input type="submit" value="Save" name="save">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>
</div>
</body>
