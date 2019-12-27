<?php 
	session_start();
    $currentPage ='contact';
 ?>
<?php include 'includes/header.php' ?>
<?php
        $POSTED_ON = date('Y-m-d H:i:s'); 
        $mgs = '';
        
     if(isset($_POST['submit']))
    {
           $FULL_NAME =$_POST['FULL_NAME'];
           $CONTACT_NO =$_POST['CONTACT_NO'];
            $EMAIL =$_POST['EMAIL'];
           $MESSAGE =mysqli_real_escape_string($con,trim($_POST['MESSAGE']));
           $sql="INSERT INTO `contact_us` SET  `FULL_NAME`='$FULL_NAME', `CONTACT_NO`='$CONTACT_NO', `EMAIL`='$EMAIL', `MESSAGE`='$MESSAGE',  `SEND_TIME`='$POSTED_ON' ";
           $result = mysqli_query($con,$sql);
                
           if($result)
                {
                    $mgs = "Message Sent Successfully.";
                    
                    $class = "green_color alert alert-success col-md-12 alert-dismissable";
                    echo "<meta http-equiv='Refresh' content='3; url=contact-us.php'>";
                }
                else
                {
                    $mgs = "Message Sent Failed.";
                    $class = "red_color alert alert-warning alert-dismissable col-md-12";
                    echo "<meta http-equiv='Refresh' content='3; url=contact-us.php'>";
                }
         }

   ?>
	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>Contact Us</h1>
				<h2><a href="index.php">Home </a> &nbsp;/&nbsp; Contact Us</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION CONTACT US -->
	<section class="contact-us">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<h3 class="mb-4">Contact Us</h3>
					<form id="contactform" class="contact-form" name="contactform" method="post" novalidate>
					<div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
		                <div class=" col-md-12  <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
		                
		            </div>
						
						<div class="form-group">
							<input type="text" required class="form-control input-custom input-full" name="FULL_NAME" placeholder="Full Name">
						</div>
						<div class="form-group">
							<input type="text" required class="form-control input-custom input-full" name="CONTACT_NO" placeholder="Contact Number">
						</div>
						<div class="form-group">
							<input type="text" class="form-control input-custom input-full" name="EMAIL" placeholder="Email">
						</div>
						<div class="form-group">
							<textarea class="form-control textarea-custom input-full" id="ccomment" name="MESSAGE" required rows="8" placeholder="Message"></textarea>
						</div>
						<button type="submit" id="submit-contact" class="btn btn-primary btn-lg" name="submit">Submit</button>
					</form>
				</div>
				<div class="col-lg-4 col-md-12 bgc">
					<div class="call-info">
						<h3>Contact Details</h3>
						<p class="mb-5">Please find below contact details and contact us today!</p>
						<ul>
							<li>
								<div class="info">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									<p class="in-p">Dhanmondi 9/A, Dhaka 1207 </p>
								</div>
							</li>
							<li>
								<div class="info">
									<i class="fa fa-phone" aria-hidden="true"></i>
									<p class="in-p"><a style="color:white;" href="callto:+8801710939304">+8801710939304</a></p>
								</div>
							</li>
							<li>
								<div class="info">
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<p class="in-p ti">info@tolethunt.com</p>
								</div>
							</li>
							<li>
								<div class="info cll">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<p class="in-p ti">8:00 a.m - 9:00 p.m</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END SECTION CONTACT US -->
<?php include 'includes/footer.php' ?>