<html>
<head>
	<meta charset="utf-8">
	<title>forgot pass</title>
</head>
<body>

<div id="forgot_form">

<form method="post" action="../Controller/Index.php">
	<p>Please enter you Email and we will send you your password.</p>

	<label>Email</label>
	<input type="email" class="contact_email" name="forgot_email" id="forgot_email" onkeyup="emailval()">

	<input type="submit" name="forgot_submit" value="Send" onclick="return forgotval()">

</form>

</div>
<script type="text/javascript">


var flag = "";




function emailval(){
	var email = document.getElementById("forgot_email");
	
	if (email.value == ""  || email.value == null ) {
		
		
		email.style.borderWidth = "2px";
		email.style.borderStyle = "solid";
		email.style.borderColor = "red";
		flag ="false";
	}else{
		email.style.borderWidth = "2px";
		email.style.borderStyle = "solid";
		email.style.borderColor = "green";

		flag ="true";
	}

}

function forgotval(){

	var confirm = true;
		
		if(flag != "true"){
			confirm = false;
			this.alert("You have missing information.");
			return false;
		}	
		

		if(confirm == true){
			return true;
		}
}


</script>

</body>
</html>