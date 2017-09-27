<?php
session_start();
require_once "pdo.php";
if ( isset($_POST['delete']) && isset($_POST['pizza_id']) ) {
    $sql = "DELETE FROM pizza WHERE pizza_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['pizza_id']));
    $_SESSION['success'] = 'Record deleted';
    header( 'Location: index.php' ) ;
    return;
}
if ( ! isset($_GET['pizza_id']) ) {
  $_SESSION['error'] = "Missing pizza_id";
  header('Location: index.php');
  return;
}
$stmt = $pdo->prepare("SELECT pizza_id FROM pizza where pizza_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['pizza_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for pizza_id';
    header( 'Location: index.php' ) ;
    return;
}
?>
<html>
<head>
<title>Chong Li - Pizza Database</title>
<?php
require_once "bootstrap.php";
?>
</head>
<body>
<div class="container">

<p>Confirm: Deleting bmw</p>
<form method="post">
  <input type="hidden" name="pizza_id" value="<?= $row['pizza_id'] ?>">
  <input type="submit" value="Delete" name="delete"><a href="index.php">Cancel</a>
</form>
</div>
</body>
</html>
