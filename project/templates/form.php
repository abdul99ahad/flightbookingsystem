<div class="card shadow">
	  <div class="card-header">
	    <p>PERSONAL INFORMATION </p>
	  </div>
	  <div class="card-body">
	    <form action="book-a-flight.php" method="POST">
			<div class="form-row">
			    <div class="form-group col-md-4">
			    	<label for="firstName">First Name</label>
			      	<input type="text" name="first_name" class="form-control" placeholder="First name" id="firstName" value=<?php echo $first_name; ?>>
			      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$first_name) {
			      			echo "Enter First Name!";
			      		}
			      	 ?></small></div>
			    </div>
			    <div class="form-group col-md-4">
			    	<label for="lastName">Last Name</label>
			      	<input type="text" name="last_name" class="form-control" placeholder="Last name" id="lastName" value=<?php echo $last_name; ?>>
			      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$last_name) {
			      			echo "Enter Last Name";
			      		}
			      	 ?></small></div>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="gender">Gender</label>
			      <select id="gender" class="form-control" name="gender">
			        <option selected value="Male">Male</option>
			        <option value="Female">Female</option>
			      </select>
			    </div>
		   </div>
			<div class="form-row">
		      <div class= "form-group col-md-4">
		      	<label for="email">Email</label>
		      	<input type="email" name="email" class="form-control" placeholder="Email" id="email" value=<?php echo $email; ?>>
		      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$email) {
			      			echo "Email Field is required!";
			      		}
			      	 ?></small></div>
		      </div>
		      <div class="form-group col-md-4">
		      	<label for="contactno">Contact No</label>
		      	<input type="text" name="contact_no" class="form-control" placeholder="Contact No " id="contactno" value=<?php echo $contact_no; ?>>
		      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$contact_no) {
			      			echo "Contact number is required!";
			      		}
			      	 ?></small></div>
		      </div>
		      <div class="form-group col-md-4">
		      	<label for="dob">Date of Birth</label>
		      	<input type="date" name="date_of_birth" class="form-control" id="dob" value=<?php echo $date_of_birth; ?>>
		      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$date_of_birth) {
			      			echo "Enter your DOB!";
			      		}
			      	 ?></small></div>
		      </div>
		    </div>
		    <div class="form-row">
		      <div class= "form-group col-md-8">
		      	<label for="address">Postal Address</label>
		      	<input type="text" name="postal_address" class="form-control" placeholder="Postal Address" id="address" value=<?php echo $postal_address; ?>>
		      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$postal_address) {
			      			echo "Enter Postal Address!";
			      		}
			      	 ?></small></div>
		      </div>
		      <div class= "form-group col-md-4">
		      	<label for="country">Country/State</label>
		      	<input type="text" name="country" class="form-control" placeholder="Country/State" id="country" value=<?php echo $country; ?>>
		      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$country) {
			      			echo "Country/State is required!";
			      		}
			      	 ?></small></div>
		      </div>
		      </div>
		

	  </div>
	</div>

	<div class="card shadow ">
	  <div class="card-header">
	    <p>FLIGHT DETAILS</p>
	  </div>
	  <div class="card-body ">
	    
			<div class="form-row">
			    <div class="form-group col-md-4">
			    	<label for="cnic">CNIC</label>
			      	<input type="text" name="cnic" class="form-control" placeholder="CNIC" id="cnic" value=<?php echo $cnic; ?>>
			      	<small id="passwordHelpBlock" class="form-text text-muted">
					  Enter CNIC without dashes.
					</small>
			      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$cnic) {
			      			echo "CNIC Field is required!";
			      		}
			      	 ?></small></div>
			    </div>
			    <div class="form-group col-md-4">
			    	<label for="passportno">Passport No</label>
			      	<input type="text" name="passport_no" class="form-control" placeholder="Passport No" id="passportno" value = <?php echo $passport_no; ?>>
			      	<div style="color:red;"><small><?php 
			      		if (isset($_POST["submit"]) && !$passport_no) {
			      			echo "Passport number is required!";
			      		}
			      	 ?></small></div>
			    </div>
			    <div class="form-group col-md-4">
			      <label for="flightclass">Flight Class</label>
			      <select id="flightclass" class="form-control" name="flight_class">
			        <option selected value="Economy">Economy</option>
			        <option value="Business">Business</option>
			        <option value="Premium Economy">Premium Economy</option>
			        <option value="First Class">First Class</option>
			      </select>
			    </div>
		   </div>
		   <div class="form-row">
		   	<input class= "btn btn-primary" type="submit" name="submit">
		   </div>
			
		</form>

	  </div>
	</div>