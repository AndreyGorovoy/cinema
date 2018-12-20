<?php
//Include Session Data
include('session.php');
//Include database Configuration for use in SQL queries
include('dbconf.php');
//Include administrator navigation bar at the top of the page
include('anavbar.php');
//Create SQL statement to pull all information from the users table
$sql="SELECT * FROM users";
//Run the SQL query 
$users=mysqli_query($db,$sql);
//Display titles for each column
echo"<body><table width='' border='0' cellpadding='5' align='left'>
	<tr>
		<td align='center' valign='top' width ='250'>
		<b>User ID </b>
		</td><td align='center' valign='top' width='250'>
		<b>User Email </b>
		</td><td align='center' valign='top' width='400'>
		<b>Password</b>
	</tr>
</table></br>";

//While there is more rows from the database results create variables with the information from each columns
while($row=mysqli_Fetch_array($users)){
//Display a table with the users ID, Email and Password (Hashed)
	$user_id=$row['user_id'];
	$email=$row['email'];
	$password=$row['password'];
	
	echo"<table width='' border='1' cellpadding='5' align='left'>
	<tr>
		<td align='center' valign='top' width ='250'>
			".$user_id."
		</td><td align='center' valign='top' width ='250'>
			".$email."
		</td>
		<td align='center' valign='top' width ='400'>
			".$password."
		</td>
	</tr>
	</table>
</body></br>";

} //Close while loop
?>

<body>
	<center><h2> Change a user password </h2>
	<form id='register' action='edituser.php' method='post'>
		<input type='hidden' name='submitted' id= 'submitted' value='1'/>
		<label for='name' > User ID: </label>
		<input type="text" name="userid" class="input-block-level" maxlength='2' placeholder="userid" /> </p>
		<label for='password'> New Password: </label>
		<input type='password' name='password' class='input-block-level' maxlength='40' placeholder="Password" /> </p>
		<button class="btn btn-large btn-primary" type="submit" value="submit" style="width:300px">Change Password</button></p></center>
	</center></form>
</body>
<!--Display form for administrators to change users passwords using the user id and new password
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
//If Submit button is pressed to change a users password
{
	//Put user id and new password into usable mysql Strings
	$userid = mysqli_real_escape_string($db, $_POST['userid']);
	$password2 = mysqli_real_escape_string($db, $_POST['password']);
//CREATE Second SQL query to update the dedicated user with the new password (hashed using sha1 standard in the query)
	$sql2 = "UPDATE cnet343proj.users SET password = SHA1('$password2') WHERE users.user_id = $userid;";
//cREATE Second SQL query to update the dedicated user with the new password (hashed using sha1 standard in the query)
if(mysqli_query($db, $sql2)){ 
//run query and if it works show message:
	echo "<center> Password Successfully Changed </center>";
}else{ //if query failed show message:
	echo "<center> Password Change Failed</center>";
} // close if query worked loop
} //Close if button is clicked loop
mysqli_close($db);
//Close MySQL connection
?>