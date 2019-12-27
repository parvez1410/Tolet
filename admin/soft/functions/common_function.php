<?php
		function showAmenities($con,$AMENITY){
		 $sql1 = "SELECT `AMENITY_NAME` FROM `gen_aminities` WHERE `AMENITY_NO` IN ($AMENITY)";
		$query = mysqli_query($con,$sql1);
		$result="";
		while($row = mysqli_fetch_array($query)):
			$result.=", ".$row['AMENITY_NAME'];
		endwhile;
		return substr($result, 1);
	}
?>