<?php 
  session_start();
  if(empty($_SESSION['client'])){
      header('Location:login.php');
      exit();
  }
?>
<?php include 'includes/header.php' ?>
<?php
       $USER_NO =$_SESSION['client']['USER_NO'];
        if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            $sql = "UPDATE properties SET `IS_DELETED`=1,`DELETED_BY` = '$USER_NO' WHERE `PROPERTY_NO` = '$id' ";
            $result = mysqli_query($con,$sql);
             echo "<meta http-equiv='Refresh' content='3; url=dashboard.php'>";
        }
       
    ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="leftmenu">
			
				
				<div class="sidebar">
<a class="active" href="dashboard.php">My Property</a>
 <a href="propertyAD.php">Add Property</a>  
 <a  href="profile.php">Profile</a>
 <a class="" href="changePass.php">Change Password</a>

 
  
  
</div>
			</div>
			

		</div>
		<div class="col-md-9">
			<div class="rightmenu">
				
				<div class="singleProperty">
          <?php
          $USER_NO =$_SESSION['client']['USER_NO'];
          $sql1="SELECT * FROM `properties` WHERE `USER_NO`='$USER_NO' ORDER BY PROPERTY_NO DESC";
          $query1 = mysqli_query($con,$sql1);
          $count = mysqli_num_rows($query1);
         
       ?> 
          <h3>All listed Properties <span><?=$count?></span></h3>
        </div>

			
<div class="row">
 <?php
              $USER_NO =$_SESSION['client']['USER_NO'];
              $sql="SELECT * FROM `properties` WHERE `USER_NO`='$USER_NO' ORDER BY PROPERTY_NO DESC";
              $query = mysqli_query($con,$sql);
             
                while($row = mysqli_fetch_array($query)):
           ?> 
  <div class="col-md-4 col-xs-12">
   
    <div class="listed-property">
          <div class="listed-card">

            
            <h4><?=$row['PROPERTY_TITLE']?></h4>
            <h5>Property ID : <span><?=$row['PROPERTY_ID']?></span></h5>
            <h5>Submit on: <span><?=$row['POSTED_ON']?></span> </h5>
            
          <?php
                    if($row['IS_APPROVED']==1 && $row['IS_DELETED']==0):
                  ?>
                      <h5>Status: <span class="ap"> <i class="fa fa-check"></i> Approved</span> </h5>
                  <?php
                    elseif($row['IS_APPROVED']==0 && $row['IS_DELETED']==0):
                  ?>
                      <h5>Status: <span class="pd"> <i class="fa fa-clock"></i> Pending</span> </h5>
                  <?php
                    elseif($row['IS_DELETED']==1):
                  ?>
                    <h5>Status: <span class="dl"> <i class="fa fa-trash"></i> Deleted</span> </h5>
                  <?php endif;?> 
          </div>
          
          <div class="button-group">
            <?php
                    if($row['IS_DELETED']==0):
                  ?>
             <a href="<?='property-details.php'.'?property='.$row['PROPERTY_NO']?>" class="btn btn-info">View</a>
          <a href="<?='dashboard.php'.'?delete='.$row['PROPERTY_NO']?>"  class="btn btn-danger">DELETE</a>
          <?php endif;?>
          </div>
          
        </div>
         
  </div>
   <?php endwhile;?>
</div>				
	
			</div>
		</div>
	</div>
</div>
</div>

<?php include 'includes/footer.php' ?>