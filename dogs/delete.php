<?php
session_start();
require_once "pdo.php";
if ( isset($_POST['delete']) && isset($_POST['dogs_id']) ) {
    $sql = "DELETE FROM dogs WHERE dogs_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['dogs_id']));
    $_SESSION['success'] = 'Record deleted';
    header( 'Location: index.php' ) ;
    return;
}
if ( ! isset($_GET['dogs_id']) ) {
  $_SESSION['error'] = "Missing dogs_id";
  header('Location: index.php');
  return;
}
$stmt = $pdo->prepare("SELECT dogs_id, name FROM dogs where dogs_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['dogs_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for dogs_id';
    header( 'Location: index.php' ) ;
    return;
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

<p>Confirm: Deleting <?= $row['name'] ?></p>
<form method="post">
  <input type="hidden" name="dogs_id" value="<?= $row['dogs_id'] ?>">
  <input type="submit" value="Delete" name="delete"><a href="index.php">Cancel</a>
</form>
</div>
</body>
</html>
