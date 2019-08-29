<?php
	
	$database = mysqli_connect("localhost","root","nbuser","vaccine_network");/* servername, username, password, database*/

	if (!$database) {
		die("Connection failed".mysqli_connect_error());
	}

?>