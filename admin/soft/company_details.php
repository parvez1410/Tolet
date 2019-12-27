<?php include 'include/header.php';?>
<?php $table_heading = "Company Details";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>




 <?php
    $tbl_name="company_details";        //your table name
    $user_no =$_SESSION['user']['user_no'];
    
    $targetpage = "company_details.php";  //your file name  (the name of this file)
    $CURR_TIME = date('Y-m-d H:i:s'); 
    $mgs = '';
    // $class='';
    
    
    
   if(isset($_POST['update']))
    {
        $ABOUT_COMPANY_NO=trim($_POST['ABOUT_COMPANY_NO']);

        $EN_ABOUT_COMPANY=mysqli_real_escape_string($con,trim($_POST['EN_ABOUT_COMPANY']));

        $BN_ABOUT_COMPANY=mysqli_real_escape_string($con,trim($_POST['BN_ABOUT_COMPANY']));

        $EN_ADDRESS=mysqli_real_escape_string($con,trim($_POST['EN_ADDRESS']));

        $BN_ADDRESS=mysqli_real_escape_string($con,trim($_POST['BN_ADDRESS']));

        $EN_CONTACT_NUM=mysqli_real_escape_string($con,trim($_POST['EN_CONTACT_NUM']));

        $BN_CONTACT_NUM=mysqli_real_escape_string($con,trim($_POST['BN_CONTACT_NUM']));

        $EMAIL=mysqli_real_escape_string($con,trim($_POST['EMAIL']));

        $FACEBOOK=mysqli_real_escape_string($con,trim($_POST['FACEBOOK']));

        $TWITTER=mysqli_real_escape_string($con,trim($_POST['TWITTER']));

        $INSTRAGRAM=mysqli_real_escape_string($con,trim($_POST['INSTRAGRAM']));

        
            $sql = "UPDATE $tbl_name SET `ABOUT_COMPANY_NO`='$ABOUT_COMPANY_NO',`EN_ABOUT_COMPANY`='$EN_ABOUT_COMPANY',`BN_ABOUT_COMPANY`='$BN_ABOUT_COMPANY',`EN_ADDRESS`='$EN_ADDRESS',`BN_ADDRESS`='$BN_ADDRESS',`EN_CONTACT_NUM`='$EN_CONTACT_NUM',`BN_CONTACT_NUM`='$BN_CONTACT_NUM' , `EMAIL`='$EMAIL' ,`FACEBOOK`='$FACEBOOK' , `TWITTER`='$TWITTER' , `INSTRAGRAM`='$INSTRAGRAM' ,`IS_UPDATED`=1,`UPDATED_BY` = '$user_no', `UPDATED_ON` = '$CURR_TIME' WHERE `ABOUT_COMPANY_NO` = '$ABOUT_COMPANY_NO' ";

            $result = mysqli_query($con,$sql);

             if($result)
                {
                    $mgs = "Data Update Successfully!";
                    $class = "green_color alert alert-success col-md-6 alert-dismissable";
                }
                else
                {
                    $mgs = "Data Update Fail!";
                    $class = "red_color alert alert-warning alert-dismissable col-md-6";
                }
            
    }
?> 


    <?php
    $sql = "SELECT * FROM $tbl_name ";
    $result = mysqli_fetch_array(mysqli_query($con,$sql));
    ?>


     <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data" >
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-5 col-md-offset-3 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="ABOUT_COMPANY_NO" value="<?=$result['ABOUT_COMPANY_NO']?>" />
            </div>
        </div>


        <div class="form-group ">
            <label for="EN_ABOUT_COMPANY" class="control-label col-lg-2">About Company (English)</label>
            <div class="col-lg-4">
                <textarea class=" form-control" id="EN_ABOUT_COMPANY " name="EN_ABOUT_COMPANY" value="<?=$result['EN_ABOUT_COMPANY']?>" type="text"    > <?php echo$result['EN_ABOUT_COMPANY']?> </textarea>
            </div>


            <label for="BN_ABOUT_COMPANY" class="control-label col-lg-2">About Company (Bangla)</label>
            <div class="col-lg-4">
                <textarea class=" form-control" id="BN_ABOUT_COMPANY " name="BN_ABOUT_COMPANY" value="<?=$result['BN_ABOUT_COMPANY']?>" type="text"    > <?php echo$result['BN_ABOUT_COMPANY']?> </textarea>
            </div>
        </div>




         <div class="form-group ">
            <label for="EN_ADDRESS" class="control-label col-lg-2">ADDRESS (English)</label>
            <div class="col-lg-4">
                <input class=" form-control" id="EN_ADDRESS	" name="EN_ADDRESS" value="<?=$result['EN_ADDRESS']?>" type="text"    />
            </div>

            <label for="BN_ADDRESS" class="control-label col-lg-2">ADDRESS (Bangla)</label>
            <div class="col-lg-4">
                <input class=" form-control" id="EN_ADDRESS " name="BN_ADDRESS" value="<?=$result['BN_ADDRESS']?>" type="text"    />
            </div>
        </div>




        <div class="form-group ">
            <label for="EN_CONTACT_NUM" class="control-label col-lg-2">Contact (English)</label>
            <div class="col-lg-4">
                <input class=" form-control" id="EN_CONTACT_NUM" name="EN_CONTACT_NUM" type="text" value="<?=$result['EN_CONTACT_NUM']?>"  />
            </div>

             <label for="BN_CONTACT_NUM" class="control-label col-lg-2">Contact (Bangla)</label>
            <div class="col-lg-4">
                <input class=" form-control" id="BN_CONTACT_NUM" name="BN_CONTACT_NUM" type="text" value="<?=$result['BN_CONTACT_NUM']?>"  />
            </div>




        </div>



        <div class="form-group ">
            <label for="EMAIL" class="control-label col-lg-2">Email</label>
            <div class="col-lg-5">
                <input class=" form-control" id="EMAIL" name="   EMAIL" type="text" value="<?=$result['EMAIL']?>"  />
            </div>
        </div>

        <div class="form-group ">
            <label for="FACEBOOK" class="control-label col-lg-2">Facebook</label>
            <div class="col-lg-5">
                <input class=" form-control" id="FACEBOOK" name="   FACEBOOK" type="text" value="<?=$result['FACEBOOK']?>"  />
            </div>
        </div>

        <div class="form-group ">
            <label for="TWITTER" class="control-label col-lg-2">Twitter</label>
            <div class="col-lg-5">
                <input class=" form-control" id="TWITTER" name="   TWITTER" type="text" value="<?=$result['TWITTER']?>"  />
            </div>
        </div>

         <div class="form-group ">
            <label for="INSTRAGRAM" class="control-label col-lg-2">Google Plus</label>
            <div class="col-lg-5">
                <input class=" form-control" id="INSTRAGRAM" name="   INSTRAGRAM" type="text" value="<?=$result['INSTRAGRAM']?>"  />
            </div>
        </div>


        
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-2  col-lg-5">
                <input type="submit" class="btn btn-primary" name="update" value="Update" />
                
            </div>
        </div>
    </form>
    
   
<?php include 'include/footer.php';?>
