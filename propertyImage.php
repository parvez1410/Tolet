<?php include 'includes/header.php' ?>
<style type="text/css">
	.green_color{color: green;}
  .red_color{color: red;}
</style>
<?php
	$mgs = '';

	if(isset($_GET['property'])){
		$PROPERTY_NO = $_GET['property'];
	
	if(isset($_POST['submit'])){

		if ($_FILES["IMAGE_URL1"]["error"] > 0) {
	        $IMAGE_URL1 ="default.jpg";
	        
	    } else {
	        $IMAGE_URL1 = time().$_FILES["IMAGE_URL1"]["name"];
	        move_uploaded_file($_FILES["IMAGE_URL1"]["tmp_name"],"admin/soft/upload/" . $IMAGE_URL1);
	    }



      if ($_FILES["IMAGE_URL2"]["error"] > 0) {
          $IMAGE_URL2 ="default.jpg";
          
      } else {
          $IMAGE_URL2 = time().$_FILES["IMAGE_URL2"]["name"];
          move_uploaded_file($_FILES["IMAGE_URL2"]["tmp_name"],"admin/soft/upload/" . $IMAGE_URL2);
      }

      if ($_FILES["IMAGE_URL3"]["error"] > 0) {
          $IMAGE_URL3 ="default.jpg";
          
      } else {
          $IMAGE_URL3 = time().$_FILES["IMAGE_URL3"]["name"];
          move_uploaded_file($_FILES["IMAGE_URL3"]["tmp_name"],"admin/soft/upload/" . $IMAGE_URL3);
      }

      if ($_FILES["IMAGE_URL4"]["error"] > 0) {
          $IMAGE_URL4 ="default.jpg";
          
      } else {
          $IMAGE_URL4 = time().$_FILES["IMAGE_URL4"]["name"];
          move_uploaded_file($_FILES["IMAGE_URL4"]["tmp_name"],"admin/soft/upload/" . $IMAGE_URL4);
      }

      if ($_FILES["IMAGE_URL5"]["error"] > 0) {
          $IMAGE_URL5 ="default.jpg";
          
      } else {
          $IMAGE_URL5 = time().$_FILES["IMAGE_URL5"]["name"];
          move_uploaded_file($_FILES["IMAGE_URL5"]["tmp_name"],"admin/soft/upload/" . $IMAGE_URL5);
      }

     $SQL ="UPDATE  `properties` SET `IMAGE_URL1`= '$IMAGE_URL1',`IMAGE_URL2`= '$IMAGE_URL2',`IMAGE_URL3`= '$IMAGE_URL3',`IMAGE_URL4`= '$IMAGE_URL4',`IMAGE_URL5`= '$IMAGE_URL5' WHERE `PROPERTY_NO`= '$PROPERTY_NO'";
    $result = mysqli_query($con,$SQL);
    if($result)
	    {
	        $class = "green_color alert alert-success col-md-12 alert-dismissable";
	        $mgs = "AD Posted Successfully & waiting for Admin Approval. You can add more images to your property.";
	        
	        echo "<meta http-equiv='Refresh' content='3; url=dashboard.php'>";
	    }
	    else
	    {
	        $mgs = "AD Post Fail!Please try once again.";
	        $class = "red_color alert alert-warning alert-dismissable col-md-12";
	        echo "<meta http-equiv='Refresh' content='5; url=propertyAD.php?property=$PROPERTY_NO'>";
	    }
    }          
?>
<section class="headings">
   <div class="text-heading text-center">
      <div class="container">
         <h1>Submit Property</h1>
         <h2><a href="index.php">Home </a> &nbsp;/&nbsp; Submit Property</h2>
      </div>
   </div>
</section>
<!-- END SECTION HEADINGS -->
<
<!-- START SECTION SUBMIT PROPERTY -->
<section class="royal-add-property-area section_100">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
          <form action="" method="post" enctype="multipart/form-data" >
             <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
                <div class=" col-md-12  <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
                
            </div>
            
               
             <div class="single-add-property">
               <h3>property Image Upload </h3>
               <div class="property-form-group">
                  <div class="row">
                     <div class="col-md-12">
                          <label class="col-md-2"> Featured Image</label>
                           <input class="form-control" type="file" name="IMAGE_URL1" required="">
                        
                     </div>
                     <div class="col-md-12">
                          <label class="col-md-2"> Image2</label>
                           <input class="form-control" type="file" name="IMAGE_URL2">
                        
                     </div>
                     <div class="col-md-12">
                          <label class="col-md-2"> Image3</label>
                           <input class="form-control" type="file" name="IMAGE_URL3">
                        
                     </div>
                     <div class="col-md-12">
                          <label class="col-md-2"> Image4</label>
                           <input class="form-control" type="file" name="IMAGE_URL4">
                        
                     </div>
                     <div class="col-md-12">
                          <label class="col-md-2"> Image5</label>
                           <input class="form-control" type="file" name="IMAGE_URL5">
                        
                     </div>
                  </div>
               </div>
            
            
            <div class="add-property-button">
               <div class="row">
                  <div class="col-md-12">
                     <div class="prperty-submit-button">
                        <label class="col-md-3"></label>
                        <button type="submit" name="submit" style="height: 47px !important;">Submit Property</button>
                        
                     </div>
                  </div>
               </div>
            </div>

            
        </div>
            </form>
         </div>
      </div>
   </div>
</section>
<?php }?>

<?php include 'includes/footer.php' ?>