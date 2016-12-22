<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>

	<link rel="stylesheet" type="text/css" href="View/css/styleCMS.css">
</head>
<body>


<div id="login_div">
	<h1>Login</h1><br><br><br><br>
	<form method="post">
		<label>Admin Username: </label>
		<input type="text" name="admin_username" size="30" class="admin_input"><br><br>

		<label>Admin Password: </label>
		<input type="password" name="admin_password" size="30" class="admin_input"><br>	<br>

		<div id="ErrorLog">
			<span>Wrong Information! Only the Admin can acces this Section!</span>
		</div>

		<input type="submit" name="admin_login_submit" id="admin_submit_button" value="Log In">
	</form>
</div>


</body>
</html>