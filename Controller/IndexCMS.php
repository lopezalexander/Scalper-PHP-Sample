<?php
session_start();

// **********LOGOUT CODE
	if (isset($_POST["logout"])) {
		session_destroy();
		header("Location: ../AdminLogin.php");
		exit();
	}



	// **********START SESSION
	if ($_SESSION["Logged"] == true) {

		include_once("../Model/DatabaseManager.class.php");

		$DB_object = new DatabaseManager();

	//Create EVENT Handler ON/OFF
		if (!isset($_SESSION["add_event"])) {$_SESSION["add_event"] = false;	}
		if (!isset($_SESSION["sports"])) {$_SESSION["sports"] = true;}
		if (!isset($_SESSION["concerts"])) {$_SESSION["concerts"] = false;}
		if (!isset($_SESSION["theatrical"])) {$_SESSION["theatrical"] = false;}
		if (!isset($_SESSION["humour"])) {$_SESSION["humour"] = false;}
		if (!isset($_SESSION["movies"])) {$_SESSION["movies"] = false;}

		include "../View/IndexCMS.php";

	//Display of the "ADD EVENT" FORM******
		if (isset($_POST["add_event_submit"])) {
			$_SESSION["add_event"] = true;
			echo "<meta http-equiv='refresh' content='0'>";
		//	header("Location: IndexCMS.php");
		//	exit();
		}
		if (isset($_POST["cancel_add_event"])) {
			$_SESSION["add_event"] = false;
			echo "<meta http-equiv='refresh' content='0'>";
		//	header("Location: IndexCMS.php");
		//	exit();
		}

	//Display of Event type chosen in Active Events
		if (isset($_POST["sports"])) {
			
			$_SESSION["sports"] = true;
			$_SESSION["concerts"] = false;
			$_SESSION["theatrical"] = false;
			$_SESSION["humour"] = false;
			$_SESSION["movies"] = false;
			echo "<meta http-equiv='refresh' content='2'>";
		//	header("Location: IndexCMS.php");
		//	exit();
		}
		if (isset($_POST["concerts"])) {
			
			$_SESSION["sports"] = false;
			$_SESSION["concerts"] = true;
			$_SESSION["theatrical"] = false;
			$_SESSION["humour"] = false;
			$_SESSION["movies"] = false;
			echo "<meta http-equiv='refresh' content='0'>";
		//	header("Location: IndexCMS.php");
		//	exit();
		}
		if (isset($_POST["theatrical"])) {
			
			$_SESSION["sports"] = false;
			$_SESSION["concerts"] = false;
			$_SESSION["theatrical"] = true;
			$_SESSION["humour"] = false;
			$_SESSION["movies"] = false;
			echo "<meta http-equiv='refresh' content='0'>";
		//	header("Location: IndexCMS.php");
		//	exit();
		}
		if (isset($_POST["humour"])) {
			
			$_SESSION["sports"] = false;
			$_SESSION["concerts"] = false;
			$_SESSION["theatrical"] = false;
			$_SESSION["humour"] = true;
			$_SESSION["movies"] = false;
			echo "<meta http-equiv='refresh' content='0'>";
		//	header("Location: IndexCMS.php");
		//	exit();
		}
		if (isset($_POST["movies"])) {
			
			$_SESSION["sports"] = false;
			$_SESSION["concerts"] = false;
			$_SESSION["theatrical"] = false;
			$_SESSION["humour"] = false;
			$_SESSION["movies"] = true;
			echo "<meta http-equiv='refresh' content='0'>";
		//	header("Location: IndexCMS.php");
		//	exit();
		}








	//*******		END OF SESSION 		************
	}else{
		header("Location: Controller/AdminLogin.php");
		exit();
	}


//**********ADD EVENT************** 
	if (isset($_POST["confirm_add_event"])) {
		$DB_object -> set_event(); 
	}

//**********DELETE EVENT************** 
	if (isset($_POST["event_delete"])) {
		$DB_object -> delete_event(); 
	}

//**********EDIT EVENT************** 
	if (isset($_POST["confirm_edit_event"])) {
		$DB_object -> update_event(); 
	}

?>