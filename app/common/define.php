<?php 

	function checkLogin()
	{
		if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
			header("Location:login.php");
		}
	}
?>