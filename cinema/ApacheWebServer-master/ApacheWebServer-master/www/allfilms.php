<?php
//Include the administrator navigation bar at the top of the page
include("anavbar.php")
?>
<!-- Link to the bootstrap style sheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<?php
//Include the database configuration for use in sql queries
include ("dbconf.php");

//Create sql query in variable $sql to select all information from films table
$sql="SELECT * FROM films";
//Run query and place results into the variable $result
$result=mysqli_query($db,$sql);
//Count the number of rows returned and place in the variable $count
$count=mysqli_num_rows($result);

//While there is another row in $result
while($row=mysqli_Fetch_array($result)){
//Set variables equal to table fields
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
//Change release_date to a time/date format
	$release_date=strtotime($release_date);
//Change the date format to Day/Month/Year from Year/Month/Day
	$release_date=date('d/m/y', $release_date);
//Url encode the film_name of each to be used in the booking process
	$film_book=urlencode($film_name);
//Display the results from the database table in an html table	
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
			</br>
		</td>
	</tr>
	</table >
	</body>";
}
//echo $row;
?>