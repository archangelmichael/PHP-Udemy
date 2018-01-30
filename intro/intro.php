<!DOCTYPE html>
 <html lang="en">
 	<head>    
   		<meta charset="UTF-8">
    	<title> PHP Udemy Intro</title>
   	</head> 
    <body>
     
    	<h2>Hello PHP</h2>
		<ul>
			<li>
				<p>Variables</p>
				<?php 
				$pageTitle = "Hello"; 
				$firstName = "Archangel";
				$lastName = "Michael";
				echo $pageTitle . " " . $firstName . " " . $lastName . "<br>";
				echo 5 + 5 . "<br>";
				echo 5 * 6.5/7 . "<br>";
				 ?>
			</li>
			<li>
				<p>Regular arrays</p>
				<?php
				$numsArr = array(23,34,'asd','sdf','<span>Hi</span>');
				echo $numsArr[2] . "<br>";
				print_r($numsArr);
				 ?>
			</li>
			<li>
				<p>Associative Arrays</p>
				<?php
				$namesArr = array("first_name" => "ARCHANGEL");
				echo $namesArr["first_name"] . "<br>";
				print_r($namesArr);
				 ?>
			</li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</body> 
</html>
