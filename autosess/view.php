<?php
session_start();
unset($_SESSION['success']);
$pdo = new PDO('mysql:host=localhost;port=8889;dbname=misc', 'fred', 'zap');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ( ! isset($_SESSION['id'])) {
    die('Not logged in');
}
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}
 ?>
<html>
<head>
<title>Chong Li - Autos Database</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<?php
  echo "<h1>Tracking Autos for ".$_SESSION['id']."<h1>";
  if ( isset($_SESSION['success'])) {
      // Look closely at the use of single and double quotes
      echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
  }
  ?>

<h2>Automobiles</h2>
<ul>
  <?php
  $stmt = $pdo->query("SELECT make, year, mileage FROM autos");
  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
      echo "<li>";
      echo(htmlentities($row['year']));
      echo(" ");
      echo(htmlentities($row['make']));
      echo(" / ");
      echo(htmlentities($row['mileage']));
      echo("</li>");
  }
  ?>
</ul>
<p>
<a href="add.php">Add New</a> |
<a href="logout.php">Logout</a>
</p>
</div>
</body>
</html>
