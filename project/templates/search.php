<?php 
	include('../config/dbconnect.php');
	session_start();
	$flag = !null;
	if (isset($_POST['submit'])) {
		$ticket_no = $_POST['search'];
		$sql = "SELECT ticket_no,seat_no, ps_id FROM seat WHERE ticket_no=('$ticket_no')";
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
			$_SESSION['dest_id'] = $dest_id;
			$_SESSION['arrival_id'] = $arrival_id;
			$_SESSION['current_time'] = $current_time;
			$_SESSION['flight_no'] = $flight_no;
			$_SESSION['flight_class'] = $flight_class;
			$_SESSION['registration_id'] = $registration_id;

			header('Location:ticket_details.php');
		}
		else {
			$flag = null;
		}
		
		
	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<?php include('../public/files/links.php') ?>
	<style type="text/css">
		<?php include('../public/style1.css') ?>
		<?php include('../public/files/style_navbar.php') ?>
		body {
			background-image:url('../public/imgs/memphis-mini-dark.png');
		}
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
	                            <form class="card card-sm" action='search.php' method = 'POST'>
	                                <div class="card-body row no-gutters align-items-center">
	                                    <div class="col-auto">
	                                       <img src="101791-200.png" width='50px' height='50px'>
	                                    </div>
	                                    <!--end of col-->
	                                    <div class="col">
	                                        <input class="form-control form-control-lg form-control-borderless" type="search" name= 'search' placeholder="Search Ticket #...">
	                                    </div>
	                                    <!--end of col-->
	                                    <div class="col-auto">
	                                        <button class="btn btn-lg btn-success" type="submit" name = "submit">Search</button>
	                                    </div>
	                                    <!--end of col-->
	                                </div>
	                            </form>
	                        </div>
	                        
	                        <!--end of col-->
	                    </div>
	                    <div>
	                        	<?php if ($flag==null){
	                        		?><h1 class='haha text-center'>NO SUCH TICKET EXIST</h1> <?php
	                        	} ?>
	                        	
	                        </div>
	</div>
</body>
</html>