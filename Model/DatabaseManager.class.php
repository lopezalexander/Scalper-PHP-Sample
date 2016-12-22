<?php
include_once("Member.class.php");
date_default_timezone_set('Canada/Eastern');
class DatabaseManager{
	//Database variable
	private $myDB;


/**

**********Constructor	

*/
public function __construct(){
	try{
		$this->myDB = new PDO("mysql:host=localhost; dbname=scalper","root","", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	}catch (Exception $e) {
		die("Error is: ". $e->getMessage());
	}//END OF TRY AND CATCH
}


	/**

	**********Add member 

	*/

	public function add_member($member){
		$addMember = $this->myDB -> prepare("INSERT INTO users(EMAIL,PASSWORD,EMAILVALIDATION,FIRSTNAME,LASTNAME,ADDRESS,CITY,PROVINCE,POSTALCODE,PHONE,CREDITCARD,CCTYPE,CCV,EXPIRATION,EXPIRATION2
) VALUES(:EMAIL,:PASSWORD,:EMAILVALIDATION,:FIRSTNAME,:LASTNAME,:ADDRESS,:CITY,:PROVINCE,:POSTALCODE,:PHONE,:CREDITCARD,:CCTYPE,:CCV,:EXPIRATION,:EXPIRATION2
)" );
		$addMember ->execute(array(
		"EMAIL" => $member["EMAIL"], 
		"PASSWORD" => $member["PASSWORD"],
		"EMAILVALIDATION" => $member["EMAILVALIDATION"], 
		"FIRSTNAME" => $member["FIRSTNAME"], 
		"LASTNAME" => $member["LASTNAME"], 
		"ADDRESS" => $member["ADDRESS"], 
		"CITY" => $member["CITY"],
		"PROVINCE" => $member["PROVINCE"], 
		"POSTALCODE" => $member["POSTALCODE"], 
		"PHONE" => $member["PHONE"], 
		"CREDITCARD" => $member["CREDITCARD"], 
		"CCTYPE" => $member["CCTYPE"], 
		"CCV" => $member["CCV"], 
		"EXPIRATION" => $member["EXPIRATION"],
		"EXPIRATION2" => $member["EXPIRATION2"]
		));

		$addMember->closeCursor();

	}
	/**

	**********EDIT EMAILVALIDATION member 

	*/
 public function edit_member($revealID){

 	$change_Validation = $this->myDB ->exec("UPDATE users SET EMAILVALIDATION='true' WHERE ID = ".$revealID);


 }





	/**

	**********Validation User after Registration 

	*/

	public function validate_user($id){
		$valExist = $this->myDB -> query("SELECT EMAILVALIDATION FROM users WHERE ID='$id'");
		$data = $valExist -> fetch();

		if ($data['EMAILVALIDATION']!="true") {

			$validate = $this->myDB -> exec("UPDATE user SET EMAILVALIDATION='true' WHERE ID= '$id'");
			echo "VALIDATION COMPLETE";
		}else{
			echo "User already valid!";
		}
		$valExist->closeCursor();
	}


/**

**********Login Validation FOR ADMIN 

*/

public function admin_loginVal($array){

	$users = $this->myDB -> query("SELECT * FROM admin");

	while($data = $users ->fetch()){

		if($array['admin_username'] == $data['USERNAME'] && $array['admin_password'] == $data['PASSWORD']){
			return true;
		}else{
			return false;
		}
	}
}




/**

**********Login Validation FOR USERS!!!! 

*/

public function users_loginVal($array){

	$users = $this->myDB -> query("SELECT * FROM users");

	while($data = $users ->fetch()){

		if($array['login_name'] == $data['EMAIL'] && $array['password'] == $data['PASSWORD'] && $data['EMAILVALIDATION'] =='true'){
			$id = $data['ID'];


			return true;
		}
	}			
}

	/**

**********Get ID -- WORKS!!

*/

public function get_ID($email){
	$getID = $this->myDB -> query("SELECT * FROM users WHERE EMAIL = '".$email."'");

	while ($getinfo = $getID -> fetch()) {
		$id = $getinfo["ID"];
		return $id;
	}
	$getID ->closeCursor();
}


	/**

**********Get Info -- WORKS!!

*/

public function get_Info($id){
	$get_Info = $this->myDB -> query("SELECT * FROM users WHERE ID = '".$id."'");

	while ($getinfo = $get_Info -> fetch()) {
		
		return $getinfo;
	}
	$get_Info ->closeCursor();
}
	/**

**********Get Info by EMAIL-- WORKS!!

*/

public function get_Info_by_email($email){
	$get_Info = $this->myDB -> query("SELECT * FROM users WHERE EMAIL = '".$email."'");

	$getinfo = $get_Info -> fetch();
		
	return $getinfo;
	
	
}

/**

**********Set event --DONE

*/

public function set_event(){
	$category = $_POST["event_category"];
		
	$add_event = $this->myDB -> prepare("INSERT INTO $category(EVENTNAME,CATEGORY,DATES,START,END,LOCATION,PRICE,AMOUNTS) VALUES(:EVENTNAME,:CATEGORY,:DATES,:START,:END,:LOCATION,:PRICE,:AMOUNTS)");

	$add_event -> execute(array(
		"EVENTNAME" => $_POST['event_name'],
		"CATEGORY" => $_POST['event_category'],
		"DATES" => $_POST['event_date'],
		"START" => $_POST['event_time_start'],
		"END" => $_POST['event_time_end'],
		"LOCATION" => $_POST['event_location'],
		"PRICE" => $_POST['event_price'],
		"AMOUNTS" => $_POST['event_ticket']
		));
	

}

/**

**********Get event --DONE

*/
public function get_event(){
	$ID = $_POST["event_hidden_id"];
	$category = $_POST["event_hidden_category"]; 

	$get_info = $this->myDB -> query("SELECT * FROM $category WHERE ID=".$ID);
	$event = $get_info->fetch();

	return $event;
}
/**

**********Get event by eventname --DONE

*/
public function get_event_cart($eventName,$eventCategory){
	

	$get_info = $this->myDB -> query("SELECT * FROM $eventCategory WHERE EVENTNAME='".$eventName."'");
	
	$data = $get_info->fetch();

	return $data;
}

/**

**********Get ALL events --DONE

*/
public function get_all_event($event_type){
	$get_all_event = $this->myDB -> query("SELECT * FROM $event_type ORDER BY ID DESC") ;
	$all_events_db = array();
	while ($get_all_data = $get_all_event ->fetch()) {
		$individual_event = $this->create_event($get_all_data);
		array_push($all_events_db, $individual_event);
	}

	return $all_events_db;
}

	/**

	**********create tempory event --DONE

	*/

	public function create_event($array){
		$event = array(
		"ID" => $array['ID'],
		"EVENTNAME" => $array['EVENTNAME'],
		"CATEGORY" => $array['CATEGORY'],
		"DATES" => $array['DATES'],
		"START" => $array['START'],
		"END" => $array['END'],
		"LOCATION" => $array['LOCATION'],
		"PRICE" => $array['PRICE'],
		"AMOUNTS" => $array['AMOUNTS']
		);

		return $event;

	}

/**

**********Delete Event --DONE

*/
public function delete_event(){
	$ID = $_POST["event_hidden_id"];
	$category = $_POST["event_hidden_category"]; 

	$delete_event = $this->myDB -> exec("DELETE FROM $category WHERE ID=".$ID);
	
	header("Location: IndexCMS.php");
	exit();


}

/**

**********Delete Event --DONE

*/
public function update_event(){
	$ID = $_POST["event_hidden_edit_id"];
	$category = $_POST["event_hidden_edit_category"]; 

	$edit_event = $this->myDB-> exec("UPDATE $category SET EVENTNAME='".$_POST["event_name"]."',CATEGORY='".$_POST["event_category"]."',DATES='".$_POST["event_date"]."',START='".$_POST["event_time_start"]."',END='".$_POST["event_time_end"]."',LOCATION='".$_POST["event_location"]."',PRICE='".$_POST["event_price"]."',AMOUNTS='".$_POST["event_ticket"]."' WHERE ID =".$ID);
	
	header("Location: IndexCMS.php");
	exit();



}

/**

**********Check if event database is empty / categories --DONE

*/
public function check_event_existance($event_type){
	$checkDB = $this->myDB -> query("SELECT * FROM ".$event_type);

	$ck = $checkDB ->fetch();

	if (empty($ck)) {
		return true;
	}else{
		return false;
	}

}








/**

**********Search for events sports

*/
public function search_event($searched,$event_type){
	
	$query = $this->myDB -> prepare("SELECT * FROM $event_type WHERE EVENTNAME LIKE '%".$searched."%'");

	$query -> execute(array($searched));
	



	$all_events_db = array();
	while ($get_all_data = $query ->fetch()) {
		$individual_event = $this->create_event($get_all_data);
		array_push($all_events_db, $individual_event);
	}

	return $all_events_db;
}



/**

**********Set time

*/
public function set_time(){
	
	$time = time();


	return $time;
}
/**

**********Set timer

*/
public function timer($limit){
    if(!isset($_SESSION['start'])){
    $_SESSION['start']=time();
    }else if(isset($_SESSION['start'])){
    $timeleft=time()-$_SESSION['start'];
    }
    if($timeleft>=$limit){
    $_SESSION['start']=time();
    }
return $timeleft;
}


/**

**********Send email checkout

*/
public function send_email_checkout($email,$body){
	
	$headers  =  'From: alextestdummy@gmail.com' . "\r\n" .
		'Reply-To: no-reply@gmail.com' . "\r\n" .
		'MIME-Version: 1.0' . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();


		

		$to       = $email;
		$subject  = "Ticket Tailor - Tickets Check Out Confirmed";
		$message  = $body;


		if(mail($to, $subject, $message, $headers)){
			echo "";
		}else{
			echo "<script>alert('Wrong email/Wrong information')</script>";
		}
}
/**

**********Send email for contact

*/
public function send_email($subject,$body,$email){
	
	$headers  = 'From: '.$email.'' . "\r\n" .
		'Reply-To: '.$email.'' . "\r\n" .
		'MIME-Version: 1.0' . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();



		$to       = "alextestdummy@gmail.com";
		$subject  = $subject;
		$message  = $body;


		if(mail($to, $subject, $message, $headers)){
			echo "";
		}else{
			echo "<script>alert('Wrong email/Wrong information')</script>";
		}
}

/**

**********forgotten password

*/
public function send_pass($subject,$email){

	$query = $this->myDB-> query("SELECT * FROM users WHERE EMAIL = '".$email."'");
	


	$data = $query -> fetch(); 
	

	$body = "Ticket Tailor wants to thank you for coming back to our website.<br> Hoping to see you again soon here is your password you forgot : <br><br>". $data["PASSWORD"]."<br><br> Thank you, Ticket Tailor.";

	$headers  = 'From: alextestdummy@gmail.com' . "\r\n" .
		'Reply-To: no-reply@gmail.com' . "\r\n" .
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





/**

**********push info in session for cart

*/

public function array_push_assoc($array, $key, $value){
$array[$key] = $value;
return $array;
}




/**

**********EDIT TICKETS AMOUNT IN DB

*/

public function edit_tickets($category,$eventname,$ticket_bought){

	$get_tick_available = $this->myDB -> query("SELECT * FROM $category WHERE EVENTNAME = '".$eventname."'");

	$data = $get_tick_available -> fetch();

	$new_amount = ($data["AMOUNTS"] - $ticket_bought);

	$edit_amount = $this->myDB -> exec("UPDATE $category SET AMOUNTS='".$new_amount."' WHERE EVENTNAME = '".$eventname."'");


	$get_tick_available->closeCursor();
}

}
?>