<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chong Li PHP</title>
  </head>
  <body>
    <h1>Chong Li PHP</h1>
    <p><?php
        echo "The SHA256 hash of \"Chong Li\" is"."\n";
        print hash('sha256', 'Chong Li');
      ?></p>
    <pre>
ASCII ART:

    ***********
    **       **
    **
    **
    **
    **       **
    ***********
    </pre>
    <a href="check.php">Click here to check the error setting</a>
    <br/>
    <a href="fail.php">Click here to cause a traceback</a>
  </body>
</html>
