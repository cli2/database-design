<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact</title>
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
			<div class="col-md-7 imgdesign text">
				<p><h2>Hit Me Up!</h2></p>
					<p>
						<form action="formhandle.php" method="GET">
							<p><label for="fname">Full name:</label>
							<input type="text" name="fname" id="fname"></p>
							<p><label for="email">E-mail:</label>
							<input type="email" name="email" id="email"></p>
							<p><label for="extra">What would you like me to know?:</label><br>
							<textarea id="extra" name="extra"></textarea></p>
							<p><label for="msg">Just for fun, what's your least favorite food?:</label><br> 
							<textarea id="msg" name="msg"></textarea></p>
							<p><input type="submit" name="submit" value="submit"></p>
						</form>
					</p>
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