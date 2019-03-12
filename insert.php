<?php

	include('connection.php');


	if ( isset( $_POST["add"] ) ) {
		
		function validateFormData( $formData ) {
			$formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
			return $formData;
		}
		
		$username = $email = $password = $text = "";
		
		if ( !$_POST["username"] ) {
			$nameError = "Please Enter Your Name <br>";
		} else {
			$username = validateFormData( $_POST["username"] );
		}
		
		if ( !$_POST["email"] ) {
			$emailError = "Please Enter Your Email <br>";
		} else {
			$email = validateFormData( $_POST["email"] );
		}
		
		if ( !$_POST["password"] ) {
			$passwordError = "Please Enter Your Password <br>";
		} else {
			$pass = validateFormData( $_POST["password"] );
			$password = password_hash( $pass, PASSWORD_DEFAULT );
			//echo "Hashed Password: " . $password . "<br>Password: " . $pass;
		}
		
		if ( !$_POST["text"] ) {
			$textError = "Please Enter Your Text <br>";
		} else {
			$text = validateFormData( $_POST["text"] );
		}
		
		
		if ( $username && $email && $password && $text ) {
				$query = "INSERT INTO `user` (`id`, `username`, `password`, `email`, `signup_date`, `biography`) VALUES (NULL, '$username', '$password', '$email', CURRENT_TIMESTAMP, '$text');";

			if ( mysqli_query($conn, $query) ) {
					echo "<div class='alert alert-success'> Record Entered Into Database </div>";
				} else {
					echo "Error: " . $query . "<br>" . mysqli_error($conn);
				}
				mysqli_close($conn);
			}
		}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>MySQL Insert</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
</head>
<body>
	<div class="container">
		
		<h1>MySQL Insert</h1>
		
		<p class="text-danger">* Required Fields</p>
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
			
			<small class="text-danger">* <?php echo $nameError; ?></small>
			<input type="text" placeholder="Username" name="username"><br><br>
			
			<small class="text-danger">* <?php echo $emailError; ?></small>
			<input type="text" placeholder="Email" name="email"><br><br>
			
			<small class="text-danger">* <?php echo $passwordError; ?></small>
			<input type="password" placeholder="Password" name="password"><br><br>
			
			<small class="text-danger">* <?php echo $textError; ?></small>
			<textarea name="text" ></textarea><br><br>
			
			<input type="submit" name="add" value="Add Entry">
			
		</form>
		
	</div>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>