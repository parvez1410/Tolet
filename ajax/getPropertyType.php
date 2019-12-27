<?php
	include('../config/db_connection.php');
	$TYPE_NO = $_POST['TYPE_NO'];

	 $sql="SELECT * FROM `gen_categorys` WHERE `IS_DELETED`=0 AND `TYPE_NO`= '$TYPE_NO' ";
	$query = mysqli_query($con,$sql);
	$html = "";
	if(mysqli_num_rows($query) > 0){
	 	$html .="<select class='form-control' name='CATEGORY_NO' id='CATEGORY_NO'>";
	 	$html .="<option value='-1'>".'-- Select Property Type --'."</option>";
	    while($row = mysqli_fetch_array($query)):
	        $html .="<option value='".$row['CATEGORY_NO']."'>".$row['CATEGORY_NAME']."</option>";
	    endwhile;
	    $html .="</select>";  
	}
    echo $html;

?>
