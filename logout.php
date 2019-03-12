<?php

	if (isset ( $_COOKIE[ session_name() ] )) {
		setcookie( session_name(), '', time() - 86400, '/' );
	}

	session_unset();
	session_destroy();

	echo "You Have Been Loged Out";

	print_r($_SESSION);

	echo "<p> <a href='login.php'> Click Here To Login !!! </a> </p>";

?>