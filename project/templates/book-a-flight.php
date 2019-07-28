<?php 

	include('../config/dbconnect.php');
	session_start(); //always start session don't forget!!
	$registration_id = $_SESSION['registration_id'];
	//$total = $_SESSION['total'];
	$i = $_SESSION['i'];
	$total = $_SESSION['total'];
	/*if (!isset($check_total_ps)) {
		$check_total_ps = $_SESSION['check_total_ps'];
		echo 'not set';
	}
	else {
		$check_total_ps++;
		echo 'set';
	}*/
	
	//echo $registration_id;
 	// Generating unique PNR number
	/*$generated_pnr = mt_rand(100000,999999);
	$pnr = "SELECT pnr FROM passenger_details_primary"
	$result = mysqli_query($conn, $pnr);
	$info = mysqli_fetch_all($result,MYSQLI_ASSOC);

	foreach($info as $pnr) {
		foreach($pnr as $pnr_no) {
			if ($generated_pnr == $pnr_no) {
				$generated_pnr = mt_rand(100000,999999);				}
			}
	}

	echo $generated_pnr;*/

	

	$first_name = $last_name = $email = $contact_no = $date_of_birth = $postal_address = $country = $cnic = $passport_no = $gender =  '';
	if (isset($_POST["submit"])) {
		
		$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
		$date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
		$postal_address = mysqli_real_escape_string($conn, $_POST['postal_address']);
		$country = mysqli_real_escape_string($conn, $_POST['country']);
		$cnic = mysqli_real_escape_string($conn, $_POST['cnic']);
		$passport_no = mysqli_real_escape_string($conn, $_POST['passport_no']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$flight_class = mysqli_real_escape_string($conn, $_POST['flight_class']);

		if(!$first_name == "" && !$last_name =="" && !$email =="" && !$contact_no =="" && !$date_of_birth =="" && !$postal_address =="" && !$country=="" &&  !$cnic == "" && !$passport_no == "" && !$gender =='') {
			$_SESSION['flight_class'] = $flight_class;

			$sql = "INSERT INTO 
			passenger_details_primary(registration_id,first_name,last_name,email,contact_no,gender,postal_address,country,date_of_birth,passport_number)
			 VALUES
			 ('$registration_id','$first_name','$last_name','$email','$contact_no','$gender','$postal_address','$country','$date_of_birth','$passport_no')"
			 ;
			 if (mysqli_query($conn,$sql)) {
			 	$passenger_id = mysqli_insert_id($conn);
				echo $passenger_id;
			 }
			
			$sql = "INSERT INTO register_passenger(cnic,registration_id,passenger_id) VALUES('$cnic','$registration_id','$passenger_id')";
			//mysqli_query($conn,$sql);
			//echo $check_total_ps . " times";
			if(mysqli_query($conn,$sql)) {
				$i++;
				$_SESSION['i'] = $i;
				$_SESSION['total'] = $total;
				header('Location:check.php');
				// $check_total_ps++;
				// $_SESSION['check_total_ps'] = $check_total_ps ;
				// header('Location:check.php');
			}



				/*if ($check_total_ps <= $total) {
					$_SESSION['check_total_ps'] = $check_total_ps;
					header('Location: book-a-flight.php');
			
				}
				else {
					header('Location: flight_booking.php');	
				}*/
			

			/*$sql = "INSERT INTO passenger_details_primary(registration_id,first_name,last_name,email,contact_no,gender,postal_address,country,date_of_birth,cnic,passport_number) VALUES('$registration_id','$first_name','$last_name','$email','$contact_no','$gender','$postal_address','$country','$date_of_birth','$cnic','$passport_no')";
			mysqli_query($conn,$sql);*/

		}
		

		
	}
		



 ?>


<!DOCTYPE html>
<html>

<head>
	<title>Book a flight</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../public/style1.css">
	<?php include('../public/files/links.php') ?>
	<style type="text/css">
		<?php include('../public/files/style_navbar.php') ?>
		body {
			background-image: url('../public/imgs/design-tools.jpg')
		}
		.nvb_wrap {
			background-color: rgb(7, 10, 26,0.8);

		}
		.logodiv{
			padding:15px;
		}
		.card {
			margin:30px 50px;
			border-radius: 0.12em;
		}
		.card-header {
			border-bottom: 0px;
		}
		@font-face {
		  font-family: sexyfont;
		  src: url("adhellita.otf");
		}
		.sexyfont {
			font-family: ;
			color:white;

			}
		.sexyfont {
			padding:20px;
		  position: relative;
		  font-family: sexyfont;
		  font-size: 2em;
		  letter-spacing: 4px;
		  overflow: hidden;
		  background: linear-gradient(90deg, #000, #fff, #000);
		  background-repeat: no-repeat;
		  background-size: 80%;
		  animation: animate 5s linear infinite;
		  -webkit-background-clip: text;
		  -webkit-text-fill-color: rgba(255, 255, 255, 0);
		}

		@keyframes animate {
		  0% {
		    background-position: -500%;
		  }
		  100% {
		    background-position: 500%;
		  }
		}
		p {
			font-family: 'Voltaire', sans-serif;
			margin-top:0px;
			margin-bottom: 0px;
			font-size: 140%;
			color:#070a1a;
		}
		
	</style>
</head>
<body>
	<?php include('../public/files/navbar.php') ?>
	<h1 class='sexyfont'>To Travel is to Live </h1>
	<p class='text-center' style="color:white; font-size: 40px; border-bottom: 1px solid rgb(220, 221, 227,0.6); margin:auto 30px;">FILL THIS FORM</p>
	<?php	
		include('form.php');
	 ?>
</body>
</html>