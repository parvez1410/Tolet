<?php
	include('../config/db_connection.php');
	$USER_EMAIL = $_POST['USER_EMAIL'];

	 $sql="SELECT * FROM `user_reg` WHERE  `USER_EMAIL`= '$USER_EMAIL' ";
	$query = mysqli_query($con,$sql);
	if(mysqli_num_rows($query) > 0){
	 	echo 1; 
	}
    

?>
