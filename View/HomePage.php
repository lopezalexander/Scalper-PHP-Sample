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

		<nav class="horizontal-nav">
   			 <ul>
		        <li><a href="HomePage.php" class="current">Home</a></li>
		        <li><a href="sports.php">Sports</a></li>
		        <li><a href="concerts.php">Concerts</a></li>
		        <li><a href="theater.php">Theatrical</a></li>
		        <li><a href="humour.php">Humour</a></li>
		        <li><a href="movies.php">Movies</a></li>
		        <li><a href="Cart.php">Checkout</a></li>
		        <li><a href="contact.php">Contact Us</a></li>
			   </ul>
		</nav>


		<div id="main_content">

			<div class="events_div">
				<h2>Events</h2>
				<ul>
					<li><a href="#">Sports</a></li>
					<li><a href="#">Concerts</a></li>
					<li><a href="#">Theater</a></li>
					<li><a href="#">Humour</a></li>
					<li><a href="#">Movies</a></li>
				</ul>
			</div>

			<div class="Company_mission">
				<h1>Our Mission</h1>
				<p>At Ticket Tailor, our mission is simple: provide fans a safe, convenient place to get tickets to the games,
				 concerts, and theater shows they want to see.</p>
				<p>we strive to put fans first. We're continually listening to you, the fan, to create fan-friendly initiatives
				 like our Fan Guarantee, and we're not stopping there. We provide vendors with a simple and easy to use portal to post their tickets nline and 
				 a unique experience for the consumer to come browse and purchase tickets to the event of their choice.</p>
				 <p>We provide safe and convinient access to to hard-to-find event tickets by bringing buyers and sellers together. 
				 	Becasue the market determines the ticket prices , in some 
				 	cases tickets may be priced above or below face value</p>

			</div>

			<div class="partners">
				<h3>Partners</h3>

				<img src="imagesHTML/FedEx-Express.png" alt="fedex">
				<img src="imagesHTML/amairlines-0.jpg" alt="AA">
				<img src="imagesHTML/Air_Canada_LOGO1.jpg" alt="AirCanada">
				<img src="imagesHTML/bell_logo.jpg" alt="Bell">
				<img src="imagesHTML/justForLaughs.png" alt="JFL">
				<img src="imagesHTML/Alouette.jpg" alt="Alouettes">

			</div>
			

			<div class="features">

				<div class="features_discount">
					<img src="imagesHTML/email_vectoricon.png" alt="email">
					<p><strong>10% Discount</strong> Subribe and become a member today, and receive a discount of 10 percont on your next ticket purachse</p>
				</div>

				<div class="features_discount">
					<img src="imagesHTML/guaranteed-icon-300x220.png" alt="guarantee">
					<p><strong>We sell only 100% official tickets.</strong> Our tickets come straight from the artists, teams, and venues so they always get you in, at authorized prices.</p>
				</div>

				<div class="features_discount">
					<img src="imagesHTML/tickets-icon.png" alt="tickets">
					<p><strong>On SALE Alerts!</strong> Sign up to our newsletter today, and receive daily updates to event tickets that are on sale. Take full advantage and see all event tickets on sale now!</p>
				</div>

				<div class="features_discount">
					<img src="imagesHTML/Return-Policy-icon.png" alt="return">
					<p><strong>3-DAY RETURN POLICY</strong> Change your mind? Don't worry - we give you three days to return tickets for events at participating venues, up until one week before the event</p>
				</div>


			</div>
			

		</div>



		<footer id="footer_div">
			
				
				<div class="social_media">

					<h2>Follow Us</h2>
					<ul>
						<li><img class="icon_img" src="imagesHTML/facebook_icon.png" alt="FB">&nbsp;<a href="#">Facebook</a></li>
						<li><img class="icon_img" src="imagesHTML/twitter-icon.png" alt="twitter">&nbsp;<a href="#">Twitter</a></li>
						<li><img class="icon_img" src="images/google_plus_icon.png" alt="google+">&nbsp;<a href="#">Google+</a></li>
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