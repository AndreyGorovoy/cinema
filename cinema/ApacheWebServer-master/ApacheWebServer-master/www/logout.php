<?php
session_start();
//if logout button is pushed destroy the running session and send the user back to the home page
if(session_destroy())
{
header("Location: index.php");
}

?>