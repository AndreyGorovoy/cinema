<?php
//Include Navigation bar at the top of the page
include('navbar.php');
//Include php session
include('session.php');
//Removes the warning messages from undefined variables before the submit button is pressed
error_reporting(E_ERROR|E_PARSE);
//Set variable film name to the film name passed into the URL
$film_name = $_GET["film"];

//Create SQL statement to pull all screening information from the database including venue names based on the film_name defined in the URL
$sql="SELECT * FROM screenings JOIN venues USING (venue_id) JOIN films USING (film_id) WHERE film_name LIKE '%$film_name%'";
//Run query and pass results into the variable result
$result=mysqli_query($db,$sql);

//Create a second SQL query to pull the screening information based on the film name
$sql2="SELECT * FROM screenings JOIN films USING (film_id) WHERE film_name LIKE '%$film_name%'";
//Run the second query and pass results into a variable called results2
$result2=mysqli_query($db,$sql2);

//Checks to see if a user is logged in, if they are display page if not display login message (At bottom of code)
if ($login_ses != null){
//Pass the user id into a usable SQL string
$user_id=mysqli_real_escape_string($db, $login_ses);

//Check to See if there are any screenings available for the selected film if there are run while loop
if($row2=mysqli_fetch_array($result2)){

//While there are more rows pass the results into the variables
while($row=mysqli_Fetch_array($result)){
	$screening_id=$row['screening_id'];
	$venue_name=$row['venue_name'];
	$screening_date=$row['screening_date'];
	$film_name=$row['film_name'];
	$age_rating=$row['age_rating'];
	$image_loc=$row['image_loc'];

//Display the available bookings in a table	
echo "<body>
	<center><table width='' border='0' cellpadding='5' align='center' valign='center'>
	<tr>
		<td align='left' valign='center' width='250'>
		<b>Screening ID: </b>".$screening_id."
		</td>
		<td align='left' valign='center' width ='250'>
		<b>Film: </b>".$film_name."
		</td><td align='left' valign='center' width ='250'>
		<b>Venue: </b>".$venue_name."
		</td><td align='left' valign='center' width ='250'>
		<b>Screening Date: </b>".$screening_date."
		</td>
	</tr></table>
	</body></center>";
}//Close while loop

}else{//If there are now screenings available display:

	echo "<h2><center>We're sorry there are no showings currently available for </br>".$film_name."</p> Please select a different film</p><a href ='index.php'> HOME</a></center></h2>";
}//Close screenings check if loop
//Display Booking form for users to enter screening ID and a submit button 
echo"
<form action='' method='POST'>
	<center><h2 class='form-signin-heading'>Please enter the screening id you wish to view and press book</h2>
		<p><input type='text' name='screeningid' class='input-block-level' placeholder='Screening ID'></p>
		<p><button class='btn btn-large btn-primary' type='submit' value='submit' name='book'>Book
	</center>
</form>";

//If submit button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
//Set the screening ID to a usable SQL String
	$screeningid=mysqli_real_escape_string($db, $_POST['screeningid']);
//Create a third SQL statement to insert a new booking into the database using the user ID and appropriate screening
	$sql3="INSERT INTO bookings (booking_id, user_id, screening_id) VALUES (NULL, '$user_id', '$screeningid')";

	//echo "badger";Used for testing to show that the button was working

//if submit is pressed run query and if it works 
if(mysqli_query($db, $sql3)){ 
//display message:
	echo "<center> Booking Successful </center>";
}else{	//If query failed display message:
	echo "<center> Error, Unable to Add booking,<br> Please try again </center>";
} //Close if sql3 loop
//Close database connection
mysqli_close($db); 
}
}else{ //If a user is not logged in display the message:
	echo "<h2><center> Please Login to book a ticket</center></h2>";
} //Close if not logged on loop
?>