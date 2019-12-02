

<?php
session_start();
$mysqli = new mysqli('localhost' ,'root' ,'12345' , 'exam');

	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}
	$code = $_SESSION["code"];
	$question_no = $_SESSION["question_no"] ;
	//echo $question_no;
	?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>solvepaper</title>
</head>
<body>
	<?php
	for($i=1;$i<=$question_no;$i++){
			$sql = "SELECT * FROM `setquestion` WHERE paper_id = $code and question_id='$code$i'";	
		$result_verify = $mysqli->query($sql);
		$row=mysqli_fetch_row($result_verify);
		$count = mysqli_num_rows($result_verify);
	echo "<br>";
	echo "Question no. ";
	echo "$i";	
	echo " ". $row[1];
	echo "<br>";
	?>
	<form action='solvepaper.php' method='post'>
	<input type='radio' name="ans<?php echo $i;?>" value='<?php echo $row[2] ?>'> <?php echo $row[2] ?> <br>
	
	<br>
	<input type='radio' name="ans<?php echo $i;?>" value='<?php echo $row[3] ?>'> <?php echo $row[3] ?><br>
	
	
	<br>
	<input type='radio' name="ans<?php echo $i;?>" value='<?php echo $row[4] ?>'> <?php echo $row[4] ?><br>
	
	<br>
	<input type='radio' name="ans<?php echo $i;?>" value='<?php echo $row[5] ?>'> <?php echo $row[5] ?> <br>
	
	<br>
	
	<?php
}
	?>
	<input type='submit' value='submit'> <br>
	</form>
	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		for($i=1;$i<=$question_no;$i++){
		$ans  = $_POST['ans'.$i];
		echo "<br>";
		echo $ans ;
		}
	}
	else{
		echo "error is request";
	}
	?>
	
		
	<?php
	
	?>
</body>
</html>