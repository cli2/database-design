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
      $sql = "UPDATE dogs SET name = :make,
              breed = :model, owner = :year, email = :mileage, age = :age
              WHERE dogs_id = :dogs_id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
          ':make' => $_POST['name'],
          ':model' => $_POST['breed'],
          ':year' => $_POST['owner'],
          ':mileage' => $_POST['email'],
          ':age' => $_POST['age'],
          ':dogs_id' => $_GET['dogs_id']));
      $_SESSION['success'] = 'Record updated';
      header( 'Location: index.php' ) ;
      return;
    }
}

// Guardian should go here (see edit.php)

$stmt = $pdo->prepare("SELECT * FROM dogs where dogs_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['dogs_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for dogs_id';
    header( 'Location: index.php' ) ;
    return;
}

$n = htmlentities($row['name']);
$md = htmlentities($row['breed']);
$y = htmlentities($row['owner']);
$mi = htmlentities($row['email']);
$age = htmlentities($row['age']);
$dogs_id = $row['dogs_id'];
?>
<html>
<head>
<title>Chong Li - dogs Database</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Editing dogs</h1>
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
<p>Name<input type="text" name="name" size="40" value="<?= $n ?>"/></p>
<p>Breed<input type="text" name="breed" size="40" value="<?= $md ?>"/></p>
<p>Owner Name<input type="text" name="owner" size="40" value="<?= $y ?>"/></p>
<p>Owner Email<input type="text" name="email" size="40" value="<?= $mi ?>"/></p>
<p>Age<input type="text" name="age" size="40" value="<?= $age ?>"/></p>
<input type="hidden" name="dogs_id" value="<?= $dogs_id ?>">
<input type="submit" value="Save" name="save">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>
</div>
</body>
