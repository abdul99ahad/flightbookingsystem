<?php 
	include('../config/dbconnect.php');
	session_start(); //declare you are starting a session


	
	/*$sql2 = "SELECT id from registration";
	$result = mysqli_query($conn, $sql2);
	$info = mysqli_fetch_all($result,MYSQLI_ASSOC);

	foreach ($info as $pnr) {
		foreach ($pnr as $number) {
			echo $number;
		}

	}
*/


	$name = $cnic = $errorName = $adults = $children = $destination = $arrival = "";
	if (isset($_POST["submit"])) {
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$cnic = mysqli_real_escape_string($conn, $_POST['cnic']);
		$adults = mysqli_real_escape_string($conn, $_POST['adults']);
		$children = mysqli_real_escape_string($conn, $_POST['children']);
		$destination = strtolower(mysqli_real_escape_string($conn, $_POST['destination']));
		$arrival = strtolower(mysqli_real_escape_string($conn, $_POST['arrival']));
		if (!$name=="" && !$cnic=="" && !$adults=="" && !$destination=="" && !$arrival=="" ) {
			// Destination 
			$sql2 = "SELECT * from destination";
			$result = mysqli_query($conn, $sql2);
			$info = mysqli_fetch_all($result,MYSQLI_ASSOC);

			foreach ($info as $flight_dest) {
				
				if ($destination == $flight_dest['dest']) {
					$dest_id = $flight_dest['dest_id'];
					
					break;
				}
				else {
					continue;
				}
			}
			//Arrival
			$sql2 = "SELECT * FROM arrival";
			$result = mysqli_query($conn, $sql2);
			$info = mysqli_fetch_all($result,MYSQLI_ASSOC);

			foreach ($info as $flight_arrival) {
				if ($arrival == $flight_arrival['arrival']) {
					$arrival_id = $flight_arrival['arrival_id'];
					break;
				}
				else {
					continue;
				}
			}

			$_SESSION['arrival_id'] = $arrival_id;
			$_SESSION['dest_id'] = $dest_id;

			$total = $adults + $children;
			$i = 0;
			$sql = "INSERT INTO registration(full_name,cnic,adults,children,dest_id,arrival_id) VALUES('$name','$cnic','$adults','$children','$dest_id','$arrival_id')";
			//mysqli_query($conn,$sql);

			if(mysqli_query($conn,$sql)) {
				$registration_id = mysqli_insert_id($conn);
				echo $registration_id . 'id' ;
				$sql = "SELECT time_rn FROM registration WHERE registration_id = ('$registration_id')";
				$result = mysqli_query($conn, $sql);
				$info = mysqli_fetch_all($result,MYSQLI_ASSOC);	
				$current_time = $info[0]['time_rn'];
				$_SESSION['current_time'] = $current_time ;
				$_SESSION['registration_id'] = $registration_id ;
				$_SESSION['total'] = $total ;
				$_SESSION['i'] = $i;
				header('Location: book-a-flight.php');
			}
		
		}
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Book a Flight</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../public/style1.css">
	<?php include('../public/files/links.php') ?>
	<style type="text/css">
		body {
			background-image: url('../public/imgs/escape-flight-edit.jpg');


		}

		<?php include('../public/files/style_navbar.php') ?>

		.logo {
			margin-left: 20px;
		}
		.card {
			margin: 100px auto;
			width: 401px;
		}
		.card-img-top {
			width: 400px;
		}
		.text-center {
			border-bottom: 1px solid black;
		}
		.btn {
			margin :0px 280px;
		}
	</style>
</head>
<body>
	<?php include('../public/files/navbar.php') ?>

	<div class="card shadow" >
	  <img src="vector.jpg" class="card-img-top" alt="..." height="350px" width="350px">
	  <div class="card-body">
	    <form action="book-a-flight-home.php" method="POST">
			<div class="form-row">
			    <div class="form-group col-md-12">
			    	<label for="bookedbyname">Name</label>
			      	<input type="text" name="name"  class="form-control" placeholder="Booked By..." id="bookedbyname" value=<?php echo $name; ?>>
			      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$name) {
			      			echo "Name field is required!";
			      		}
			      	 ?></small></div>
			    </div>    
		   	</div>

		   	<div class="form-row">
			    <div class="form-group col-md-12">
			    	<label for="bookedbycnic">CNIC</label>
			      	<input type="text" name="cnic" class="form-control" placeholder="CNIC" id="bookedbycnic" aria-describedby="cnicHelpBlock" value="<?php echo $cnic ?>">
			      	<small id="passwordHelpBlock" class="form-text text-muted">
					  Enter CNIC without dashes.
					</small>
					<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$cnic) {
			      			echo "CNIC Field is required!";
			      		}
			      	 ?></small></div>
			    </div>    
		   	</div>
			
			<div class="form-row">
			    <div class="form-group col-md-6">
			    	<label for="adults">Adults</label>
			      	<input type="number" name="adults" class="form-control" placeholder="Adults" id="adults" value="<?php echo $adults ?>">
			      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$adults) {
			      			echo "Minimum One Person!";
			      		}
			      	 ?></small></div>
			    </div>   
			    <div class="form-group col-md-6">
			    	<label for="children">Children</label>
			      	<input type="number" name="children" class="form-control" placeholder="Children" id="children" value="<?php echo $children ?>">
			    </div> 
		   	</div>

		   	<div class="form-row">
			    <div class="form-group col-md-6">
			    	<label for="destination">From</label>
			      	<input type="text" name="destination" class="form-control" placeholder="Departure" id="destination" value='<?php echo $destination ?>'>
			      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$destination) {
			      			echo "Departure field is missing!";
			      		}
			      	 ?></small></div>
			    </div>   
			    <div class="form-group col-md-6">
			    	<label for="arrival">To</label>
			      	<input type="text" name="arrival" class="form-control" placeholder="Arrival" id="arrival" value='<?php echo $arrival ?>'>
			      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$arrival) {
			      			echo "Arrival field is missing!";
			      		}
			      	 ?></small></div>
			    </div> 
		   	</div>
		   	<div class="form-row">
		   		<input type="submit" name="submit" value= "submit" class="btn btn-primary"> 
		   	</div>
		</form>
	</div>
</div>
</body>
</html>