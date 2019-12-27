
	<!-- START FOOTER -->
	<footer class="first-footer">
		<div class="top-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<h3>About Us</h3>
						<div class="netabout">
							
							<p style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;line-height: 25px;max-height: 100px;-webkit-line-clamp: 4;-webkit-box-orient: vertical;"><?=$about['ABOUT_US']?></p>
							<a href="about.php" class="btn btn-secondary">Read More...</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="navigation">
							<h3>Hot Zones</h3>
							<div class="nav-footer">
								<ul>
								<?php
				                    $sql_area ="SELECT * FROM `gen_areas` WHERE `IS_DELETED`=0 AND `SHOW_HOME`=1";
				                    $area_query = mysqli_query($con,$sql_area);
				                    while($area_row = mysqli_fetch_array($area_query)):
				                ?>
								
									<li><a href="<?='property.php'.'?area='.$area_row['AREA_NO']?>"><?=$area_row['AREA_NAME']?></a></li>
									
									
								
								<?php endwhile;?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="navigation">
							<h3>Help & Support</h3>
							<div class="nav-footer">
								<ul>
									<li><a href="faq.php">FAQ</a></li>
								<li><a href="index.php">Terms & Conditions</a></li>
								<li><a href="index.php">Privacy & Policy</a></li>
								<li><a href="index.php">Payment</a></li>
								</ul>
								
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="contactus navigation">
							<h3>Contact Us</h3>
							<ul>
								<li>
									<div class="info">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<p class="in-p"><?=$about['ADDRESS']?></p>
									</div>
								</li>
								<li>
									<div class="info">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<p class="in-p"><a href="callto:+88<?=$about['CONTACT_NO']?>"><?=$about['CONTACT_NO']?></a></p>
									</div>
								</li>
								<li>
									<div class="info">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<p class="in-p ti"><a href="mailto:<?=$about['EMAIL']?>"><?=$about['EMAIL']?></a></p>
									</div>
								</li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="second-footer">
			<div class="container">
				<p>2019 © Copyright - All Rights Reserved.</p>
				<p>Made With <i class="fa fa-heart" aria-hidden="true"></i> By <a href="https://www.facebook.com/ji.tusher2806" target="_blank" style="color:#fff;">ToletHunt</a></p>
			</div>
		</div>
	</footer>

	<a data-scroll href="#heading" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
	<!-- END FOOTER -->

	<!-- START PRELOADER -->
	<div id="preloader">
		<div id="status">
			<div class="status-mes"></div>
		</div>
	</div>
	<!-- END PRELOADER -->
	<!--Style Switcher===========================================-->
	

	<!-- ARCHIVES JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!-- <script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	 --><script src="js/tether.min.js"></script>
	<script src="js/moment.js"></script>
	<script src="js/transition.min.js"></script>
	<script src="js/transition.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fitvids.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.counterup.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/smooth-scroll.min.js"></script>
	<script src="js/lightcase.js"></script>
	<script src="js/search.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/ajaxchimp.min.js"></script>
	<script src="js/newsletter.js"></script>
	<script src="js/jquery.form.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/searched.js"></script>
	<script src="js/forms-2.js"></script>
	<script src="js/color-switcher.js"></script>

	<!-- Slider Revolution scripts -->
	<script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="js/inner.js"></script>
	<!-- MAIN JS -->
	<script src="js/script.js"></script>
	<script src="js/leaflet.js"></script>
	<script src="js/leaflet-gesture-handling.min.js"></script>
	<script src="js/leaflet-providers.js"></script>
	<script src="js/leaflet.markercluster.js"></script>
	<script src="js/map-single.js"></script>
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript">
	      $("select.search").select2();
	</script>
	
</body>


</html>
