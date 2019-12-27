<?php include 'includes/header.php' ?>
	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>Login</h1>
				<h2><a href="index.php">Home </a> &nbsp;/&nbsp; Login</h2>
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
					<label>Password</label>
					<input name="USER_PASSWORD" id="USER_PASSWORD" class="form-control" type="password" >
					<i class="icon_lock_alt"></i>
				</div>
				
				<div id="pass-info" class="clearfix"></div>
				<input type="button" name="register" value="Sign In!" id="loginBtn" class="btn_1 rounded full-width add_top_30">
				
				<div class="text-center add_top_10">Don't have an acccount? <strong><a href="register.php">Sign Up Now</a></strong></div>
				<div class="text-center add_top_10">Forgot Password? <strong><a href="forgotPass.php">Change Now</a></strong></div>
			</form>
		</div>
	</div>
	<!-- END SECTION 404 -->

	<?php include 'includes/footer.php' ?>
	<script type="text/javascript">
		$(document).ready(function(){
			
		  
		$("#loginBtn").on("click",function(){
			var userName = $("#userName").val();
			var USER_PASSWORD = $("#USER_PASSWORD").val();
				
				if(userName ==""){
					alert("Please enter your username.")
					return false;

				}else if(userName !=""){
	            	$.post("ajax/checkEmailContact.php",{ userName:userName },function(data){
	                  if(data==0){
	                  	alert("The username you have typed isn't registered.Please try a registered Email or Contact No");
	                  	$("#userName").val("");
	                  	return false;
	                  }
		            });
	            }
	            if(USER_PASSWORD ==""){
					alert("Please enter your password.")
					return false;

				}
					$.post("userLogin.php",{ userName :userName ,USER_PASSWORD:USER_PASSWORD },function(data){
	                  if(data==0){
	                  	alert("Invalid Username or Password OR your account is blocked by admin!");
						
	                  }else{
	                  	window.location.href ="propertyAD.php";
	                  }
	                  
	                });
				
				
			});
		});
	</script>