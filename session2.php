<?php

	session_start();

	echo "Your Username is " . $_SESSION["username"] . "<br>";
	echo "Your email is " . $_SESSION["email"] . "<br>";

	//$_SESSION["username"] = "jonbhaiya";

	print_r($_SESSION);

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Session - Page 2</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
</head>
<body>
	<div class="container">
		
		<h1>PHP Session</h1>
		
		<p> <a href="logout.php">Log Out Of Your Session</a> </p>
				
	</div>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>