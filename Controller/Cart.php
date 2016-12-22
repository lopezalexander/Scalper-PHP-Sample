<?php

include_once("../Model/DatabaseManager.class.php");

$cart_object =  new DatabaseManager();
if (!isset($_POST["checkout_all"])) {


	if ($_SESSION["TIMER"]=="false") {
		?>
		<div id="event_no_display">

			<p>BUY TICKET NOW</p>
		</div>

		<?php
	}else if ($_SESSION["TIMER"]=="true") {
		$time= time();
		$time_remaining = $_SESSION["TIME_LIMIT"] - time();
		if (!($time > $_SESSION["TIME_LIMIT"])) {
			
			?>
			<form>
				<input type="hidden" id="timersetter" name="timersetter" value="<?php echo $time_remaining; ?>">
			</form>


			<script type="text/javascript">
			var time_remain = document.getElementById("timersetter");

			

					// set minutes
					var mins = (time_remain.value/60);

					// calculate the seconds (don't change this! unless time progresses at a different speed for you...)
					var secs = mins * 60;
					function countdown() {
						setTimeout('Decrement()',1000);
					}
					function Decrement() {
						if (document.getElementById) {
							minutes = document.getElementById("minutes");
							seconds = document.getElementById("seconds");
							// if less than a minute remaining
							if (seconds < 59) {
								seconds.value = secs;
							} else {
								minutes.value = getminutes();
								seconds.value = getseconds();
							}
							secs--;
							setTimeout('Decrement()',1000);
						}
					}
					function getminutes() {
						// minutes is seconds divided by 60, rounded down
						mins = Math.floor(secs / 60);
						return mins;
					}
					function getseconds() {
						// take mins remaining (as seconds) away from total seconds remaining
						return secs-Math.round(mins *60);
					}
					</script>
					<div id="timer">
						<input id="minutes" type="text" style="margin-left:25px; width: 14px; border: none; background-color:rgba(0,0,0,0); font-size: 16px; font-weight: bold;"> minutes : <input id="seconds" type="text" style="width: 26px; border: none; background-color:rgba(0,0,0,0); font-size: 16px; font-weight: bold;"> seconds<br> left before your selection expire!
					</div>
					<script>
					countdown();
					</script>


					
					<meta http-equiv="refresh" content="<?php echo $time_remaining; ?>">


					<table class="table_cart">
						<tr>
							<th>Event Name</th>
							<th>Time Starting</th>
							<th>Venues</th>
							<th>Tickets to Buy</th>
							<th>Tickets Available</th>
							<th>Price</th>

						</tr>
						<form method='post' >
							<?php
							if (count($_SESSION["ITEMS"]) != 0 || count($_SESSION["ITEMS"]) != null) {


								for ($i=0; $i < count($_SESSION["ITEMS"]) ; $i++) { 


									foreach ($_SESSION["ITEMS"][$i] as $key => $value) {

										$event = $cart_object -> get_event_cart($value,$key);

										echo "<tr>";
										echo "<td>".$event["EVENTNAME"]."<input type='hidden' name='cart_event_name".$i."' value='".$event["EVENTNAME"]."'></td>";
										echo "<td>".$event["START"]."</td>";
										echo "<td>".$event["LOCATION"]."</td>";
										echo "<td>
										<input type='number' min='1' max='10' name='buy_tickets".$i."' value='1'>
										</td>";

										echo "<td>".$event["AMOUNTS"]."</td>";
										echo "<td>".$event["PRICE"]."<input type='hidden' name='cart_event_price".$i."' value='".$event["PRICE"]."'></td>";

										echo "</tr> <input type='hidden' name='cart_delete_event_category".$i."' value='".$event["CATEGORY"]."'>";

									}
								}
							}else{
								unset($_SESSION["ITEMS"]);
								$_SESSION["TIMER"] = "false";
								header("Location: Cart.php");
								exit();
							}

							?>

						</table>



						<input type="submit" name="checkout_all" value="Buy/Check Out" class='bot_td'>
					</form>

					<table class="table_cart1">
						<tr>
							<th>Remove Event</th>
						</tr>

						<?php
						if (count($_SESSION["ITEMS"]) != 0 || count($_SESSION["ITEMS"]) != null) {
							for ($i=0; $i < count($_SESSION["ITEMS"]) ; $i++) { 


								echo "<form method='post' >";
								echo "<tr>";
								echo "<td>
								<input style='margin-top:0px;' type='submit' class='logout_btn' name='cart_delete_event' value='Remove Event'>
								<input type='hidden' name='cart_delete_event_position' value='".$i."'>
								</td>";
								echo "</tr></form>";

							}
						}else{
							echo "<tr>";
							echo "<td  ></td>";

							echo "</tr>";
						}

						?>

					</table>

					<?php


				}else{
					?>
					<div id="event_no_display">

						<p>3 Minutes passed...Cart Expired.</p>
					</div>


					<?php
					unset($_SESSION["ITEMS"]);
					$_SESSION["TIMER"] = "false";


				}
			}
		}else if (isset($_POST["checkout_all"])) {

			if ($_SESSION["Logged"] == "true") {





				$data_user = $cart_object-> get_Info_by_email($_SESSION["UserLogged"]);

			//display user form
			//total bill DISPLAY
				?>
				<h1 class="h3_check">Receipts Preview</h1>
				<table class="table_cart3">

					<tr>
						<th>Event Name</th>
						<th># of tickets bought</th>
						<th>@ Price</th>
						<th>Total</th>
					</tr>


					<?php
					$total = 0;
					for ($i=0; $i < count($_SESSION["ITEMS"]); $i++) { 
						$item = "buy_tickets".$i;
						$price = "cart_event_price".$i;
						$name = "cart_event_name".$i;


						echo "<tr>";
						echo "<td>".$_POST[$name]."</td>";
						echo "<td>".$_POST[$item]."</td>";
						echo "<td>".$_POST[$price]."</td>";
						echo "<td>".($_POST[$price]*$_POST[$item])."</td>";
						echo "</tr>";

						$total = $total + ($_POST[$price]*$_POST[$item]);
					}


					?>

					<tr>
						<td>Total</td>
						<td colspan="3" > <?php echo $total.".00$";  ?></td>
					</tr>

				</table>


				<h1 class="checkout_title">CHECKOUT</h1>

				<form method="post"  name="formLogged">
					<?php
				//TO REMOVWE FROM DATABASE
					for ($i=0; $i < count($_SESSION["ITEMS"]); $i++) { 
						$item = "buy_tickets".$i; 
						$name = "cart_event_name".$i;
						$category = "cart_delete_event_category".$i;
						$price = "cart_event_price".$i;


						if ($category == "Humour") {
							$category = "humour";
						}else if ($category == "Sports") {
							$category = "sports";
						}else if ($category == "Concerts") {
							$category = "concerts";
						}else if ($category == "Theatrical") {
							$category = "theatrical";
						}else if ($category == "Movies") {
							$category = "movies";
						}

						$tickets_remove = $_POST[$item];
						$name_remove = $_POST[$name];
						$category_remove = $_POST[$category];
						$price_send = $_POST[$price];


						?>
						<input type="hidden" 	name="no_ticket_remove<?php  echo $i;    ?>" 			value="<?php  echo $tickets_remove;     ?>">
						<input type="hidden"	name="no_name_remove<?php  echo $i;    ?>"				value="<?php  echo $name_remove;    ?>">
						<input type="hidden" 	name="no_category_remove<?php  echo $i;    ?>" 			value="<?php  echo $category_remove;     ?>">
						<input type="hidden" 	name="no_event_price<?php  echo $i;    ?>" 			value="<?php  echo $price_send;     ?>">


						<?php
					}

					?>
					<div class="billing_info">
						<h2>Billing/Shipping Information</h2>

						<span><label>Email: </label><input id="email_valid" type="text" length="100" name="EMAIL" onkeyup="validateEmail()" value='<?php echo $data_user["EMAIL"]; ?>'></span><br>

						<span><label>First Name: </label><input id="confirm_fname" type="text" length="100" name="fname" onkeyup="fnameFunction()" value='<?php echo $data_user["FIRSTNAME"]; ?>'></span><br>

						<span><label>Last Name: </label><input id="confirm_lname" type="text" length="100" name="lname" onkeyup="lnameFunction()" value='<?php echo $data_user["LASTNAME"]; ?>'></span><br>
						<span><label>Address: </label><input id="confirm_address" type="text" length="100" name="address" onkeyup="addressFunction()" value='<?php echo $data_user["ADDRESS"]; ?>'></span><br>

						<span><label>City: </label><input id="confirm_city" type="text" length="100" name="city" onkeyup="cityFunction()" value='<?php echo $data_user["CITY"]; ?>'></span><br>

						<span><label>Province: </label><input id="confirm_province" type="text" length="100" name="province" onkeyup="provinceFunction()" value='<?php echo $data_user["PROVINCE"]; ?>'></span><br>

						<span><label>Postal-Code: </label><input id="confirm_postal" type="text" length="7" name="postalcode" onkeyup="postalFunction()" value='<?php echo $data_user["POSTALCODE"]; ?>'></span><br>

						<span><label>Telephone: </label><input minlength="10" id="confirm_phone" maxlength="12" type="text" length="100" name="phone" onkeyup="phoneFunction()" value='<?php echo $data_user["PHONE"]; ?>'></span><br>

						<span id="billing_error" style="display: none; color: red;">*Error/Wrong info</span>

					</div>

					<div class="payment_info">
						<h2>Payment Information</h2>

						<span><label>CC Type: </label>
							<select id="ccType_confirm" name="CCTYPE">
								<option value="default" <?php if ($data_user["CCTYPE"] == "default") {	echo "selected";}?>> - - - - - - </option>
								<option value="visa" <?php if ($data_user["CCTYPE"] == "visa") {	echo "selected";}?>>Visa</option>
								<option value="mastercard" <?php if ($data_user["CCTYPE"] == "mastercard") {	echo "selected";}?>>MasterCard</option>
								<option value="amex" <?php if ($data_user["CCTYPE"] == "amex") {	echo "selected";}?>>AmericanExpress</option>
							</select></span><br>

							<span><label>CC Number: </label><input id="confirm_cc" type="text" length="100" name="cc" minlength="12" maxlength="16" onkeyup="testCreditCard()" value='<?php echo $data_user["CREDITCARD"]; ?>'></span><br>

							<span><label>Expiry Date:</label><input onkeyup="ExpireMonthFunction()" id="confirm_expireMonth" type="text" minlength="2" maxlength="2" length="2" size="2" name="expire_month" value='<?php echo $data_user["EXPIRATION"]; ?>'>/
								<input onkeyup="expireYearFunction()" id="confirm_expireYear" type="text" minlength="2" maxlength="2" length="2" size="2" name="expire_year" value='<?php echo $data_user["EXPIRATION2"]; ?>'></span><br>

								<span><label>CCV: </label><input onkeyup="ccvFunction()" id="confirm_ccv" type="text" maxlength="3" size="3" name="ccv" value='<?php echo $data_user["CCV"]; ?>'></span><br>

								<span id="ccInfo_error" style="display: none; color: red;">*Error/Wrong info</span>

								<input type="submit" Value="Proceed" class="register_btn2" name="proceed" onsubmit="return subLogged()">
								<input type="submit" Value="Cancel Purchase" class="register_btn2" name="cancel_purchase" onclick="reset()">

							</div>


						</form>
						<div id="clear"></div>
						<?php
					}else if ($_SESSION["Logged"] == "false"){
			//total bill DISPLAY
						?>
						<h1 class="h3_check">Receipts Preview</h1>
						<table class="table_cart3">

							<tr>
								<th>Event Name</th>
								<th># of tickets bought</th>
								<th>@ Price</th>
								<th>Total</th>
							</tr>


							<?php
							$total = 0;
							for ($i=0; $i < count($_SESSION["ITEMS"]); $i++) { 
								$item = "buy_tickets".$i;
								$price = "cart_event_price".$i;
								$name = "cart_event_name".$i;


								echo "<tr>";
								echo "<td>".$_POST[$name]."</td>";
								echo "<td>".$_POST[$item]."</td>";
								echo "<td>".$_POST[$price]."</td>";
								echo "<td>".($_POST[$price]*$_POST[$item])."</td>";
								echo "</tr>";

								$total = $total + ($_POST[$price]*$_POST[$item]);
							}


							?>

							<tr>
								<td>Total</td>
								<td colspan="3" > <?php echo $total.".00$";  ?></td>
							</tr>

						</table>


						<h1 class="checkout_title">CHECKOUT</h1>

						<form method="post" >
							<?php
				//TO REMOVWE FROM DATABASE
							for ($i=0; $i < count($_SESSION["ITEMS"]); $i++) { 
								$item = "buy_tickets".$i; 
								$name = "cart_event_name".$i;
								$category = "cart_delete_event_category".$i;
								$price = "cart_event_price".$i;


								if ($category == "Humour") {
									$category = "humour";
								}else if ($category == "Sports") {
									$category = "sports";
								}else if ($category == "Concerts") {
									$category = "concerts";
								}else if ($category == "Theatrical") {
									$category = "theatrical";
								}else if ($category == "Movies") {
									$category = "movies";
								}

								$tickets_remove = $_POST[$item];
								$name_remove = $_POST[$name];
								$category_remove = $_POST[$category];
								$price_send = $_POST[$price];



								?>
								<input type="hidden" 	name="no_ticket_remove<?php  echo $i;    ?>" 			value="<?php  echo $tickets_remove;     ?>">
								<input type="hidden"	name="no_name_remove<?php  echo $i;    ?>"				value="<?php  echo $name_remove;    ?>">
								<input type="hidden" 	name="no_category_remove<?php  echo $i;    ?>" 			value="<?php  echo $category_remove;     ?>">
								<input type="hidden" 	name="no_event_price<?php  echo $i;    ?>" 			value="<?php  echo $price_send;     ?>">


								<?php
							}

							?>


							<div class="billing_info">
								<h2>Billing/Shipping Information</h2>

								<span><label>Email: </label><input id="email_valid" type="text" length="100" name="EMAIL" onkeyup="validateEmail()"></span><br>

								<span><label>First Name: </label><input id="confirm_fname" type="text" length="100" name="fname" onkeyup="fnameFunction()"></span><br>

								<span><label>Last Name: </label><input id="confirm_lname" type="text" length="100" name="lname" onkeyup="lnameFunction()"></span><br>
								<span><label>Address: </label><input id="confirm_address" type="text" length="100" name="address" onkeyup="addressFunction()"></span><br>

								<span><label>City: </label><input id="confirm_city" type="text" length="100" name="city" onkeyup="cityFunction()"></span><br>

								<span><label>Province: </label><input id="confirm_province" type="text" length="100" name="province" onkeyup="provinceFunction()"></span><br>

								<span><label>Postal-Code: </label><input id="confirm_postal" type="text" length="7" name="postalcode" onkeyup="postalFunction()"></span><br>

								<span><label>Telephone: </label><input minlength="10" id="confirm_phone" maxlength="12" type="text" length="100" name="phone" onkeyup="phoneFunction()"></span><br>

								<span id="info_error" style="display: none; color: red;">*Error/Wrong info</span>

							</div>

							<div class="payment_info">
								<h2>Payment Information</h2>

								<span><label>CC Type: </label>
									<select id="ccType_confirm" name="CCTYPE">
										<option value="default"> - - - - - - </option>
										<option value="visa">Visa</option>
										<option value="mastercard">MasterCard</option>
										<option value="amex">AmericanExpress</option>
									</select></span><br>

									<span><label>CC Number: </label><input id="confirm_cc" type="text" length="100" name="cc" minlength="12" maxlength="16" onkeyup="testCreditCard()"></span><br>

									<span><label>Expiry Date:</label><input onkeyup="ExpireMonthFunction()" id="confirm_expireMonth" type="text" minlength="2" maxlength="2" length="2" size="2" name="expire_month">/
										<input onkeyup="expireYearFunction()" id="confirm_expireYear" type="text" minlength="2" maxlength="2" length="2" size="2" name="expire_year"></span><br>

										<span><label>CCV: </label><input onkeyup="ccvFunction()" id="confirm_ccv" type="text" maxlength="3" size="3" name="ccv" ></span><br>

										<span id="cc_error" style="display: none; color: red;">*Error/Wrong info</span>

										<input type="submit" Value="Proceed" class="register_btn2" name="proceed" onclick="return subbutton()">
										<input type="submit" Value="Cancel Purchase" class="register_btn2" name="cancel_purchase" onclick="reset()">
									</div>


								</form>
								<div id="clear"></div>
								<?php

							}




						}




						if (isset($_POST["proceed"])) {

							for ($i=0; $i < count($_SESSION["ITEMS"]); $i++) { 

								$item3 = "no_ticket_remove".$i; 
								$name3 = "no_name_remove".$i;
								$category3 = "no_category_remove".$i;


								$tickets_remove3 = $_POST[$item3];
								$name_remove3 = $_POST[$name3];
								$category_remove3 = $_POST[$category3];

								$cart_object -> edit_tickets($category_remove3,$name_remove3,$tickets_remove3);

							}
							$total = 0;
							$table_row = "";

							for ($i=0; $i < count($_SESSION["ITEMS"]); $i++) { 

								$item3 = "no_ticket_remove".$i; 
								$name3 = "no_name_remove".$i;
								$category3 = "no_category_remove".$i;
								$price = "no_event_price".$i;

								$tickets_remove3 = $_POST[$item3];
								$name_remove3 = $_POST[$name3];
								$category_remove3 = $_POST[$category3];
								$price_send = $_POST[$price];

								$table_row1 = "<tr>
								<td style='border:1px solid black;'>".$name_remove3." 
								</td>
								<td style='border:1px solid black;'> X ".$tickets_remove3." 
								</td>
								<td style='border:1px solid black;'>".$price_send." 
								</td>
								</tr>";
								$total = $total + ($price_send*$tickets_remove3);

								$table_row = $table_row . $table_row1;
							}

							$body2 = "<html>
							<head>
								<title></title>
							</head>
							<body><table style='border:1px solid black;border-collapse: collapse;'><tr><th colspan='3' style='font-weight: bold;'>Receipts</th></tr><tr><td style='border:1px solid black; border-bottom: 3px;font-weight: bold;'>Event Name</td><td style='border:1px solid black; border-bottom: 3px;font-weight: bold;'>Tickets</td><td style='border:1px solid black; border-bottom: 3px;font-weight: bold;'>Price</td></tr>
								".$table_row."<tr><td>Total</td><td colspan='2'>".$total."</td></tr></table>";



							$body1 = "<br><br><br><br>Thank You for buying your tickets at Ticket Tailor.<br> You can pick up your ticket at the box-office until one hour after starting programs.<br> Have fun, Ticket Tailor!</body>
							</html>";

							$body = $body2 . $body1;


							echo "<script>alert('Thank you for the purchase! Your receipt have been send to your email account')</script>";
							$email = $_POST["EMAIL"];
							$cart_object -> send_email_checkout($email,$body);

							unset($_SESSION["ITEMS"]);



							header("Location: ../View/Cart.php");
							exit();


						}


						


						if (isset($_POST["cart_delete_event"])) {



							unset($_SESSION['ITEMS'][$_POST["cart_delete_event_position"]]);

							$_SESSION["ITEMS"] = array_values($_SESSION['ITEMS']);

							var_dump($_POST);



							header("Location: ../View/Cart.php");
							exit();

						}
						if (isset($_POST["cancel_purchase"])) {
							header("Location: Cart.php");
							exit();
						}


						?>



				<script>

	//Email Validation
	var flag = ["false", "false","false","false","false","false","false","false","false","false","false","false"];
	
	var inputEmail = document.getElementById('email_valid');
	var spanError2 = document.getElementById('info_error');

	//Email Validation

	function validateEmail() {
		
		var atpos = inputEmail.value.indexOf("@");
		var dotpos = inputEmail.value.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=inputEmail.length || inputEmail.value == "")
		{
			flag[0] = "false";
			inputEmail.setAttribute('class','wrong');
			spanError2.style.display = 'inline';
			
		}else{
			flag[0] = "true";
			inputEmail.setAttribute('class','right');
			spanError2.style.display = 'none';
		}
	}

	

//FirstName

	var inputFname = document.getElementById('confirm_fname');
	

	function fnameFunction(){
		if(inputFname.value.length < 1 || inputFname.value == ""){
			flag[1] = "false";
			inputFname.setAttribute('class','wrong');
			spanError2.style.display = 'inline';
		}else{
			flag[1] = "true";
			inputFname.setAttribute('class','right');
			spanError2.style.display = 'none';
		}
	}

		//LastName Validation

	var inputLname = document.getElementById('confirm_lname');

	function lnameFunction(){
		if(inputLname.value.length < 1 || inputLname.value == ""){
			flag[2] = "false";
			inputLname.setAttribute('class','wrong');
			spanError2.style.display = 'inline';
		}else{
			flag[2] = "true";
			inputLname.setAttribute('class','right');
			spanError2.style.display = 'none';
		}
	}

		//Address Validation

	var inputAddress = document.getElementById('confirm_address');

	function addressFunction(){
		if(inputAddress.value.length < 1 || inputAddress.value == ""){
			flag[3] = "false";
			inputAddress.setAttribute('class','wrong');
			spanError2.style.display = 'inline';
		}else{
			flag[3] = "true";
			inputAddress.setAttribute('class','right');
			spanError2.style.display = 'none';
		}
	}

	//CITY Validation

	var inputCity = document.getElementById('confirm_city');

	function cityFunction(){
		if(inputCity.value.length < 2 || inputCity.value == ""){
			flag[4] = "false";
			inputCity.setAttribute('class','wrong');
			spanError2.style.display = 'inline';
		}else{
			flag[4] = "true";
			inputCity.setAttribute('class','right');
			spanError2.style.display = 'none';
		}
	}


//PROVINCE Validation

		var inputProvince = document.getElementById('confirm_province');

		function provinceFunction(){
			if(inputProvince.value.length < 2 || inputProvince.value == ""){
				flag[5] = "false";
				inputProvince.setAttribute('class','wrong');
				spanError2.style.display = 'inline';
			}else{
				flag[5] = "true";
				inputProvince.setAttribute('class','right');
				spanError2.style.display = 'none';
			}
		}
	
		//POSTAL CODE Validation
		
		var inputPostal = document.getElementById("confirm_postal");
		var regExPC = /[a-zA-Z][0-9][a-zA-Z](-| |)[0-9][a-zA-Z][0-9]/;

		function postalFunction()
		{

			
			if(inputPostal.value.match(regExPC) && inputPostal.value != "")
			{
				flag[6] = "true";
				inputPostal.setAttribute('class','right');
				spanError2.style.display = 'none';
			}
			else
			{
				flag[6] = "false";
				inputPostal.setAttribute('class','wrong');
				spanError2.style.display = 'inline';
			}
		}

//PHONE Validation


		var inputPhone = document.getElementById('confirm_phone');

		function phoneFunction()  
		{  

			var phoneno = /^\d{10}$/;  
			if((inputPhone.value.match(phoneno)) || inputPhone.value != "")  
			{
				flag[7] = "true";
				inputPhone.setAttribute('class','right');
				spanError2.style.display = 'none';  
				return true;  
			}  
			else  
			{  
				flag[7] = "false";
				inputPhone.setAttribute('class','wrong');
				spanError2.style.display = 'inline';
				return false;  
			}  
		}

		//CC Validation


		var myCardNo = document.getElementById('confirm_cc');
		var myCardType = document.getElementById('ccType_confirm');
		var cardnoAmex = /^(?:3[47][0-9]{13})$/;
		var cardnoVisa = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
		var cardnoMaster = /^(?:5[1-5][0-9]{14})$/; 

		function testCreditCard () {

			if(myCardType.value=="visa" && myCardNo.value.match(cardnoVisa) && myCardNo.value != "") {
				flag[8] = "true";
				myCardNo.setAttribute('class','right');
				inputError3.style.display = 'none';
			}else if(myCardType.value=="mastercard" && myCardNo.value.match(cardnoMaster) && myCardNo.value != ""){
				flag[8] = "true";
				myCardNo.setAttribute('class','right');
				inputError3.style.display = 'none';
			}else if(myCardType.value=="amex" && myCardNo.value.match(cardnoAmex) && myCardNo.value != ""){
				flag[8] = "true";
				myCardNo.setAttribute('class','right');
				inputError3.style.display = 'none';
			}else{
				flag[8] = "false";
				myCardNo.setAttribute('class','wrong');
				inputError3.style.display = 'inline';
			} 
		}


		//CCExpireMonth Validation

		var inputExmonth = document.getElementById('confirm_expireMonth');
		var inputError3 = document.getElementById('cc_error');


		function ExpireMonthFunction(){
			if(inputExmonth.value > 12 || inputExmonth.value.length < 2 || inputExmonth.value == ""){
				flag[9] = "false";
				inputExmonth.setAttribute('class','wrong');
				inputError3.style.display = 'inline';
			}else{
				flag[9] = "true";
				inputExmonth.setAttribute('class','right');
				inputError3.style.display = 'none';
			}
		}

	//ccEXPIREYEAR Validation

	var inputExyear = document.getElementById('confirm_expireYear');

	

	function expireYearFunction(){
		if(inputExmonth.value > 99 || inputExyear.value.length < 2 || inputExyear.value == ""){
			flag[10] = "false";
			inputExyear.setAttribute('class','wrong');
			inputError3.style.display = 'inline';
		}else{
			flag[10] = "true";
			inputExyear.setAttribute('class','right');
			inputError3.style.display = 'none';
		}
	}


	//CCV Validation


	var inputCcv = document.getElementById('confirm_ccv');

	function ccvFunction(){
		if(inputCcv.value.length < 3 || inputCcv.value == ""){
			flag[11] = "false";
			inputCcv.setAttribute('class','wrong');
			inputError3.style.display = 'inline';
		}else{
			flag[11] = "true";
			inputCcv.setAttribute('class','right');
			inputError3.style.display = 'none';
		}


	}

function subbutton(){

		var confirm = true;

		for(var i=0; i<flag.length; i++){
			if(flag[i] != "true"){
				confirm = false;
				alert("you have missing information.");

				if(flag[0] == "false"){inputEmail.setAttribute('class','wrong');}
				if(flag[1] == "false"){inputFname.setAttribute('class','wrong');}
				if(flag[2] == "false"){inputLname.setAttribute('class','wrong');}
				if(flag[3] == "false"){inputAddress.setAttribute('class','wrong');}
				if(flag[4] == "false"){inputCity.setAttribute('class','wrong');}
				if(flag[5] == "false"){inputProvince.setAttribute('class','wrong');}
				if(flag[6] == "false"){inputPostal.setAttribute('class','wrong');}
				if(flag[7] == "false"){inputPhone.setAttribute('class','wrong');}
				if(flag[8] == "false"){myCardNo.setAttribute('class','wrong');}
				if(flag[9] == "false"){inputExmonth.setAttribute('class','wrong');}
				if(flag[10] == "false"){inputExyear.setAttribute('class','wrong');}
				if(flag[11] == "false"){inputCcv.setAttribute('class','wrong');}


				return false;

			}		



		}
		if(confirm == true){
				alert("Email: " + inputEmail.value + "\n" + "FirstName: " + inputFname.value + "\n"  + "LastName: " + inputLname.value + "\n"  + "Address: " + inputAddress.value + "\n" + "City: " + inputCity.value + "\n"
					+ "Province: " + inputProvince.value + "\n"  + "Postal-Code: " + inputPostal.value + "\n"  + "Phone: " + inputPhone.value + "\n" + "CC Type: " + myCardType.value + "\n" 
					+ "CC Number" + myCardNo.value);
				return true;
			}


	}







	function subLogged(){

		var confirm = true;

		var flagLog = ["false", "false","false","false","false","false","false","false","false","false","false","false"];

		if(document.formLogged.EMAIL.value.length != 0){
			inputEmail.setAttribute('class','right');
			flagLog[0] = "true";
		}
		if(document.formLogged.fname.value.length != 0){
			inputFname.setAttribute('class','right');
			flagLog[1] = "true";
		}
		if(document.formLogged.lname.value.length != 0){
			inputLname.setAttribute('class','right');
			flagLog[2] = "true";
		}
		if(document.formLogged.address.value.length != 0){
			inputAddress.setAttribute('class','right');
			flagLog[3] = "true";
		}
		if(document.formLogged.city.value.length != 0){
			inputCity.setAttribute('class','right');
			flagLog[4] = "true";
		}
		if(document.formLogged.province.value.length != 0){
			inputProvince.setAttribute('class','right');
			flagLog[5] = "true";
		}
		if(document.formLogged.postalcode.value.length != 0){
			inputPostal.setAttribute('class','right');
			flagLog[6] = "true";
		}
		if(document.formLogged.phone.value.length != 0){
			inputPhone.setAttribute('class','right');
			flagLog[7] = "true";
		}
		if(document.formLogged.cc.value.length != 0){
			myCardNo.setAttribute('class','right');
			flagLog[8] = "true";
		}
		if(document.formLogged.expire_month.value.length != 0){
			inputExmonth.setAttribute('class','right');
			flagLog[9] = "true";
		}
		if(document.formLogged.expire_year.value.length != 0){
			inputExyear.setAttribute('class','right');
			flagLog[10] = "true";
		}
		if(document.formLogged.ccv.value.length != 0){
			inputCcv.setAttribute('class','right');
			flagLog[11] = "true";
		}

		for(var i=0; i<flagLog.length; i++){
			if(flagLog[i] != "true"){
				confirm = false;
				alert("you have missing information.");

				if(flagLog[0] == "false"){inputEmail.setAttribute('class','wrong');}
				if(flagLog[1] == "false"){inputFname.setAttribute('class','wrong');}
				if(flagLog[2] == "false"){inputLname.setAttribute('class','wrong');}
				if(flagLog[3] == "false"){inputAddress.setAttribute('class','wrong');}
				if(flagLog[4] == "false"){inputCity.setAttribute('class','wrong');}
				if(flagLog[5] == "false"){inputProvince.setAttribute('class','wrong');}
				if(flagLog[6] == "false"){inputPostal.setAttribute('class','wrong');}
				if(flagLog[7] == "false"){inputPhone.setAttribute('class','wrong');}
				if(flagLog[8] == "false"){myCardNo.setAttribute('class','wrong');}
				if(flagLog[9] == "false"){inputExmonth.setAttribute('class','wrong');}
				if(flagLog[10] == "false"){inputExyear.setAttribute('class','wrong');}
				if(flagLog[11] == "false"){inputCcv.setAttribute('class','wrong');}


				return false;

			}		



		}
		if(confirm == true){
				alert("Email: " + inputEmail.value + "\n" + "FirstName: " + inputFname.value + "\n"  + "LastName: " + inputLname.value + "\n"  + "Address: " + inputAddress.value + "\n" + "City: " + inputCity.value + "\n"
					+ "Province: " + inputProvince.value + "\n"  + "Postal-Code: " + inputPostal.value + "\n"  + "Phone: " + inputPhone.value + "\n" + "CC Type: " + myCardType.value + "\n" 
					+ "CC Number" + myCardNo.value);
				return true;
			}
		}




	</script>