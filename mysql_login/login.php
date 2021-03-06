<?php include 'dbconnection.php'; ?>
<?php include 'dbfunctions.php' ?>

<?php

if (isset($_POST['submit'])) {
	$name = $_POST['username'];
	$pass = $_POST['password'];

	if ($name && $pass) {
		$allUserEntries = getUsers($dbConn);
		if ($allUserEntries) {
			$allUsersProfiles = [];

			// while ($row = mysqli_fetch_row($allUsers)) {
			while ($row = mysqli_fetch_assoc($allUserEntries)) {
				array_push($allUsersProfiles, $row);
			}

			$foundUser = findExistingUser($allUsersProfiles, $name);
			if ($foundUser) {
				echo "User found. Verifying credentials...";
				loginUser($foundUser, $name, $pass);
			}
			else { // User does not exist
				echo "User not found. Attempting to register...";
				registerUser($dbConn, $name, $pass);
			}
		}
		else {
			echo "No users created. Attempting to register...";
			registerUser($dbConn, $name, $pass);
		}
	}
	else {
		echo "Invalid username or password";
	}
}
else {
	echo "No form data received";
}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> My SQL Login </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="col-xs-6">
			<form action="login.php" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" class="form-control" placeholder="Enter username">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Enter password">
				</div>

				<input class="btn btn-primary" type="submit" name="submit" value="LOGIN">
			</form>
		</div>
	</div>
</body>
</html>