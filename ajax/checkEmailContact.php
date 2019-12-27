<?php
	include('../config/db_connection.php');
	$userName = $_POST['userName'];

	 $sql="SELECT * FROM user_reg WHERE  (USER_EMAIL= '$userName' OR USER_CONTACT= '$userName') AND IS_ACTIVE=1";
	$query = mysqli_query($con,$sql);
	if(mysqli_num_rows($query) >0){
	 	echo 1; 
	}else{
		echo 0;
	}
    

?>
