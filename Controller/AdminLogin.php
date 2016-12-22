<?php

//AdminLogin.php Database (MODEL)

include "Model/DatabaseManager.class.php";

//AdminLogin.php (VIEW) 

include "View/AdminLogin.php";

//AdminLogin.php Logics (Controller)/
session_start();



if (!isset($_SESSION["Logged"])) {
	$_SESSION["Logged"] = false;
}

$DB_object = new DatabaseManager();

$BadLogin = "";



if(isset($_POST['admin_login_submit'])) {
	if ($DB_object->admin_loginVal($_POST)) {
		$_SESSION["Logged"] = true;

		header("Location: Controller/IndexCMS.php");
		exit();
		
	}else{
		$BadLogin = "wrongInfo";
	}
}

if ($BadLogin == "wrongInfo") {
		echo "<script> var errorlog = document.getElementById('ErrorLog');</script>";
		echo "<script> errorlog.style.display = 'block';</script>";
	}		
?>