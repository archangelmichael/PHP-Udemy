<?php 

$dbConn = mysqli_connect('localhost', 'root', '', 'php_basics');
if ($dbConn) {
	// MySQL connection has been established. 
}
else {
	die("Cannot establish connection to MySQL database.");
}

 ?>