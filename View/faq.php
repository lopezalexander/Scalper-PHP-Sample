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
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>

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
		        <li><a href="HomePage.php">Home</a></li>
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
			
			<div id="accordion">
			  <h3>How do I know that the tickets listed on TicketTailor are authentic?</h3>
			  <div>
			    <p>
			   When you buy tickets for select events on TicketsNow, the barcodes on those tickets 
			    are electronically validated by Ticketmaster's exclusive barcode verification technology. 
			    The original ticket barcodes are cancelled and new, unique tickets are reissued with your 
			    name on them. This process guarantees the authenticity of the tickets.
			    </p>
			  </div>
			  <h3>How is Ticket Tailor able to offer so many tickets for so many events?</h3>
			  <div>
			    <p>
			   TicketsNow provides a safe, easy, and convenient way to purchase tickets. We offer consumers 
			    access to a large nationwide database of sports, concert, and theater tickets. You will find 
			    tickets for nearly every major sporting event and concert on our site.
			    </p>
			  </div>
			  <h3>How are my tickets shipped?</h3>
			  <div>
			    <p>
			    All tickets shipped will be done so via an express delivery service. We use UPS express delivery 
			    services and we do not require a signature for delivery, however for security purposes we suggest
			     you ship to an address that does requires a signature; such as a business address. It is your responsibility
			      to track your package and to be available to accept the package.
			    </p>
			  </div>
			  <h3>How do internet presales work?</h3>
			  <div>
			    <p>
			    Internet presales give you exclusive online access to tickets before they go on sale to the general 
			    public! To participate you need a special password, which is provided by us, by the artist, or by another 
			    presale sponsor (such as a promoter or radio station).
			    </p>
			  </div>
			  <h3>How are ticket prices determined?</h3>
			  <div>
			    <p>
			    <strong>Face Price</strong>
				Artists, venues, and promoters provide the face price (or "base price") of tickets.
			    </p>
			    <p><strong>Service Fee/Charge and Order Processing Fee</strong>
				The per-ticket service and per-order processing fees vary by event. (Note: retail outlet 
				and box office purchases usually don't include an order processing fee.) We typically share 
				these fees with the artist, venue, or promoter. Whether it's for the purchase of a ticket or merchandise, 
				the portion we keep helps us to provide the distribution and access network used by fans and clients, and 
				considered with other revenues, earn a profit.</p>
				<p><strong>Delivery Price</strong>
				We offer fans several convenient delivery options, and whether fans pay this per-order fee depends on which option
				 is available and selected at checkout. Delivery options include standard mail, TicketFast (print-at-home), UPS, retail 
				 outlet pickup, and will call. </p>	
			  </div>
			  <h3>How does TicketWeb protect customer information?</h3>
			  <div>
			    <p>
			      When you place orders or access your order information, we make use of a secure server.  The secure server software (SSL) 
			      encrypts all information you input before it is sent to us.  In addition, all of the customer data we collect is protected 
			      against unauthorized access.
			    </p>
			  </div>
			</div>
			
		</div>

	

		<footer id="footer_div">
			
				
				<div class="social_media">

					<h2>Follow Us</h2>
					<ul>
						<li><img class="icon_img" src="imagesHTML/facebook_icon.png">&nbsp;<a href="#">Facebook</a></li>
						<li><img class="icon_img" src="imagesHTML/twitter-icon.png">&nbsp;<a href="#">Twitter</a></li>
						<li><img class="icon_img" src="images/google_plus_icon.png">&nbsp;<a href="#">Google+</a></li>
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










