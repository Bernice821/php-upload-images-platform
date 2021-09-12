<?php
	session_start();
	unset($_SESSION["username"]);
	unset($_SESSION["password"]);
		   
	echo '請重新登入';
	header('Refresh: 2; URL = login.php');
?>