<?php
	include('../config/db_connection.php');
	$userName = $_POST['userName'];
	$USER_PASSWORD = md5($_POST['USER_PASSWORD']);
	 $sql="SELECT * FROM `user_reg` WHERE  (USER_EMAIL= '$userName' OR USER_CONTACT= '$userName') AND IS_ACTIVE=1 ";
	$query = mysqli_query($con,$sql);
	if(mysqli_num_rows($query) > 0){
	 	$result= mysqli_fetch_array($query);
	 	$USER_NO = $result['USER_NO'];
	 	$reset ="UPDATE `user_reg` SET `USER_PASSWORD`='$USER_PASSWORD' WHERE USER_NO =$USER_NO";
	 	$query1 = mysqli_query($con,$reset);
	 	if ($query1) {
	 		echo 1;
	 	}else{
	 		echo 0;
	 	}
	}
    

?>
