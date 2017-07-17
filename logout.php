<?php
	session_start();
	if (!isset($_SESSION['name'])) {
		header("location: welcome.php");
	}
	else if (isset($_SESSION['name'])) {
		unset($_SESSION['name']);
		session_destroy();
	}
	echo "<h1>LOGOUT SUCCESSFUL</h1>";
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css"> </head>
</html>