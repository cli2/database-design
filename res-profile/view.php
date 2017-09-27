<?php
session_start();
unset($_SESSION['success']);
$pdo = new PDO('mysql:host=localhost;port=8889;dbname=misc', 'fred', 'zap');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// if ( ! isset($_SESSION['id'])) {
//     die('Not logged in');
// }

 ?>
<html>
<head>
<title>Chong Li - Profile Database</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
  <div class="container">
  <h1>Profile information</h1>
  <?php
  $stmt = $pdo->prepare("SELECT * FROM profile");
  $stmt->execute(array(":xyz" => $_GET['profile_id']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ( $row === false ) {
      $_SESSION['error'] = 'Bad value for profile_id';
      header( 'Location: index.php' ) ;
      return;
  } else {
    $fn = htmlentities($row['first_name']);
    $ln = htmlentities($row['last_name']);
    $e = htmlentities($row['email']);
    $h = htmlentities($row['headline']);
    $s = htmlentities($row['summary']);
    $profile_id = $row['profile_id'];
    echo "<p>First Name: ".$fn."</p>";
    echo "<p>Last Name: ".$ln."</p>";
    echo "<p>Email: ".$e."</p>";
    echo "<p>Headline:<br/>".$h."</p>";
    echo "<p>Summary:<br/>".$s."</p>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $fn = htmlentities($row['first_name']);
      $ln = htmlentities($row['last_name']);
      $e = htmlentities($row['email']);
      $h = htmlentities($row['headline']);
      $s = htmlentities($row['summary']);
      $profile_id = $row['profile_id'];
      echo "<p>First Name: ".$fn."</p>";
      echo "<p>Last Name: ".$ln."</p>";
      echo "<p>Email: ".$e."</p>";
      echo "<p>Headline:<br/>".$h."</p>";
      echo "<p>Summary:<br/>".$s."</p>";
    }
  }


   ?>
  <a href="index.php">Done</a>
  </div>
</body>
</html>
