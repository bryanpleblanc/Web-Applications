<?php

	session_start();
	
	include("connection.php");
	
	/* This stores the users entries from the textarea into the mysql database table */
	$query="UPDATE users SET diary='".mysqli_real_escape_string($link, $_POST['diary'])."'WHERE id='".$_SESSION['id']."' LIMIT 1";
	
	mysqli_query($link, $query);
	

?>

<!-- Strictly for testing the lines above -->
<form method="post">

<input name="journal"/>

<input type="submit"/>

</form>