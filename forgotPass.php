<?php include 'includes/header.php' ?>
<style type="text/css">
	#pswd_info {
	    position:absolute;
	    bottom:-150px;
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
				<h1>Forgot Password</h1>
				<h2><a href="index.php">Home </a> &nbsp;/&nbsp; Forgot Password</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION 404 -->
	<div id="login">
		<div class="login">
			<form  method="post">
				<div class="form-group">
					<label>User Name</label>
					<input name="userName" id="userName" class="form-control" type="text">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Old Password</label>
					<input name="OLD_PASSWORD" id="OLD_PASSWORD" class="form-control" type="password" >
					<i class="icon_lock_alt"></i>
				</div>
				<div class="form-group">
					<label>New Password</label>
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
				<input type="button" name="register" value="Reset Password" id="resetBtn" class="btn_1 rounded full-width add_top_30">
				
				<div class="text-center add_top_10">Don't have an acccount? <strong><a href="register.php">Sign Up Now</a></strong></div>
				<div class="text-center add_top_10">Have an account? <strong><a href="login.php">Sign in Now</a></strong></div>
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
		 $("#userName").on("keyup",function(){
			var userName = $("#userName").val();
				if(userName !=""){
	            	$.post("ajax/checkEmailContact.php",{ userName:userName },function(data){
	                  if(data==0){
	                  	alert("Username not found.Please try a valid username");
	                  	return false;
	                  }
		            });
	            }
	       });

		
		
			$("#resetBtn").on("click",function(){
				var userName = $("#userName").val();
				var OLD_PASSWORD = $("#OLD_PASSWORD").val(); 
				var USER_PASSWORD = $("#USER_PASSWORD").val();
				var confirmPass = $("#confirmPass").val();
				if(userName ==""){
					alert("Please Enter Your username");
					$("#userName").focus();
					return false;

				}else if(userName !=""){
	            	$.post("ajax/checkEmailContact.php",{ userName:userName },function(data){
	                  if(data==0){
	                  	alert("Username not found.Please try a valid username");
	                  	return false;
	                  }else if(OLD_PASSWORD ==""){
							alert("Please Enter Your Old Password");
							$("#OLD_PASSWORD").focus();
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
								$.post("ajax/resetPass.php",{ userName :userName , USER_PASSWORD: USER_PASSWORD },function(data){
				                  if(data==1){
				                  	alert("Password Reset succesfully");
				                  	window.location.href ="login.php";
				                  }
				                  
				                });
							}
				           });
			            }
		            
	            
				
			});
		});
	</script>
	