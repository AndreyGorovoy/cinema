<?php 
//Include the administrator navigation bar at the top of the page
include('anavbar.php');
//Include the database connection details to be used in SQL Queries
include('dbconf.php');
//Stop variables from reporting when they are not yet set
error_reporting(E_ERROR|E_PARSE);

//Link to the Twitter Bootstrap Style Sheet and create a form for the searching and addition of a film name
echo "<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
<body>
	<form action='' method='post' class='form-signin'>
		<h2 class='form-signin-heading'>Please search for the name and year of the film</h2>
		<p><input type='text' name='filmname' class='input-block-level' placeholder='Film Name'>
		<input type='number' name='year' class='input-block-level' placeholder='Year'>
		<button class='btn btn-large btn-primary' type='submit' value='submit'>Add Film</button>
	</form>";

//If submit button is pushed get film name and year
if(isset($_POST['submit'])){
if(isset($_GET['filmname'])){
if(isset($_GET['year'])){

}
}
}
//Set film name and year variables to what was entered by the user
$filmname=$_POST['filmname'];
$year=$_POST['year'];


//Encode the filmname into html format, replacing spaces with %20s
$filmname=urlencode("$filmname");
//Query the OMDB API with the film name and year allocated above
$query=file_get_contents("http://omdbapi.com/?t=$filmname&y=$year");
//Decode the JSON reply from the api into the variable reply
$reply=json_decode("$query");

//If there is a response from the server which matches the search criteria, set variables equal to the OMDB API reply 
if ($reply->Response=='True'){
$imdb_id = $reply->imdbID;
$film_name = $reply->Title;
$age_rating = $reply->Rated;
$year = $reply->Year;
$runtime = $reply->Runtime;
$release_date = $reply->Released;
$genre = $reply->Genre;
$description = $reply->Plot;
$director = $reply->Director;
$writers = $reply->Writer;
$language = $reply->Language;
$origin = $reply->Country;
$awards = $reply->Awards;
$metascore = $reply->Metascore;
$imdb_rating = $reply->imdbRating;
$imdb_votes = $reply->imdbVotes;
$image_loc = $reply->Poster;
$actors = $reply->Actors;

//Change release date format to Year/Month/Day from Day/Short Month/Year
$release_date=date('Y/m/d',strtotime($release_date));

//Create variable search with all information in pulled from the OMDB API
$search = "<body><table width='' border='0' cellpadding='5' align=''>
		<tr>
		<td align='center' valign='top' width =''>
			<img src=\"$reply->Poster\"> <br>
		</td>
		<td align='' valign='top' width ='250'>
			<b><u> <center>FILM DETAILS </center></u></b></p></p>
			<b>IMDB-ID : </b>".$imdb_id."</p>
			<b>Title :</b>".$reply->Title."</p>
			<b> Age Rating : </b>".$reply->Rated."</p>
			<b> Year : </b>".$reply->Year."</p>
			<b> Runtime : </b>".$reply->Runtime."</p>
			<b> Release Date: </b>".$reply->Released."</p>
			<b> Genre : </b>".$reply->Genre."</p>
			<b> Storyline : </b><br>".$reply->Plot."</p>
					</td>
			
			<td align='' valign='top' width ='250'>
			<b><u> <center>SPECIFIC DETAILS </center></u></b></p></p>			
			<b> Director : </b>".$reply->Director."</p>
			<b> Writer(s) : </b>".$reply->Writer."</p>
			<b> Actors : </b>".$reply->Actors."</p>
			<b> Language : </b>".$reply->Language."</p>
			<b> Country of Origin : </b>".$reply->Country."</p>
			<b> Awards : </b>".$reply->Awards."</p>
			<b> Metascore : </b>".$reply->Metascore."</p>
			<b> IMDB Rating : </b>".$reply->imdbRating."</p>
			<b> IMDB Votes : </b>".$reply->imdbVotes."</p>
		</td>
	</table>
</font></body>";
//Close while reply loop
}
//Display the response into a visual interface including all details outlined above
echo $search;
//Find any 's in the description and change it to \' for use in a MySQL query
$description=str_replace("'","\'",$description);
//Find any /s in the release date variable and replace them with nothing for use in the date MySQL query`
$release_date=str_replace("/","",$release_date);


//Create an SQL query with the insert into variables set to those defined and altered above
$sql = "INSERT INTO films(film_id, imdb_id, film_name, `age_rating`, `year`, `runtime`, `release_date`, `genre`, `description`, `director`, `writers`, `language`, `origin`, `awards`, `metascore`, `imdb_rating`, `imdb_votes`, `image_loc`, `actors`) VALUES  (NULL, '$imdb_id', '$film_name', '$age_rating', $year, '$runtime', $release_date, '$genre', '$description', '$director', '$writers', '$language', '$origin', '$awards', '$metascore', '$imdb_rating', '$imdb_votes', '$image_loc', '$actor')";
//run query and if successful 
if (mysqli_query($db,$sql)){
	//display the message:
	echo "<center><b>Film Successfully Added</b></center>";
}else{
//If query is unccessful display the message:
	echo "<center><b>Film Not Added, Please Try Again</center>";
}//Close query check loop
?>