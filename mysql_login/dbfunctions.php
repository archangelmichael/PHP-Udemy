<?php 

function getUsers($dbConnection) {
	$query = "SELECT * FROM users";
	$queryResult = mysqli_query($dbConnection, $query);
	return $queryResult;
}

function loginUser($user, $username, $password) {
	$success = $user["name"] == $username && $user["pass"] == $password;
	echo $success ? "Login complete" : "Login failed";
}

function registerUser($dbConnection, $username, $password) {
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

function findExistingUser($users, $username) {
	foreach ($users as $index => $user) {
		if ($user["name"] == $username) {
			return $user;
		}
	}

	return null;
}

 ?>