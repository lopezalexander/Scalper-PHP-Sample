<meta HTTP-EQUIV="REFRESH" content="10; url=http://localhost/MERGED/Project PHP II - Scalper Site/View/HomePage.php">
<?php 
include_once("../Model/DatabaseManager.class.php");
include_once("../Model/Member.class.php");

    $DB_reconfirm = new DatabaseManager(); 
  
    $str= explode(":", $_GET["id"]); 
    $revealID = $str[2]; 
  
    //get information of user by id FOR EMAIL INFO AFTERWARD!!!
   $userINFO = $DB_reconfirm -> get_Info($revealID); 
  
    //recreate the user for edit_member FOR EMAIL INFO AFTERWARD!!!
    $memberEdit = new Member($userINFO); 
  
    //Change EMAILVALIDATION TO TRUE
    $DB_reconfirm -> edit_member($revealID); 
    //MESSAGE Of CONFIRMATION
        echo "Thank you registering and Validading your accounts. A E-mail has been sent with your confirmation and informations!!<br> You'll be redirected to the Ticket Tailor Homepage in a few second."; 
          
        //SEND EMAIL TO CONFIRM VALIDATION
        $email= $memberEdit->getEmail(); 
        $subject = "Ticket Tailor - Validation confirm!"; 
        $body = ' 
                    <html> 
                    <body> 
                    <h1>Thank you for Validading your account!</h1> 
                    <p>Hope you will enjoy the best deal available!</p> 
                    <a href="http://localhost/MERGED/Project PHP II - Scalper Site/View/HomePage.php">Ticket Tailor HomePage</a> 
                    </body> 
                    </html> 
                    '; 
  
        $memberEdit->send_email($subject, $body, $email); 
 ?>