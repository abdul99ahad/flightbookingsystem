<?php 
	include('../config/dbconnect.php');
	session_start();

	$i = $_SESSION['i'];
	$total = $_SESSION['total'];
	if ($i<$total) {
		$_SESSION['i'] = $i;
		$_SESSION['total'] = $total;
		header('Location:book-a-flight.php');
	}
	else {
		header('Location:flight_booking.php');
	}
 ?>