<?php
	session_start();
	include('config/db_connection.php');
	$date=date('Y-m-d');
	$userName = $_POST["userName"];
	$USER_PASSWORD = md5($_POST["USER_PASSWORD"]);
	  $sql = "SELECT * FROM user_reg WHERE (USER_CONTACT = '$userName' OR USER_EMAIL = '$userName') AND USER_PASSWORD = '$USER_PASSWORD' AND IS_ACTIVE = 1";
	$result = mysqli_query($con,$sql);
	$data = mysqli_fetch_assoc($result);
	if(!empty($data)){
		$_SESSION['client'] = $data;
		echo 1;
	}else{
		echo 0;
	}

?>
