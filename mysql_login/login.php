<?php 

function getUsers($dbConnection) {
	$query = "SELECT * FROM users";
	$queryResult = mysqli_query($dbConnection, $query);
	return $queryResult;
}

function registerUser($username, $password, $dbConnection) {
	$query = "INSERT INTO users(name,pass)";
	$query .= "VALUES ('$username','$password')";

	$queryResult = mysqli_query($dbConnection, $query);
	if (!$queryResult) {
		die("Registration failed :" . mysqli_error($dbConnection));
	}
	else {
		echo "Registration complete";
	}
}

function findRegisteredUser($users, $username) {
	foreach ($users as $index => $user) {
		if ($user["name"] == $username) {
			return $user;
		}
	}

	return null;
}

function loginUser($user, $username, $password) {
	if ($user["name"] == $username && $user["pass"] == $password) {
		echo "Login complete";
	}
	else {
		echo "Invalid password";
	}
}

if (isset($_POST['submit'])) {
	$name = $_POST['username'];
	$pass = $_POST['password'];

	if ($name && $pass) {
		$mysqlConn = mysqli_connect('localhost', 'root', '', 'php_basics');
		if ($mysqlConn) {
			// MySQL connection has been established. 
		}
		else {
			die("Cannot establish connection to MySQL database.");
		}

		$allUserEntries = getUsers($mysqlConn);
		if ($allUserEntries) {
			$allUsersProfiles = [];

			// while ($row = mysqli_fetch_row($allUsers)) {
			while ($row = mysqli_fetch_assoc($allUserEntries)) {
				array_push($allUsersProfiles, $row);
			}

			$foundUser = findRegisteredUser($allUsersProfiles, $name);
			if ($foundUser) {
				echo "User found. Verifying credentials...";
				loginUser($foundUser, $name, $pass);
			}
			else { // User does not exist
				echo "User not found. Attempting to register...";
				registerUser($name, $pass, $mysqlConn);
			}
		}
		else {
			echo "No users created. Attempting to register...";
			registerUser($name, $pass, $mysqlConn);
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