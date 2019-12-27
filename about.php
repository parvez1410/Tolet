<?php 
	session_start();
    $currentPage ='about';
 ?>
<?php include 'includes/header.php' ?>
	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>About Us</h1>
				<h2><a href="index.php">Home </a> &nbsp;/&nbsp; About Us</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION ABOUT -->
	<section class="about-us">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 who-1">
					<div>
						<h2 class="text-left mb-4">About <span>Tolethunt</span></h2>
					</div>
					<div class="pftext">
						<p><?=$about['ABOUT_US']?></p>
					</div>
					<div class="box bg-2">
						<a href="about.php" class="text-center button button--moema button--text-thick button--text-upper button--size-s">read More</a>
						<img src="images/signature.png" class="ml-5" alt="">
					</div>
				</div>
				<div class="col-lg-6 col-md-12 who">
					<div class="wprt-image-video w50">
						<img alt="image" src="images/projects/welcome.jpg">
						<a class="icon-wrap popup-video popup-youtube" href="<?=$about['VIDEO_URL']?>" target="_blank"></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END SECTION ABOUT -->

	<!-- START SECTION SERVICES -->
	<main class="services-2">
		<div class="container">
			<div class="section-title">
				<h3>Our</h3>
				<h2>Services</h2>
			</div>
			<div class="row service-1">
				<article class="col-md-4 serv">
					<div class="art-1 img-1">
						<img src="images/1.png" width="52" alt="">
						<h3>Buy Property</h3>
						<p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
					</div>
				</article>
				<article class="col-md-4 serv">
					<div class="art-1 img-2">
						<img src="images/2.png" width="52" alt="">
						<h3>Rent Property</h3>
						<p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
					</div>
				</article>
				<article class="col-md-4 serv">
					<div class="art-1 img-3">
						<img src="images/3.png" width="52" alt="">
						<h3>Real Estate Kit</h3>
						<p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
					</div>
				</article>
			</div>
		</div>
	</main>
	<!-- END SECTION SERVICES -->

	<!-- START SECTION COUNTER UP -->
	<section class="counterup">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="countr">
						<i class="fa fa-home" aria-hidden="true"></i>
						<div class="count-me">
							<p class="counter text-left">300</p>
							<h3>Sold Houses</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="countr">
						<i class="fa fa-list" aria-hidden="true"></i>
						<div class="count-me">
							<p class="counter text-left">400</p>
							<h3>Daily Listings</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="countr mb-0">
						<i class="fa fa-users" aria-hidden="true"></i>
						<div class="count-me">
							<p class="counter text-left">250</p>
							<h3>Expert Agents</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="countr mb-0 last">
						<i class="fa fa-trophy" aria-hidden="true"></i>
						<div class="count-me">
							<p class="counter text-left">200</p>
							<h3>Won Awars</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END SECTION COUNTER UP -->

	

	<?php include 'includes/footer.php' ?>