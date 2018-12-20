<!--Link to the twitter bootstrap style sheet for the page -->
<link href="css/bootstrap.css" rel="stylesheet">

<?php
//Includes the navigation bar at the top of the page
include("navbar.php");
//Includes the Database Configuration file to be used in SQL queries on the page
include("dbconf.php");

//Define the SQL query to be run in the variable $sql
$sql="SELECT * FROM films";
//Run the query and put the results into a variable called result
$result=mysqli_query($db,$sql);
//Count the number of rows received from the server
$count=mysqli_num_rows($result);

//While there are more rows from the servers response add each column into a varable (shown below)
while($row=mysqli_Fetch_array($result)){

	$film_id=$row['film_id'];
	$imdb_id=$row['imdb_id'];
	$film_name=$row['film_name'];
	$age_rating=$row['age_rating'];	
	$year=$row['year'];
	$runtime=$row['runtime'];
	$release_date=$row['release_date'];
	$genre=$row['genre'];
	$description=$row['description'];
	$director=$row['director'];
	$writers=$row['writers'];
	$language=$row['language'];
	$origin=$row['origin'];
	$awards=$row['awards'];
	$metascore=$row['metascore'];
	$imdb_rating=$row['imdb_rating'];
	$imdb_votes=$row['imdb_votes'];
	$image_loc=$row['image_loc'];
	$actors=$row['actors'];
//Change the release_Date from a string to a time/date function
	$release_date=strtotime($release_date);
//Format the date being shown from YYYMMDD to DDMMYY for more natural reading
	$release_date=date('d/m/y', $release_date);
//Make the variable film_name usable in a url for booking
	$film_book=urlencode($film_name);

//Display all of the information from the server into 3 column tables, one for the image, one for generic details and one for specific details
//The section starting with h3 presents the user with a button, if pressed the film_book criteria is passed into the url to be used by the bookings page  
echo "<body><table width='' border='0' cellpadding='5' align='center'>
	<tr>
		<td align='center' valign='top' width ='350'>
			<img src=\"$image_loc\"> <br>
		</td>
		<td align='' valign='top' width ='350'>
			<b><u> <center>FILM DETAILS </center></u></b></p></p>
			<b>IMDB-ID : </b>".$imdb_id."</p>
			<b>Title : </b>".$film_name."</p>
			<b> Age Rating : </b>".$age_rating."</p>
			<b> Year : </b>".$year."</p>
			<b> Runtime : </b>".$runtime."</p>
			<b> Release Date: </b>".$release_date."</p>
			<b> Genre : </b>".$genre."</p>
			<b> Storyline : </b><br>".$description."</p>
		</td>
		<td align='' valign='top' width ='350'>
			<b><u> <center>SPECIFIC DETAILS </center></u></b></p></p>			
			<b> Director : </b>".$director."</p>
			<b> Writer(s) : </b>".$writers."</p>
			<b> Actors : </b>".$actors."</p>
			<b> Language : </b>".$language."</p>
			<b> Country of Origin : </b>".$origin."</p>
			<b> Awards : </b>".$awards."</p>
			<b> Metascore : </b>".$metascore."</p>
			<b> IMDB Rating : </b>".$imdb_rating."</p>
			<b> IMDB Votes : </b>".$imdb_votes."</p>
		</td>
	</tr>
	</table >
	<center><h3> </p> To view available screenings for ".$film_name." please click <a href='booking.php?film=".$film_book."'>here</a> </h3>
	<p></p></br>
	<table width='' border='0' cellpadding='5' align='center'>
</font></body>";

}//Close while loop
?>