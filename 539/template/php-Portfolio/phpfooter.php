<!DOCTYPE html>
<html lang="en">
<footer id="smedia">
				<a href="https://twitter.com/archivitz" target="_blank" title="Twitter">
					<i class="fa fa-twitter-square"></i>
				</a>
				<a href="https://www.instagram.com/sarahml524/" target="_blank" title="Instagram">	
					<i class="fa fa-instagram"></i>
				</a>
				<a href="https://www.linkedin.com/in/sarah-lebovitz-89825254" target="_blank" title="LinkedIn">
					<i class="fa fa-linkedin-square"></i>
				</a>

				<p> <?php 
					echo "File was last modified:" . date (" F d Y H:i:s.", filemtime($fname));
				?> <p>
</footer>