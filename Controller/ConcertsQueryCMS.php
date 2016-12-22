<?php

ini_set('display_errors','On');

error_reporting(E_ALL);

        // Include the pagination class
include '../Model/pagination.class.php';


?>
<div id="display_events">
	<?php
	if (!isset($_POST["event_edit"])) {
		$_SESSION["add_event"] = false;
		$event_type = "concerts";

		if ($DB_object ->check_event_existance($event_type)) {
			?>
			<div id="event_no_display">

				<p>NO EVENTS CREATED</p>
			</div>
			
			<?php
		}else{

			$all_events = $DB_object -> get_all_event($event_type);
	// some example data
				
				//foreach (range(0,0) as $value) {
				for ($i=0; $i < count($all_events) ; $i++) { 
					
					

					$events[$i] = array(
						'ID' => $all_events[$i]["ID"],
						'EVENTNAME' => $all_events[$i]["EVENTNAME"],
						'CATEGORY' => $all_events[$i]["CATEGORY"],
						'DATES' => $all_events[$i]["DATES"],
						'START' => $all_events[$i]["START"],
						'END' => $all_events[$i]["END"],
						'LOCATION' => $all_events[$i]["LOCATION"],
						'PRICE' => $all_events[$i]["PRICE"],
						'AMOUNTS' => $all_events[$i]["AMOUNTS"]
						);
					
				}
			

			if (count($events)) {

	// Create the pagination object
				if ($_SESSION["add_event"] == true) {
					$pagination = new pagination($events, (isset($_GET['page']) ? $_GET['page'] : 1), 3);
				}else{
					$pagination = new pagination($events, (isset($_GET['page']) ? $_GET['page'] : 1), 6);
				}
	// Decide if the first and last links should show
				$pagination->setShowFirstAndLast(false);
	// You can overwrite the default seperator
				$pagination->setMainSeperator(' | ');
	// Parse through the pagination class
				$eventPages = $pagination->getResults();

	// If we have items 
				if (count($eventPages) != 0) {						
	// Loop through all the items in the array
					foreach ($eventPages as $EventArray) {
						?>




						<div class="event_display">
							<div class="event_detail_container">
								<div class="event_name_display">
									<?php echo $EventArray['EVENTNAME']; ?>
								</div>
								<span class="event_display_span">CATEGORY</span><br><span class="database_span"><?php echo $EventArray['CATEGORY']; ?></span><br>
								<span class="event_display_span">DATE</span><br><span class="database_span"><?php echo $EventArray['DATES']; ?></span><br>
								<span class="event_display_span">LOCATION</span><br><span class="database_span"><?php echo $EventArray['LOCATION']; ?></span><br>
								<span class="event_display_span">PRICE</span><br><span class="database_span"><?php echo $EventArray['PRICE']; ?></span><br>
								<span class="event_display_span">AMOUNTS</span><br> <span class="database_span"><?php echo $EventArray['AMOUNTS']; ?></span><br>
								<span class="event_display_span">START</span><br><span class="database_span"> <?php echo $EventArray['START']; ?></span><br>
								<span class="event_display_span">END</span><br><span class="database_span"><?php echo $EventArray['END']; ?></span><br>
							</div>
							<div class="edit_delete_container">
								<form method="post">
									<input type="hidden" name="event_hidden_id" value="<?php echo $EventArray['ID']; ?>">
									<input type="hidden" name="event_hidden_category" value="<?php echo $EventArray['CATEGORY']; ?>">
									<input type="submit" class="add_event5" name="event_delete" value="DELETE">
									<input type="submit" class="add_event5" name="event_edit" value="EDIT">
								</form>
							</div>
						</div>

						<?php
					}

		// print out the page numbers beneath the results
		// echo $pageNumbers;  
		 // Create the page numbers
					?>
				</div>
				<div class="pagination"><?php
				echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks($_GET).'</div>';
				?>
			</div>

			<?php
		}
}//END OF WHILE LOOP


}//END OF IF-ELSE -> DATABASE EMPTY OR NOT
}else if(isset($_POST["event_edit"])){

	$_SESSION["add_event"] = false;

	$data = $DB_object -> get_event($_POST)
	?>
	<div id="add_event_container2">
		<form method="post"  name="new_event_form">
			<h2>EDIT Events</h2>
			<span id="error1" name="error1">*</span><label>Event Name: </label>
			<input type="text" name="event_name" id="event_name" onkeyup="NameVal()" value="<?php echo $data['EVENTNAME']; ?>"><br><br>

			<span  id="error2">*</span><label>Event Category: </label>
			<select name="event_category" onclick="CategoryVal()">
				<option value="default" <?php if ($data["CATEGORY"] == "default") {	echo "selected";}?>> - - - - - - - </option>
				<option value="Sports" <?php if ($data["CATEGORY"] == "Sports") {	echo "selected";}?>>Sports</option>
				<option value="Concerts" <?php if ($data["CATEGORY"] == "Concerts") {	echo "selected";}?>>Concerts</option>
				<option value="Theatrical" <?php if ($data["CATEGORY"] == "Theatrical") {	echo "selected";}?>>Theatrical</option>
				<option value="Humour" <?php if ($data["CATEGORY"] == "Humour") {	echo "selected";}?>>Humour</option>
				<option value="Movies" <?php if ($data["CATEGORY"] == "Movies") {	echo "selected";}?>>Movies</option>
			</select><br><br>

			<span  id="error3">*</span><label>Event Date: </label>
			<input type="date" name="event_date" onkeyup="DateVal()" onchange="DateVal()" value="<?php echo $data['DATES']; ?>"><br><br>

			<span  id="error4">*</span>
			<label>Event Time From:	</label>
			<input type="time" name="event_time_start"  onkeyup="TimeVal1()" onclick="TimeVal1()" value="<?php echo $data['START']; ?>">

			<span  id="error8">*</span>
			<label>Till: </label>
			<input type="time" name="event_time_end" onkeyup="TimeVal2()" onclick="TimeVal2()" value="<?php echo $data['END']; ?>"><br><br>

			<span  id="error5" name="error5">*</span><label>Event Location: </label>
			<select onclick="LocationVal()" name="event_location">
				<option value="default" <?php if ($data["LOCATION"] == "default") {	echo "selected";}?> > - - - - - - - </option>
				<option value="Bell Center" <?php if ($data["LOCATION"] == "Bell Center") {	echo "selected";}?>>Bell Center</option>
				<option value="Metropolis" <?php if ($data["LOCATION"] == "Metropolis") {	echo "selected";}?>>Metropolis</option>
				<option value="Uniprix Stadium" <?php if ($data["LOCATION"] == "Uniprix Stadium") {	echo "selected";}?>>Uniprix Stadium</option>
				<option value="Olympia" <?php if ($data["LOCATION"] == "Olympia") {	echo "selected";}?>>Olympia</option>
				<option value="Olympic Stadium" <?php if ($data["LOCATION"] == "Olympic Stadium") {	echo "selected";}?>>Olympic Stadium</option>
				<option value="Theatre St-Denis" <?php if ($data["LOCATION"] == "Theatre St-Denis") {	echo "selected";}?>>Theatre St-Denis</option>
				<option value="Théatre du Nouveau Monde" <?php if ($data["LOCATION"] == "Théatre du Nouveau Monde") {	echo "selected";}?>>Théatre du Nouveau Monde</option>
				<option value="Guzzo" <?php if ($data["LOCATION"] == "Guzzo") {	echo "selected";}?>>Guzzo</option>
				<option value="Banque Scotia" <?php if ($data["LOCATION"] == "Banque Scotia") {	echo "selected";}?>>Banque Scotia</option>
			</select><br><br>

			<span  id="error6">*</span><label>Ticket Price: </label>
			<input type="number" name="event_price" min="0" max="500" onkeyup="PriceVal()" onclick="PriceVal()" value="<?php echo $data['PRICE']; ?>"> <label> $</label><br><br>

			<span  id="error7">*</span><label>Number of Tickets: </label>
			<input type="number" name="event_ticket" min="0" max="500" onkeyup="TicketVal()" onclick="TicketVal()" value="<?php echo $data['AMOUNTS']; ?>"><br><br>

			<span class="missing_info_span">* Missing/Wrong informations</span><br><br>

			<input type="hidden" name="event_hidden_edit_id" value="<?php echo $data['ID']; ?>">
			<input type="hidden" name="event_hidden_edit_category" value="<?php echo $data['CATEGORY']; ?>">


			<input type="submit" class="add_event2" name="confirm_edit_event" value="Confirm Edit" onclick="return submit_event_edit_Valid()">
			<input type="submit" class="add_event3" name="cancel_edit_event" value="Cancel Edit" onclick="reset()">
		</form>

	</div>

	<?php

}


?>

