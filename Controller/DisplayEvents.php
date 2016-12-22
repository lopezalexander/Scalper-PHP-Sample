<?php
// Include the pagination class
ini_set('display_errors','On');
error_reporting(E_ALL); 
include '../Model/pagination.class.php';



include_once("../Model/DatabaseManager.class.php");

$DB_object = new DatabaseManager();

$all_event = $DB_object  -> get_all_event($_SESSION["EVENT_TYPE"]);


if (!isset($_POST["search_submit"])) {

		if (!isset($_POST["information_submit"]) && !isset($_POST["search_information_submit"])) {
			for ($i=0; $i < count($all_event) ; $i++) { 



				$events[$i] = array(
					'ID' => $all_event[$i]["ID"],
					'EVENTNAME' => $all_event[$i]["EVENTNAME"],
					'CATEGORY' => $all_event[$i]["CATEGORY"],
					'DATES' => $all_event[$i]["DATES"],
					'START' => $all_event[$i]["START"],
					'END' => $all_event[$i]["END"],
					'LOCATION' => $all_event[$i]["LOCATION"],
					'PRICE' => $all_event[$i]["PRICE"],
					'AMOUNTS' => $all_event[$i]["AMOUNTS"]
					);

			}


			if (count($events)) {

		// Create the pagination object

				$pagination = new pagination($events, (isset($_GET['page']) ? $_GET['page'] : 1), 5);

		// Decide if the first and last links should show
				$pagination->setShowFirstAndLast(false);
		// You can overwrite the default seperator
				$pagination->setMainSeperator(' | ');
		// Parse through the pagination class
				$eventPages = $pagination->getResults();

		// If we have items 
				if (count($eventPages) != 0) {	
					if ($_SESSION["EVENT_TYPE"] == "humour") {
						$table_id_css = 'rounded_table_humour';
					}else if ($_SESSION["EVENT_TYPE"] == "sports") {
						$table_id_css = 'rounded_table_sports';
					}else if ($_SESSION["EVENT_TYPE"] == "concerts") {
						$table_id_css = 'rounded_table_concerts';
					}else if ($_SESSION["EVENT_TYPE"] == "theatrical") {
						$table_id_css = 'rounded_table_theatrical';
					}else if ($_SESSION["EVENT_TYPE"] == "movies") {
						$table_id_css = 'rounded_table_movies';
					}

					?>
					<table id="<?php echo $table_id_css; ?>">

						<caption>Events Available</caption>

						<thead>
							<tr>
								<th class="title">Event Name</th>
								<th class="Q1">Dates</th>
								<th class="Q2">Start</th>
								<th class="Q3">Venue</th>
								<th class="Q3">Ticket Price</th>
								<th class="Q3">Information</th>
								<th class="Q4">Add</th>
							</tr>
						</thead>

						<?php
						foreach ($eventPages as $EventArray) {
							?>
							<tbody>
							<tr>
							<td><?php echo $EventArray["EVENTNAME"]; ?></td>
							<td><?php echo $EventArray["DATES"]; ?></td>
							<td><?php echo $EventArray["START"]; ?></td>
							<td><?php echo $EventArray["LOCATION"]; ?></td>
							<td><?php echo $EventArray["PRICE"]; ?>.00$</td>
							<td>
							
							<form method='post'>
							<input type='submit' class='logout_btn' name='information_submit' value='Info'>
							<input type='hidden' name='event_hidden_id' value='<?php echo $EventArray['ID']; ?>'>
							<input type='hidden' name='event_hidden_category' value='<?php echo $_SESSION["EVENT_TYPE"]; ?>'>
							</td>
							<td><input type='submit'  class='logout_btn' name='Add_cart' value='Add to Cart'>
							<input type='hidden' name='add_event_name' value='<?php echo $EventArray['EVENTNAME']; ?>'><input type='hidden' name='add_event_category' value='<?php echo $EventArray['CATEGORY']; ?>'>
							</td>
							</form>

							</tr>			
							</tbody>
							<?php


						}

						?>
						<tfoot>
							<td class="footer_left" colspan="6">Click on Info for full informations</td>
							<td class="footer_right">&nbsp;</td>
						</tfoot>	

					</table>
					<?php
				}


	        // print out the page numbers beneath the results
	        // echo $pageNumbers;  
	        // Create the page numbers
				?><div class="pagination"><?php
				echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks($_GET).'</div>';
				?>
			</div>
			<?php
		}?>

		<?php
	}else if(isset($_POST["information_submit"]) && !isset($_POST["search_submit"])){

		$event_info = $DB_object -> get_event($_POST);
		if ($_SESSION["EVENT_TYPE"] == "humour") {
						$event_display = 'event_display_humour';
					}else if ($_SESSION["EVENT_TYPE"] == "sports") {
						$event_display = 'event_display_sports';
					}else if ($_SESSION["EVENT_TYPE"] == "concerts") {
						$event_display = 'event_display_concerts';
					}else if ($_SESSION["EVENT_TYPE"] == "theatrical") {
						$event_display = 'event_display_theatrical';
					}else if ($_SESSION["EVENT_TYPE"] == "movies") {
						$event_display = 'event_display_movies';
					}
		?>

		
		<div id="<?php echo $event_display; ?>">
		
				<div class="event_name_display">
					<?php echo $event_info['EVENTNAME']; ?>
				</div>
				<span class="event_display_span">CATEGORY</span><br><span class="database_span"><?php echo $event_info['CATEGORY']; ?></span><br>
				<span class="event_display_span">DATE</span><br><span class="database_span"><?php echo $event_info['DATES']; ?></span><br>
				<span class="event_display_span">LOCATION</span><br><span class="database_span"><?php echo $event_info['LOCATION']; ?></span><br>
				<span class="event_display_span">PRICE</span><br><span class="database_span"><?php echo $event_info['PRICE'].".00$"; ?></span><br>
				<span class="event_display_span">AMOUNTS</span><br> <span class="database_span"><?php echo $event_info['AMOUNTS']; ?></span><br>
				<span class="event_display_span">START</span><br><span class="database_span"> <?php echo $event_info['START']; ?></span><br>
				<span class="event_display_span">END</span><br><span class="database_span"><?php echo $event_info['END']; ?></span><br>
		
			<div id="edit_delete_container">
				<form method="post">
					<input type="submit" style="margin-right:50px;" class='logout_btn'name="return_all_events" value="Go back">
					<input type='submit'  class='logout_btn' name='Add_cart' value='Add to Cart'>
					<input type="hidden" name="add_event_category" value="<?php echo $event_info['CATEGORY']; ?>">
					<input type='hidden' name='add_event_name' value='<?php echo $event_info['EVENTNAME']; ?>'>
				</form>
			</div>
		</div>
	


		<?php
	}//END OF DISPLAY EVENT AND DISPLAY INFORMATION
	//|STARTING TO DISPLAY SEARCH
	}else if(isset($_POST["search_submit"]) && !isset($_POST["search_information_submit"])){

		if (!isset($_POST["search_input"])) {
			$_POST["search_input"] = "";	
		}
		if (!$_POST["search_input"] == "" || !$_POST["search_input"] == null) {
			$_SESSION["Searched_input"] = $_POST["search_input"];	
		}else{
			$_SESSION["Searched_input"] =$_POST["search_value_last"];
		}
		

		

		$search_result = $DB_object -> search_event($_SESSION["Searched_input"],$_SESSION["EVENT_TYPE"]);

		if(!empty($search_result)){

		//foreach (range(0,0) as $value) {
			for ($i=0; $i < count($search_result) ; $i++) { 



				$events[$i] = array(
					'ID' => $search_result[$i]["ID"],
					'EVENTNAME' => $search_result[$i]["EVENTNAME"],
					'CATEGORY' => $search_result[$i]["CATEGORY"],
					'DATES' => $search_result[$i]["DATES"],
					'START' => $search_result[$i]["START"],
					'END' => $search_result[$i]["END"],
					'LOCATION' => $search_result[$i]["LOCATION"],
					'PRICE' => $search_result[$i]["PRICE"],
					'AMOUNTS' => $search_result[$i]["AMOUNTS"]
					);

			}


			if (count($events)) {

		// Create the pagination object

				$pagination = new pagination($events, (isset($_GET['page']) ? $_GET['page'] : 1), 5);

		// Decide if the first and last links should show
				$pagination->setShowFirstAndLast(false);
		// You can overwrite the default seperator
				$pagination->setMainSeperator(' | ');
		// Parse through the pagination class
				$eventPages = $pagination->getResults();

		// If we have items 
				if (count($eventPages) != 0) {	
					if ($_SESSION["EVENT_TYPE"] == "humour") {
						$table_id_css = 'rounded_table_humour';
					}else if ($_SESSION["EVENT_TYPE"] == "sports") {
						$table_id_css = 'rounded_table_sports';
					}else if ($_SESSION["EVENT_TYPE"] == "concerts") {
						$table_id_css = 'rounded_table_concerts';
					}else if ($_SESSION["EVENT_TYPE"] == "theatrical") {
						$table_id_css = 'rounded_table_theatrical';
					}else if ($_SESSION["EVENT_TYPE"] == "movies") {
						$table_id_css = 'rounded_table_movies';
					}

					?>
					<table id="<?php echo $table_id_css; ?>">

						<caption>Events Available</caption>

						<thead>
							<tr>
								<th class="title">Event Name</th>
								<th class="Q1">Dates</th>
								<th class="Q2">Start</th>
								<th class="Q3">Venue</th>
								<th class="Q3">Ticket Price</th>
								<th class="Q3">Information</th>
								<th class="Q4">Add</th>
							</tr>
						</thead>

						<?php
						foreach ($eventPages as $EventArray) {
							?>
							<tbody>
							<tr>
							<td><?php echo $EventArray["EVENTNAME"]; ?></td>
							<td><?php echo $EventArray["DATES"]; ?></td>
							<td><?php echo $EventArray["START"]; ?></td>
							<td><?php echo $EventArray["LOCATION"]; ?></td>
							<td><?php echo $EventArray["PRICE"]; ?>.00$</td>
							<td>
							
							<form method='post'>
							<input type='submit'  class='logout_btn' name='search_information_submit' value='Info'>
							<input type='hidden' name='search_value' value='<?php echo $_SESSION["Searched_input"]; ?>'>
							<input type='hidden' name='event_hidden_id' value='<?php echo $EventArray['ID']; ?>'>
							<input type='hidden' name='event_hidden_category' value='<?php echo $_SESSION["EVENT_TYPE"]; ?>'>
							</td>
							<td><input type='submit'  class='logout_btn' name='Add_cart' value='Add to Cart'>
							<input type='hidden' name='add_event_name' value='<?php echo $EventArray['EVENTNAME']; ?>'><input type='hidden' name='add_event_category' value='<?php echo $EventArray['CATEGORY']; ?>'>
							</td>
							</form></td>
							<?php
							echo    "</tr>"	;		
							echo"</tbody>";


						}//END OF foreach

						?>
						<tfoot>
							<td class="footer_left" colspan="6"><em>Click on Info for full informations</em></td>
							<td class="footer_right">&nbsp;</td>
						</tfoot>	

					</table>
					<?php
				}//END OF IF(COUNT(EVENTPAGE))


	        // print out the page numbers beneath the results
	        // echo $pageNumbers;  
	        // Create the page numbers
				?><div class="pagination"><?php
				echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks($_GET).'</div>';
				?>
			</div>
			<form method="post">
				<input type="submit"  class ="logout_btn" style="margin-right:400px;" value="go back to Events">
			</form>
			<?php

		}//END OF IF(COUNT(EVENT))
		//IF ELSE FOR EMPTY RESULT SEARCH
	}else{

		?>

		<div style="margin-top:300px;margin-left:450px;">
			No entries found!

		</div>
		<?php




	}

}


//END OF ISSET SEARCH
	if (isset($_POST["search_information_submit"])) {
		$event_info = $DB_object -> get_event($_POST);

		$search_last = $_POST["search_value"];
					if ($_SESSION["EVENT_TYPE"] == "humour") {
						$event_display = 'event_display_humour';
					}else if ($_SESSION["EVENT_TYPE"] == "sports") {
						$event_display = 'event_display_sports';
					}else if ($_SESSION["EVENT_TYPE"] == "concerts") {
						$event_display = 'event_display_concerts';
					}else if ($_SESSION["EVENT_TYPE"] == "theatrical") {
						$event_display = 'event_display_theatrical';
					}else if ($_SESSION["EVENT_TYPE"] == "movies") {
						$event_display = 'event_display_movies';
					}
		?>

		
		<div id="<?php echo $event_display; ?>">
		
				<div class="event_name_display">
					<?php echo $event_info['EVENTNAME']; ?>
				</div>
				<span class="event_display_span">CATEGORY</span><br><span class="database_span"><?php echo $event_info['CATEGORY']; ?></span><br>
				<span class="event_display_span">DATE</span><br><span class="database_span"><?php echo $event_info['DATES']; ?></span><br>
				<span class="event_display_span">LOCATION</span><br><span class="database_span"><?php echo $event_info['LOCATION']; ?></span><br>
				<span class="event_display_span">PRICE</span><br><span class="database_span"><?php echo $event_info['PRICE'].".00$"; ?></span><br>
				<span class="event_display_span">AMOUNTS</span><br> <span class="database_span"><?php echo $event_info['AMOUNTS']; ?></span><br>
				<span class="event_display_span">START</span><br><span class="database_span"> <?php echo $event_info['START']; ?></span><br>
				<span class="event_display_span">END</span><br><span class="database_span"><?php echo $event_info['END']; ?></span><br>
			
			<div id="edit_delete_container">
				<form method="post">
					<input type="submit" style="margin-right:50px;" class='logout_btn' name="search_submit" value="Go back">
					<input type='submit'  class='logout_btn' name='Add_cart' value='Add to Cart'>
					<input type="hidden" name="add_event_name" value="<?php echo $event_info['EVENTNAME']; ?>">
					<input type="hidden" name="add_event_category" value="<?php echo $event_info['CATEGORY']; ?>">
					<input type="hidden" name="search_value_last" value="<?php echo $event_info['EVENTNAME']; ?>">
				</form>
			</div>
		</div>







	<?php
}

if (isset($_POST["Add_cart"])) {

					if ($_POST["add_event_category"] == "Humour") {
						$event_category = 'humour';
					}else if ($_POST["add_event_category"] == "Sports") {
						$event_category = 'sports';
					}else if ($_POST["add_event_category"] == "Concerts") {
						$event_category = 'concerts';
					}else if ($_POST["add_event_category"] == "Theatrical") {
						$event_category = 'theatrical';
					}else if ($_POST["add_event_category"] == "Movies") {
						$event_category = 'movies';
					}

	$array1 = array();
	$array1 = $DB_object -> array_push_assoc($array1, $event_category, $_POST["add_event_name"]);

	array_push($_SESSION["ITEMS"], $array1);

	
	if ($_SESSION["TIMER"]=="false"){
		$_SESSION["TIMER"]="true";
		$_SESSION["TIME_ENTRY"] = time();
		$_SESSION["TIME_LIMIT"] = (time()+180);
	}
	
  
   	
}
?>








