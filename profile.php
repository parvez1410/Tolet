<?php 
  session_start();
  if(empty($_SESSION['client'])){
      header('Location:login.php');
      exit();
  }
?>
<?php include 'includes/header.php' ?>
<?php
  $mgs ="";
  $USER_NO =$_SESSION['client']['USER_NO'];
  $sql = "SELECT * FROM `user_reg` WHERE `USER_NO`='$USER_NO' AND `IS_ACTIVE`=1";
  $query = mysqli_fetch_array(mysqli_query($con,$sql));
  if (isset($_POST['update'])) {
    $USER_NAME = $_POST['USER_NAME'];
    $USER_ALTERNATIVE_CONTACT = $_POST['USER_ALTERNATIVE_CONTACT'];
    $update ="UPDATE `user_reg` SET `USER_NAME`= '$USER_NAME', `USER_ALTERNATIVE_CONTACT`='$USER_ALTERNATIVE_CONTACT' WHERE `USER_NO` = '$USER_NO'";
    $update_query = mysqli_query($con,$update);
    if($update_query)
      {
          $class = "green_color alert alert-success col-md-12 alert-dismissable";
          $mgs = "Your profile info have been updated successfully.";
          echo "<meta http-equiv='Refresh' content='2; url=profile.php'>";
          
      }
      else
      {
          $mgs = "Profile Update Failed.";
          $class = "red_color alert alert-warning alert-dismissable col-md-12";
         
      }
  }
        
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="leftmenu">
				
				
				<div class="sidebar">
          <a href="dashboard.php">My Property</a>
          <a href="propertyAD.php">Add Property</a>
          <a class="active" href="profile.php">Profile</a>
          <a class="" href="changePass.php">Change Password</a>
</div>
			</div>
			

		</div>
		<div class="col-md-9">
			<div class="rightmenu">
				<div class="singleProperty">
					<h3>My Profile Information</h3>
				</div>
				<form method="post">
          <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
                <div class=" col-md-12  <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
                
            </div>
					 <div class="form-group row">
    <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
    <div class="col-sm-10">
      <input type="text" name="USER_NAME"  class="form-control" id="USER_NAME" value="<?=$query['USER_NAME']?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control" id="staticEmail" value="<?=$query['USER_EMAIL']?>">
    </div>
  </div>
  <!-- <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
   --><div class="form-group row">
    <label for="mobile" class="col-sm-2 col-form-label">Mobile </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" readonly id="mobile" value="<?=$query['USER_CONTACT']?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="mobile" class="col-sm-2 col-form-label">Mobile (Optional) </label>
    <div class="col-sm-10">
      <input type="text" name="USER_ALTERNATIVE_CONTACT" class="form-control" id="mobile" value="<?=$query['USER_ALTERNATIVE_CONTACT']?>">
    </div>
  </div>
  <div class="form-group row">
    <button type="submit" name="update" class="btn btn-primary updateBtn">Update</button>
  </div>
  
</form>
				

			</div>
		</div>
	</div>
</div>
</div>

<?php include 'includes/footer.php' ?>