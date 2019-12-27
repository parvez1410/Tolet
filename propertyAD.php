<?php 
  session_start();
  if(empty($_SESSION['client'])){
      header('Location:login.php');
      exit();
  }
?>
<?php include 'includes/header.php' ?>
<style type="text/css">
 input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; } /* FF 4-18 */
input:focus::-moz-placeholder { color:transparent; } /* FF 19+ */
input:focus:-ms-input-placeholder { color:transparent; } /* IE 10+ */
textarea:focus::-webkit-input-placeholder { color:transparent; }
textarea:focus:-moz-placeholder { color:transparent; } /* FF 4-18 */
textarea:focus::-moz-placeholder { color:transparent; } /* FF 19+ */
textarea:focus:-ms-input-placeholder { color:transparent; } /* IE 10+ */
</style>
<?php
        $USER_NO =$_SESSION['client']['USER_NO'];
        $POSTED_ON = date('Y-m-d H:i:s'); 
        $YEAR = date('Y');
        $mgs = '';
        $randnum = rand(999,9999);
        $PROPERTY_ID = date('Ymd').$randnum;

     if(isset($_POST['submit']))
    {
           $TYPE_NO =$_POST['TYPE_NO'];
           $CATEGORY_NO =$_POST['CATEGORY_NO'];
           $PROPERTY_TITLE =mysqli_real_escape_string($con,trim($_POST['PROPERTY_TITLE']));
           $PROPERTY_DESCRIPTION =mysqli_real_escape_string($con,trim($_POST['PROPERTY_DESCRIPTION']));
           $ADDRESS =mysqli_real_escape_string($con,trim($_POST['ADDRESS']));
           $CITY_NO =$_POST['CITY_NO'];
           $AREA_NO =$_POST['AREA_NO'];
           if(isset($_POST['PREFERED_TENANT'])){
                $PREFERED_TENANT = $_POST['PREFERED_TENANT'];
           }else{
                $PREFERED_TENANT = "N/A";
           }
           if(isset($_POST['IS_NEGOCIABLE'])){
                $IS_NEGOCIABLE = "Yes";
           }else{
                $IS_NEGOCIABLE = "No";
           }
           if(isset($_POST['HAS_UTILITY_BILL'])){
                $HAS_UTILITY_BILL = "Yes";
           }else{
                $HAS_UTILITY_BILL = "No";
           }
           if(isset($_POST['AVAILABLE_FROM'])){
                $AVAILABLE_FROM = $_POST['AVAILABLE_FROM'];
           }else{
                $AVAILABLE_FROM = "N/A";
           }

           if(isset($_POST['MONTHLY_SEAT_RENT'])){
                $MONTHLY_SEAT_RENT = $_POST['MONTHLY_SEAT_RENT'];
           }else{
                $MONTHLY_SEAT_RENT = "N/A";
           }
           if(isset($_POST['UTILITY_BILL'])){
                $UTILITY_BILL = $_POST['UTILITY_BILL'];
           }else{
                $UTILITY_BILL = "N/A";
           }
           if(isset($_POST['NUM_OF_FLOOR'])){
                $NUM_OF_FLOOR = $_POST['NUM_OF_FLOOR'];
           }else{
                $NUM_OF_FLOOR = "N/A";
           }

           if(isset($_POST['NUM_OF_FLAT'])){
                $NUM_OF_FLAT = $_POST['NUM_OF_FLAT'];
           }else{
                $NUM_OF_FLAT = "N/A";
           }
           if(isset($_POST['NUM_OF_SEAT'])){
                $NUM_OF_SEAT = $_POST['NUM_OF_SEAT'];
           }else{
                $NUM_OF_SEAT = "N/A";
           }
           if(isset($_POST['NUM_OF_BEDROOM'])){
                $NUM_OF_BEDROOM = $_POST['NUM_OF_BEDROOM'];
           }else{
                $NUM_OF_BEDROOM = "N/A";
           }
           if(isset($_POST['NUM_OF_BALCONY'])){
                $NUM_OF_BALCONY = $_POST['NUM_OF_BALCONY'];
           }else{
                $NUM_OF_BALCONY = "N/A";
           }

           if(isset($_POST['NUM_OF_BATHROOM'])){
                $NUM_OF_BATHROOM = $_POST['NUM_OF_BATHROOM'];
           }else{
                $NUM_OF_BATHROOM = "N/A";
           }
           if(isset($_POST['BATHROOM_TYPE'])){
                $BATHROOM_TYPE ="Yes";
           }else{
                $BATHROOM_TYPE = "No";
           }
           if(isset($_POST['NUM_OF_ROOM'])){
                $NUM_OF_ROOM = $_POST['NUM_OF_ROOM'];
           }else{
                $NUM_OF_ROOM = "";
           }
          $AVAILABLE_ON_FLOOR =$_POST['AVAILABLE_ON_FLOOR'];
          
          if(isset($_POST['PROPERTY_SIZE'])){
                $PROPERTY_SIZE = $_POST['PROPERTY_SIZE'];
           }else{
                $PROPERTY_SIZE = "";
           }

           if(isset($_POST['PROPERTY_UNIT_PRICE'])){
                $PROPERTY_UNIT_PRICE = $_POST['PROPERTY_UNIT_PRICE'];
           }else{
                $PROPERTY_UNIT_PRICE = "";
           }
           if(isset($_POST['TOTAL_PRICE'])){
                $TOTAL_PRICE = $_POST['TOTAL_PRICE'];
           }else{
                $TOTAL_PRICE = "";
           }
           $DEPOSITE_AMOUNT =$_POST['DEPOSITE_AMOUNT'];
           if(isset($_POST['HANDOVER_DATE'])){
                $HANDOVER_DATE = $_POST['HANDOVER_DATE'];
           }else{
                $HANDOVER_DATE = "";
           }

            $AMENITIES_NO =$_POST['AMENITY_NO'];
            $AMENITY_NO="";
            foreach ($AMENITIES_NO as $AMENITIES) {
                $AMENITY_NO.=",".$AMENITIES;
            }
            $AMENITY_NO= substr($AMENITY_NO,1);
           
             
          $SQL = "SELECT * FROM `properties` WHERE `USER_NO` ='$USER_NO' AND  `TYPE_NO`='$TYPE_NO' AND CATEGORY_NO ='$CATEGORY_NO' AND `PROPERTY_TITLE`='$PROPERTY_TITLE' AND POSTED_ON = '$POSTED_ON' AND IS_DELETED=0 ";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1):
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

            echo  $sql = "INSERT INTO `properties` (`PROPERTY_ID`, `USER_NO`, `TYPE_NO`, `CATEGORY_NO`, `PROPERTY_TITLE`, `PROPERTY_DESCRIPTION`, `ADDRESS`, `CITY_NO`, `AREA_NO`, `PREFERED_TENANT`, `AVAILABLE_FROM`, `MONTHLY_SEAT_RENT`, `UTILITY_BILL`, `NUM_OF_FLOOR`, `NUM_OF_FLAT`, `NUM_OF_ROOM`, `NUM_OF_SEAT`, `NUM_OF_BEDROOM`, `NUM_OF_BALCONY`, `NUM_OF_BATHROOM`, `BATHROOM_TYPE`, `AVAILABLE_ON_FLOOR`, `PROPERTY_SIZE`, `PROPERTY_UNIT_PRICE`, `TOTAL_PRICE`, `DEPOSITE_AMOUNT`,  `HANDOVER_DATE`, `AMENITY_NO`,`IMAGE_URL1`,`IMAGE_URL2`,`IMAGE_URL3`,`IMAGE_URL4`,`IMAGE_URL5`, `POSTED_ON`,`AD_YEAR`,`IS_NEGOCIABLE`,`HAS_UTILITY_BILL`) VALUES('$PROPERTY_ID','$USER_NO', '$TYPE_NO', '$CATEGORY_NO', '$PROPERTY_TITLE', '$PROPERTY_DESCRIPTION', '$ADDRESS', '$CITY_NO', '$AREA_NO', '$PREFERED_TENANT', '$AVAILABLE_FROM', '$MONTHLY_SEAT_RENT', '$UTILITY_BILL', '$NUM_OF_FLOOR', '$NUM_OF_FLAT', '$NUM_OF_ROOM', '$NUM_OF_SEAT', '$NUM_OF_BEDROOM', '$NUM_OF_BALCONY', '$NUM_OF_BATHROOM', '$BATHROOM_TYPE', '$AVAILABLE_ON_FLOOR', '$PROPERTY_SIZE', '$PROPERTY_UNIT_PRICE', '$TOTAL_PRICE', '$DEPOSITE_AMOUNT',  '$HANDOVER_DATE', '$AMENITY_NO','$IMAGE_URL1','$IMAGE_URL2','$IMAGE_URL3','$IMAGE_URL4','$IMAGE_URL5', '$POSTED_ON','$YEAR','$IS_NEGOCIABLE','$HAS_UTILITY_BILL')";
                $result = mysqli_query($con,$sql);
                $PROPERTY_NO = mysqli_insert_id($con);
                if($result)
                {
                    $class = "green_color alert alert-success col-md-12 alert-dismissable";
                     "<meta http-equiv='Refresh' content='3; url=dashboard.php'>";
                }
                else
                {
                    $mgs = "AD Post Fail!Please try once again.";
                    $class = "red_color alert alert-warning alert-dismissable col-md-12";
                    echo "<meta http-equiv='Refresh' content='5; url=propertyAD.php'>";
                }
            else:
                $mgs = "You have already posted this AD!";
                $class = "red_color alert alert-warning alert-dismissable col-md-12 alert ";
                echo "<meta http-equiv='Refresh' content='5; url=propertyAD.php'>";
            endif;
    }
?>
<style type="text/css">
  .select2-container--default .select2-selection--single {
      background-color: #fff;
      border: 1px solid #ddd !important;
      border-radius: 2px !important; 
  }
  .select2-container .select2-selection--single{
    height: 50px !important;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height: 47px !important;
  }
  .select2-container--default .select2-selection--single .select2-selection__arrow b{
      border-color: #000 transparent transparent transparent !important;
      margin-top: 9px !important;
  }
  .select2-container .select2-selection--multiple{
      border: 1px solid #ddd !important;
      border-radius: 2px !important;
      height: 47px !important;
  }
  .green_color{color: green;}
  .red_color{color: red;}
</style>

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
          <form action="" method="post" novalidate enctype="multipart/form-data">
             <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
                <div class=" col-md-12  <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
                
            </div>
            <div class="single-add-property">
            	<h3>Post Your AD </h3>
            	<div class="property-form-group">
               <div class="row">
                  <div class="col-md-12">
                  	<label style="margin-right:10px;" for="">Property For <span style="color:red">*</span></label>
                     <div class="pretty p-icon p-curve p-jelly">

                        <input type="radio" name="TYPE_NO" class="TYPE_NO" id="TYPE_NO1" value="1">
                        <div class="state p-warning">
                           <i class="icon mdi mdi-check"></i>
                           <label> Rent</label>
                        </div>
                     </div>
                     <div class="pretty p-icon p-curve p-jelly">
                        <input type="radio" name="TYPE_NO" class="TYPE_NO" id="TYPE_NO2" value="2">
                        <div class="state p-warning">
                           <i class="icon mdi mdi-check"></i>
                           <label>  Sale</label>
                        </div>
                     </div>
                  </div><br><br>
                  <div class="col-md-6">
                  	 <p>
                              <label for="">Property Type  <span style="color:red">*</span></label>
                              <select name="CATEGORY_NO" id="CATEGORY_NO">
                             	<option value="-1">--Select Property Type--</option>
                             	
                             </select>
                           </p>
                  </div>
               </div>
           </div>
           </div>
               
               	<div class="single-add-property showProperty" style="display: none;" >
               <h3>Property description and price</h3>
               <div class="property-form-group">
                  
                     <div class="row">
                        <div class="col-md-12">
                           <p>
                              <label for="PROPERTY_TITLE">Property Title <span style="color:red">*</span></label>
                              <input type="text" name="PROPERTY_TITLE" id="PROPERTY_TITLE" placeholder="Type your property title. Max 90 words" maxlength="90" required>
                           </p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <p>
                              <label for="PROPERTY_DESCRIPTION">Property Description  <span style="color:red">*</span></label>
                              <textarea id="PROPERTY_DESCRIPTION" name="PROPERTY_DESCRIPTION" placeholder="Describe about your property" required></textarea>
                           </p>
                        </div>
                     </div>
                     <div class="row" style="margin-bottom: 20px;">
                        <div class="col-lg-4 col-md-12 showFlat" >
                           <p class="recentNo">
                              <label for="price">Price (Square Fit) <span style="color:red">*</span></label>
                              <input type="number" name="PROPERTY_UNIT_PRICE" placeholder="5000" id="PROPERTY_UNIT_PRICE" required>
                           </p>
                        </div>
                        <div class="col-lg-4 col-md-12 showFlat" id="pSize">
                           <p class="recentNo">
                              <label for="price">Size (Square Fit)<span style="color:red">*</span></label>
                              <input type="number" name="PROPERTY_SIZE" placeholder="1200" id="PROPERTY_SIZE" required>
                           </p>
                        </div>
                        <div class="col-lg-4 col-md-12 showFlat">
                           <p class="recentNo">
                              <label for="price">Total Price</label>
                              <input type="number" name="TOTAL_PRICE" value="1200" id="TOTAL_PRICE" readonly="" style="background: #eee;">
                           </p>
                        </div>
                      </div>

                     <div class="row" style="margin-bottom: 20px;">
                        <div class="col-lg-4 col-md-12 showFloor">
                           <p class="recentNo">
                              <label for="price">Floor <span style="color:red">*</span></label>
                              <select name="NUM_OF_FLOOR" id="NUM_OF_FLOOR" required>
                              <option value="">--Select Floor Number--</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                             </select>
                           </p>
                        </div>
                        <div class="col-lg-4 col-md-12 showFloor"  >
                           <p class="recentNo">
                              <label for="price">Flats<span style="color:red">*</span></label>
                              <select name="NUM_OF_FLAT" id="NUM_OF_FLAT" required>
                              <option value="">--Select Flat Number--</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                             </select>
                           </p>
                        </div>
                        <div class="col-lg-4 col-md-12"  id="handOverDate">
                           <p class="recentNo">
                              <label for="price">Handover Date <span style="color:red">*</span></label>
                              <input type="date" name="HANDOVER_DATE" id="HANDOVER_DATE">
                           </p>
                        </div>
                        <div class="col-lg-4 col-md-12 showFlat" style="display: none;top: 40px !important;">
                        <div class="pretty p-icon p-curve p-jelly">
                          <input type="checkbox" name="IS_NEGOCIABLE" class="IS_NEGOCIABLE"  value="">
                          <div class="state p-warning">
                             <i class="icon mdi mdi-check"></i>
                             <label> Negotiable</label>
                          </div>
                       </div>
                     </div>
                        
                      </div>
                      <div class="row">
                      
                        <div class="col-lg-4 col-md-12 showRent">
                           <p class="recentNo">
                              <label for="price">Rent  <span style="color:red">*</span></label>
                              <input type="text" name="MONTHLY_SEAT_RENT" placeholder="2500 BDT" id="MONTHLY_SEAT_RENT" required>
                           </p>
                        </div>
                        <div class="col-lg-4 col-md-12 showRent">
                           <p class="recentNo">
                              <label for="availabel_from">Available From <span style="color:red">*</span></label>
                              <select name="AVAILABLE_FROM" id="AVAILABLE_FROM" required class="search" style="width: 100% !important;height: 30px !important;">
                              <option value="">--Select Month--</option>
                              <option value="January">January</option>
                              <option value="February">February</option>
                              <option value="March">March</option>
                              <option value="April">April</option>
                              <option value="May">May</option>
                              <option value="June">June</option>
                              <option value="July">July</option>
                              <option value="August">August</option>
                              <option value="September">September</option>
                              <option value="October">October</option>
                              <option value="November">November</option>
                              <option value="December">December</option>
                             </select>
                           </p>
                        </div>
                        <div class="col-lg-4 col-md-12" id="showRentTenant">
                           <p class="recentNo last">
                              <label for="area">Prefered Renter <span>(optional)</span></label>
                               <select name="PREFERED_TENANT" id="PREFERED_TENANT">
                                  <option value="">--Select One--</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Family">Family</option>
                             </select>
                           </p>
                        </div>
                        
                     </div>
                     <div class="row">
                        <div class="col-lg-4 col-md-12 showRent" >
                        <div class=" dropdown  ">
                           <p>
                              <label for="rooms">Rooms <span style="color:red">*</span></label>
                             <select name="NUM_OF_ROOM" id="NUM_OF_ROOM" required>
                              <option value="">--Select Room Number--</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                             </select>
                           </p>
                        </div>
                     </div>
                        <div class="col-lg-4 col-md-12 " id="showSeatNum" >
                           <p class="recentNo last">
                              <label for="NUM_OF_SEAT">Seat / Person <span style="color:red">*</span></label>
                              <input type="text" name="NUM_OF_SEAT" placeholder="No of seat/person, ex: 2" id="NUM_OF_SEAT">
                           </p>
                        </div>
                         
                        
                     </div>
                    
               </div>
            </div>

            <!-- <div class="single-add-property">
               <h3>property Media </h3>
               <div class="property-form-group">
                  <div class="row">
                     <div class="col-md-12">
                        
                           <input type="file">
                        
                     </div>
                  </div>
               </div>
            </div>
             --><div class="single-add-property showProperty" style="display: none;" >
               <h3>property Location</h3>
               <div class="property-form-group">
                  <div class="row">
                     <div class="col-lg-4 col-md-12">
                        <p>
                           <label for="ADDRESS">Address  <span style="color:red">*</span></label>
                           <input type="text" name="ADDRESS" placeholder="Enter Your Address. Max 60 words" id="ADDRESS" maxlength="60" required>
                        </p>
                     </div>
                     <div class="col-lg-4 col-md-12">
                        <p>
                           <label for="city">Location  <span style="color:red">*</span></label>
                           <select class="search " name="CITY_NO" id="CITY_NO" style="width: 100%">
                            <option value="-1">--Select Location--</option>
                            <?php
                                    $sql = "SELECT * FROM `gen_cities` where IS_DELETED=0 ";
                                    $result1 = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_array($result1)):
                                ?>
                                    <option value="<?=$row['CITY_NO']?>" <?=($row['CITY_NO']==1)?"selected":""?>> <?=$row['CITY_NAME']?> </option>
                                <?php endwhile;?>
                        </select>
                        </p>
                     </div>
                     <div class="col-lg-4 col-md-12">
                        <p>
                           <label for="city">City  <span style="color:red">*</span></label>
                           <select class="search" name="AREA_NO" id="AREA_NO" required style="width: 100% !important;">
                           	<option value="">---Select City ----</option>
                           	
                           </select>
                        </p>
                     </div>
                  </div>
                  <div class="row">
                  </div>
               </div>
            </div>
            <div class="single-add-property showProperty" style="display: none;" >
               <h3>Extra Information</h3>
               <div class="property-form-group">
                  <div class="row">
                    <div class="col-lg-6 col-md-12" id="showBedRoom">
                        <div class="dropdown ">
                           <p>
                              <label for="NUM_OF_BEDROOM">Bedrooms <span>(optional)</span></label>
                              <select name="NUM_OF_BEDROOM" id="NUM_OF_BEDROOM">
                              <option value="">--Select Bedroom Number--</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                             </select>
                           </p>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-12">
                        <div class="pretty p-icon p-curve p-jelly">
                          <input type="checkbox" name="HAS_UTILITY_BILL" class="HAS_UTILITY_BILL"  value="">
                          <div class="state p-warning">
                             <i class="icon mdi mdi-check"></i>
                             <label>Has Utility Bill</label>
                          </div>
                       </div>
                     </div>
                     <div class="col-lg-6 col-md-12 UTILITY_BILL" style="display: none;">
                        <div class=" dropdown  ">
                           <p>
                              <label for="UTILITY_BILL">Utility Bill <span> </span></label>
                              <input type="text" name="UTILITY_BILL" id="UTILITY_BILL" placeholder="Enter Utility Bill" >
                           </p>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-12">
                        <div class="dropdown ">
                           <p>
                              <label for="bath">On Floor <span style="color: red">*</span></label>
                              <select class="search" name="AVAILABLE_ON_FLOOR" id="AVAILABLE_ON_FLOOR" style="width: 100%"  required="">
                                <?php
                                        $sql = "SELECT * FROM `available_on_floors` where 1";
                                        $result1 = mysqli_query($con,$sql);
                                        while($row = mysqli_fetch_array($result1)):
                                    ?>
                                        <option value="<?=$row['AVAILABLE_ON_FLOOR']?>" > <?=$row['AVAILABLE_ON_FLOOR']?> </option>
                                    <?php endwhile;?>
                            </select>
                           </p>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-12">
                        <div class="dropdown ">
                           <p>
                              <label for="bath">Bathrooms <span>(optional)</span></label>
                              <select name="NUM_OF_BATHROOM" id="NUM_OF_BATHROOM">
                             	<option value="">--Select Bathroom Number--</option>
                             	<option value="1">1</option>
                             	<option value="2">2</option>
                             	<option value="3">3</option>
                             	<option value="4">4</option>
                             	<option value="5">5</option>
                             	<option value="6">6</option>
                             	<option value="7">7</option>
                             	<option value="8">8</option>
                             </select>
                           </p>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-12">
                        <div class="pretty p-icon p-curve p-jelly">
                          <input type="checkbox" name="BATHROOM_TYPE" class="BATHROOM_TYPE"  value="">
                          <div class="state p-warning">
                             <i class="icon mdi mdi-check"></i>
                             <label> Attached Bathroom</label>
                          </div>
                       </div>
                     </div>
                     <div class="col-lg-6 col-md-12">
                        <div class="dropdown ">
                           <p>
                              <label for="bath">Balcony <span>(optional)</span></label>
                              <select name="NUM_OF_BALCONY" id="NUM_OF_BALCONY">
                              <option value="">--Select Balcony Number--</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                             </select>
                           </p>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-12">
                        <div class="dropdown ">
                           <p>
                              <label for="bath">Advance Amount <span>(optional)</span></label>
                              <input type="text" name="DEPOSITE_AMOUNT" id="DEPOSITE_AMOUNT" placeholder="Ex: 2200 BDT" >
                           </p>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
            <div class="single-add-property showProperty" style="display: none;" >
               <h3>Property Amenities</h3>
               <div class="property-form-group">
                  <div class="row">
                     <div class="col-md-12">
                      <?php
                          $aminity = "SELECT * FROM `gen_aminities` WHERE `IS_DELETED`=0";
                          $a_query =mysqli_query($con,$aminity);
                          while( $a_row = mysqli_fetch_array($a_query)):
                      ?>
                        <div class="pretty p-icon p-curve p-jelly">
                        <input type="checkbox" name="AMENITY_NO[]" class="AMENITY_NO"  value="<?=$a_row['AMENITY_NO']?>">
                        <div class="state p-warning">
                           <i class="icon mdi mdi-check"></i>
                           <label><?=$a_row['AMENITY_NAME']?></label>
                        </div>
                     </div>
                        
                      <?php endwhile;?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="single-add-property showProperty" style="display: none;">
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
            
            
            
            
        </div>
            <div class="add-property-button">
               <div class="row">
                  <div class="col-md-12">
                     <div class="prperty-submit-button">
                        <button type="submit" name="submit" style="height: 47px !important;">Submit Property</button>
                     </div>
                  </div>
               </div>
            </div>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- END SECTION SUBMIT PROPERTY -->
<?php include 'includes/footer.php' ?>
<script type="text/javascript">
    $(document).ready(function(){
      $(".TYPE_NO").on("click",function(){
          $(".showProperty").hide();
          var TYPE_NO ="";
          if($('#TYPE_NO1').is(':checked')){
              TYPE_NO = 1;
          }
          if($('#TYPE_NO2').is(':checked')){
              TYPE_NO = 2;
          }
          $.post("ajax/getPropertyType.php",{ TYPE_NO :TYPE_NO },function(data){
               $("#CATEGORY_NO").html(data);
           });
      });
      $("#CITY_NO").on("change",function(){
          var CITY_NO = $("#CITY_NO").val();
          if (CITY_NO !="-1") {
              $.post("ajax/getPropertyCity.php",{ CITY_NO :CITY_NO },function(data){
                 $("#AREA_NO").html(data);
              });
          }else{
                $("#AREA_NO").html("<option value='-1'>--Select Location--</option>");
                  
            }
      });

      $("#CATEGORY_NO").on("change",function(){
          var CATEGORY_NO = $("#CATEGORY_NO").val();
          var TYPE_NO = $('input[name=TYPE_NO]:checked').val();
          if (CATEGORY_NO !="-1") {
              $(".showProperty").show();
              if (TYPE_NO ==1 && CATEGORY_NO !=4) {
                $(".showRent").show();
                $("#showSeatNum").show();
                $(".showFlat").hide();
                $(".showFloor").hide();
                $("#showRentTenant").show();
                $(".showFlat").hide();
                $(".showFloor").hide();
                $("#handOverDate").hide();
                $("#showBedRoom").hide();
                $("#pSize").hide();
              }else if (TYPE_NO ==1 && CATEGORY_NO ==4) {
                $(".showRent").show();
                $(".showFlat").hide();
                $(".showFloor").hide();
                $("#showRentTenant").show();
                $(".showFloor").hide();
                $("#handOverDate").hide();
                $("#showBedRoom").show();
                $("#showSeatNum").hide();
                $("#pSize").show();
              }else if(TYPE_NO ==2 ){
                  $(".showRent").hide();
                  $("#showRentTenant").hide();
                  $(".showFlat").show();
                  $(".showFloor").hide();
                  $("#handOverDate").show();
                  $("#showBedRoom").show();
                  $("#showSeatNum").hide();
              }
              
          }else{
            $(".showProperty").hide();
          }
          
       });
      
      $(".HAS_UTILITY_BILL").click(function() {
          if($(this).prop('checked')==true){
             $(".UTILITY_BILL").show();
          }
      });
      $(".HAS_UTILITY_BILL").click(function() {
          if($(this).prop('checked')==false){
             $(".UTILITY_BILL").hide();
          }
      });
        $.fn.digits = function(){ 
            return this.each(function(){ 
                $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
            })
        }
        $("#PROPERTY_UNIT_PRICE").on("keyup",function(){
            var PROPERTY_UNIT_PRICE = $("#PROPERTY_UNIT_PRICE").val();
            var PROPERTY_SIZE = $("#PROPERTY_SIZE").val();
            $("#TOTAL_PRICE").val(Number(PROPERTY_UNIT_PRICE) * Number(PROPERTY_SIZE));
          
        });
        $("#PROPERTY_SIZE").on("keyup",function(){
            var PROPERTY_UNIT_PRICE = $("#PROPERTY_UNIT_PRICE").val();
            var PROPERTY_SIZE = $("#PROPERTY_SIZE").val();
            $("#TOTAL_PRICE").val(Number(PROPERTY_UNIT_PRICE) * Number(PROPERTY_SIZE));
             
        });
    });
  </script>