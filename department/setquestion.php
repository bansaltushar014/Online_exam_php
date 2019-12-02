

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>set question in it</title>
</head>
<body>
	
		<!-- php here to get the no. of question value and use it to make inpput form -->
		
		<?php

		// Start the session
		session_start();

		$mysqli = new mysqli('localhost' ,'root' ,'12345' , 'exam');
		if ($mysqli->connect_error) {
			die("Connection failed: " . $mysqli->connect_error);
		}
		// sql command to get question no.
		
		// session value is taken here
		$id_session = $_SESSION["id"] ;

		// echo "<br><br>". $id_session ."<br>" ;

// this is to select no. of question from that question id
$sql = "SELECT question_no FROM question WHERE id='$id_session'";
		$result_verify = $mysqli->query($sql);	
		$count = mysqli_num_rows($result_verify);	
		$row = mysqli_fetch_assoc($result_verify);
		$inputform;
		if($count>0){
			$inputform = $row["question_no"];
		} else {
		echo "Error: " . $sql . "<br>" . $mysqli->error;
			}
			// echo $inputform;
		


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// echo $inputform;
	// echo "<br>";
for($i=1;$i<=$inputform;$i++){
$quest = $_POST['Q'.$i];
$try1 = $_POST['option1'.$i];
$try2 = $_POST['option2'.$i];
$try3 = $_POST['option3'.$i];
$try4 = $_POST['option4'.$i];
$try5 = $_POST['option5'.$i];

$sql = "INSERT INTO setquestion (question ,option1, option2 , option3 , option4, option5, paper_id,question_id)
	VALUES ('$quest','$try1','$try2', '$try3', '$try4','$try5','$id_session','$id_session$i')";

	if ($mysqli->query($sql) === TRUE) {
		echo "New record created successfully";
		// header("location: student_login.php");
	}
	 else {
	echo "Error: " . $sql . "<br>" . $mysqli->error;
			}

}
echo "<br>this is wokr";
}
else{
	echo "not working <br>";
}
			
		?>

<?php
	for($i=1;$i<=$inputform;$i++){


		?>
<form action="setquestion.php" method="post">
	<?php echo 'Q'.$i.''; ?>
	<input type="text" name="Q<?php echo $i;?>">	<br> <br>
	<?php echo 'option1'.$i.''; ?>

	<input type="text" name="option1<?php echo $i; ?>"><br> <br>
	
	<?php echo 'option2'.$i.''; ?>
	<input type="text" name="option2<?php echo $i;?>"> <br> <br>
	<?php echo 'option3'.$i.''; ?>
	<input type="text" name="option3<?php echo $i;?>"> <br> <br>
	<?php echo 'option4'.$i.''; ?>
	<input type="text" name="option4<?php echo $i;?>"> <br> <br>
	<?php echo 'answer5'.$i.''; ?>
	<input type="text" name="option5<?php echo $i;?>"> <br> <br>
<?php
	}
	?>
	<input type="submit" name="submit">

	</form>

	
</body>
</html>