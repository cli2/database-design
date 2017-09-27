<?php
session_start();
require_once "pdo.php";
require_once "util.php";

if ( ! isset($_SESSION['user_id'])) {
    die('ACCESS DENIED');
    return;
}

if ( isset($_POST['cancel']) ) {
    header('Location: index.php');
    return;
}

if ( isset($_POST['add']) ) {

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

    $stmt = $pdo->prepare('INSERT INTO Profile
        (first_name, last_name, user_id, email, headline,summary) VALUES ( :first, :last, :id, :em, :hd, :sm)');
    $stmt->execute(array(
        ':first' => $_POST['first_name'],
        ':last' => $_POST['last_name'],
        ':id' => $_SESSION['user_id'],
        ':em' => $_POST['email'],
        ':hd' => $_POST['headline'],
        ':sm' => $_POST['summary'])
    );
    $profile_id = $pdo->lastInsertId();

    $rank = 1;
    for ($i=1; $i<=9; $i++) {
      if (!isset($_POST['year'.$i])) continue;
      if (!isset($_POST['desc'.$i])) continue;
      $year = $_POST['year'.$i];
      $desc = $_POST['desc'.$i];

      $stmt = $pdo->prepare('INSERT INTO Position
          (profile_id, rank, year, description) VALUES ( :pid, :rank, :year, :desc)');
      $stmt->execute(array(
          ':pid' => $profile_id,
          ':rank' => $rank,
          ':year' => $year,
          ':desc' => $desc)
      );
      $rank++;
    }

    $_SESSION['success'] = "Profile added";
    header('Location:index.php');
    return;

  }

?>

<html>
<head>
<title>Chong Li - Profile Add</title>
<?php
require_once "bootstrap.php";
?>
</head>
<body>
  <div class="container">
  <h1>Adding Profile for UMSI</h1>
  <?php
  flashMessages();
  ?>
  <form method="post">
  <p>First Name:
  <input type="text" name="first_name" size="60"/></p>
  <p>Last Name:
  <input type="text" name="last_name" size="60"/></p>
  <p>Email:
  <input type="text" name="email" size="30"/></p>
  <p>Headline:<br/>
  <input type="text" name="headline" size="80"/></p>
  <p>Summary:<br/>
  <textarea name="summary" rows="8" cols="80"></textarea></p>
  <p>
    Position: <input type="submit" name="addPos" id="addPos" value="+">
    <div id="position_fields">

    </div>
  </p>
  <p>
  <input type="submit" value="Add" name="add">
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
</html>
