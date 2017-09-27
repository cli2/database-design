<?php
require_once "pdo.php";
session_start();
if ( ! isset($_SESSION['user_id'])) {
    die('ACCESS DENIED');
}
if ( isset($_POST['cancel']) ) {
    header('Location: index.php');
    return;
}
if ( isset($_POST['save'])) {

    // Data validation should go here (see edit.php)
    if (strlen($_POST['first_name'])<1 || strlen($_POST['last_name'])<1 || strlen($_POST['email'])<1 || strlen($_POST['headline'])<1 || strlen($_POST['summary'])<1){
      $_SESSION['failure'] = "All fields are required";
      header("Location: edit.php?profile_id=".$_GET['profile_id']);
      return;
    } elseif (strpos($_POST['email'], '@') === false) {
      $_SESSION['failure'] = "Email must have an at-sign (@)";
      header("Location: edit.php?profile_id=".$_GET['profile_id']);
      return;
    } else{
      $sql = "UPDATE Profile SET first_name = :first,
              last_name = :last, user_id = :id, email = :em, headline = :hd, summary = :sm
              WHERE profile_id = :profile_id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        ':first' => $_POST['first_name'],
        ':last' => $_POST['last_name'],
        ':id' => $_SESSION['user_id'],
        ':em' => $_POST['email'],
        ':hd' => $_POST['headline'],
        ':profile_id' => $_GET['profile_id'],
        ':sm' => $_POST['summary'])
      );
      $_SESSION['success'] = 'Record updated';
      header( 'Location: index.php' ) ;
      return;
    }
}

// Guardian should go here (see edit.php)

$stmt = $pdo->prepare("SELECT * FROM profile where profile_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['profile_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for profile_id';
    header( 'Location: index.php' ) ;
    return;
}

$fn = htmlentities($row['first_name']);
$ln = htmlentities($row['last_name']);
$e = htmlentities($row['email']);
$h = htmlentities($row['headline']);
$s = htmlentities($row['summary']);
$profile_id = $row['profile_id'];
?>
<html>
<head>
<title>Chong Li - profile Database</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Editing Profile for UMSI</h1>
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
<p>First Name:
<input type="text" name="first_name" size="60" value="<?= $fn ?>"/></p>
<p>Last Name:
<input type="text" name="last_name" size="60" value="<?= $ln ?>"/></p>
<p>Email:
<input type="text" name="email" size="30" value="<?= $e ?>"/></p>
<p>Headline:<br/>
<input type="text" name="headline" size="80" value="<?= $h ?>"/></p>
<p>Summary:<br/>
<textarea name="summary" rows="8" cols="80"><?= $s ?></textarea>
<p>
<input type="hidden" name="profile_id" value="<?= $profile_id ?>">
<input type="submit" value="Save" name="save">
<input type="submit" name="cancel" value="Cancel">
</p>
</form>
<p>
</div>
</body>
