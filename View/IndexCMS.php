<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'> 
	<title>CMS Index</title>
	<link rel="stylesheet" type="text/css" href="../View/css/styleCMS.css">

	<script type="text/javascript">
	var flag = ["false", "false", "false", "false", "false", "false", "false", "false"];

	function NameVal(){
		var event_name = document.getElementById("event_name");
		
		if (document.new_event_form.event_name.value.length == 0){
			flag[0]= "false";
			error1.style.display = "inline-block";
		}else{
			flag[0]= "true";
			error1.style.display = "none";
		}


	}
	function CategoryVal(){
		var event_category = document.getElementsByName("event_category");
		
		if (document.new_event_form.event_category.value == "default"){
			flag[1]= "false";
			error2.style.display = "inline-block";
		}else{
			flag[1]= "true";
			error2.style.display = "none";
		}


	}
	function DateVal(){
		var event_date = document.getElementsByName("event_date");

		if (document.new_event_form.event_date.value == "" || document.new_event_form.event_date.value == null){
			flag[2]= "false";
			error3.style.display = "inline-block";
		}else{
			flag[2]= "true";
			error3.style.display = "none";
		}


	}
	function TimeVal1(){
		var event_time_start = document.getElementsByName("event_time_start");
		
		
		if (document.new_event_form.event_time_start.value == 0 || document.new_event_form.event_time_start.value == null  ){
			flag[3]= "false";
			error4.style.display = "inline-block";
		}else{
			flag[3]= "true";
			error4.style.display = "none";
		}


	}
	function TimeVal2(){
		
		var event_time_end = document.getElementsByName("event_time_end");
		
		if (document.new_event_form.event_time_end.value == "" || document.new_event_form.event_time_end.value == null ){
			flag[7]= "false";
			error8.style.display = "inline-block";
		}else{
			flag[7]= "true";
			error8.style.display = "none";
		}


	}

	function LocationVal(){
		var location = document.getElementsByName("event_location");
		
		if (document.new_event_form.event_location.value == "default"){
			flag[4]= "false";
			error5.style.display = "inline-block";
		}else{
			flag[4]= "true";
			error5.style.display = "none";
		}


	}

	function PriceVal(){
		var event_price = document.getElementsByName("event_price");
		
		if (document.new_event_form.event_price.value == "0" ||document.new_event_form.event_price.value == "" ||document.new_event_form.event_price.value == null){
			flag[5]= "false";
			error6.style.display = "inline-block";
		}else{
			flag[5]= "true";
			error6.style.display = "none";
		}


	}


	function TicketVal(){
		var event_ticket = document.getElementsByName("event_ticket");
		
		if (document.new_event_form.event_ticket.value == "0" ||document.new_event_form.event_ticket.value == "" ||document.new_event_form.event_ticket.value == null){
			flag[6]= "false";
			error7.style.display = "inline-block";
		}else{
			flag[6]= "true";
			error7.style.display = "none";
		}


	}

	function submit_event_Valid(){
		var confirm = true;
		for(var i = 0; i<flag.length;i++){
			if(flag[i] != "true"){
				confirm = false;
				this.alert("You have missing information.");

				if (flag[0] =="false") {
					error1.style.display = "inline-block";
				}
				if (flag[1] =="false") {
					error2.style.display = "inline-block";
				}
				if (flag[2] =="false") {
					error3.style.display = "inline-block";
				}
				if (flag[3] =="false") {
					error4.style.display = "inline-block";
				}
				if (flag[4] =="false") {
					error5.style.display = "inline-block";
				}
				if (flag[5] =="false") {
					error6.style.display = "inline-block";
				}
				if (flag[6] =="false") {
					error7.style.display = "inline-block";
				}
				if (flag[7] =="false") {
					error8.style.display = "inline-block";
				}

				return false;
			}
		}

		if(confirm == true){
			return true;
		}
	}
//*********		JAVASCRIPT -- Submit EDIT event form validation	**********************
	function submit_event_edit_Valid(){
		confirm = true;
		var flag_edit = ["false", "false", "false", "false", "false", "false", "false", "false"];

	//this.alert(document.new_event_form.event_name.value.length);
	if (document.new_event_form.event_name.value.length != 0) {
		error1.style.display = "none";
		flag_edit[0] ="true";

	};

	if (document.new_event_form.event_category.value != "default"){
		error2.style.display = "none";
		flag_edit[1] ="true";
	}

	if (document.new_event_form.event_date.value != "" &&  document.new_event_form.event_date.value != null){
		error3.style.display = "none";
		flag_edit[2]= "true";
	}

	if (document.new_event_form.event_time_start.value != 0 &&  document.new_event_form.event_time_start.value != null  ){
		error4.style.display = "none";
		flag_edit[3]= "true";
	}

	if (document.new_event_form.event_time_end.value != "" &&  document.new_event_form.event_time_end.value != null ){
		
		error8.style.display = "none";
		flag_edit[7]= "true";
	}

	if (document.new_event_form.event_location.value != "default"){
		error5.style.display = "none";
		flag_edit[4]= "true";
	}

	if (document.new_event_form.event_price.value != "0" && document.new_event_form.event_price.value != "" && document.new_event_form.event_price.value != null){
		error6.style.display = "none";
		flag_edit[5]= "true";
	}
	var event_ticket = document.getElementsByName("event_ticket");
	if (document.new_event_form.event_ticket.value != "0" && document.new_event_form.event_ticket.value != "" && document.new_event_form.event_ticket.value != null){
		error7.style.display = "none";
		flag_edit[6]= "true";
		
	}



	for(var i = 0; i<flag_edit.length;i++){
		if(flag_edit[i] != "true"){
			confirm = false;
			this.alert("You have missing information.");

			if (flag_edit[0] =="false") {
				error1.style.display = "inline-block";
			}
			if (flag_edit[1] =="false") {
				error2.style.display = "inline-block";
			}
			if (flag_edit[2] =="false") {
				error3.style.display = "inline-block";
			}
			if (flag_edit[3] =="false") {
				error4.style.display = "inline-block";
			}
			if (flag_edit[4] =="false") {
				error5.style.display = "inline-block";
			}
			if (flag_edit[5] =="false") {
				error6.style.display = "inline-block";
			}
			if (flag_edit[6] =="false") {
				error7.style.display = "inline-block";
			}
			if (flag_edit[7] =="false") {
				error8.style.display = "inline-block";
			}

			return false;
		}
	}

	if(confirm == true){
		return true;
	}
	}


	</script>
</head>
<body>


	<div id="CMS_back_page">
		<div id="logo">
			<img src="../View/images/tickettailor2logo.png" id="Ticketlogo" alt="Banner">
			<img src="../View/images/CMSlogo.png" id="CMSlogo" alt="CMSLOGO">

			<form method="post" id="log_out_form">
				<input type="submit" name="logout" class="add_event4" value="Log Out">
			</form>
		</div>
		<hr>


		<form method="post" id="add_event_button">

			<input type="submit" name="add_event_submit" class="add_event1" value="Add Event">
			
		</form>
		<?php
			if($_SESSION["add_event"] == true){
				?>
				<div id="add_event_container">
					<form method="post"  name="new_event_form">
						<h2>New Events</h2>
						<span id="error1" name="error1">*</span><label>Event Name: </label>
						<input type="text" name="event_name" id="event_name" onkeyup="NameVal()"><br><br>

						<span  id="error2">*</span><label>Event Category: </label>
						<select name="event_category" onclick="CategoryVal()">
							<option value="default" selected> - - - - - - - </option>
							<option value="Sports">Sports</option>
							<option value="Concerts">Concerts</option>
							<option value="Theatrical">Theatrical</option>
							<option value="Humour">Humour</option>
							<option value="Movies">Movies</option>
						</select><br><br>

						<span  id="error3">*</span><label>Event Date: </label>
						<input type="date" name="event_date" onkeyup="DateVal()" onchange="DateVal()"><br><br>

						<span  id="error4">*</span>
						<label>Event Time From:	</label>
						<input type="time" name="event_time_start"  onkeyup="TimeVal1()" onclick="TimeVal1()">

						<span  id="error8">*</span>
						<label>Till: </label>
						<input type="time" name="event_time_end" onkeyup="TimeVal2()" onclick="TimeVal2()"><br><br>

						<span  id="error5" name="error5">*</span><label>Event Location: </label>
						<select onclick="LocationVal()" name="event_location">
							<option value="default" selected> - - - - - - - </option>
							<option value="Bell Center">Bell Center</option>
							<option value="Olympic Stadium">Olympic Stadium</option>
							<option value="Metropolis">Metropolis</option>
							<option value="Uniprix Stadium">Uniprix Stadium</option>
							<option value="Uniprix Stadium">Theatre St-Denis</option>
							<option value="Olympia">Olympia</option>
							<option value="Théatre du Nouveau Monde">Théatre du Nouveau Monde</option>
							<option value="Guzzo">Guzzo</option>
							<option value="Banque Scotia">Banque Scotia</option>
						</select><br><br>

						<span  id="error6">*</span><label>Ticket Price: </label>
						<input type="number" name="event_price" min="0" max="1500" onkeyup="PriceVal()" onclick="PriceVal()"> <label> $</label><br><br>

						<span  id="error7">*</span><label>Number of Tickets: </label>
						<input type="number" name="event_ticket" min="0" max="1500" onkeyup="TicketVal()" onclick="TicketVal()"><br><br>

						<span class="missing_info_span">* Missing/Wrong informations</span><br><br>


						<input type="submit" class="add_event2" name="confirm_add_event" value="Add Event" onclick="return submit_event_Valid()">
						<input type="submit" class="add_event3" name="cancel_add_event" value="Cancel Event" onclick="reset()">
					</form>

				</div>


		<?php
			}else if ($_SESSION["add_event"] == false){};
		?>

	
		<hr>

		<h1 id="h1_display_events">Active Events</h1>
		<form method="post" id="group_buttons">

			<input type="submit" name="sports" class="add_event4" value="Sports">
			<input type="submit" name="concerts" class="add_event4" value="Concerts">
			<input type="submit" name="theatrical" class="add_event4" value="Theatrical">
			<input type="submit" name="humour" class="add_event4" value="Humour">
			<input type="submit" name="movies" class="add_event4" value="Movies">
			
		</form>



<!-- CREATE 5 DIFFERENT DIV CONTAINER DEPENDING OF THE THE CATEGORY CHOSEN -->
		
			<?php
			if ($_SESSION["sports"] == true) {
				include "../Controller/SportQueryCMS.php";

			}
			?>
			<?php
			if ($_SESSION["concerts"] == true) {
				include "../Controller/ConcertsQueryCMS.php";
				
			}
			?>
			<?php
			if ($_SESSION["theatrical"] == true) {
				include "../Controller/TheatricalQueryCMS.php";
			}
			?>
			<?php
			if ($_SESSION["humour"] == true) {
				include "../Controller/HumourQueryCMS.php";
			}
			?>
			<?php
			if ($_SESSION["movies"] == true) {
				include "../Controller/MovieQueryCMS.php";
			}
			?>
	</div> <!-- Back page CLOSING DIV -->


</body>
</html>