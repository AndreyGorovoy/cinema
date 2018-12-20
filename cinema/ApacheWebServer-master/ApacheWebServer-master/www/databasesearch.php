<?php
include("navbar.php")
//Include the navigation bar at the top of the page
?>
<link href="css/bootstrap.css" rel="stylesheet">
<body>
	<form action="" method="post" class="form-search" id="form-search">
		<h2 class="form-signin-heading">Please search for the name and year of the film</h2>
		<p><input type="text" name="filmname" class="input-block-level" placeholder="Film Name">
		<input type="number" name="year" class="input-block-level" placeholder="Year">
		<button class="btn btn-large btn-primary" type="submit" value="Search">Search</button>
	</form>
<!-- The above form presents a title, two text boxes for the search criteria and a button for the search to be undertaken -->
<?php
include ("dbconf.php"); 
//Include database configuration file to be used with SQL queries
error_reporting(E_ERROR|E_PARSE);
//Stops the variables from reporting that they are not yet set due to the search feature not yet being used
if($_SERVER["REQUEST_METHOD"] == "POST") //If button is pushed
{
$filmname=mysqli_real_escape_string($db, $_POST['filmname']);
//Get film name from the film name box and make it usable in MySQL Queries
$year=mysqli_real_escape_string($db, $_POST['year']);
//Get the year of the film from the year box and make it usable in MySQL Queries
$sql="SELECT * FROM films WHERE film_name LIKE '%$filmname%' AND Year LIKE '%$year%'";
//Create an SQL statement using $filmname and $year variables as search criteria
$result=mysqli_query($db,$sql);
//Run the query and put the results in the variable result
}
while($row=mysqli_Fetch_array($result)){
//While there is another row of results from teh database place them into the variables below	
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
	$release_date=strtotime($release_date);
	$release_date=date('d/m/y', $release_date);
	$film_book=urlencode($film_name);

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
		</table >
	<center><h3> </p> To view available screenings for ".$film_name." please click <a href='booking.php?film=".$film_book."'>here</a> </h3>
	<p></p></br>
	<table width='' border='0' cellpadding='5' align='center'>
</font></body>";
//The above echo displays all of the information from the search on the server into 3 column tables, one for the image, one for generic details and one for specific details
//The section starting with h3 presents the user with a button, if pressed the film_book criteria is passed into the url to be used by the bookings page  
}
//Close while loop
?>