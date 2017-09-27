<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Résumé</title>
		<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/styleR.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet"> 

	<link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet"> 

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
		 <div class="panel-group" id="accordion">
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
	        Education<span class="fa fa-caret-down"></span></a>
	      </h4>
	    </div>
	    <div id="collapse1" class="panel-collapse collapse in">
	      <div class="panel-body">
	      	<p class="rhead">University of Michigan </p>
	      	<p class="rhead">School of Information</p>
	      	<p class="rplace">Ann Arbor, MI</p>
	      	<p class="rposition">Master of Science in Information</p>
	      	<p class="rdate">2017</p>
	      	<p class="rhead">Colorado College</p>
	      	<p class="rplace">Colorado Springs, CO</p>
	      	<p class="rposition">Bachelor of Arts in Anthropology</p>
	      	<p class="rdate">2013</p>
	      </div>
	    </div>
	  </div>
	  <div class="panel panel-default none">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
	        Conferences<span class="fa fa-caret-down"></span></a>
	      </h4>
	    </div>
	    <div id="collapse2" class="panel-collapse collapse">
	      <div class="panel-body">	 
	      	<p class="rhead">Society of American Archivists</p>
	      	<p class="rplace">Portland, Oregon</p>
	      	<p class="rposition">Graduate Poster Presenter</p>
	      	<p class="rdate">2017</p>     	
	      	<p class="rhead">Society of American Archivists</p>
	      	<p class="rplace">Atlanta, Georgia</p>
	      	<p class="rposition">Graduate Poster Presenter</p>
	      	<p class="rdate">2016</p>
	      	<p class="rhead">QuasiCon</p>
	      	<p class="rplace">Ann Arbor, MI</p>   
	      	<p class="rposition">Planning Committee Member</p>
	      	<p class="rdate">2015</p>
	      </div>
	    </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
	        Relevant Experience<span class="fa fa-caret-down"></span></a>
	      </h4>
	    </div>
	    <div id="collapse3" class="panel-collapse collapse">
	      <div class="panel-body">     	
	      	<p class="rhead">The Bentley Historical Library </p>
	      	<p class="rplace">Ann Arbor, MI</p>
	      	<p class="rposition">Student Processing Archivist</p>
	      	<p class="rdate">2016-Present</p>
	      		<p class="rinfo"> 
		      		<ul class="none">
		      			<li>Utilize MPLP to process backlogged collections</li>
		      			<li>Analyize accessions and decide on degree of organization needed for collection (including series, box, and folder level description as necessary)</li>
		      		</ul>
	      	<p class="rhead">University of Western Cape Robben Island Museum Mayibuye Archives</p>
	      	<p class="rplace">Cape Town, South Africa</p>	      	
	      	<p class="rposition">Global Information Engagement Fellow</p>
	      	<p class="rdate">2016</p>
	      	<p class="rinfo">
	      		<ul class="none">
	      			<li>Researched international archival standards in order combine with current Mayibuye Archives practices and create standardized processing guidelines</li>
	      			<li>Developed and conducted training workshops with instructional booklets to promote MPLP style processing</li>
	      			<li>Collaborated with Mayibuye Archives staff to create and implement finding aid templates and processing guidelines</li>
	      		</ul>
	      	<p>
	      	<p class="rhead">The Colorado College</p>
	      	<p class="rplace">Costa Rica</p>   	
	      	<p class="rposition">Student Research Assistant</p>
	      	<p class="rinfo">
	      		<ul class="none">
	      			<li>Worked with Dr. Esteban Gomez and Elisa Fernández on a team of anthropology students at two separate dig sites</li>
	      		</ul>
	      	<p class="rdate">2012</p>
	      </div>
	    </div>
	  </div>
	  <div class="panel panel-default none">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
	        Skills<span class="fa fa-caret-down"></span></a>
	      </h4>
	    </div>
	    <div id="collapse4" class="panel-collapse collapse">
	      <div class="panel-body">	      	
	      	<p class="rplace">Standards</p>  
	      	 <p class="rin">
	      	 	<ul class="none">
	      			<li>ISAD(G)</li>
	      			<li>DACS</li>
	      			<li>Dublin Core</li>
	      			<li>LC Authorities</li>
	      		</ul>
	      	<p class="rplace">Software</p> 
	      		<p class="rin">
	      		<ul class="none">
	      			<li>ArchivesSpace</li>
	      			<li>AEON system</li>
	      		</ul>
	      	<p class="rplace">Programming</p> 
	      	<p class="rin">	
	      		<ul class="none">
	      			<li>Python</li>
	      			<li>HTML</li>
	      			<li>CSS</li>
	      			<li>EAD</li>
	      			<li>XML</li>
	      			<li>XSLT</li>
	      		</ul> 
	      </div>
	    </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
	        Organizations<span class="fa fa-caret-down"></span></a>
	      </h4>
	    </div>
	    <div id="collapse5" class="panel-collapse collapse">
	      <div class="panel-body">	      	
	      	<p class="rhead">Society of American Archivists</p>
	      	<p class="rhead">Student Chapter, UMSI</p>
	      	<p class="rplace">Ann Arbor, MI</p>   
	      	<p class="rposition">Student Chapter Officer</p>
	      	<p class="rdate">2015-2017</p>
	      	<p class="rhead">University of Michigan</p>
	      	<p class="rplace">Ann Arbor, MI</p>   
	      	<p class="rposition">Peer Advisor</p>
	      	<p class="rdate">2016-Present</p>
	      </div>
	    </div>
	  </div>
	</div> 
</div>
</div>
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