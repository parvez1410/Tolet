<?php include 'include/header.php';?>
<?php $table_heading = "area setup";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
 <?php
        $tbl_name="gen_areas";        //your table name
        $targetpage = "area.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user']['user_no'];
    $CURR_TIME = date('Y-m-d H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "UPDATE $tbl_name SET `IS_DELETED` = 1 ,`DELETED_BY` = '$user_no', `DELETED_ON` = '$CURR_TIME' WHERE AREA_NO = $ID";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            $mgs = "Data Delete Successfully!";
            $class = "green_color alert alert-success col-md-6 alert-dismissable";
        }
        else
        {
            $mgs = "Data Delete Fail!";
            $class = "red_color alert alert-warning alert-dismissable col-md-6";
        }
    }
    if(isset($_POST['submit']))
    {
           $AREA_NAME = trim($_POST['AREA_NAME']);
           if(isset($_POST['CITY_NO'])){
                $CITY_NO = $_POST['CITY_NO'];
           }else{
                $CITY_NO = 0;
           }
           if(isset($_POST['SHOW_HOME'])){
                $SHOW_HOME = 1;
           }else{
                $SHOW_HOME = 0;
           }
          $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `AREA_NAME` = '$AREA_NAME'  AND `CITY_NO` = '$CITY_NO' ";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1):
                if ($_FILES["AREA_IMAGE"]["error"] > 0) {
                    $AREA_IMAGE = "";
                    
                } else {
                    $AREA_IMAGE = time().$_FILES["AREA_IMAGE"]["name"];
                    move_uploaded_file($_FILES["AREA_IMAGE"]["tmp_name"],"upload/" . $AREA_IMAGE);
                }
              $sql = "INSERT INTO $tbl_name ( `AREA_NAME` , `CITY_NO`, `AREA_IMAGE`,`SHOW_HOME`, `CREATED_BY` , `CREATED_ON`) VALUES(  '$AREA_NAME','$CITY_NO' ,'$AREA_IMAGE','$SHOW_HOME', '$user_no', '$CURR_TIME')";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    $mgs = "Data Insert Successfully!";
                    $class = "green_color alert alert-success col-md-6 alert-dismissable";
                }
                else
                {
                    $mgs = "Data Insert Fail!";
                    $class = "red_color alert alert-warning alert-dismissable col-md-6";
                }
            else:
                $mgs = "Duplicate Entry!";
                $class = "red_color alert alert-warning alert-dismissable col-md-6 alert alert-warning alert-dismissable col-md-6";
            endif;
    }
    if(isset($_POST['update']))
    {
            $AREA_NAME = trim($_POST['AREA_NAME']);
            if(isset($_POST['CITY_NO'])){
                $CITY_NO = $_POST['CITY_NO'];
           }else{
                $CITY_NO = 0;
           }
            if(isset($_POST['SHOW_HOME'])){
                $SHOW_HOME = 1;
           }else{
                $SHOW_HOME = 0;
           }
           $AREA_NO = $_POST['AREA_NO'];
            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `AREA_NAME` = '$AREA_NAME'  AND `CITY_NO` = '$CITY_NO'  AND `AREA_NO` != '$AREA_NO'";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1): 
                if ($_FILES["AREA_IMAGE"]["error"] > 0) {
                    $AREA_IMAGE =$_POST['AREA_IMAGE'];
                    
                } else {
                    $AREA_IMAGE = time().$_FILES["AREA_IMAGE"]["name"];
                    move_uploaded_file($_FILES["AREA_IMAGE"]["tmp_name"],"upload/" . $AREA_IMAGE);
                }
                 $sql = "UPDATE $tbl_name SET   `AREA_NAME` = '$AREA_NAME' , `CITY_NO` = '$CITY_NO' ,`SHOW_HOME`='$SHOW_HOME',  `AREA_IMAGE` = '$AREA_IMAGE', `IS_UPDATED` = 1, `UPDATED_BY` = $user_no ,`UPDATED_ON` = '$CURR_TIME'  WHERE AREA_NO = $AREA_NO";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    $mgs = "Data Update Successfully!";
                    $class = "green_color alert alert-success col-md-6 alert-dismissable";
                    echo "<meta http-equiv='Refresh' content='3; url=area.php'>";
                }
                else
                {
                    $mgs = "Data Update Fail!";
                    $class = "red_color alert alert-warning alert-dismissable col-md-6";
                }
            else:
                $mgs = "Duplicate Entry!";
                $class = "red_color alert alert-warning alert-dismissable col-md-6";
            endif;
    }
?> 
    <?php
        if(isset($_GET['edit'])):
        $id = $_GET['edit'];
        $sql = "SELECT * FROM $tbl_name WHERE `AREA_NO` = '$id' ";
        $result = mysqli_fetch_array(mysqli_query($con,$sql));
    ?>
     <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data">
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="AREA_NO" value="<?=$result['AREA_NO']?>" />
            </div>
        </div>
        
      <div class="form-group ">
            <label for="AREA_NAME" class="control-label col-lg-3">Area Name</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="AREA_NAME" type="text" value="<?=$result['AREA_NAME']?>" required />
            </div>
            
        </div>

        <div class="form-group ">
            <label for="AREA_NO" class="control-label col-lg-3"> City Name</label>
            <div class="col-lg-5">
                 <select class="form-control" name="CITY_NO" id="CITY_NO">
                    <option value="-1">--Select City--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_cities` where IS_DELETED=0 ";
                            $query = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($query)):
                        ?>
                            <option value="<?=$row['CITY_NO']?>" <?php if($result['CITY_NO'] == $row['CITY_NO'])  echo 'selected'; ?>><?=$row['CITY_NAME']?></option>
                        <?php endwhile;?>
                    </select>  
            </div>
             
        </div>
        <div class="form-group ">
            <label for="AREA_IMAGE" class="control-label col-lg-3">Area Image </label>
            <div class="col-lg-5">
                <input type="file"  name="AREA_IMAGE" id="" value="<?=$result['AREA_IMAGE']?>">
                <img src="upload/<?=$result['AREA_IMAGE']?>" height="80" width="60"/> 
            </div>
           <div>
                <input type="hidden" name="AREA_IMAGE" value="<?=$result['AREA_IMAGE']?>" />
            </div> 
        </div>
         <div>
            <label for="SHOW_HOME" class="control-label col-lg-3"> </label>
            <div class="col-lg-5">
                <input type="checkbox" name="SHOW_HOME" <?php if($result['SHOW_HOME'] == 1)  echo 'checked'; ?>> Show in home page
            </div>
            
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" name="update" value="Update" />
                
            </div>
        </div>
    </form>
    
    <?php
        else:
    ?>

    <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data">
        <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            
        </div>
       
        <div class="form-group ">
            <label for="AREA_NAME" class="control-label col-lg-3">Area Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="AREA_NAME" type="text"  required />
            </div>
            
        </div>

        <div class="form-group ">
            <label for="CITY_NO" class="control-label col-lg-3">City Name</label>
            <div class="col-lg-5">
                 <select class="form-control" name="CITY_NO" id="CITY_NO">
                    <option value="-1">--Select City--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_cities` where IS_DELETED=0 ";
                            $result = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result)):
                        ?>
                            <option value="<?=$row['CITY_NO']?>" ><?=$row['CITY_NAME']?></option>
                        <?php endwhile;?>
                    </select>  
            </div>
             
        </div>
        <div class="form-group ">
            <label for="AREA_IMAGE" class="control-label col-lg-3">Area Image </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="AREA_IMAGE" type="file" />

            </div>
            
        </div>
       <div>
            <label for="SHOW_HOME" class="control-label col-lg-3"> </label>
            <div class="col-lg-5">
                <input type="checkbox" name="SHOW_HOME"> Show in home page
            </div>
            
        </div>
       <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" name="submit" value="Add" />
                
            </div>
        </div>
    </form>
    
    <?php
        endif;
    
    // How many adjacent pages should be shown on each side?
    $adjacents = 3;
    
    /* 
       First get total number of rows in data table. 
       If you have a WHERE clause in your query, make sure you mirror it here.
    */
    $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE IS_DELETED = 0";
    $total_pages = mysqli_fetch_array(mysqli_query($con,$query));
    $total_pages = $total_pages['num'];
    
    /* Setup vars for query. */
    $limit = 15; 
    if(isset($_GET['page']))
    {                               //how many items to show per page
        $page = $_GET['page'];
    }
    else
    $page = 1;
    
    if($page) 
        $start = ($page - 1) * $limit;          //first item to display on this page
    else
        $start = 0;                             //if no page var is given, set start to 0
    
    /* Get data. */
    $sql = "SELECT * FROM $tbl_name 
        LEFT JOIN `gen_cities` ON `gen_cities`.`CITY_NO`=$tbl_name.`CITY_NO`
         WHERE $tbl_name.IS_DELETED = 0       
                LIMIT $start, $limit";
    $result = mysqli_query($con,$sql);
    
    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
    $prev = $page - 1;                          //previous page is page - 1
    $next = $page + 1;                          //next page is page + 1
    $lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                      //last page minus 1
    
    /* 
        Now we apply our rules and draw the pagination object. 
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
    $pagination = "";
    if($lastpage > 1)
    {   
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1) 
            $pagination.= "<a href=\"$targetpage?page=$prev\"><< previous</a>";
        else
            $pagination.= "<span class=\"disabled\"><< previous</span>";    
        
        //pages 
        if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))        
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
            }
        }
        
        //next button
        if ($page < $counter - 1) 
            $pagination.= "<a href=\"$targetpage?page=$next\">next >></a>";
        else
            $pagination.= "<span class=\"disabled\">next >></span>";
        $pagination.= "</div>\n";       
    }
?>

    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th><center>Sl</center></th>
           
            <th><center>Area Name</center></th>
             <th><center>City Name</center></th>
              <th><center>Show Home</center></th>
              <th><center>Image</center></th>
            <th><center>Action</center></th>
         </tr>
    <?php $i=$page*$limit-$limit+1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><center><?=$row['AREA_NAME']?></center></td>
           <td><center><?=$row['CITY_NAME']?></center></td>
           <td><center><?=($row['SHOW_HOME']==1)?"Yes":"No"?></center></td>
           <td><a class="" target="_blank" href="upload/<?=$row['AREA_IMAGE']?>" title="Click to view full image"><img src="upload/<?=$row['AREA_IMAGE']?>" height="70px" width="60px"></a></td>
            <td>
               <center> <a onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['AREA_NO']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['AREA_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>

<?=$pagination?>
    
    <!---main content end---->
<?php include 'include/footer.php';?>
