<!DOCTYPE html>
<html>
<head>
	<title>Airline Management System</title>
	<link rel="stylesheet" type="text/css" href="style1.css">

	<?php include('./files/links.php') ?>
	<style type="text/css">
		body {
			background-image: url("imgs/what-the-hex-dark.png");
			background-image: url("imgs/jahazedit.jpg");
			background-size:1380px 680px;

		}

		<?php include('./files/style_navbar.php') ?>
		
		.book-flight {
			margin:0px 570px;
			font-size: 20px;
			color: #fff;
			text-decoration: none;
			border: 2px solid #fff;
			border-radius: 0;
			display: inline-block;
			padding: 15px 25px;
			transition: all 0.3s ease-in-out;

		}
		.book-flight:hover{
			text-decoration: none;
			color:black;
			background-color: #debc35;
			border: 2px solid #debc35;
			transition: all 0.3s ease-in-out;
		}
		
		
		@font-face {
		  font-family: brushield;
		  src: url("imgs/brushield/Brushield.otf");
	}
	.motivationaltalk{
			margin:0px 520px;
			margin-top:20px;
			color: #debc35;
			font-family: brushield;
			font-size: 90px;
		}
	.resttalk {
			margin: 0px 530px;
			margin-top:0px;
			margin-bottom: 25px;
			font-family: 'Viga', sans-serif;
			color: white;
			font-size: 38px;
	}
	
	
	</style>
	
</head>
<body>

	<?php include('./files/navbar.php') ?>
    
    <div>
    	<div>
    		<!--Container-->
    		<p class='motivationaltalk'>Adventures</p>
    		<p class='resttalk'>ARE THE BEST <br/> WAY TO LEARN</p>	

    		 <a href="../templates/book-a-flight-home.php" class="book-flight"> BOOK A FLIGHT </a>
    		 




    	</div>
    	
    </div>
  </nav>
 	
</body>
</html>