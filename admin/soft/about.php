<?php include 'include/header.php';?>
<?php $table_heading = "About Us";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php
$tbl_name="about_us";        //your table name
$targetpage = "about_us.php";  //your file name  (the name of this file)
$user_no =$_SESSION['user']['user_no'];
$CURR_TIME = date('Y-m-d H:i:s');
$mgs = '';

if(isset($_POST['update']))
{
    $ABOUT_US = trim($_POST['ABOUT_US']);
    $VIDEO_URL = trim($_POST['VIDEO_URL']);
    $CONTACT_NO = trim($_POST['CONTACT_NO']);
    $EMAIL = trim($_POST['EMAIL']);
    $ADDRESS = trim($_POST['ADDRESS']);
    
   
    $sql = "UPDATE $tbl_name SET `ABOUT_US` = '$ABOUT_US' ,`VIDEO_URL` = '$VIDEO_URL' ,  `CONTACT_NO` = '$CONTACT_NO',`EMAIL`='$EMAIL', `ADDRESS`='$ADDRESS'  WHERE ABOUT_US_NO =1";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            $mgs = " Updated Successfully!";
            $class = "green_color alert alert-success col-md-6 alert-dismissable";
        }
        else
        {
            $mgs = " Update Fail!";
            $class = "red_color alert alert-warning alert-dismissable col-md-6";
        }
    
}
?>
 <?php
    $sql = "SELECT * FROM $tbl_name WHERE `ABOUT_US_NO` = 1 ";
    $result = mysqli_fetch_array(mysqli_query($con,$sql));
?> 
    <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data" >
        <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="ABOUT_US_NO" value="<?=$result['ABOUT_US_NO']?>" />
            </div>
        </div>

       
        <div class="form-group ">
            <label for="ABOUT_US" class="control-label col-lg-3">About us</label>
            <div class="col-lg-5">
                <textarea class=" form-control" id="ABOUT_US" name="ABOUT_US" type="text"  required > <?=$result['ABOUT_US']?> </textarea>
               
            </div>

        </div>
        <div class="form-group ">
            <label for="VIDEO_URL" class="control-label col-lg-3">Video URL </label>
            <div class="col-lg-5">
                <input class=" form-control" id="VIDEO_URL" name="VIDEO_URL" type="text"   value="<?=$result['VIDEO_URL']?>"/>
               
            </div>

        </div>
        <div class="form-group ">
            <label for="CONTACT_NO" class="control-label col-lg-3"> Contact </label>
            <div class="col-lg-5">
                <input class=" form-control" id="CONTACT_NO" name="CONTACT_NO" type="text"   value="<?=$result['CONTACT_NO']?>"/>
               
            </div>

        </div>
        <div class="form-group ">
            <label for="EMAIL" class="control-label col-lg-3">Email</label>
            <div class="col-lg-5">
                <input class=" form-control" id="EMAIL" name="EMAIL" type="text"   value="<?=$result['EMAIL']?>"/>
               
            </div>

        </div>
        
        <div class="form-group ">
            <label for="ADDRESS" class="control-label col-lg-3">Address </label>
            <div class="col-lg-5">
                <textarea class=" form-control" id="ADDRESS" name="ADDRESS" type="text"><?=$result['ADDRESS']?></textarea>
                   
            </div>

        </div>
       
        
        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" name="update" value="Update" />

            </div>
        </div>
    </form>
<?php include 'include/footer.php';?>
