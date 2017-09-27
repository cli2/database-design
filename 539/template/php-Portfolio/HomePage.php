<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
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
			<div class="col-sm-5 col-md-3">
				<img class="img-responsive imgdesign" src="img/garden.jpg" alt="A garden with a metal sculpture, a stone walkway, and blooming flowers." data-toggle="tooltip" title="There's no place like home" id="garden"/>
				<img class= "img-responsive imgdesign" src="img/wheel.jpg" alt="The sun being blocked by the center of a Ferris wheel." data-toggle="tooltip" title="Try Clear Eye" id="wheel"/>
			</div>
			<div class= "col-sm-6 col-md-6 imgdesign text">
				<p id="basics1"><h2>The #Basics</h2>
			<ol>
				<li><p>Personal pronouns: she/her/hers</p></li>
				<li><p>Archivist-to-be</p></li>
				<li><p>In high school, was voted "Betty Bookworm" as my senior superlative, and I still have some unresolved feelings about that.</p></li>
				<li><p>Mediocre/bad at cooking, but can create <a href="http://bellyfull.net/2011/10/27/threaded-spaghetti-hot-dog-bites/">masterpieces</a> with hotdogs and spaghetti.</p></li>
				<li><p>Favorite songs include: <a href= "https://www.youtube.com/watch?v=99j0zLuNhi8">With Arms Wide Open by Creed</a>, and anything by <a href="http://www.abbasite.com/">ABBA.</a></p></li>
				<li><p> Want to know more about the <a href="AboutMe.html">things I like</a>, <a href="Resume.html"> my experience</a>, and <a href= "Archives.html">my passion</a>? Follow the links! </p></li>
			</ol>

			</div>
			<br>
			<div class="hidden-xs col-sm col-md-3" id="photoleft">
				<img class="img-responsive imgdesign" src="img/neon.jpg" alt="Nam June Paik art installation of the United States, with each state displayed in a neon outline" data-toggle="tooltip" title="Midwest is Best" id="neon"/>
				<img class="img-responsive imgdesign" src="img/airport.jpg"  alt="Sunrise horizon view from the airport." data-toggle="tooltip" title="We're soaring, flying" id="airport"/>
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
