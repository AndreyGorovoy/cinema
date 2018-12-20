<?php
//Include the admin navigation bar at the top of the page
include('anavbar.php');
//Include database configuration file to be used in SQL queries
include('dbconf.php');
?>

<!--Link to the twitter Bootstrap style sheet -->
<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
<body>
		<legend><center><b>Add a Screening</b></center></legend>
<!--Create a form for the information needed to add a venue into the database -->				
		<form id='addscreening' align = 'center' action='screening.php' method='post'>
		<input type='hidden' name='submitted' id='submitted' value='1'/> 
		<label for='name' > Venue ID: </label>
		<input type="text" name="venueid" class="input-block-level" maxlength='11' style="width:210px" placeholder="Venue ID" />
		</p><label for='name' > Film ID: </label>
		<input type="text" name="filmid" class="input-block-level" maxlength='11' style="width:210px" placeholder="Film ID" />
		</p><label for='name' > Screening Date (YYYMMDD): </label>
		<input type="text" name="screeningdate" class="input-block-level" maxlength='8' style="width:210px" placeholder="Screening Date" /> </p>
		<label for='name'> Screen Number: </label>
		<input type='text' name='screennum' class='input-block-level' maxlength='2' style="width:210px" placeholder="Screen Number" /> </p>
		<button class="btn btn-large btn-primary" type="submit" value="submit" style="width:300px">Add Screening</button></p>
		</form>
		</br>
	</font>
	</body>
</html>

<?php
//Stops the variables from throwing an error message as they have not yet been declared
error_reporting(E_ERROR|E_PARSE);
//If submit button is pressed
if($_SERVER["REQUEST_METHOD"] == "POST"){
//Set variables pulled from the form into MySQL usable strings
$venue_id=mysqli_real_escape_string($db, $_POST['venueid']);
$film_id=mysqli_real_escape_string($db, $_POST['filmid']);
$screening_date=mysqli_real_escape_string($db, $_POST['screeningdate']);
$screen_num=mysqli_real_escape_string($db, $_POST['screennum']);

//Create an INSERT INTO SQL statement using the above variables
$sql="INSERT INTO screenings (screening_id, venue_id, film_id, screening_date, screen_number) VALUES (NULL, '$venue_id', '$film_id', $screening_date, '$screen_num')";

//If query runs successfully 
if(mysqli_query($db, $sql)){
//display message:
	echo "<center><b>Screening Successfully Added</b></center>";
}else{
//If query fails to run
	echo "<center><b>Addition failed <br> please try again</b></center>";
} //Close if query runs loop
} //Close if button pressed loop
?>

<?php
//Create a Second SQL statement to select venue information and display in ascending order
$sql2="SELECT venue_id, venue_name from venues ORDER BY venue_id ASC";
//Run the second SQL query and put the results into a variable called result2
$result2=mysqli_query($db,$sql2);

//While the second query has a next row
while($row2=mysqli_Fetch_array($result2)){
//Put the venue id and name from the query results into PHP variables
	$venueid=$row3['venue_id'];
	$venuename=$row3['venue_name'];

//Display venue ID and Name for use in the add a screening process
echo "<table width='' border='2' cellpadding='5' align='left'>
	<tr>
		<td align='center' valign='center' width ='100'>
			<center><b>Venue ID:</b></center></td><td> <center>".$venueid."
			</cetner></td></tr><tr><td align='center' valign='center'>
			<b>Venue Name:</td><td><center> </b>".$venuename."</p>
		</center></td>
	</tr>
</p>
</body>";

} //Close while loop
//Close the table after the loop has finished
echo"</table>";
?>