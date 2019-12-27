<?php include 'include/header.php';?>
<?php $table_heading = "Property Details";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php include 'functions/common_function.php';?>


<?php
    if (isset($_GET['details'])) {
        $PROPERTY_NO = $_GET['details'];
        $sql = "SELECT * FROM `properties` LEFT JOIN user_reg ON user_reg.user_no=properties.USER_NO LEFT JOIN gen_cities ON gen_cities.CITY_NO = properties.CITY_NO LEFT JOIN gen_areas ON gen_areas.AREA_NO = properties.AREA_NO LEFT JOIN gen_categorys ON gen_categorys.CATEGORY_NO = properties.CATEGORY_NO WHERE properties.PROPERTY_NO = '$PROPERTY_NO'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
    }
    if (isset($_GET['approve'])) {
        $PROPERTY_NO = $_GET['approve'];
        $sql = "UPDATE properties SET `IS_APPROVED`=1 WHERE `PROPERTY_NO` = '$PROPERTY_NO' ";
            $result = mysqli_query($con,$sql);
             echo "<meta http-equiv='Refresh' content='0; url=approveAD.php'>";
    }
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "UPDATE properties SET `IS_DELETED`=1,`DELETED_BY`='-1' WHERE `PROPERTY_NO` = '$id' ";
        $result = mysqli_query($con,$sql);
         echo "<meta http-equiv='Refresh' content='3; url=approveAD.php'>";
    }
    
?>
<a title="Approve AD" onclick="return confirm('Are you Sure Want to Approve?');" href="<?='AdDetails.php'.'?approve='.$row['PROPERTY_NO']?>" class="btn btn-info"><i class="fa fa-check" aria-hidden="true"></i> Aprrove AD </a> 
<a title="Delete AD" onclick="return confirm('Are you Sure Want to Delete?');" href="<?='approveAD.php'.'?delete='.$row['PROPERTY_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
<br><br>
  <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th>AD Posted By</th>
            <td><?=$row['USER_NAME']?> (<?=$row['USER_CONTACT']?>)</td>
        </tr>
        <tr>
            <th>Posted On</th>
            <td><?=$row['POSTED_ON']?> </td>
        </tr>
        <tr>
            <th>Property Name</th>
            <td><?=$row['PROPERTY_TITLE']?></td>
        </tr>
        <tr>
            <th>Property ID</th>
            <td><?=$row['PROPERTY_ID']?></td>
        </tr>
        <tr>
            <th>Property Type</th>
            <td><?=($row['TYPE_NO']==1)?"Rent":"Sale"?></td>
        </tr>
        <tr>
            <th>Category</th>
            <td><?=$row['CATEGORY_NAME']?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?=$row['ADDRESS']?></td>
        </tr>
        <tr>
            <th>Location</th>
            <td><?=$row['AREA_NAME']?></td>
        </tr>
        <tr>
            <th>City</th>
            <td><?=$row['CITY_NAME']?></td>
        </tr>
        <tr>
            <th>Property Description</th>
            <td><?=$row['PROPERTY_DESCRIPTION']?></td>
        </tr>
        <tr>
            <th>Prefered Tenant</th>
            <td><?=$row['PREFERED_TENANT']?></td>
        </tr>
        <tr>
            <th>Available From</th>
            <td><?=$row['AVAILABLE_FROM']?></td>
        </tr>
        <tr>
            <th>Monthly Seat Rent</th>
            <td><?=$row['MONTHLY_SEAT_RENT']?></td>
        </tr>
        <tr>
            <th>Utility Bill</th>
            <td><?=$row['UTILITY_BILL']?></td>
        </tr>
        <tr>
            <th>No Of Floor</th>
            <td><?=$row['NUM_OF_FLOOR']?></td>
        </tr>
        <tr>
            <th>No Of Flat</th>
            <td><?=$row['NUM_OF_FLAT']?></td>
        </tr>
        <tr>
            <th>No Of Room</th>
            <td><?=$row['NUM_OF_ROOM']?></td>
        </tr>
        <tr>
            <th>No Of Seat</th>
            <td><?=$row['NUM_OF_SEAT']?></td>
        </tr>
        <tr>
            <th>No Of Bedroom</th>
            <td><?=$row['NUM_OF_BEDROOM']?></td>
        </tr>
        <tr>
            <th>No Of Balcony</th>
            <td><?=$row['NUM_OF_BALCONY']?></td>
        </tr>
        <tr>
            <th>No Of Bathroom</th>
            <td><?=$row['NUM_OF_BATHROOM']?></td>
        </tr>
        <tr>
            <th>Bathroom Type</th>
            <td><?=$row['BATHROOM_TYPE']?></td>
        </tr>
        <tr>
            <th>Available On Floor</th>
            <td><?=$row['AVAILABLE_ON_FLOOR']?></td>
        </tr>
        <tr>
            <th>Property Size</th>
            <td><?=$row['PROPERTY_SIZE']?></td>
        </tr>
        <tr>
            <th>Property Unit Price</th>
            <td><?=$row['PROPERTY_UNIT_PRICE']?></td>
        </tr>
        <tr>
            <th>Property Total Price</th>
            <td><?=$row['TOTAL_PRICE']?></td>
        </tr>
        <tr>
            <th>Advance Amount</th>
            <td><?=$row['DEPOSITE_AMOUNT']?></td>
        </tr>
        <tr>
            <th>Handover Date</th>
            <td><?=$row['HANDOVER_DATE']?></td>
        </tr>
        <tr>
            <th>Amenities</th>
            <td><?php echo $AMENITY = showAmenities($con,$row['AMENITY_NO']);?></td>
        </tr>
        <tr>
            <th>Featured Image</th>
            <td><a class="" target="_blank" href="upload/<?=$row['IMAGE_URL1']?>" title="Click to view full image"><img src="upload/<?=$row['IMAGE_URL1']?>" height="150px" width="200px" class="img-thumbnail"></a></td>
        </tr>
        <tr>
            <th>Image 2</th>
            <td><a class="" target="_blank" href="upload/<?=$row['IMAGE_URL2']?>" title="Click to view full image"><img src="upload/<?=$row['IMAGE_URL2']?>" height="150px" width="200px" class="img-thumbnail"></a></td>
        </tr>
        <tr>
            <th>Image 3</th>
            <td><a class="" target="_blank" href="upload/<?=$row['IMAGE_URL3']?>" title="Click to view full image"><img src="upload/<?=$row['IMAGE_URL3']?>" height="150px" width="200px" class="img-thumbnail"></a></td>
        </tr>
        <tr>
            <th>Image 4</th>
            <td><a class="" target="_blank" href="upload/<?=$row['IMAGE_URL4']?>" title="Click to view full image"><img src="upload/<?=$row['IMAGE_URL4']?>" height="150px" width="200px" class="img-thumbnail"></a></td>
        </tr>
        <tr>
            <th>Image 5</th>
            <td><a class="" target="_blank" href="upload/<?=$row['IMAGE_URL5']?>" title="Click to view full image"><img src="upload/<?=$row['IMAGE_URL5']?>" height="150px" width="200px" class="img-thumbnail"></a></td>
        </tr>
     </table>

<?php include 'include/footer.php';?>
