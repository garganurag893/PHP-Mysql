<?php

	include('connection.php');

	$query = "SELECT * FROM user";
	$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>MySQL Show</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
</head>
<body>
	<div class="container">
		
		<h1>DataBase</h1>
		
		<?php

			if (mysqli_num_rows($result) > 0) {
				
				echo "<table class='table table-border'><tr> <th>ID</th> <th>UserName</th> <th>Email</th> </tr>";
				
				 while ( $row = mysqli_fetch_assoc($result) ) {
					 
					 echo "<tr><td>" . $row["id"] . "</td> <td>" . $row["username"] . "</td> <td>" . $row["email"] . "</td> <td>" . $row["biography"] . "</td> </tr>";
				
				 }
				
				echo "</table>";
				

			} else {
				echo "No Result";
			}

			mysqli_close($conn);

		?>
		
	</div>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>