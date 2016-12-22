<?php

class Member{
	//For admin login and user registration
	protected $ID;
	protected $EMAIL;
	protected $PASSWORD;
	protected $EMAILVALIDATION;

	protected $FIRSTNAME;
	protected $LASTNAME;
	protected $ADDRESS;
	protected $CITY;

	protected $PROVINCE;
	protected $POSTALCODE;
	protected $PHONE;
	protected $CREDITCARD;

	protected $CCTYPE;
	protected $CCV;
	protected $EXPIRATION;

	protected $EXPIRATION2;


	public function __construct(){
		
		$this->EMAIL = $_POST["EMAIL"]; 
		
		
		$this->PASSWORD = $_POST["PASSWORD"];
		$this->EMAILVALIDATION = $_POST["EMAILVALIDATION"]; 
		$this->FIRSTNAME = $_POST["FIRSTNAME"]; 

		$this->LASTNAME = $_POST["LASTNAME"]; 
		$this->ADDRESS = $_POST["ADDRESS"]; 
		$this->CITY = $_POST["CITY"];
		$this->PROVINCE = $_POST["PROVINCE"]; 

		$this->POSTALCODE = $_POST["POSTALCODE"]; 
		$this->PHONE = $_POST["PHONE"]; 
		$this->CREDITCARD = $_POST["CREDITCARD"]; 
		$this->CCTYPE = $_POST["CCTYPE"]; 

		$this->CCV = $_POST["CCV"]; 
		$this->EXPIRATION = $_POST["EXPIRATION"];
		$this->EXPIRATION2 = $_POST["EXPIRATION2"];



	}


	public function __toString(){
		$tostring = $this->getID()." <br>" .$this->getUser()." <br>".$this->getPassword()."<br> ".$this->getEmail()."<br> ";
		return $tostring;
	}

	public function create_array(){
		$member = array();

		$member["ID"] = $this->getID();
		$member["EMAIL"] = $this->getEMAIL();
		$member["PASSWORD"] = $this->getPASSWORD();
		$member["EMAILVALIDATION"] = $this->getEMAILVALIDATION();

		$member["FIRSTNAME"] = $this->getFIRSTNAME();
		$member["LASTNAME"] = $this->getLASTNAME();
		$member["ADDRESS"] = $this->getADDRESS();
		$member["CITY"] = $this->getCITY();

		$member["PROVINCE"] = $this->getPROVINCE();
		$member["POSTALCODE"] = $this->getPOSTALCODE();
		$member["PHONE"] = $this->getPHONE();

		$member["CREDITCARD"] = $this->getCREDITCARD();
		$member["CCTYPE"] = $this->getCCTYPE();
		$member["CCV"] = $this->getCCV();
		$member["EXPIRATION"] = $this->getEXPIRATION();
		$member["EXPIRATION2"] = $this->getEXPIRATION2();

		return $member;

	}
	//getter
	public function getID(){
		return $this->ID;
	}
	public function getEMAIL(){
		return $this->EMAIL;
	}
	public function getPASSWORD(){
		return $this->PASSWORD;
	}
	public function getEMAILVALIDATION(){
		return $this->EMAILVALIDATION;
	}



	public function getFIRSTNAME(){
		return $this->FIRSTNAME;
	}
	public function getLASTNAME(){
		return $this->LASTNAME;
	}
	public function getADDRESS(){
		return $this->ADDRESS;
	}
	public function getCITY(){
		return $this->CITY;
	}


	public function getPROVINCE(){
		return $this->PROVINCE;
	}
	public function getPOSTALCODE(){
		return $this->POSTALCODE;
	}
	public function getPHONE(){
		return $this->PHONE;
	}



	public function getCREDITCARD(){
		return $this->CREDITCARD;
	}
	public function getCCTYPE(){
		return $this->CCTYPE;
	}
	public function getCCV(){
		return $this->CCV;
	}
	public function getEXPIRATION(){
		return $this->EXPIRATION;
	}
	public function getEXPIRATION2(){
		return $this->EXPIRATION2;
	}
	
	
	
	//setter
	public function setUser($arg1){
		echo "Username has been set";
		$this->username = $arg1;
	}
	public function setPass($arg1){
		echo "Password has been set";
		$this->password = $arg1;
	}
	public function setEmail($arg1){
		echo "Email has been set";
		$this->email = $arg1;
	}

	public function send_email($subject, $body, $email){

		$headers  = 'From: noreply@gmail.com' . "\r\n" .
		'Reply-To: noreply@gmail.com' . "\r\n" .
		'MIME-Version: 1.0' . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();


		$to       = $email;
		$subject  = $subject;
		$message  = $body;


		if(mail($to, $subject, $message, $headers)){
			echo "";
		}else{
			echo "<script>alert('Wrong email/Wrong information')</script>";
		}
	}




}







?>