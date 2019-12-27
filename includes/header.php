
<?php include('config/db_connection.php');?>
<!DOCTYPE html>
<html lang="zxx">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="html 5 template">
	<meta name="author" content="">
	<title>ToLetHunt</title>
	<!-- FAVICON -->
	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<!-- Slider Revolution CSS Files -->
	<link rel="stylesheet" href="revolution/css/settings.css">
	<link rel="stylesheet" href="revolution/css/layers.css">
	<link rel="stylesheet" href="revolution/css/navigation.css">
	<!-- ARCHIVES CSS -->
	<!-- LEAFLET MAP -->
	<link rel="stylesheet" href="css/leaflet.css">
	<link rel="stylesheet" href="css/leaflet-gesture-handling.min.css">
	<link rel="stylesheet" href="css/leaflet.markercluster.css">
	<link rel="stylesheet" href="css/leaflet.markercluster.default.css">
	<!-- ARCHIVES CSS -->
	<link rel="stylesheet" href="css/search.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/lightcase.css">
	<link rel="stylesheet" href="css/owl-carousel.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet"  href="css/custom.css">
	<link rel="stylesheet" href="css/pretty.css">

</head>
<?php
	$about_sql ="SELECT * FROM `about_us` WHERE 1";
	$about = mysqli_fetch_array(mysqli_query($con,$about_sql));
?>
<body class="inner-pages">
	<!-- START SECTION HEADINGS -->
	<div class="header">
		
		<div class="header-bottom heading sticky-header" id="heading">
			<div class="container">
				<a href="index.php" class="logo">
					<img src="images/logo.png" alt="realhome">
				</a>
				
				
				<button type="button" class="button-menu hidden-lg-up" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</button>

				

				<nav id="main-menu" class="collapse">
					<ul>
						<!-- STAR COLLAPSE MOBILE MENU -->
						

						<li class="<?php if($currentPage =='home'){echo 'active';}?>"><a  href="index.php">Home</a></li>
						<li class="<?php if($currentPage =='rent'){echo 'active';}?>"><a href="<?='property.php'.'?rent'?>"> Rent</a></li>
						<li  class="<?php if($currentPage =='sale'){echo 'active';}?>"><a href="<?='property.php'.'?sale'?>"> Sale</a></li>
						<li class="<?php if($currentPage =='about'){echo 'active';}?>"><a href="about.php">About Us</a></li>
						<li class="<?php if($currentPage =='contact'){echo 'active';}?>"><a href="contact-us.php">Contact</a></li>
						<?php 
								if(empty($_SESSION['client'])):
							?>
						<li class="<?php if($currentPage =='login'){echo 'active';}?>"><a href="login.php">Login</a></li>
						<li class="<?php if($currentPage =='register'){echo 'active';}?>"><a href="register.php">Register</a></li>
						<?php else :?>
						<li class="<?php if($currentPage =='dashboard'){echo 'active';}?>"><a href="dashboard.php">Dashboard</a></li>
						<li class="<?php if($currentPage =='logout'){echo 'active';}?>"><a href="logout.php">Logout</a></li>
						<?php endif; ?>
						<div class="get-quote hidden-lg-up">
					<a class="" href="propertyAD.php">
						<button  class="btn btn-danger propertyBtn"><i class="fa fa-plus"></i>  ADD PROPERTY</button>
					</a>
				</div>
					</ul>
					
				</nav>
<div class="get-quote hidden-sm-down ">
					<a class="" href="propertyAD.php">
						<button  class="btn btn-danger propertyBtn"><i class="fa fa-plus"></i>  ADD PROPERTY</button>
					</a>
				</div>
			</div>
		</div>
	</div>
