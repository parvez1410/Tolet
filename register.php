<?php include 'includes/header.php' ?>
<style type="text/css">
	#pswd_info {
	    position:absolute;
	    bottom:-269px;
	    bottom: -115px\9; /* IE Specific */
	    right:463px;
	    width:250px;
	    padding:10px;
	    background:#fefefe;
	    font-size:.875em;
	    border-radius:5px;
	    box-shadow:0 1px 3px #ccc;
	    border:1px solid #ddd;
	}
	#pswd_info ul li{list-style: none;}
	#pswd_info h4 {
	    margin:0 0 10px 0;
	    padding:0;
	    font-weight:normal;
	    font-size: 17px;
	}
	#pswd_info::before {
	    content: "\25B2";
	    position:absolute;
	    top:-12px;
	    left:45%;
	    font-size:14px;
	    line-height:14px;
	    color:#ddd;
	    text-shadow:none;
	    display:block;
	}

	.invalid {
	    background:url(images/invalid.png) no-repeat 0 50%;
	    padding-left:22px;
	    line-height:24px;
	    color:#ec3f41;
	}
	.valid {
	    background:url(images/valid.png) no-repeat 0 50%;
	    padding-left:22px;
	    line-height:24px;
	    color:#3a7d34;
	}
	#pswd_info {
    display:none;
}
</style>
	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>Register</h1>
				<h2><a href="index.php">Home </a> &nbsp;/&nbsp; Register</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION 404 -->
	<div id="login">
		<div class="login">
			<form  method="post">
				<div class="form-group">
					<label>Full Name</label>
					<input name="USER_NAME" id="USER_NAME" class="form-control" type="text">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Contact No</label>
					<input name="USER_CONTACT" id="USER_CONTACT" class="form-control" type="text">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Additional Contact</label>
					<input name="USER_ALTERNATIVE_CONTACT" id="USER_ALTERNATIVE_CONTACT" class="form-control" type="text">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label> Email</label>
					<input name="USER_EMAIL" id="USER_EMAIL" class="form-control" type="email">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input name="USER_PASSWORD" id="USER_PASSWORD" class="form-control" type="password" id="password1">
					<i class="icon_lock_alt"></i>
				</div>
				<div id="pswd_info">
			    <h4>Password must meet the following requirements:</h4>
			    <ul>
			        <li id="letter" class="invalid">At least <strong>one letter</strong></li>
			        <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
			        <li id="number" class="invalid">At least <strong>one number</strong></li>
			        <li id="length" class="invalid">Be at least <strong>6 characters</strong></li>
			    </ul>
			</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input name="confirmPass" id="confirmPass" class="form-control" type="password" id="password2">
					<i class="icon_lock_alt"></i>
				</div>
				<div id="pass-info" class="clearfix"></div>
				<input type="button" name="register" value="Register Now!" id="register" class="btn_1 rounded full-width add_top_30">
				
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="login.php">Sign In</a></strong></div>
			</form>
		</div>
	</div>
	<!-- END SECTION 404 -->

	<?php include 'includes/footer.php' ?>
	<script type="text/javascript">
		$(document).ready(function(){
			function IsEmail(USER_EMAIL) {
		        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		        if(!regex.test(USER_EMAIL)) {
		           return false;
		        }else{
		           return true;
		        }
		      }
		  $("#USER_PASSWORD").keyup(function() {
			    var pswd = $(this).val();
			    if ( pswd.length < 6) {
				    $('#length').removeClass('valid').addClass('invalid');
				} else {
				    $('#length').removeClass('invalid').addClass('valid');
				}
				//validate letter
				if ( pswd.match(/[A-z]/) ) {
				    $('#letter').removeClass('invalid').addClass('valid');
				} else {
				    $('#letter').removeClass('valid').addClass('invalid');
				}

				//validate capital letter
				if ( pswd.match(/[A-Z]/) ) {
				    $('#capital').removeClass('invalid').addClass('valid');
				} else {
				    $('#capital').removeClass('valid').addClass('invalid');
				}

				//validate number
				if ( pswd.match(/\d/) ) {
				    $('#number').removeClass('invalid').addClass('valid');
				} else {
				    $('#number').removeClass('valid').addClass('invalid');
				}
			}).focus(function() {
			    $('#pswd_info').show();
			}).blur(function() {
			    $('#pswd_info').hide();
			});
		 $("#USER_CONTACT").on("keyup",function(){
			var USER_CONTACT = $("#USER_CONTACT").val();
				if(USER_CONTACT !=""){
	            	$.post("ajax/checkContact.php",{ USER_CONTACT:USER_CONTACT },function(data){
	                  if(data==1){
	                  	alert("This Contact No is already registered");
	                  	return false;
	                  }
		            });
	            }
	       });

		$("#USER_EMAIL").on("keyup",function(){
			var USER_EMAIL = $("#USER_EMAIL").val();
				if(USER_EMAIL !=""){
	            	$.post("ajax/checkEmail.php",{ USER_EMAIL:USER_EMAIL },function(data){
	                  if(data==1){
	                  	alert("This Email is already registered");
	                  	return false;
	                  }
		            });
	            }
	       });
		
			$("#register").on("click",function(){
				var USER_NAME = $("#USER_NAME").val();
				var USER_CONTACT = $("#USER_CONTACT").val();
				var USER_EMAIL = $("#USER_EMAIL").val();
				var USER_EMAIL = $("#USER_EMAIL").val();
				var USER_ALTERNATIVE_CONTACT = $("#USER_ALTERNATIVE_CONTACT").val();
				var USER_PASSWORD = $("#USER_PASSWORD").val();
				var confirmPass = $("#confirmPass").val();
				if(USER_NAME ==""){
					alert("Please Enter Your Name");
					$("#USER_NAME").focus();
					return false;

				}
				if(USER_CONTACT ==""){
					alert("Please Enter Your Contact No");
					$("#USER_CONTACT").focus();
					return false;

				}else if(USER_CONTACT.length <11){
					alert("Please Enter a valid number");
					return false;
				}else if(USER_CONTACT !=""){
	            	$.post("ajax/checkContact.php",{ USER_CONTACT:USER_CONTACT },function(data){
	                  if(data==1){
	                  	alert("This Contact No is already registered");
	                  	return false;
	                  }else if(USER_EMAIL ==""){
							alert("Please Enter Your Email");
							$("#USER_EMAIL").focus();
							return false;

						}else if(IsEmail(USER_EMAIL)==false){
			                alert("Please Enter A Valid Email");
							$("#USER_EMAIL").focus();
							return false;
			            }else if(USER_EMAIL !=""){
			            	$.post("ajax/checkEmail.php",{ USER_EMAIL:USER_EMAIL },function(data){
			                  if(data==1){
			                  	alert("This Email is already registered");
			                  	return false;
			                  }else if(USER_PASSWORD ==""){
									alert("Please Enter Your Password");
									$("#USER_PASSWORD").focus();
									return false;
								}else if(confirmPass ==""){
									alert("Please Confirm Your Password");
									$("#confirmPass").focus();
									return false;
								}else if(USER_PASSWORD != confirmPass){
									alert("Password Mismatched, Pleae try again.");
									$("#confirmPass").focus();
									return false;
								}else{
									$.post("userReg.php",{ USER_NAME :USER_NAME , USER_CONTACT: USER_CONTACT,USER_ALTERNATIVE_CONTACT:USER_ALTERNATIVE_CONTACT, USER_EMAIL:USER_EMAIL,USER_PASSWORD:USER_PASSWORD },function(data){
					                  if(data==1){
					                  	alert("Registration completed succesfully");
					                  	window.location.href ="login.php";
					                  }
					                  
					                });
								}
				            });
			            }
		            });
	            }
				
			});
		});
	</script>