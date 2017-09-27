<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<!-- Latest compiled and minified CSS -->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleHP.css">
	<link rel="stylesheet" href="css/footer.css">

	<link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet"> 

	<?php $fname= basename(__FILE__);?>

</head>
<body>
	<header>
<?php 
	include 'phpheader.php';
?>
	</header>
<div class="container">
		<div class="row" id="row1">
			<div class="col-sm-12 imgdesign text">
				<p><h2>Be careful giving information on the internet!</h2></p><html>
<body>

<p>You foolish mortal. I've tricked you into thinking this was a contact form. Now I can use your name, <?php echo $_GET["fname"]; ?>, to control you.</p>
<p>Your email address is: <?php echo $_GET["email"]; ?> I can't use this to control you, but I still have it now.</p>
<p> It's nice that you wanted me to know <?php echo $_GET["extra"]; ?> but I'll probably never think about it again. Whoops. </p>
<p>Haha! I have cursed you to now only taste <?php echo $_GET["msg"]; ?> when you eat anything. Sorry I'm not sorry!</p>
			</div>
		</div>
	</div>
<br>
<footer id="smedia">
<?php
	include "phpfooter.php"
?>
</footer>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>