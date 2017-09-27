<?php
require_once "pdo.php";
require_once "util.php";
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
    $msg = validateProfile();
    if (is_string($msg)){
      $_SESSION['error'] = $msg;
      header("Location: add.php");
      return;
    }

    $msg = validatePos();
    if (is_string($msg)){
      $_SESSION['error'] = $msg;
      header("Location: add.php");
      return;
    }

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

    // Clear out the old position entries
    $stmt = $pdo->prepare('DELETE FROM Position
        WHERE profile_id=:pid');
    $stmt->execute(array( ':pid' => $_REQUEST['profile_id']));

    // Insert the position entries
    $rank = 1;
    for($i=1; $i<=9; $i++) {
        if ( ! isset($_POST['year'.$i]) ) continue;
        if ( ! isset($_POST['desc'.$i]) ) continue;
        $year = $_POST['year'.$i];
        $desc = $_POST['desc'.$i];

        $stmt = $pdo->prepare('INSERT INTO Position
            (profile_id, rank, year, description)
        VALUES ( :pid, :rank, :year, :desc)');
        $stmt->execute(array(
            ':pid' => $_REQUEST['profile_id'],
            ':rank' => $rank,
            ':year' => $year,
            ':desc' => $desc)
        );
        $rank++;
    }

    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
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
flashMessages();
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
<textarea name="summary" rows="8" cols="80"><?= $s ?></textarea></p>
<p>
  Position: <input type="submit" name="addPos" id="addPos" value="+">
  <div id="position_fields">

  </div>
</p>
<p>
<input type="submit" value="Save" name="save">
<input type="submit" name="cancel" value="Cancel">
</p>
</form>
<script>
  countPos = 0;
  $(document).ready(function(){
    window.console && console.log('Document ready called');
    $('#addPos').click(function(event){
      event.preventDefault();
      if(countPos >= 9){
        alert("Maximum of nine position entries exceeded");
        return;
      }
      countPos++;
      window.console && console.log('Adding position' + countPos);
      $('#position_fields').append(
        '<div id="position'+countPos+'"> \
        <p>Year: <input type="text" name="year' + countPos + '" value="" /> \
        <input type="button" value="-" \
          onclick="$(\'#position'+countPos+'\').remove();return false;"></p> \
          <textarea name="desc'+countPos+'" rows="8" cols="80"></textarea>\
          </div>');
    });
  });
</script>
</div>
</body>
