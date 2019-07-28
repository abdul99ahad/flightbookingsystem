<?php 
	include('../config/dbconnect.php');
	session_start();
	//$flag = !null;
	$flag = 0;
	if (isset($_POST['submit'])) {

		$ticket_no = $_POST['search'];
		
		$sql = "SELECT seat_no,ticket_no,ps_id FROM seat WHERE ticket_no=('$ticket_no')";
		$result = mysqli_query($conn,$sql);
		$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
		
		if (!$info==[]) {

			$ps_id = $info[0]['ps_id'];
			$sql = "SELECT registration_id FROM register_passenger WHERE passenger_id = ('$ps_id')";
			$result = mysqli_query($conn,$sql);
			$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
			$registration_id = $info[0]['registration_id'];

			$sql = "SELECT dest_id,arrival_id,time_rn FROM registration WHERE registration_id = ('$registration_id')";
			$result = mysqli_query($conn,$sql);
			$info = mysqli_fetch_all($result,MYSQLI_ASSOC);

			$dest_id = $info[0]['dest_id'];
			$arrival_id = $info[0]['arrival_id'];
			$current_time = $info[0]['time_rn'];

			$sql = "SELECT flight_no,flight_class_id FROM flight_booking WHERE arrival_id=('$arrival_id')";
			$result = mysqli_query($conn,$sql);
			$info = mysqli_fetch_all($result,MYSQLI_ASSOC);

			$flight_no = $info[0]['flight_no'];
			$flight_class_id = $info[0]['flight_class_id'];

			$sql = "SELECT flight_class FROM flight_class_relation WHERE flight_class_id=('$flight_class_id')";
			$result = mysqli_query($conn,$sql);
			$info = mysqli_fetch_all($result,MYSQLI_ASSOC);

			$flight_class = $info[0]['flight_class'];

			// DELETING DATA 

			$sql = "DELETE FROM registration WHERE registration_id=('$registration_id')";
			mysqli_query($conn,$sql);
			$sql = "DELETE FROM passenger_details_primary WHERE registration_id=('$registration_id')";
			mysqli_query($conn, $sql);
			$sql = "DELETE FROM register_passenger WHERE registration_id=('$registration_id')";
			mysqli_query($conn, $sql);
			$sql = "DELETE FROM seat WHERE ticket_no=('$ticket_no')";
			mysqli_query($conn, $sql);
			$sql = "DELETE FROM account_details WHERE ticket_no=('$ticket_no')";
			mysqli_query($conn, $sql);
			$sql = "SELECT price FROM flight_booking WHERE flight_no = ('$flight_no')";
			$result = mysqli_query($conn,$sql);
			$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
			$price = $info[0]['price'];
			print_r($price);
			echo 'price';
			$amount_deducted = $price * 0.25;
			$amount_refunded = $price - $amount_deducted;

			$sql = "INSERT INTO flight_cancel(amount_refunded,amount_deducted,ticket_no,registration_id) VALUES('$amount_refunded','$amount_deducted','$ticket_no','$registration_id')";
			if(mysqli_query($conn,$sql)) {
				$flag = !null;
			}




			/*$_SESSION['dest_id'] = $dest_id;
			$_SESSION['arrival_id'] = $arrival_id;
			$_SESSION['current_time'] = $current_time;
			$_SESSION['flight_no'] = $flight_no;
			$_SESSION['flight_class'] = $flight_class;
			$_SESSION['registration_id'] = $registration_id;*/
		}

		else {
			
			$flag = null;
		}
	}
	else {

	}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../public/style1.css">
	<?php include('../public/files/links.php') ?>
	<style type="text/css">

		body {
			background-image: url('maxresdefault.jpg');
			background-image: url('../public/imgs/what-the-hex-dark.png');
			
		}

		<?php include('../public/style1.css') ?>
		<?php include('../public/files/style_navbar.php') ?>
		.nvb_wrap {
			background-color: rgb(7, 10, 26,0.8);

		}
		.logodiv{
			padding:15px;
		}
		.form-control-borderless {
	    border: none;
		}

		.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
		    border: none;
		    outline: none;
		    box-shadow: none;
		}
		.btn-success {
			background-color: #000000;
			border-color: #000000;
		}
		.btn-success:hover {
			background-color: #ffff;
			color: #000000;
			border-color: #000000;
		}
		.card {
			border-radius: 25px;
		}
		.card-main {
			margin:40px 25%;
			border-radius: 3px;
			/*background-image: url('windowseat.jpg');*/
		}
		.card-body-main {
			background-color: #dedfe3;
		}
		.shadow {
	  -webkit-box-shadow: 3px 3px 5px 6px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
	  -moz-box-shadow:    3px 3px 5px 6px #ccc;  /* Firefox 3.5 - 3.6 */
	  box-shadow:         3px 3px 5px 6px #ccc;  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
	}
	@font-face {
		  font-family: all_pony;
		  src: url("all_pony.otf");
	}
	.text-center {
		font-family: 'Martel Sans', sans-serif;
		padding:inherit;
		color:black;
		font-size: 1.1rem;
	}
	h1 {
		font-family: 'Voltaire', sans-serif;
		
	}

		
	.cool-font{
			
			margin-top:20px;
			color: black;
			font-family: all_pony;
			font-size: 70px;
			border-bottom: solid #e0e0e0;

		}
	@font-face {
		  font-family: brushield;
		  src: url("imgs/brushield/Brushield.otf");
	}
	.haha {
			font-family: brushield;
			color:white;
			font-size: 80px;
			margin:50px auto;
	}
	

	</style>
</head>
<body>
	<?php include('../public/files/navbar.php') ?>
	<div class="container">
	    <br/>
		<div class="row justify-content-center">
	                        <div class="col-12 col-md-10 col-lg-8">
	                            <form class="card card-sm" action='cancel_flight.php' method = 'POST'>
	                                <div class="card-body row no-gutters align-items-center">
	                                    <div class="col-auto">
	                                       <img src="sad.png" width='60px' height='50px'>
	                                    </div>
	                                    <!--end of col-->
	                                    <div class="col">
	                                        <input class="form-control form-control-lg form-control-borderless" type="search" name= 'search' placeholder="Enter Ticket No...">
	                                    </div>
	                                    <!--end of col-->
	                                    <div class="col-auto">
	                                        <button class="btn btn-lg btn-success" type="submit" name = "submit">Delete?</button>
	                                    </div>
	                                    <!--end of col-->
	                                </div>
	                            </form>

	                        </div>
	                        
	                        <!--end of col-->
	                    </div>

	                    <?php if($flag == null && isset($_POST['submit'])){  ?>
	                    	<h1 class='haha text-center'>No ticket found</h1>
	                    <?php } ?>
	                    <?php if($flag != null && isset($_POST['submit']) ) { ?>
	                    	<div class="card card-main shadow ">
								  <div class="card-body card-body-main">
								    <h1 class='cool-font text-center'> Your flight has been cancelled successfully. </h1>
									<p class='text-center'>Amount Refunded: <?php echo $amount_refunded; ?> Rs</p>
									<p class="text-center">Amount Detucted: <?php echo $amount_deducted; ?> Rs </p>
									<p class="text-center">Flight No: <?php echo $flight_no; ?> </p>
									<p class="text-center">Ticket No:  <?php echo $ticket_no; ?> </p>
									  </div>
								</div>

	                    <?php } ?>
	                  
							                   
</body>
</html>