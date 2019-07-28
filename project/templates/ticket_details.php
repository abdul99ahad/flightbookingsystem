<?php 
	include('../config/dbconnect.php');
	session_start();
	$arrival_id = $_SESSION['arrival_id'];
	$dest_id = $_SESSION['dest_id'];
	$flight_class = $_SESSION['flight_class'];
	$flight_no = $_SESSION['flight_no'];
	$registration_id = $_SESSION['registration_id'];
	$current_time = $_SESSION['current_time'];


	$sql = "SELECT full_name FROM registration WHERE registration_id = ('$registration_id')";
	$result = mysqli_query($conn,$sql);
	$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
	$full_name = $info[0]['full_name'];

	$sql = "SELECT cnic,passenger_id FROM register_passenger WHERE registration_id = ('$registration_id')";
	$result = mysqli_query($conn,$sql);
	$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
	//print_r($info);
	$passenger_id = [];
	foreach($info as $userDetails) {
		$cnic_registration = $userDetails['cnic'];
		array_push($passenger_id,$userDetails['passenger_id']);
	}
	/*print_r($passenger_id);
	echo $cnic_registration;*/
	
	$sql = "SELECT arrival,arrival_time,arrival_date FROM arrival  WHERE arrival_id = '$arrival_id'";
	$result = mysqli_query($conn,$sql);
	$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	$arrival = $info[0]['arrival'];
	$arrival_time = $info[0]['arrival_time'];
	$arrival_date = $info[0]['arrival_date'];

	$sql = "SELECT dest,destination_date,destination_time FROM destination  WHERE dest_id = '$dest_id'";
	$result = mysqli_query($conn,$sql);
	$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	$dest = $info[0]['dest'];
	$destination_date = $info[0]['destination_date'];
	$destination_time = $info[0]['destination_time'];

	$sql = "SELECT ticket_no FROM account_details WHERE registration_id=('$registration_id')";
	$result = mysqli_query($conn,$sql);
	$info = mysqli_fetch_all($result,MYSQLI_ASSOC);

	$ticket_no = $info[0]['ticket_no'];
	for ($i=0;$i<count($passenger_id);$i++) {
		$seat_no = mt_rand(101,999);
		$ps_id = $passenger_id[$i];
		$sql = "INSERT INTO seat(seat_no,ticket_no,ps_id) VALUES('$seat_no','$ticket_no','$ps_id')";
		mysqli_query($conn,$sql);
	}



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Ticket Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<?php include('../public/files/links.php') ?>
	<style type="text/css">

		body {
			background-image: url('../public/imgs/memphis-mini-dark.png');
			background-image: url('full-size.jpg');

		}
		<?php include('../public/style1.css') ?>
		<?php include('../public/files/style_navbar.php') ?>
		.nvb_wrap {
			background-color: rgb(7, 10, 26,0.8);

		}
		.logodiv{
			padding:15px;
		}
		@font-face {
		  font-family: ticketfont;
		  src: url("APEX.otf");
	}
	h1 {
		margin:10px auto;
		font-family: ticketfont;
		font-size: 50px;

	}
	.text-right {
		margin:10px;
	}
	.card {
			margin:40px 25%;
			border-radius: 10px;
			/*background-image: url('windowseat.jpg');*/
		}
		.shadow {
	  -webkit-box-shadow: 3px 3px 5px 6px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
	  -moz-box-shadow:    3px 3px 5px 6px #ccc;  /* Firefox 3.5 - 3.6 */
	  box-shadow:         3px 3px 5px 6px #ccc;  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
	}
	p {
		color:black;
	}
	.book-flight {
			position: absolute;
	  		right: 0px;
	  		margin-right:80px;
	  		margin-bottom: 50px;
			font-size: 20px;
			color: #fff;
			text-decoration: none;
			border: 2px solid ##0a0e21;
			border-radius: 0;
			display: inline-block;
			padding: 15px 25px;
			transition: all 0.3s ease-in-out;
			background-color: #0a0e21;

		}
		.book-flight:hover{
			text-decoration: none;
			color:black;
			background-color: #323f7a;
			border: 2px solid #323f7a;
			transition: all 0.3s ease-in;
		}
	</style>
</head>
<body>

	
	<?php include('../public/files/navbar.php') ?>
	
	<h1 class='text-center'>TICKET DETAILS</h1>
	<?php 
		for($i=0;$i<count($passenger_id);$i++) {
			$ps_id = $passenger_id[$i];
			$sql = "SELECT first_name,last_name FROM passenger_details_primary WHERE passenger_id = ('$ps_id')";
			$result = mysqli_query($conn,$sql);
			$info = mysqli_fetch_all($result,MYSQLI_ASSOC);

			$name = $info[0]['first_name'] . ' ' . $info[0]['last_name'];




			?> <div class="card shadow ">
				 	<div class="card-body">
				 		<div class="row">
							<div class="col "></div>
							<div class="col"> </div>
							<div class="col"> <p class='text-muted'> Tickets Booked By <?php echo $full_name ?> </p>  </div>
						 </div>
						 <div class="row" >
							<div class="col "></div>
							<div class="col"> </div>
							<div class="col"> <p class='text-muted'> Dated <?php echo $current_time ?> </p>  </div>
						 </div>
						 <div class="row" style="border-bottom: 1px dotted #dadbe0; margin:auto 6px;margin-bottom: 10px;">
							<div class="col "></div>
							<div class="col"> </div>
							<div class="col"> <p class='text-muted'> Ticket #  <?php echo $ticket_no ?> </p>  </div>
						 </div>
						<p> Name: <?php echo $name; ?></p>
						<div class="row">
							<div class="col"><p> Departure: <?php echo strtoupper($dest); ?> </p></div>
							<div class="col"> <p> Depart Date:   <?php echo $destination_date; ?></p> </div>
							<div class="col"> <p> Depart Time:   <?php echo $destination_time; ?></p> </div>
						 </div>
						<div class="row">
							<div class="col"><p> Arrival: <?php echo strtoupper($arrival); ?> </p></div>
							<div class="col"> <p> Arrival Date:   <?php echo $arrival_date; ?></p> </div>
							<div class="col"> <p> Arrival Time:   <?php echo $arrival_time; ?></p> </div>
						 </div>
						 <div class="row">
							<div class="col"><p> Flight-No: <?php echo $flight_no; ?> </p></div>
							<div class="col"></div>
							<div class="col"> <p> Flight Class:   <?php echo $flight_class; ?></p> </div>
							
						 </div>
						  <div class="row">
							<div class="col"><p> Seat No <?php echo $seat_no; ?> </p></div>
							<div class="col"> </div>
							<div class="col"> <img src="barcode2.png" width='150px' height='70px'> </div>
							
						 </div>
					</div>
				</div>
			<?php  
		} 

		/*for($i=0;$i<count($passenger_id);$i++) {
			$ps_id = $passenger_id[$i];
			$sql = "SELECT first_name,last_name FROM passenger_details_primary WHERE passenger_id = ('$ps_id')";
			$result = mysqli_query($conn,$sql);
			$info = mysqli_fetch_all($result,MYSQLI_ASSOC);

			$name = $info[0]['first_name'] . ' ' . $info[0]['last_name'];
			

			echo "Name: " . $name; 
			echo 'Arrival: ' . $arrival;
			echo $arrival_time;
			echo $arrival_date;
			echo 'Destination: ' . $dest;
			echo 'Flight no: '. $flight_no;
			echo 'Flight Class: '. $flight_class;
	} */?>

	 <a href="../public/index.php" class="book-flight text-right"> BACK TO HOME > </a>

</body>
</html>