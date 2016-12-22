<?php

//Has to go on each (view) pages******
session_start();
date_default_timezone_set('Canada/Eastern');
if (!isset($_SESSION["Logged"])) {
	$_SESSION["Logged"] = "false";
	
	
}
if (!isset($_SESSION["TIME_ENTRY"])) {
	$_SESSION["TIME_ENTRY"] = 0;
}
if (!isset($_SESSION["TIME_LIMIT"])) {
	$_SESSION["TIME_LIMIT"] = 0;
}
if (!isset($_SESSION["ITEMS"])) {
	$_SESSION["ITEMS"] = array();
}
if (!isset($_SESSION["TIMER"]) || ( time() > $_SESSION["TIME_LIMIT"]  )  ) {
	$_SESSION["TIMER"] = "false";
}

//*****************************
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HomePage</title>
	<link rel="stylesheet" type="text/css" href="css/styleHP.css">

</head>
<body>
	<div id="content">
		<header>
			
			<div id="main_header">
				<?php
					if ($_SESSION["Logged"] == "true") {
					
					?>
						<form method="post" action="../Controller/Index.php">
							<input class="logout_btn" type="submit" value="logout" name="logout">
						</form>
					<?php	
					}else{
						?>

						<a class="index_register1" href="../Controller/Index.php">Login/Register</a>


						<?php
					}
				?>
				
			</div>
			
		</header>
</div>
		<nav class="horizontal-nav">
			<form method="post">
   			 <ul>
		        <li><a href="HomePage.php">Home</a></li>
		        <li><a href="sports.php" >Sports</a></li>
		        <li><a href="concerts.php">Concerts</a></li>
		        <li><a href="theater.php">Theatrical</a></li>
		        <li><a href="humour.php" class="current">Humour</a></li>
		        <li><a href="movies.php">Movies</a></li>
		        <li><a href="Cart.php">Checkout</a></li>
		        <li><a href="contact.php">Contact Us</a></li>
		        
		         	<li>
		        	<input class="search_input" type="text" value="Name, Date, Location..." maxlength="40" name="search_input">
					
		        	</li>
		        	<li>
		        		<input type="submit" class="search_btn" name="search_submit" value="">
		        	</li>
				
			   </ul>
			   </form>
		</nav>


		<div id="main_content">
			
			<div id="humour_left">

				<img class="image_humour" src="imagesHTML/comedypro.jpg" alt="gt">

			</div>

			<div class="humour_right">

				<div class="top_Comedians">
					<h2>Top Theaters</h2>
						<ul>
							<li><a href="">Scotia Theater</a></li>
							<li><a href="">Cineplexe</a></li>
							<li><a href="">Kodak Theater</a></li>
							<li><a href="">Soccer</a></li>
							<li><a href="#">Golf</a></li>
						</ul>
				</div>

				<div class="top_theaters">
					<h2>Top Theaters</h2>
						<ul>
							<li><a href="">Scotia Theater</a></li>
							<li><a href="">Cineplexe</a></li>
							<li><a href="">Kodak Theater</a></li>
							<li><a href="">Soccer</a></li>
							<li><a href="#">Golf</a></li>
						</ul>
				</div>

			</div>
			<?php $_SESSION["EVENT_TYPE"] = "humour";
					include("../Controller/DisplayEvents.php");?>


		</div>

		<footer id="footer_div">
			
				
				<div class="social_media">

					<h2>Follow Us</h2>
					<ul>
						<li><img class="icon_img" src="imagesHTML/facebook_icon.png" alt="gt">&nbsp;<a href="#">Facebook</a></li>
						<li><img class="icon_img" src="imagesHTML/twitter-icon.png" alt="gt">&nbsp;<a href="#">Twitter</a></li>
						<li><img class="icon_img" src="imagesHTML/google_plus_icon.png" alt="gt">&nbsp;<a href="#">Google+</a></li>
					</ul>

				</div>

				<div class="about_foot">
					<h2>About Us</h2>
					<ul>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="contact.php">Contact Us</a></li>
						<li><a href="#">Who We Are</a></li>
						<li><a href="#">Careers</a></li>
					</ul>	
				</div>

				<div class="help_div">
					<h2>Here to Help</h2>
					<ul>
						<li><a href="#">Terms of Service</a></li>
						<li><a href="#">Refund Policy</a></li>
						<li><a href="#">Become a Partner</a></li>
						<li><a href="#">Shipping</a></li>
					</ul>

				</div>


			


		</footer>

	

</body>
</html>