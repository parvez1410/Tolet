<?php
	include('../config/db_connection.php');
	$USER_CONTACT = $_POST['USER_CONTACT'];

	 $sql="SELECT * FROM `user_reg` WHERE  `USER_CONTACT`= '$USER_CONTACT' ";
	$query = mysqli_query($con,$sql);
	if(mysqli_num_rows($query) > 0){
	 	echo 1; 
	}
    

?>
