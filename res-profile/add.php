<?php
session_start();
require_once "pdo.php";
if ( ! isset($_SESSION['user_id'])) {
    die('ACCESS DENIED');
}
if ( isset($_POST['cancel']) ) {
    header('Location: index.php');
    return;
}
if ( isset($_POST['add']) ) {
    if (strlen($_POST['first_name'])<1 || strlen($_POST['last_name'])<1 || strlen($_POST['email'])<1 || strlen($_POST['headline'])<1 || strlen($_POST['summary'])<1){
      $_SESSION['error'] = "All fields are required";
      header("Location: add.php");
      return;
    } elseif (strpos($_POST['email'], '@') === false) {
      $_SESSION['error'] = "Email must have an at-sign (@)";
      header('Location:login.php');
      return;
    } else{
      $_SESSION['success'] = "Record added";
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
      header('Location:index.php');
      return;
    }
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
  if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
  }
  if ( isset($_SESSION['success']) ) {
      echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
      unset($_SESSION['success']);
  }
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
  <textarea name="summary" rows="8" cols="80"></textarea>
  <p>
  <input type="submit" value="Add" name="add">
  <input type="submit" name="cancel" value="Cancel">
  </p>
  </form>
  </div>
</body>
</html>
