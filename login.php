<?php

	if ( isset ( $_POST["login"] ) ) {
		
		function validateFormData($formData) {
			$formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
			return $formData;
		}
		
		$formUser = validateFormData($_POST["username"]);
		$formPass = validateFormData($_POST["password"]);
		
		include('connection.php');
		
		$query = "SELECT username, email, password FROM user WHERE username = '$formUser'";
		$result = mysqli_query($conn, $query);
		
		if ( mysqli_num_rows($result) > 0 ) {
			
			//echo"Data Available";
			
			while ( $row = mysqli_fetch_assoc($result) ) {
				$user = $row["username"];
				$email = $row["email"];
				$hashedPass = $row["password"];
			}
			
			if ( password_verify($formPass, $hashedPass) ) {
				
				session_start();
				
				$_SESSION["username"] = $user;
				$_SESSION["email"] = $email;
				
				header("Location: profile.php");
				
			} else {
				$loginError = "<div class='alert alert-danger'>Wrong Username / Password</div>";
			}
			
		} else {
			$loginError = "<div class='alert alert-danger'>No such user in Database. Please Try Again!!! <a class='close' data-dismiss='alert'>&times;</a></div>";
		}
		
		mysqli_close($conn);
//		print_r($result);
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
</head>
<body>
	<div class="container">
		
		<h1>Login</h1>
		
		<p class="lead"> Fill This Form To Login </p>
		
		
		<?php echo $loginError; ?>
		
		<form class="form-inline" method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]); ?>">
			<input type="text" placeholder="Username" name="username">
			<input type="password" placeholder="Password" name="password">
			<button type="submit" name="login"> Login </button>
		</form>
		
	</div>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>