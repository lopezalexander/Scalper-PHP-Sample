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

		<nav class="horizontal-nav">
   			 <ul>
		        <li><a href="HomePage.php">Home</a></li>
		        <li><a href="sports.php" >Sports</a></li>
		        <li><a href="concerts.php">Concerts</a></li>
		        <li><a href="theater.php">Theatrical</a></li>
		        <li><a href="humour.php" >Humour</a></li>
		        <li><a href="movies.php">Movies</a></li>
		        <li><a href="Cart.php">Checkout</a></li>
		        <li><a href="#" class="current">Contact Us</a></li>
		        
		        

			   </ul>
		</nav>


		<div id="main_content">

			<div class="contact_info">
				<h2>Contact by Phone,Email,Mail</h2>
				<p>Visit our <a href="faq.php">help section</a> to ask any questions or browse popular topics.</p>

				<h3>Coorporate Office</h3>
				<p>(514)555-6677<br>
					123 Fake Street<br>
					Montreal, Quebec Canada<br>
					h2n 1y7
				</p>
			</div>

			<div class="email">
				<h2>Send Support Email</h2>
				<form method="post" action="../Controller/Index.php" >
					<input type="email" value="Email"  id="contact_email" name="contact_email" onKeyup="emailval()"><br>
					<textarea id="contact_body"rows="8" cols="30" name="contact_body" onKeyup="bodyval()">Send us your comments</textarea><br>
					<input type="submit" class="email_btn" name="contact_submit" onclick="return contact_submitval()">
				</form>
			</div>


		</div>

		<footer id="footer_div">
			
				
				<div class="social_media">

					<h2>Follow Us</h2>
					<ul>
						<li><img class="icon_img" src="imagesHTML/facebook_icon.png">&nbsp;<a href="#">Facebook</a></li>
						<li><img class="icon_img" src="imagesHTML/twitter-icon.png">&nbsp;<a href="#">Twitter</a></li>
						<li><img class="icon_img" src="imagesHTML/google_plus_icon.png">&nbsp;<a href="#">Google+</a></li>
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

	
<script type="text/javascript">


var flag = ["",""];

function bodyval(){
	var body = document.getElementById("contact_body");

	if (body.value == ""  || body.value == null ) {
		
		
		body.style.borderWidth = "2px";
		body.style.borderStyle = "solid";
		body.style.borderColor = "red";
		flag[0]="false";
	}else{
		body.style.borderWidth = "2px";
		body.style.borderStyle = "solid";
		body.style.borderColor = "green";

		flag[0]="true";
	}

}


function emailval(){
	var email = document.getElementById("contact_email");
	
	if (email.value == ""  || email.value == null ) {
		
		
		email.style.borderWidth = "2px";
		email.style.borderStyle = "solid";
		email.style.borderColor = "red";
		flag[1]="false";
	}else{
		email.style.borderWidth = "2px";
		email.style.borderStyle = "solid";
		email.style.borderColor = "green";

		flag[1]="true";
	}

}

function contact_submitval(){

	var confirm = true;
		for(var i = 0; i<flag.length;i++){
			if(flag[i] != "true"){
				confirm = false;
				this.alert("You have missing information.");
				return false;
			}
		}

		if(confirm == true){
			return true;
		}
}


</script>
</body>
</html>

