<?php 
  session_start();
  if(empty($_SESSION['client'])){
      header('Location:login.php');
      exit();
  }
?>
<?php include 'includes/header.php' ?>
<style type="text/css">
   .red_color{color: red;}
   .green_color{color: green;}
</style>
<?php
  $mgs ="";
  $USER_NO =$_SESSION['client']['USER_NO'];
  if(isset($_POST['update']))
  {
    $old_pass = md5(trim($_POST['OLD_PASS']));
    $new_pass1 = trim($_POST['newPass']);
    $new_pass2 = trim($_POST['ConfirmPass']);
    $sql = "SELECT * FROM `user_reg` WHERE `USER_PASSWORD` = '$old_pass' AND `USER_NO` = '$USER_NO'";
    $query = mysqli_query($con,$sql);
    $row_count = mysqli_num_rows($query);
    
    if($row_count == 1)
    {
      if(strlen($new_pass1) < 5)
      {
        $mgs = "Password is too short! Password Length should be at least of 5 characters.";
        $class = "red_color alert alert-warning alert-dismissable col-md-12";
      }
      elseif (!preg_match("#[0-9]+#", $new_pass1)) {
        $mgs = "Password must include at least one number!";
        $class = "red_color alert alert-warning alert-dismissable col-md-12";
      }
      elseif (!preg_match("#[a-zA-Z]+#", $new_pass1)) {
        $mgs = "password must include at least one letter!";
        $class = "red_color alert alert-warning alert-dismissable col-md-12";
      }    
      elseif($new_pass1 == $new_pass2)
      {
        $new_pass = md5($new_pass1);
        $sql = "UPDATE `user_reg` SET `USER_PASSWORD`= '$new_pass' WHERE `USER_NO` = '$USER_NO'";
        $result = mysqli_query($con,$sql);
        if($result)
        {
          $mgs = "Password Changed Successfully!";
          $class = "green_color alert alert-success col-md-12 alert-dismissable";
          echo "<meta http-equiv='Refresh' content='3; url=profile.php'>";
        }
        else
        {
          $mgs = "Password Change Failed!";
          $class = "red_color alert alert-warning alert-dismissable col-md-12";
        }
      }
      else
      {
        $mgs = "New password does not match!";
        $class = "red_color alert alert-warning alert-dismissable col-md-12";
      }
    }
    else
    {
      $mgs = "Old password does not match!";
      $class = "red_color alert alert-warning alert-dismissable col-md-12";  
    }
  }
  else
  {
    $class = "";
    $mgs = "";
  }      
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="leftmenu">
				
				
				<div class="sidebar">
          <a href="dashboard.php">My Property</a>
          <a href="propertyAD.php">Add Property</a>
          <a class="" href="profile.php">Profile</a>
          <a class="active" href="changePass.php">Change Password</a>
</div>
			</div>
			

		</div>
		<div class="col-md-9">
			<div class="rightmenu">
				<div class="singleProperty">
					<h3>Change Password</h3>
				</div>
				<form method="post">
          <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
                <div class=" col-md-12  <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
                
            </div>
					 <div class="form-group row">
    <label for="fullname" class="col-sm-2 col-form-label">Old Password</label>
    <div class="col-sm-10">
      <input type="password" name="OLD_PASS"  class="form-control" id="" placeholder="Old Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">New Password</label>
    <div class="col-sm-10">
      <input type="password"  class="form-control" id="" placeholder="New Password" name="newPass">
    </div>
  </div>
   <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" placeholder="Confrim Password" name="ConfirmPass">
    </div>
  </div>
  <div class="form-group row">
    <button type="submit" name="update" class="btn btn-primary updateBtn">Change Password</button>
  </div>
  
</form>
				

			</div>
		</div>
	</div>
</div>
</div>

<?php include 'includes/footer.php' ?>