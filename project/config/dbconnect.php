<?php 
	#Creating a connection
	$conn = mysqli_connect('localhost','abdulahad','pakistan123','airline');

	#Checking the db
	if (!$conn) {
		echo 'Connection error '. mysqli_connect_error();
	}
	
 ?>