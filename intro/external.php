<?php 
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$usersurname = $_POST['usersurname'];

	$minNameLength = 4;
	$existingUsers = ["Radi", "Angel", "Kate", "Karen"];

	if (strlen($username) < $minNameLength) {
		echo "Invalid name";
	}
	else if (strlen($usersurname) < $minNameLength) {
		echo "Invalid surname";
	}
	else if (!in_array($username, $existingUsers)) {
		echo "User does not exist";
	}
	else {
		echo "Welcome ".$username." ".$usersurname;
	}
}
 ?>