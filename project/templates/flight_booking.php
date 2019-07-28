<?php 
	include('../config/dbconnect.php');
	session_start();
	$arrival_id = $_SESSION['arrival_id'];
	$dest_id = $_SESSION['dest_id'];
	$flight_class = $_SESSION['flight_class'];
	$registration_id = $_SESSION['registration_id'];
	$credit_card_no = '';

	$sql = "SELECT flight_class_id FROM flight_class_relation WHERE flight_class = ('$flight_class')";
	$result = mysqli_query($conn,$sql);
	$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
	$flight_class_id = $info[0]['flight_class_id'];

	$ticket_no = mt_rand(100000,999999);
	//echo $_SESSION['registration_id'];

	if (isset($_POST["submit"])) {
		$credit_card_no = mysqli_real_escape_string($conn, $_POST['credit_card_no']);
		if (!$credit_card_no =="" && strlen($credit_card_no)==13) {
			$sql = "INSERT INTO account_details(registration_id,credit_card_no,ticket_no) VALUES('$registration_id','$credit_card_no','$ticket_no')";
			if(mysqli_query($conn,$sql)) {
				echo 'working';
				header('Location:ticket_details.php');
			}
		}
		
	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Flight Booking</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<?php include('../public/files/links.php') ?>
	<style type="text/css">
		body{
			background-image: url('../public/imgs/what-the-hex-dark.png');
			background-image: url('unsplash-edited.jpg');
			
			
		}
		<?php include('../public/style1.css') ?>
		<?php include('../public/files/style_navbar.php') ?>
		.nvb_wrap {
			background-color: rgb(7, 10, 26,0.8);

		}
		.logodiv{
			padding:15px;
		}
		.card {
			margin:40px 25%;
			border-radius: 3px;
			/*background-image: url('windowseat.jpg');*/
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
	.card-body {
		background-color:#e9ebf2;
	}
	</style>
</head>
<body>

	<?php include('../public/files/navbar.php') ?>
	<div class="card shadow ">
	  <div class="card-body">
	    <h1 class='cool-font text-center'> Your Flight Details are </h1>
		<?php 
				$sql = "SELECT arrival FROM arrival WHERE (arrival_id = '$arrival_id')";
				$result = mysqli_query($conn,$sql);

				$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
				foreach ($info as $details) {
					$arrival = $details['arrival'];
					break;
				}

				$sql = "SELECT dest FROM destination WHERE (dest_id = '$dest_id')";
				$result = mysqli_query($conn,$sql);

				$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
				foreach ($info as $details) {
					$destination = $details['dest'];
					break;
				}

				$sql = "SELECT flight_no, price FROM flight_booking WHERE (flight_class_id = '$flight_class_id') AND (arrival_id = '$arrival_id')";
				$result = mysqli_query($conn,$sql);
				$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
				foreach ($info as $details) {
					$flight_no = $details['flight_no'];
					$_SESSION['flight_no'] = $flight_no;
					$price = $details['price'];
					break;
				}
				$sql = "SELECT flight_class FROM flight_class_relation WHERE (flight_class_id = '$flight_class_id')";
				$result = mysqli_query($conn,$sql);
				$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
				foreach ($info as $details) {
					$flight_class = $details['flight_class'];
					break;
				}

			 ?>
		<p class='text-center'>
			Departure: <?php echo ucfirst($destination) ?> <br>
			Arrival : <?php echo ucfirst($arrival); ?> <br>
			Your Flight No is : <?php echo $flight_no; ?> <br>
			Flight Class: <?php echo $flight_class; ?> <br>
			Total Amount : <?php echo $price; ?> <br>
			<small> This price is for one ticket only. </small>
		</p>
		  </div>
	</div>
	<div class="card">
	<div class="card-body">
	    <form action="flight_booking.php" method="POST">
			<div class="form-row">
				<h1>Just one more step...</h1>
			    <div class="form-group col-md-12">
			    	<label for="credit_card_no">Credit Card No</label>
			      	<input type="text" name="credit_card_no"  class="form-control" placeholder="Enter Credit Card No..." id="credit_card_no" value= <?php echo $credit_card_no; ?>>
			      	<small style="color:red"><?php if (strlen($credit_card_no)!=13 && isset($_POST["submit"]))  {?>
			      		Invalid CNIC number! <?php } ?>
			      	</small>
			      	 <small style="color:red"><?php if($credit_card_no=='' && isset($_POST["submit"]) ) {

			      		?> Please enter credit card no. <?php
			      	} ?></small> 
			    </div>    
		   	</div>

		   	<div class="form-row">
			    <div class="form-group col-md-12">
			    	<label for="credit_card_id">CVV Number</label>
			      	<input type="number" name="credit_card_id"  class="form-control" placeholder="" id="credit_card_id" value=''>

			      	<small id="passwordHelpBlock" class="form-text text-muted">
					 Three digit pin at the back of your credit card.
					</small>
			    </div>    
		   	</div>

		   	<div class="form-row">
		   		<input type="submit" name="submit" value= "submit" class="btn btn-primary"> 
		   	</div>
		   </div>
		</form>

</body>
</html>