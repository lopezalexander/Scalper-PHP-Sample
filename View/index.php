<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  
	<title>Index</title>
	
  <link rel="stylesheet" href="../View/css/colorbox.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../View/js/jquery.colorbox.js"></script>
    <script>
      $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $(".index_register").colorbox({rel:'index_register'});


      });
    </script>
    <link rel="stylesheet" type="text/css" href="../View/css/styleHP.css">
</head>
<body>
	<div id="logo">
		<img src="../View/imagesHTML/tickettailor2logo.png" alt="Logo">

	</div>


	  <form method="post" class="login">
    <p>
      <label for="login">Email:</label>
      <input class="login_input" type="text" name="login_name" id="login" value="name@example.com">
    </p>

    <p>
      <label for="password">Password:</label>
      <input class="password_input" type="password" name="password" id="password" value="4815162342">
    </p>

    <p class="login-submit">
      <!-- <button class="login-button" name="index_login" onclick="this.form.submit()">Login</button> -->
         <input type="submit" class="login-button" name="index_login" >

    </p>

    <div>
      <a class="index_register" href="../View/register.php">Not a Member?</a><br>
      <a class="index_register" href="../View/forgotpass.php">Forget Password?</a>
    </div>

  </form>

  	<div id="btns_div">
		<a href="../View/movies.php" class="movies_btn">MOVIES</a>
		<a href="../View/theater.php" class="theater_btn">THEATER</a>
		<a href="../View/sports.php" class="sports_btn">SPORTS</a>
		<a href="../View/humour.php" class="humour_btn">HUMOUR</a>
		<a href="../View/concerts.php" class="concerts_btn">CONCERTS</a>
	</div>

</body>
</html>