<?php
session_start();
require_once "pdo.php";
?>
<html>
<head>
<title>Chong Li - Dogs Database</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Welcome to the Dogs Database</h1>
<?php
if ( ! isset($_SESSION['id'])) {
  echo '
  <p>
  <a href="login.php">Please log in</a>
  </p>
  <p>
  Attempt to go to
  <a href="add.php">add data</a> without logging in - it should fail with an error message.
  </p>';
} else{
  if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
  }
  if ( isset($_SESSION['success']) ) {
      echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
      unset($_SESSION['success']);
  }
  $stmt = $pdo->query("SELECT dogs_id, name, breed, owner, email, age FROM dogs");
  $dogs = array();
  while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
    $dogs[] = $row;
  }
  if (count($dogs) == 0){
    echo '<p>No rows found</p>';
  } else{
    echo('<table border="1">'."\n");
    echo "<thead><tr>
          <th>Name</th>
          <th>Breed</th>
          <th>Owner Name</th>
          <th>Owner Email</th>
          <th>Age</th>
          <th>Action</th>
          </tr></thead>";
    foreach ($dogs as $row) {
      echo("<tr><td>");
      echo(htmlentities($row['name']));
      echo("</td><td>");
      echo(htmlentities($row['breed']));
      echo("</td><td>");
      echo(htmlentities($row['owner']));
      echo("</td><td>");
      echo(htmlentities($row['email']));
      echo("</td><td>");
      echo(htmlentities($row['age']));
      echo("</td><td>");
      echo('<a href="edit.php?dogs_id='.$row['dogs_id'].'">Edit</a> / ');
      echo('<a href="delete.php?dogs_id='.$row['dogs_id'].'">Delete</a>');
      echo("</td></tr>");
    }
    echo ('</table>');
  }
echo '<p><a href="add.php">Add New Entry</a></p>
<p><a href="logout.php">Logout</a></p>';
}
?>
</div>
</body>
<html>
