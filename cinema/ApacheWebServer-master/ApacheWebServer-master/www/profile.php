<?php
//Include the navigation bar at the top of the page
include('navbar.php');
//Include the session data (This includes the dbconf file)
include('session.php');
//Create SQL query to check for any bookings made by the user, including the venue, using the session data login_ses (USER_ID)
$sql="SELECT booking_id, film_name, email, venue_name, screening_date FROM bookings JOIN users USING (user_id) JOIN screenings USING (screening_id) JOIN films USING (film_id) JOIN venues USING (venue_id) WHERE user_id = '$login_ses' ORDER BY booking_id ASC";
//Run the query and feed the results into the variable bookings
$bookings=mysqli_query($db,$sql);
//Create a second sql query to select everything from bookings for the user ID
$sql2="Select * From bookings WHERE user_id = '$login_ses'";

//Run the second query and put the results into the variable check
if ($check=mysqli_query($db,$sql2)){
//checks the number of rows being received from tge cgeck query
	$rowcount=mysqli_num_rows($check);
} //Close run query loop

//If row count is not 0 then display bookings
if ($rowcount !=0){
//Displays column headings 
echo "<body>
<font size = '9'><center> <b> BOOKINGS</b><p></center></font>
<table width='' border='0' cellpadding='5' align='center'>
	<tr>
		<td align='center' valign='top' width ='350'>
		<b>Booking ID: </b>
		</td><td align='center' valign='top' width='350'>
		<b>Film Name: </b>
		</td><td align='center' valign='top' width='350'>
		<b>Venue Name:</b>
		</td><td align='center' valign='top' width='350'>
		<b>Screening Date: </b>
		</td>
	</tr>
</table></br>";

//while there is a next row forf the user bookings
while($row=mysqli_Fetch_array($bookings)){
//Pulls the variables from the database into PHP variables
    $booking_id=$row['booking_id'];
	$screening_date=$row['screening_date'];
	$film_name=$row['film_name'];
	$venue_name=$row['venue_name'];
	$screening_date=strtotime($screening_date);
//Changes date format from YYYMMDD to DDMMYYYY
	$screening_date=date('d/m/y', $screening_date);

//Displays the booking information
echo "<table width='' border='0' cellpadding='5' align='center'>
	<tr>
		<td align='center' valign='top' width ='350'>
			".$booking_id."
		</td>
		<td align='center' valign='top' width ='350'>
			".$film_name."
		</td>
		<td align='center' valign='top' width ='350'>
			".$venue_name."
		</td><td align='center' valign='top' width ='350'>
			".$screening_date."
		</td>
	</tr>
</table>
	</p></p>
</font></body>";
} //Close while loop

}else{
//if row count is 0 display message: (The user has no bookings)
	echo"<h2><center>You currently have no bookings </h2>";
} //Close row check loop
?>