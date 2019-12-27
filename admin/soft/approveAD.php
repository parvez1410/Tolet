<?php include 'include/header.php';?>
<?php $table_heading = "Approve AD";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php
        if(isset($_GET['approve'])){
            $id = $_GET['approve'];
            $sql = "UPDATE properties SET `IS_APPROVED`=1 WHERE `PROPERTY_NO` = '$id' ";
            $result = mysqli_query($con,$sql);
             echo "<meta http-equiv='Refresh' content='3; url=approveAD.php'>";
        }

        if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            $sql = "UPDATE properties SET `IS_DELETED`=1,`DELETED_BY`='-1' WHERE `PROPERTY_NO` = '$id' ";
            $result = mysqli_query($con,$sql);
             echo "<meta http-equiv='Refresh' content='3; url=approveAD.php'>";
        }
       
    ?>

        <form method="post" class="cmxform form-horizontal ">
        <fieldset class="scheduler-border">
                <legend class="scheduler-border">Search</legend>
              
                <div class="form-group ">
                     <label for="location" class="control-label col-lg-2"> Property ID</label>
                    <div class="col-lg-4">

                        <input class=" form-control" id="" name="PROPERTY_ID" type="text"  style="" >
                        
                    </div>
                   
                    <label for="item" class="control-label col-lg-2">Property Name</label>
                    <div class="col-lg-4">
                        <input class=" form-control" id="" name="PROPERTY_TITLE" type="text"  style="" >
                        
                    </div>
                </div>
                <div class="form-group ">
                     <label for="location" class="control-label col-lg-2"> Status</label>
                    <div class="col-lg-4">

                        <select class="form-control search" name="STAUS_NO" id="" style="width: 100%">
                            <option value="-1">-- Select Status --</option>
                            <option value="1">Pending</option>
                            <option value="2">Approved</option>
                            <option value="3">Deleted</option>
                        </select>
                        
                    </div>
                   
                    <label for="item" class="control-label col-lg-2">Type</label>
                    <div class="col-lg-4">
                        <select class="form-control search" name="TYPE_NO" id="" style="width: 100%">
                            <option value="-1">-- Select Type --</option>
                            <option value="1">For Rent</option>
                            <option value="2">For Sale</option>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group ">
                    
                    <label for="location" class="control-label col-lg-2">Category </label>
                    <div class="col-lg-4">
                       <select class="form-control search" name="CATEGORY_NO" id="" style="width: 100%">
                            <option value="-1">-- Select Category --</option>
                         <?php
                            $sql = "SELECT * FROM `gen_categorys` where IS_DELETED=0 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['CATEGORY_NO']?>" > <?=$row['CATEGORY_NAME']?> </option>
                        <?php endwhile;?>
                        </select>
                    </div>
                    <label for="location" class="control-label col-lg-2"></label>
                    <div class=" col-lg-4">
                        <input type="submit" class="btn btn-primary" id="searchBtn" name="searchBtn" value="Search" />
                        
                    </div>
                </div>
                
                 
          </fieldset> 
        </form>
<?php
    $tbl_name  ="properties";
    $targetpage="approveAD.php";
    $where = "";
    if(isset($_POST['searchBtn']))
    {
        
        $PROPERTY_ID =mysqli_real_escape_string($con,trim($_POST['PROPERTY_ID']));
          if($PROPERTY_ID != ""){
            $where.=" AND `properties`.`PROPERTY_ID` = '$PROPERTY_ID'";
          }
          $PROPERTY_TITLE =$_POST['PROPERTY_TITLE'];
          if($PROPERTY_TITLE != ""){
            $where.=" AND `properties`.`PROPERTY_TITLE` LIKE '%$PROPERTY_TITLE%'";
          }
         
          $STAUS_NO =$_POST['STAUS_NO'];
          if($STAUS_NO != -1){
            if($STAUS_NO ==1){
                $where.=" AND `properties`.`IS_APPROVED` = 0 AND `properties`.`IS_DELETED` = 0 ";
            }else if($STAUS_NO ==2){
                $where.=" AND `properties`.`IS_APPROVED` = 1 AND `properties`.`IS_DELETED` = 0 ";
            }else if($STAUS_NO ==3){
                $where.=" AND `properties`.`IS_DELETED` = 1 ";
            } 
          }
          $TYPE_NO =$_POST['TYPE_NO'];
          if($TYPE_NO != "-1"){
            $where.=" AND `properties`.`TYPE_NO` = '$TYPE_NO'";
          }
          $CATEGORY_NO =$_POST['CATEGORY_NO'];
          if($CATEGORY_NO != "-1"){
            $where.=" AND `properties`.`CATEGORY_NO` = '$CATEGORY_NO'";
          }
    }
    // How many adjacent pages should be shown on each side?
    $adjacents = 3;
    
    /* 
       First get total number of rows in data table. 
       If you have a WHERE clause in your query, make sure you mirror it here.
    */
    $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE 1 $where ";
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
    
    
    /*Sql query for showing data to user*/
    $sql = "SELECT $tbl_name.*,gen_categorys.CATEGORY_NAME,user_reg.USER_NO,user_reg.USER_NAME,user_reg.USER_CONTACT FROM $tbl_name LEFT JOIN user_reg ON user_reg.user_no=properties.USER_NO LEFT JOIN gen_categorys ON gen_categorys.CATEGORY_NO = properties.CATEGORY_NO   WHERE 1 $where ORDER BY $tbl_name.`IS_APPROVED` ASC, $tbl_name.`IS_DELETED` ASC LIMIT $start, $limit";
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
            $pagination.= "<p class=\"disabled\"><< previous</p>";    
        
        //pages 
        if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<p class=\"current\">$counter</p>";
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
                        $pagination.= "<p class=\"current\">$counter</p>";
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
                        $pagination.= "<p class=\"current\">$counter</p>";
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
                        $pagination.= "<p class=\"current\">$counter</p>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
            }
        }
        
        //next button
        if ($page < $counter - 1) 
            $pagination.= "<a href=\"$targetpage?page=$next\">next >></a>";
        else
            $pagination.= "<p class=\"disabled\">next >></p>";
        $pagination.= "</div>\n";       
    }
    
?>
<div style="overflow: auto">
    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th><center>Sl</center></th>
            <th><center>Type</center></th>
            <th><center>Category</center></th>
            <th><center>Property ID</center></th>
            <th><center>Title</center></th>
            <th><center>Posted By</center></th>
             <th><center>AD Time</center></th>
            <th><center>Action</center></th>
            
            
         </tr>
    <?php $i=1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            
           
           
            <td><?=($row['TYPE_NO']==1)?"Rent":"Sale"?></td>
            <td><?=$row['CATEGORY_NAME']?></td>
            <td><?=$row['PROPERTY_ID']?></td>
            <td><?=$row['PROPERTY_TITLE']?></td>
            <td><?=$row['USER_NAME']?> (<?=$row['USER_CONTACT']?>)</td>
            <td><?=$row['POSTED_ON']?></td>
            <td><center>
                <?php
                    if($row['IS_DELETED']==0 && $row['IS_APPROVED']==0):
                ?>
                <a title="Approve AD" onclick="return confirm('Are you Sure Want to Approve?');" href="<?='approveAD.php'.'?approve='.$row['PROPERTY_NO']?>" class="btn btn-info"><i class="fa fa-check" aria-hidden="true"></i> </a>
                <a title="View Details"  href="<?='AdDetails.php'.'?details='.$row['PROPERTY_NO']?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> </a>
                <a title="Delete AD" onclick="return confirm('Are you Sure Want to Delete?');" href="<?='approveAD.php'.'?delete='.$row['PROPERTY_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                <?php elseif($row['IS_DELETED']==0 && $row['IS_APPROVED']==1):?>
                    Approved  &nbsp; <a title="Delete AD" onclick="return confirm('Are you Sure Want to Delete?');" href="<?='approveAD.php'.'?delete='.$row['PROPERTY_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>

                <?php elseif( $row['IS_DELETED']==1 && $row['DELETED_BY'] == '-1'):?>
                    Deleted By Admin
                <?php elseif( $row['IS_DELETED']==1 && $row['DELETED_BY'] != '-1' ):?>
                Deleted By User
                <?php endif;?>
                </center></td>
            
        </tr>
    <?php endwhile;?>
    </table>

</div>
<?=$pagination?> 
<?php include 'include/footer.php';?>
