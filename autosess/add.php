<?php
session_start();
unset($_SESSION["success"]);
$pdo = new PDO('mysql:host=localhost;port=8889;dbname=misc', 'fred', 'zap');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ( ! isset($_SESSION['id'])) {
    die('Not logged in');
}
if ( isset($_POST['logout']) ) {
    header('Location: view.php');
    return;
}
if ( isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])){
  if (strlen($_POST['make'])<1){
    $_SESSION['failure'] = "Make is required";
    header("Location: add.php");
    return;
  } elseif (! is_numeric($_POST['mileage']) || ! is_numeric($_POST['year'])){
    $_SESSION['failure'] = "Mileage and year must be numeric";
    header("Location: add.php");
    return;
  } else{
    $_SESSION['success'] = "Record inserted";
    $stmt = $pdo->prepare('INSERT INTO autos
        (make, year, mileage) VALUES ( :mk, :yr, :mi)');
    $stmt->execute(array(
        ':mk' => $_POST['make'],
        ':yr' => $_POST['year'],
        ':mi' => $_POST['mileage'])
    );
    header('Location:view.php');
    return;
  }
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
   echo "<h1>Tracking Autos for ".$_SESSION['id']."<h1>" ?>
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
 <p>Make:
 <input type="text" name="make" size="60"/></p>
 <p>Year:
 <input type="text" name="year"/></p>
 <p>Mileage:
 <input type="text" name="mileage"/></p>
 <input type="submit" value="Add">
 <input type="submit" name="logout" value="Cancel">
 </form>

 </div>
 </body>
 </html>
