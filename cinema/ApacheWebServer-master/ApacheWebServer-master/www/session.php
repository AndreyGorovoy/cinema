<?php
//Include the db configuration details for use in SQL Queries
include('dbconf.php');
//Start a session
session_start();
//Stop error reporting from undefined variables if a unser is not logged in
error_reporting(E_ERROR|E_PARSE);

//Create a variable called check that is equal too the login_user session information
$check=$_SESSION['login_user'];
//Create and run an SQL statement to check the user id from users where the email is equal too the login user email
$ses_sql=mysqli_query($db,"SELECT user_id FROM users WHERE email='$check' ");
//Feed the results into a variable called row
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
//Set a variable login_Ses to the user ID pulled from the database
$login_ses=$row['user_id'];
?>