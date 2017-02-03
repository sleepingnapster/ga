<?php 
	session_start();
	
	if(isset($_SESSION['class'])){
		echo "<br>Session:<br>";
		echo $_SESSION['class'];
		echo "<br>";
		print_r($_SESSION);
	}
	if(isset($_COOKIE['class'])){
		echo "<br>Cookie:<br>";
		echo $_COOKIE['class'];
		echo "<br>";
		print_r($_COOKIE);
			//$_SESSION['class']=$_COOKIE['class'];
			//use it
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GA Display SessionNCookie</title>
</head>

<body>
</body>
</html>