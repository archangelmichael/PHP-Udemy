<?php 
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$usersurname = $_POST['usersurname'];

	$minNameLength = 4;
	if (strlen($username) < $minNameLength) {
		echo "Invalid name";
	}
	else if (strlen($usersurname) < $minNameLength) {
		echo "Invalid surname";
	}
	else {
		echo "Welcome ".$username." ".$usersurname;
	}
}
 ?>

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
				<p>Post form data to externally</p>
				<form action="external.php" method="post">
					<input type="text" name="username" placeholder="Enter name">
					<input type="text" name="usersurname" placeholder="Enter surname">
					<input type="submit" name="submit" text="Send externally">
				</form>
			</li>
			<li>
				<p>Post form data locally</p>
				<form action="intro.php" method="post">
					<input type="text" name="username" placeholder="Enter name">
					<input type="text" name="usersurname" placeholder="Enter surname">
					<input type="submit" name="submit" text="Send locally">
				</form>
			</li>
			<li>
				<p>Array Functions</p>
				<?php 
				$arrFuncs = [2,543,23,54,-2];
				echo max($arrFuncs)."<br>";
				echo min($arrFuncs)."<br>";
				sort($arrFuncs);
				print_r($arrFuncs);
				$arrFuncValue = 23;
				echo "<br>";
				echo in_array($arrFuncValue, $arrFuncs) == 1 ? "FOUND" : "NOT FOUND";
				 ?>
			</li>
			<li>
				<p>String Functions</p>
				<?php 

				$randStr = "This is some random string";
				echo strlen($randStr)."<br>";
				echo strtoupper($randStr)."<br>";
				echo strtolower($randStr)."<br>";
				echo str_word_count($randStr)."<br>";

				 ?>
			</li>
			<li>
				<p>Math Functions</p>
				<?php 
				echo pow(2, 2).'<br>';
				echo min(2,3,4,5,-23).'<br>';
				echo sqrt(78).'<br>';
				echo rand(100, 107).'<br>';
				echo floor(5.6).'<br>';
				echo ceil(5.3).'<br>';
				echo round(4.312343);
				 ?>
			</li>
			<li>
				<p>Constants</p>
				<?php 
				define("GLOBAL_VAR", "Global");
				echo GLOBAL_VAR.'<br>';

				$x = 6;
				function showX() {
					global $x;
					echo $x.'<br>';
				}

				showX();
				 ?>
			</li>
			<li>
				<p>Functions</p>
				<?php 

				function greet($value='Anonymous')
				{
					echo "Hello " . $value . '<br>'; 
				}

				greet();
				greet('Someone');

				function increment($num1) {
					return $num1 + 1;
				}

				$newNum = increment(5);
				echo $newNum;

				 ?>
			</li>
			<li>
				<p>Loops</p>
				<?php 
				$loopsVar = 5;
				while ($loopsVar < 10) {
				 	echo $loopsVar . '<br>';
				 	$loopsVar += 1;
				 } 

				 for ($i=0; $i < 4; $i++) { 
				 	echo $i . '<br>';
				 }

				 $loopsNums = [2,5,345,1234,-34];
				 foreach ($loopsNums as $key => $value) {
				 	echo 'key:' . $key . ' value:' . $value . '<br>';
				 }
				 ?>
			</li>
			<li>
				<p>Conditionals</p>
				<?php
				$a = 5; 
				if ($a < 5) {
					echo "Smaller".'<br>';
				}
				else {
					echo "Bigger or equal".'<br>';
				}

				switch ($a) {
					case '1': echo 'one'; break;
					case 5 : echo 'five'; break;
					default: echo 'default'; break;
				}
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
			<li>
				<p>Regular arrays</p>
				<?php
				$numsArr = array(23,34,'asd','sdf','<span>Hi</span>');
				echo $numsArr[2] . "<br>";
				print_r($numsArr);
				 ?>
			</li>
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
		</ul>
	</body> 
</html>
