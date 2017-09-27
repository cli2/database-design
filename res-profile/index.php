<?php
session_start();
require_once "pdo.php";
?>
<html>
<head>
<title>Chong Li - Resume Registry</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Chong Li's Resume Registry</h1>
<?php
if (!isset($_SESSION["user_id"])){
  echo '<p><a href="login.php">Please log in</a></p>';
}
else{
  if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
  }
  if ( isset($_SESSION['success']) ) {
      echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
      unset($_SESSION['success']);
  }
  $stmt = $pdo->query("SELECT profile_id, first_name, last_name, headline FROM Profile");
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  echo '<p><a href="logout.php">Logout</a></p>';
  if ($row===false){
    // echo '<p>No rows found</p>';
  } else{

    echo('<table border="1">'."\n");
    echo "<thead><tr>
          <th>Name</th>
          <th>Headline</th>
          <th>Action</th>
          </tr></thead>";
    echo("<tr><td>");
    echo('<a href="view.php?profile_id='.$row['profile_id'].'">'.htmlentities($row['first_name'])." ".htmlentities($row['last_name']).'</a>');
    echo("</td><td>");
    echo(htmlentities($row['headline']));
    echo("</td><td>");
    echo('<a href="edit.php?profile_id='.$row['profile_id'].'">Edit</a> / ');
    echo('<a href="delete.php?profile_id='.$row['profile_id'].'">Delete</a>');
    echo("</td></tr>");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))  {
      echo("<tr><td>");
      echo('<a href="view.php?profile_id='.$row['profile_id'].'">'.htmlentities($row['first_name'])." ".htmlentities($row['last_name']).'</a>');
      echo("</td><td>");
      echo(htmlentities($row['headline']));
      echo("</td><td>");
      echo('<a href="edit.php?profile_id='.$row['profile_id'].'">Edit</a> / ');
      echo('<a href="delete.php?profile_id='.$row['profile_id'].'">Delete</a>');
      echo("</td></tr>");
    }
    echo ('</table>');
  }
  echo '<p><a href="add.php">Add New Entry</a></p>';
}
 ?>

</div>
</body>
<html>
