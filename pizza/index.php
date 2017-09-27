<?php
session_start();
require_once "pdo.php";
?>
<html>
<head>
<title>Chong Li - Pizza Database</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Welcome to the Pizza Database</h1>
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
  $stmt = $pdo->query("SELECT pizza_id, store, address, rating, best FROM pizza");
  $pizzas = array();
  while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
    $pizzas[] = $row;
  }
  if (count($pizzas) == 0){
    echo '<p>No rows found</p>';
  } else{
    echo('<table border="1">'."\n");
    echo "<thead><tr>
          <th>Store</th>
          <th>Address</th>
          <th>Rating</th>
          <th>Best Pizza</th>
          <th>Action</th>
          </tr></thead>";
    foreach ($pizzas as $row) {
      echo("<tr><td>");
      echo(htmlentities($row['store']));
      echo("</td><td>");
      echo(htmlentities($row['address']));
      echo("</td><td>");
      echo(htmlentities($row['rating']));
      echo("</td><td>");
      echo(htmlentities($row['best']));
      echo("</td><td>");
      echo('<a href="edit.php?pizza_id='.$row['pizza_id'].'">Edit</a> / ');
      echo('<a href="delete.php?pizza_id='.$row['pizza_id'].'">Delete</a>');
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
