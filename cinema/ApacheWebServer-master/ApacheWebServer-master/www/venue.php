<?php
//Include the administrator navigation bar at the top of the page
include('anavbar.php');
//Include the database configuration file to be used in MySQL queries
include('dbconf.php');
?>

<!--Link to the twitter bootstrap styling sheet -->
<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
<body>
<!--Adds a legand at the top of the form as a title -->
		<legend><center><b>Add a Venue</b></center></legend>
<!--Display a form for the administrator to input the required information to add a venue -->		
		<form id='addvenue' align = 'center' action='venue.php' method='post'>
		<input type='hidden' name='submitted' id='submitted' value='1'/> 
		<label for='name' > Venue Name: </label>
		<input type="text" name="venue_name" class="input-block-level" maxlength='60' style="width:210px" placeholder="Venue name" />
		</p><label for='name' > Postcode: </label>
		<input type="text" name="postcode" class="input-block-level" maxlength='10' style="width:210px" placeholder="Postcode" />
		</p><label for='name' > Latitude coordinates: </label>
		<input type="text" name="latitude" class="input-block-level" maxlength='160' style="width:210px" placeholder="latitude" /> </p>
		<label for='name'> Longitude coordinates: </label>
		<input type='text' name='longitude' class='input-block-level' maxlength='160' style="width:210px" placeholder="Longitude" /> </p>
		<button class="btn btn-large btn-primary" type="submit" value="submit" style="width:300px">Add Screening</button></p>
		</form>
		</br>
	</font>
	</body>
</html>

<?php
//Stop the variables displaying an error message as they are not yet set
error_reporting(E_ERROR|E_PARSE);
//If submit button is clicked	
if($_SERVER["REQUEST_METHOD"] == "POST"){
//Put the information from the text form into variables that can be used by MySQL queries
$venue_name=mysqli_real_escape_string($db, $_POST['venue_name']);
$postcode=mysqli_real_escape_string($db, $_POST['postcode']);
$latitude=mysqli_real_escape_string($db, $_POST['latitude']);
$longitude=mysqli_real_escape_string($db, $_POST['longitude']);

//Create an SQL statement to add these variables into the venue table to add a venue
$sql="INSERT INTO venues (venue_id, venue_name, postcode, latitude, longitude) VALUES (NULL, '$venue_name', '$postcode', '$latitude', '$longitude')";

//If MySQL query is run and is successful 
if(mysqli_query($db, $sql)){ 
//display the message:
	echo "<center><b>Venue Successfully Added</b></center>";
}else{
//If the Query fails then display the message:
	echo "<center><b>Addition failed <br> please try again</b></center>";
} //Close the query check statement
} //Close the if submit is pressed link
?>