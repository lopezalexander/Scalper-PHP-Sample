<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	
	<style>
	.wrong{
		border-color: red;
		border-width: 2px;
		border-style: solid;

	}

	.right{
		border-color: green;
		border-width: 2px;
		border-style: solid;
	}


	</style>
	<link rel="stylesheet" type="text/css" href="css/styleHP.css">
</head>

<body>


	
	<div id="register_container">
		<form name="register_form" method="post" action="../Controller/Index.php" onsubmit="return subbutton()">

			<div class="create_div">
				<h2>Create User</h2>
				<span><label>Email: </label><input id="email_valid" type="text" length="100" name="EMAIL" onkeyup="validEmail()"></span><br>
				
				<span><label>Password: </label><input id="password_valid" type="password" length="100" name="PASSWORD" onkeyup="passwordFunction()"></span><br>
				
				<span><label>Confirm: </label><input id="confirm_valid" type="password" length="100" onkeyup="confirmFunction()"></span><br>

				<span id="create_error" style="display: none;">*Error/Wrong info</span>
				
			</div>

			<div class="info_div">
				<h2>User Information</h2>
				<span><label>First Name: </label><input id="confirm_fname" type="text" length="100" name="FIRSTNAME" onkeyup="fnameFunction()"></span><br>
				
				<span><label>Last Name: </label><input id="confirm_lname" type="text" length="100" name="LASTNAME" onkeyup="lnameFunction()"></span><br>
				
				<span><label>Address: </label><input id="confirm_address" type="text" length="100" name="ADDRESS" onkeyup="addressFunction()"></span><br>
				
				<span><label>City: </label><input id="confirm_city" type="text" length="100" name="CITY" onkeyup="cityFunction()"></span><br>
				
				<span><label>Province: </label><input id="confirm_province" type="text" length="100" name="PROVINCE" onkeyup="provinceFunction()"></span><br>
				
				<span><label>Postal Code: </label><input id="confirm_postal" type="text" length="7" name="POSTALCODE" onkeyup="postalFunction()"></span><br>
				
				<span><label>Telephone: </label><input minlength="10" id="confirm_phone" maxlength="12" type="text" length="100" name="PHONE" onkeyup="phoneFunction()"></span><br>

				<span id="info_error" style="display: none;">*Error/Wrong info</span>
				
			</div>

			<div class="payInfo_div">
				<h2>Payment Information</h2>
				
				<span><label>CC Type: </label>
					<select id="ccType_confirm" name="CCTYPE">
						<option value="default"> - - - - - - </option>
						<option value="visa">Visa</option>
						<option value="mastercard">MasterCard</option>
						<option value="amex">AmericanExpress</option>
					</select></span><br>
					<span><label>CC Number: </label><input id="confirm_cc" type="text" length="100" name="CREDITCARD" minlength="12" maxlength="16" onkeyup="testCreditCard()"></span><br>

					<span><label>Expiry Date:</label><input onkeyup="ExpireMonthFunction()" id="confirm_expireMonth" type="text" minlength="2" maxlength="2" length="2" size="2" name="EXPIRATION">/
						<input onkeyup="expireYearFunction()" id="confirm_expireYear" type="text" minlength="2" maxlength="2" length="2" size="2" name="EXPIRATION2"></span><br>

						<span><label>CCV: </label><input onkeyup="ccvFunction()" id="confirm_ccv" type="text" maxlength="3" size="3" name="CCV" ></span><br>

						<span id="cc_error" style="display: none;">*Error/Wrong info</span>

					</div>
					<input type="hidden" name="EMAILVALIDATION" value="false">
					<input type="submit" Value="Register" class="register_btn" name="register_submit" >
				</form>

			</div>	



			<script>

	//Email Validation
	var flag = ["false", "false","false","false","false","false","false","false","false","false","false","false","false","false"];
	
	var inputEmail = document.getElementById('email_valid');
	var spanError1 = document.getElementById('create_error');

	function validEmail() {
		
		var atpos = inputEmail.value.indexOf("@");
		var dotpos = inputEmail.value.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=inputEmail.length || inputEmail.value == "")
		{
			flag[0] = "false";
			inputEmail.setAttribute('class','wrong');
			spanError1.style.display = 'inline';
			
		}else{
			flag[0] = "true";
			inputEmail.setAttribute('class','right');
			spanError1.style.display = 'none';
		}
	}


	//Password Validation
	var inputpass = document.getElementById('password_valid');
	

	function passwordFunction(){
		if(inputpass.value.length < 6 || inputpass.value == ""){
			flag[1] = "false";
			inputpass.setAttribute('class','wrong');
			spanError1.style.display = 'inline';
		}else{
			flag[1] = "true";
			inputpass.setAttribute('class','right');
			spanError1.style.display = 'none';
		}
	}

	//Confirm Password

	var inputconf = document.getElementById('confirm_valid');

	function confirmFunction(){
		if(inputconf.value != inputpass.value || inputconf.value == ""){
			flag[2] = "false";
			inputconf.setAttribute('class','wrong');
			spanError1.style.display = 'inline';
		}else{
			flag[2] = "true";
			inputconf.setAttribute('class','right');
			spanError1.style.display = 'none';
		}
	}

	//FirstName

	var inputFname = document.getElementById('confirm_fname');
	var spanError2 = document.getElementById('info_error');

	function fnameFunction(){
		if(inputFname.value.length < 1 || inputFname.value == ""){
			flag[3] = "false";
			inputFname.setAttribute('class','wrong');
			spanError2.style.display = 'inline';
		}else{
			flag[3] = "true";
			inputFname.setAttribute('class','right');
			spanError2.style.display = 'none';
		}
	}

	//LastName Validation

	var inputLname = document.getElementById('confirm_lname');

	function lnameFunction(){
		if(inputLname.value.length < 1 || inputLname.value == ""){
			flag[4] = "false";
			inputLname.setAttribute('class','wrong');
			spanError2.style.display = 'inline';
		}else{
			flag[4] = "true";
			inputLname.setAttribute('class','right');
			spanError2.style.display = 'none';
		}
	}

	//Address Validation

	var inputAddress = document.getElementById('confirm_address');

	function addressFunction(){
		if(inputAddress.value.length < 1 || inputAddress.value == ""){
			flag[5] = "false";
			inputAddress.setAttribute('class','wrong');
			spanError2.style.display = 'inline';
		}else{
			flag[5] = "true";
			inputAddress.setAttribute('class','right');
			spanError2.style.display = 'none';
		}
	}


	//CITY Validation

	var inputCity = document.getElementById('confirm_city');

	function cityFunction(){
		if(inputCity.value.length < 2 || inputCity.value == ""){
			flag[6] = "false";
			inputCity.setAttribute('class','wrong');
			spanError2.style.display = 'inline';
		}else{
			flag[6] = "true";
			inputCity.setAttribute('class','right');
			spanError2.style.display = 'none';
		}
	}

		//PROVINCE Validation

		var inputProvince = document.getElementById('confirm_province');

		function provinceFunction(){
			if(inputProvince.value.length < 2 || inputProvince.value == ""){
				flag[7] = "false";
				inputProvince.setAttribute('class','wrong');
				spanError2.style.display = 'inline';
			}else{
				flag[7] = "true";
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
				flag[8] = "true";
				inputPostal.setAttribute('class','right');
				spanError2.style.display = 'none';
			}
			else
			{
				flag[8] = "false";
				inputPostal.setAttribute('class','wrong');
				spanError2.style.display = 'inline';
			}
		}



		var inputPhone = document.getElementById('confirm_phone');

		function phoneFunction()  
		{  

			var phoneno = /^\d{10}$/;  
			if((inputPhone.value.match(phoneno)) && inputPhone.value != "")  
			{
				flag[9] = "true";
				inputPhone.setAttribute('class','right');
				spanError2.style.display = 'none';  
				return true;  
			}  
			else  
			{  
				flag[9] = "false";
				inputPhone.setAttribute('class','wrong');
				spanError2.style.display = 'inline';
				return false;  
			}  
		}

		var myCardNo = document.getElementById('confirm_cc');
		var myCardType = document.getElementById('ccType_confirm');
		var cardnoAmex = /^(?:3[47][0-9]{13})$/;
		var cardnoVisa = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
		var cardnoMaster = /^(?:5[1-5][0-9]{14})$/; 

		function testCreditCard () {

			if(myCardType.value=="visa" && myCardNo.value.match(cardnoVisa) && myCardNo.value != "") {
				flag[10] = "true";
				myCardNo.setAttribute('class','right');
				inputError3.style.display = 'none';
			}else if(myCardType.value=="mastercard" && myCardNo.value.match(cardnoMaster) && myCardNo.value != ""){
				flag[10] = "true";
				myCardNo.setAttribute('class','right');
				inputError3.style.display = 'none';
			}else if(myCardType.value=="amex" && myCardNo.value.match(cardnoAmex) && myCardNo.value != ""){
				flag[10] = "true";
				myCardNo.setAttribute('class','right');
				inputError3.style.display = 'none';
			}else{
				flag[10] = "false";
				myCardNo.setAttribute('class','wrong');
				inputError3.style.display = 'inline';
			} 
		}





		//CCExpireMonth Validation

		var inputExmonth = document.getElementById('confirm_expireMonth');
		var inputError3 = document.getElementById('cc_error');


		function ExpireMonthFunction(){
			if(inputExmonth.value > 12 || inputExmonth.value.length < 2 || inputExmonth.value == ""){
				flag[11] = "false";
				inputExmonth.setAttribute('class','wrong');
				inputError3.style.display = 'inline';
			}else{
				flag[11] = "true";
				inputExmonth.setAttribute('class','right');
				inputError3.style.display = 'none';
			}
		}

	//ccEXPIREYEAR Validation

	var inputExyear = document.getElementById('confirm_expireYear');

	

	function expireYearFunction(){
		if(inputExmonth.value > 99 || inputExyear.value.length < 2 || inputExyear.value == ""){
			flag[12] = "false";
			inputExyear.setAttribute('class','wrong');
			inputError3.style.display = 'inline';
		}else{
			flag[12] = "true";
			inputExyear.setAttribute('class','right');
			inputError3.style.display = 'none';
		}
	}

	//CCV Validation


	var inputCcv = document.getElementById('confirm_ccv');

	function ccvFunction(){
		if(inputCcv.value.length < 3 || inputCcv.value == ""){
			flag[13] = "false";
			inputCcv.setAttribute('class','wrong');
			inputError3.style.display = 'inline';
		}else{
			flag[13] = "true";
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
				if(flag[1] == "false"){inputpass.setAttribute('class','wrong');}
				if(flag[2] == "false"){inputconf.setAttribute('class','wrong');}
				if(flag[3] == "false"){inputFname.setAttribute('class','wrong');}
				if(flag[4] == "false"){inputLname.setAttribute('class','wrong');}
				if(flag[5] == "false"){inputAddress.setAttribute('class','wrong');}
				if(flag[6] == "false"){inputCity.setAttribute('class','wrong');}
				if(flag[7] == "false"){inputProvince.setAttribute('class','wrong');}
				if(flag[8] == "false"){inputPostal.setAttribute('class','wrong');}
				if(flag[9] == "false"){inputPhone.setAttribute('class','wrong');}
				if(flag[10] == "false"){myCardNo.setAttribute('class','wrong');}
				if(flag[11] == "false"){inputExmonth.setAttribute('class','wrong');}
				if(flag[12] == "false"){inputExyear.setAttribute('class','wrong');}
				if(flag[13] == "false"){inputCcv.setAttribute('class','wrong');}


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

</body>
</html>