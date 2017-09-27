<?php
require_once "pdo.php";
session_start();
if ( isset($_POST['cancel']) ) {
    header('Location: index.php');
    return;
}
if ( isset($_POST['save'])) {

    // Data validation should go here (see edit.php)
    if (strlen($_POST['make'])<1 || strlen($_POST['year'])<1 || strlen($_POST['mileage'])<1 || strlen($_POST['model'])<1){
      $_SESSION['failure'] = "All fields are required";
      header("Location: edit.php?autos_id=".$_GET['autos_id']);
      return;
    } elseif (! is_numeric($_POST['mileage'])){
      $_SESSION['failure'] = "Mileage must be numeric";
      header("Location: edit.php?autos_id=".$_GET['autos_id']);
      return;
    } elseif (! is_numeric($_POST['year'])){
      $_SESSION['failure'] = "Year must be numeric";
      header("Location: edit.php?autos_id=".$_GET['autos_id']);
      return;
    } else{
      $sql = "UPDATE autos SET make = :make,
              model = :model, year = :year, mileage = :mileage
              WHERE autos_id = :autos_id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
          ':make' => $_POST['make'],
          ':model' => $_POST['model'],
          ':year' => $_POST['year'],
          ':mileage' => $_POST['mileage'],
          ':autos_id' => $_GET['autos_id']));
      $_SESSION['success'] = 'Record updated';
      header( 'Location: index.php' ) ;
      return;
    }
}

// Guardian should go here (see edit.php)

$stmt = $pdo->prepare("SELECT * FROM autos where autos_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['autos_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for autos_id';
    header( 'Location: index.php' ) ;
    return;
}

$n = htmlentities($row['make']);
$md = htmlentities($row['model']);
$y = htmlentities($row['year']);
$mi = htmlentities($row['mileage']);
$autos_id = $row['autos_id'];
?>
<html>
<head>
<title>Chong Li - Autos Database</title>
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
<p>Make<input type="text" name="make" size="40" value="<?= $n ?>"/></p>
<p>Model<input type="text" name="model" size="40" value="<?= $md ?>"/></p>
<p>Year<input type="text" name="year" size="10" value="<?= $y ?>"/></p>
<p>Mileage<input type="text" name="mileage" size="10" value="<?= $mi ?>"/></p>
<input type="hidden" name="autos_id" value="<?= $autos_id ?>">
<input type="submit" value="Save" name="save">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>
</div>
</body>
