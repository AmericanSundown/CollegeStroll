
<?php
	if ((isset($_POST['uname']))&&(isset($_POST['pass']))) {
		session_start();
		
	}
	else {
		header("location:welcome.html");

	}


?>
