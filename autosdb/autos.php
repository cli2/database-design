<?php
$pdo = new PDO('mysql:host=localhost;port=8889;dbname=misc', 'fred', 'zap');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Demand a GET parameter
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}
// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    exit();
}
$failure = false;
$success = false;
if ( isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])){
  if (strlen($_POST['make'])<1){
    $failure = "Make is required";
  } elseif (! is_numeric($_POST['mileage']) || ! is_numeric($_POST['year'])){
    $failure = "Mileage and year must be numeric";
  } else{
    $success = "Record inserted";
    $stmt = $pdo->prepare('INSERT INTO autos
        (make, year, mileage) VALUES ( :mk, :yr, :mi)');
    $stmt->execute(array(
        ':mk' => $_POST['make'],
        ':yr' => $_POST['year'],
        ':mi' => $_POST['mileage'])
    );
  }
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Chong Li - Autos Database</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Tracking Autos for <h1>
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if ( $failure !== false ) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
if ( $success !== false ) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: green;">'.htmlentities($success)."</p>\n");
}
?>
<form method="post">
<p>Make:
<input type="text" name="make" size="60"/></p>
<p>Year:
<input type="text" name="year"/></p>
<p>Mileage:
<input type="text" name="mileage"/></p>
<input type="submit" value="Add">
<input type="submit" name="logout" value="Logout">
</form>

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
</div>
</body>
</html>
