<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>About Me</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleAM.css">
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
			<div>
				<p><h2>The #Rundown</h2>
				<p>You may have come to this page seeking answers, or maybe even insight. You won't find any of that here.</p>
				<p>In high school, I was one of four students who actually used the library. The librarians and I were all on first name bases. When I graduated, they gifted me with personalized stationary. The signs were all there. I should have known. </p>
			<div id="noshow">
				<p>Three and a half years ago I ran over a pair of my glasses with my car. As glasses are expensive, I took precautionary measures and bought glasses chains for every pair I had. The reckoning was nigh.</p>
				<p>Present day, I'm working toward my master's degree in archives and records management. My destiny calls, and I have answered. Who knows what the future holds from here. I certainly don't, otherwise I wouldn't be filling out so many job applications.</p>
			</div>
			</div>
		</div>

		<br>
		<div class="col-md-5 row2">
			<div class="imgdesign c text" data-toggle="tooltip" title="click the left and right arrows for more!">
				<p><h2>What I do for fun</h2><p>
			</div>
			<div id="myCarousel" class="carousel imgdesign" data-interval="false">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
					<li data-target="#myCarousel" data-slide-to="4"></li>
				</ol>

				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="img/tigerface.jpg" alt="photo of Sarah with her face painted like a space tiger, with lots of purples and blues, and plenty of glitter"/>
						<div class="carousel-caption">
							<p>Paint My Face</p>
						</div>
					</div>
					<div class="item">
						<img src="img/bread.jpeg" alt="photo of freshly baked chocolate chip banana bread still in the bread pan and a recipe card"/>
						<div class="carousel-caption">
							<p>Bake goodies</p>
						</div>
					</div>
					<div class="item">
						<img src="img/plaid.jpg" alt="a large red plaid shirt that has been embellished and sewn to fit a smaller person"/>
						<div class="carousel-caption">
							<p>Sew things</p>
						</div>
					</div>
					<div class="item">
						<img src="img/crepe.jpg" alt="crepe mixture cooking in a crepe pan on a stove"/>
						<div class="carousel-caption">
							<p>Make really thin pancakes</p>
						</div>
					</div>
					<div class="item">
						<img src="img/rick.jpg" alt="Rick Astley, the man, the myth, and the legend"/>
						<div class="carousel-caption">
							<p>Dream about my wedding</p>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 hidden-xs hidden-lg imgdesign text">
					<p><h2>Relevant to my interests</h2><p>
						<ul>
							<li>Do you like <a href="https://thepiebrary.com/">pie</a>? My friend creates and bakes pies based off books and poems that she likes.</li>
							<li>I really love making <a href="http://www.food.com/recipe/banana-chocolate-chip-loaf-397754">chocolate chip banana bread</a>. It's super easy, and great for when all your bananas are going bad.</li>
							<li>When I'm at work, I like to have at least one existential crisis a day. The most recent: what exactly can you call a <a href="https://en.wikipedia.org/wiki/List_of_salads">salad</a>? The answer: apparently a lot of things.</li>
						</ul>
				</div>
			</div>
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