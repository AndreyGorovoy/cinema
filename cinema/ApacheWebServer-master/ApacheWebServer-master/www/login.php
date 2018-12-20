<?php
//Include the navigation bar at the top of the page
include('navbar.php');
//include the database connection settings for use in SQL queries
include ("dbconf.php");
//Start a session
session_start();

//If login button is pressed (form below)
if($_SERVER["REQUEST_METHOD"] == "POST"){
//Pull variables from the text boxes in the form into usable MySQL Strings
	$email=mysqli_real_escape_string($db, $_POST['email']);
	$password=mysqli_real_escape_string($db, $_POST['pass']);
//Hash the password using the sha1 standard
	$securepassword=sha1($password);
//Create SQL statement to pull the user ID from the database if username and password match
	$sql="SELECT user_id  FROM users WHERE email='$email' and password='$securepassword'";
//Create the variable result into which the SQL results will be placed
	$result=mysqli_query($db,$sql);
//Pass results into an array called row
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//Count the number of rows returned
	$active=$row['active'];
	$count=mysqli_num_rows($result);

//If the number of rows is equal to 1 (A user is found)
if($count==1)
{
//Pass the email variable into session data as login_user
$_SESSION['login_user']=$email;
//If the user logged in is the administrator 
	if($email === 'admin@project.com'){
//Send User to the admin.php page
	header("location: admin.php");
	}else{
//If the user logged in is a normal user send them to the user profile page	
header("location: profile.php"); 
	} //Close direction if loop
}else{
//If user is not found in the database
 $error="User name or password is incorrect";
 } //Close check if user is logged in loop
 } //Close submit loop
?>
<!--Graphical Interface-->
<html lang="en"
<head>
    <meta charset="utf-8">
    <center><title>Sign In: Ticketing system</title></center>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Include the twitter bootstrap for page sylings -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<meta charset="utf-8">
		<meta name="devicefit" content="width=device-width, initial-scale=1.0">
		<meta name="decription" content="Signin for the ticketing system">
		<meta name="author" content="Andy Legassick 2015">
		
</head>
	<body>
<!-- Display the form by which users can enter sign in credentials -->
			<center><form action="" method="post" class="form-signin">
				<h2 class="form-signin-heading">Welcome to the Ticketing System <p>Please Sign in</p></h2>
				<p><input type="text" name="email" class="input-block-level" placeholder="E-mail Address"></p>
				<input type="password" name="pass" class="input-block-level" placeholder="Password"></p>
				<p><button class="btn btn-large btn-primary" type="submit" value="submit">Sign in</button></p>
			</form></center>
	</body>
</html>
