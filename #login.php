<?php include 'includes/header.php' ?>
<style type="text/css">
	.error_input{border:1px solid #f00;}
</style>
	
	


	<!-- START SECTION LOGIN -->
	<div id="login">
		<div class="login">
			
				
				<form >
					<span id="invalidMsg" style="color: red;"></span>
				<div class="form-group">
					<label>Email /Contact No</label>
					<input type="text" class="form-control" name="userName" id="userName">
					<span id="userNameMsg" style="color: red;"></span>
					<!-- <i class="icon_mail_alt"></i> -->
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="USER_PASSWORD" id="USER_PASSWORD" >
					<span id="PassMsg" style="color: red;"></span>
					<!-- <i class="icon_lock_alt"></i> -->
				</div>
				<!-- <div class="clearfix add_bottom_30">
					<div class="checkboxes float-left">
						<label class="container_check">Remember me
							<input type="checkbox">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div> -->
				<input type="button" name="login" value="Login" id="login" class="btn_1 rounded full-width add_top_30">
				<div class="text-center "><strong><a href="">Forgot Password</a></strong></div>
				<div class="text-center ">New to ToletHunt? <strong><a href="register.php">Sign up!</a></strong></div>
			</form>
		</div>
	</div>

	<?php include 'includes/footer.php' ?>
	<!-- END SECTION LOGIN -->
	
<script type="text/javascript">
		$(document).ready(function(){
			$("#login").on("click",function(){
				var userName = $("#userName").val();
				var USER_PASSWORD = $("#USER_PASSWORD").val();
				if(userName ==""){
					$("#userNameMsg").text("Please Enter Your User Name");
					$("#userName").attr("class","form-control error_input");
					
					return false;

				}
				$("#userNameMsg").html("");
       			 $("userName").attr("class","form-control");


				if(USER_PASSWORD ==""){
					$("#PassMsg").text("Please Enter Your Password");
					$("#USER_PASSWORD").attr("class","form-control error_input");
					
					return false;
				}
				$("#PassMsg").html("");
       			 $("USER_PASSWORD").attr("class","form-control");

       			 $("#invalidMsg").html("");
				$.post("userLogin.php",{ userName :userName ,USER_PASSWORD:USER_PASSWORD },function(data){
                  if(data==0){
                  	$("#invalidMsg").text("Invalid Username or Password OR your account is blocked by admin!");
					
                  }else{
                  	window.location.href ="propertyAD.php";
                  }
                  
                });
			});
		});
	</script>
