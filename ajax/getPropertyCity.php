<?php
	include('../config/db_connection.php');
	$CITY_NO = $_POST['CITY_NO'];

	 $sql="SELECT * FROM `gen_areas` WHERE `IS_DELETED`=0 AND `CITY_NO`= '$CITY_NO' ";
	$query = mysqli_query($con,$sql);
	$html = "";
	if(mysqli_num_rows($query) > 0){
	 	$html .="<select class='form-control' name='AREA_NO' id='AREA_NO'>";
	 	$html .="<option value='-1'>".'-- Select City --'."</option>";
	    while($row = mysqli_fetch_array($query)):
	        $html .="<option value='".$row['AREA_NO']."'>".$row['AREA_NAME']."</option>";
	    endwhile;
	    $html .="</select>";  
	}
    echo $html;

?>
