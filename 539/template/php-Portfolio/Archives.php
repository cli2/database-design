<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Archives</title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleAR.css">
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
<div class= "container">
	<div class= "row" id="row1">
		<div class="col-sm-6">
			<a href="http://bentley.umich.edu/" target="_blank">
				<img class="img-responsive imgdesign" src="img/bentley.png" alt="link to the Bentley Historical Library website" data-toggle="tooltip" title="Click me, I'm a link!"/>
			</a>
			<div class="caption imgdesign text">
					<h2>The Bentley Historical Library</h2>
					<p>This is where I currently work. The Bentley Historical Library holds collections from both the state of Michigan as well as the University of Michigan, including papers of previous students and professors. It also provides a steady stream of coffee for all their hardworking employees.</p>
			</div>
		</div>
		<div class="col-sm-6">		
			<a href="http://www.archivalplatform.org/registry/entry/uwc-robben_island_mayibuye_archives/" target="_blank">
				<img class="img-responsive imgdesign" src="img/mayibuye.jpg" alt="link to the UWC Robben Island Mayibuye Archives website" id="mayibuye" data-toggle="tooltip" title="Click me, I'm a link!"/> 
			</a>
			<div class="caption imgdesign text">
				<h2>The UWC Robben Island Mayibuye Archives</h2>
				<p>This is a fantastic archive located in Cape Town, South Africa. The archive material focuses on the liberation struggle during the apartheid era, and more specifically hold the papers of individuals who were imprisoned for political reasons at the Robben Island prison (now Museum).</p>
			</div>
		</div>
	</div>
	<div class= "row">
		<div class="col-md-6">
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