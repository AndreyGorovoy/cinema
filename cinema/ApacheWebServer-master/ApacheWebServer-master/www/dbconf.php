<?php
//Stop error reporting from being displayed to the user
error_reporting(E_ERROR|E_PARSE);
//Define a server address and port to test (This is the master)
$server = 'localhost';
//Define the username for the master server 
$user = 'jad';
//Define the password for the master server
$password = 'cnet343';
//Define the database to connect to
$database = 'cnet343proj';
//Connect to the server under these credentials
$dbcheck=mysqli_connect($server, $user, $password, $database);

//If connection works then use the credentials
if($dbcheck){
	
	//Define the location of the Master database server and Port
	define('DB_SERVER', 'localhost');
	//Define Database UserName
	define('DB_USERNAME', 'jad');
	//Define Database Password
	define('DB_PASSWORD', 'cnet343');
	//Define Database schema to connect to
	define('DB_DATABASE', 'cnet343proj');
	//Create variable $db with all connection details
	$db =  mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	//If connection fails then use the database credentials
 
 } else {

	//Define the location of the SLAVE server and port i.e. 127.0.0.1:3306 (see below for external example)	
	define('DB_SERVER', 'localhost');
	//Define the user name to login to the database server with
	define('DB_USERNAME', 'root');
	//Define the password to login to the database server with
	define('DB_PASSWORD', '');
	//Defines the database to be accessed on the server
	define('DB_DATABASE', 'cnet343proj');
	//Create variable $db with all connection details to be passed to requesting page
	$db =  mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	}
?>