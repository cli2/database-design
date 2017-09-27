
		<div class="container">
			<div class="row">
				<div class="col-md-3 hidden-xs hidden-sm">
					<img src="img/face.jpg" alt = "photo of Sarah's face" title = "So quirky." id="me"/>
				</div>

			<nav class="navbar navbar-default col-md-6">
  				<div class="container-fluid">
  					<div class="navbar-header">
  						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
  							<span class="icon-bar"></span>
  							<span class="icon-bar"></span>
  							<span class="icon-bar"></span>
  						</button>
  					</div>
  				</div>
				<div class="collapse navbar-collapse" id="nav">
					<ul>					
						<li><a <?php if($fname=="HomePage.php"){
            				echo "class=\"current\"";
        					} ?> href="HomePage.php">Home</a></li>
						<li><a <?php if($fname=="AboutMe.php"){
            				echo "class=\"current\"";
        					} ?> href="AboutMe.php">About Me</a></li>
						<li><a <?php if($fname=="Archives.php"){
            				echo "class=\"current\"";
        					} ?> href="Archives.php">Archives</a></li>
						<li><a <?php if($fname=="Resume.php"){
            				echo "class=\"current\"";
        					} ?> href="Resume.php">Résumé</a></li>
						<li><a <?php if($fname=="Contact.php"){
            				echo "class=\"current\"";
        					} ?> href="Contact.php">Contact</a></li>
					</ul>
				</div>
			</nav>
				
				<div class = "col-md-3" id="signature"> sarah lebovitz </div>
			</div>
			<div class="row">
				<div id="pname"><h1> <?php if($fname=="HomePage.php") {
					echo "Home"; } ?>
					<?php if($fname=="AboutMe.php") {
					echo "About Me"; } ?>
					<?php if($fname=="Archives.php") {
					echo "Archives"; } ?>
					<?php if($fname=="Resume.php") {
					echo "Resume"; } ?>
					<?php if($fname=="Contact.php") {
					echo "Contact"; } ?>
					<?php if($fname=="formhandle.php") {
					echo "UH OH GOTCHA GOOD"; } ?>
					</h1></div>
			</div>
		</div>
