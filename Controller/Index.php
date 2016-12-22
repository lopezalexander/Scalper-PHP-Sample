<?php
session_start();
date_default_timezone_set('Canada/Eastern');
if (!isset($_SESSION["Logged"])) {
	$_SESSION["Logged"] = "false";
	$_SESSION["ITEMS"] = array();
	$_SESSION["TIMER"] = "false";

}

include_once("../Model/DatabaseManager.class.php");
include_once("../Model/Member.class.php");

include ("../View/index.php");

$DB_object_html = new DatabaseManager();



//GO TO HOMEPAGE ON LOGIN

if (isset($_POST["index_login"])) {

	if($DB_object_html -> users_loginVal($_POST)){
		$_SESSION["Logged"] = "true";
		$_SESSION["UserLogged"] = $_POST["login_name"];
		header("Location: ../View/HomePage.php");
		exit();
	}else{
		?>
		<script type="text/javascript">
		alert("Wrong information or register first.");
		</script>
		<?php
	}

}



//REGISTER FORM SUBMITION

	if (isset($_POST["register_submit"])) {
	//ID obscuring
	$bool = true; 

	for ($i=0; $i < 4; $i++) {  
   		 $bytes = openssl_random_pseudo_bytes($i, $bool); 
   		 $hex[$i] = bin2hex($bytes); 
	} 
  		//Create User
		$member = new Member($_POST);

		//insert user into Database
		$DB_object_html -> add_member($member->create_array());

		//get user ID for id in the obscuring link
		$id = $DB_object_html ->get_ID($_POST["EMAIL"]);


		//Send EMail to validate account
		

		$subject = "Ticket Tailor - Account Validation"; 
        $body = ' 
                    <html> 
                    <body> 
                    <h1>Thank you for registering!!</h1> 
                    <p>Through the link below, you will activate your account in order to be purchase events tickets!</p> 
                    <a href="http://localhost/MERGED/Project PHP II - Scalper Site/Controller/ConfirmRegistration.php?id='.$hex[2].":".$hex[1].":". $id .":".$hex[0].":".$hex[3].'">LINK</a> 
                    </body> 
                    </html> 
                    '; 
            
  		$email = $member->getEMAIL();
  		
        $member->send_email($subject, $body, $email); 
  
  
        echo "<script>alert('Thank you for registering! A Email was sent to your email to confirm your Registration')</script>"; 

		



		// header("Location: Index.php");
		// exit();

	}




//LogOUT logics

	if (isset($_POST["logout"])) {
		session_destroy();

		header("Location: ../View/HomePage.php");
		exit();
	}

//Email from contact page

	if (isset($_POST["contact_submit"])) {

		$subject = "Ticket Tailor - Contact Message";
		$body = $_POST["contact_body"];
		$email = $_POST["contact_email"];
		$DB_object_html->send_email($subject, $body, $email); 

		header("Location: ../View/contact.php");
		exit();
	}

//forgot password

	if (isset($_POST["forgot_submit"])) {

		$subject = "Ticket Tailor - Forgot your password!";
		
		$email = $_POST["forgot_email"];
		$DB_object_html->send_pass($subject, $email); 

		header("Location: ../Controller/Index.php");
		exit();
	}




?>
