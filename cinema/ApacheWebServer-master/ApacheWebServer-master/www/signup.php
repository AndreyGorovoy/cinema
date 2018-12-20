<?php
//Include the admin nav bar at the top of the page
include('navbar.php');
//Include the database configuration file to be used in SQL queries
include('dbconf.php');
?>
<!--Links to the twitter bootstrap styling page -->
<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
<body>
<!-- Adds a legend at the top of the page (below nav bar) as a title --> 	
		<legend><center><b>Sign Up</b></center></legend>
		<center>
		*Your email address will act as your username </br>
<!--Creates a form with text boxes for all of the required credentials to add a new user to the database -->		
<!--Also add a submit button that when pressed enters the information into the database -->
		<form id='register' action='signup.php' method='post'>
		<input type='hidden' name='submitted' id='submitted' value='1'/>
		<label for='name' > First Name: </label>
		<input type="text" name="forename" class="input-block-level" maxlength='60' style="width:210px" placeholder="Forename" /> 
		<label for='name' > Surname: </label>
		<input type="text" name="surname" class="input-block-level" maxlength='60' style="width:210px" placeholder="Surname" />
		<label for='name' > Date of Birth (YYYMMDD): </label>
		<input type="text" name="dob" class="input-block-level" maxlength='15' style="width:210px" placeholder="D.O.B" /></p>
		<label for='name' > Email address*: </label>
		<input type="text" name="email" class="input-block-level" maxlength='160' style="width:210px" placeholder="Email Address" />
		<label for='name' > Mobile Number: </label>
		<input type="text" name="mobile" class="input-block-level" maxlength='15' style="width:210px" placeholder="Mobile" /> </p>
		<label for='password'> Password: </label>
<!-- Type = password stops the password form being shown in plain text -->				
		<input type='password' name='password' class='input-block-level' align="right" valign="right" maxlength='40' style="width:210px" placeholder="Password" /> </p>
		<button class="btn btn-large btn-primary" type="submit" value="submit" style="width:300px">Sign Up</button></p>
		</form>
		</center>
		</br>
	</font>
	</body>
</html>
<?php
//Stops the error message thrown by empty variables as the submit button has not yet been pressed
error_reporting(E_ERROR|E_PARSE);

//If submit button is pressed
if($_SERVER["REQUEST_METHOD"] == "POST"){

//Set variables equal to the text boxes entered by the user
$forename=mysqli_real_escape_string($db, $_POST['forename']);
$surname=mysqli_real_escape_string($db, $_POST['surname']);
$dob=mysqli_real_escape_string($db, $_POST['dob']);
$email=mysqli_real_escape_string($db, $_POST['email']);
$mobile=mysqli_real_escape_string($db, $_POST['mobile']);
$pass=mysqli_real_escape_string($db, $_POST['password']);
//Hash the password to match that of the database using the sha1 hashing standard
$hash=sha1($pass);
//Create SQL statement using the variables made above
$sql="INSERT INTO users (user_id, fname, sname, dob, mobile, email, password) VALUES (NULL, '$forename', '$surname', '$dob', '$mobile', '$email', '$hash')";

//Run the sql query and if successful 
if(mysqli_query($db, $sql)){ 
//Display Message:
	echo "<center><b>Welcome to the ticketing System!</b></center>";
}else{//If unsuccessful display
	echo "<center><b>Sign Up Failed <br> please try again</b></center>";
}//close check loop
}//Close if submit pressed loop
//Close the database connection
mysqli_close($db);
?>