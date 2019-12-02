<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>examportal</title>
</head>
<body>
	<?php
	
	session_start();

	$mysqli = new mysqli('localhost' ,'root' ,'12345' , 'exam');

	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$code = $_POST['code'];

		$sql = "SELECT id,question_no FROM `question` WHERE id='$code'";
		$result_verify = $mysqli->query($sql);

		$count = mysqli_num_rows($result_verify);
		if($count>0){
			$row = mysqli_fetch_assoc($result_verify);
 			$_SESSION["question_no"] = $row["question_no"];
 			
 			
			$_SESSION["code"] = $code;
			header("location: solvepaper.php");
		}
		else{
			echo "this code is wrong";
		}
	}
	?>

	<form action="examportal.php" method="post">
		question paper code 
		<br><br>
		<input type="text" name="code"><br>
		<br><input type="submit">
	</form>
</body>
</html>