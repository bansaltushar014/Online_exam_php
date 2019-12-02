<?php
// Start the session
session_start();

$mysqli = new mysqli('localhost' ,'root' ,'12345' , 'exam');

if ($mysqli->connect_error) {
	die("Connection failed: " . $mysqli->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$branch = $_POST['branch'];
	$sem = $_POST['sem'];
	$id = $_POST['id'];
	$question_no = $_POST['question_no'];
	// created a session and passed it 
	$_SESSION["id"] = $id;

	$verify = "SELECT id FROM `question` WHERE id=$id";
	$result_verify = $mysqli->query($verify);
	$count = mysqli_num_rows($result_verify);
	if($count>0){
		echo "Sorry, This id exist already <br>";
	}
	else{
	$sql = "INSERT INTO question (branch, sem, id, question_no) VALUES ('$branch', '$sem', '$id', '$question_no')";
	if ($mysqli->query($sql) === TRUE) {
		echo "New record created successfully";
		header("location: setquestion.php");
	}
	 else {
	echo "Error: " . $sql . "<br>" . $mysqli->error;
			}
}
}
else{
	echo "not connected server";
}
?>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>question set</title>
</head>
<body>
	<form action="question.php" method="POST">
		branch <br> <br>
		<input type="text" name="branch"><br> <br>
		sem <br> <br>
		<input type="text" name="sem"> <br> <br>
		id <br> <br>
		<input type="text" name="id"> <br> <br>
		no. of question <br> <br>
		<input type="number" name="question_no"><br> <br>
		<input type="submit" name="submit">
	</form>
</body>
</html> -->
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Question</title>
<link rel="icon" href="../img/icon.ico">
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script type="text/javascript">

//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "45px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>
<style>
body{
	background: #348A96;
}
.form-style-8{
	font-family: 'Open Sans Condensed', arial, sans;
	width: 500px;
	padding: 30px;
	background: #FFFFFF;
	margin: 50px auto;
	box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

}
.form-style-8 h2{
	background: #4D4D4D;
	text-transform: uppercase;
	font-family: 'Open Sans Condensed', sans-serif;
	color: #797979;
	font-size: 18px;
	font-weight: 100;
	padding: 20px;
	margin: -30px -30px 30px -30px;
}
.form-style-8 input[type="text"],
.form-style-8 input[type="date"],
.form-style-8 input[type="datetime"],
.form-style-8 input[type="email"],
.form-style-8 input[type="number"],
.form-style-8 input[type="search"],
.form-style-8 input[type="time"],
.form-style-8 input[type="url"],
.form-style-8 input[type="password"],
.form-style-8 textarea,
.form-style-8 select 
{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	outline: none;
	display: block;
	width: 100%;
	padding: 7px;
	border: none;
	border-bottom: 1px solid #ddd;
	background: transparent;
	margin-bottom: 10px;
	font: 16px Arial, Helvetica, sans-serif;
	height: 45px;
}
.form-style-8 textarea{
	resize:none;
	overflow: hidden;
}
.form-style-8 input[type="button"], 
.form-style-8 input[type="submit"]{
	-moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	-webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	box-shadow: inset 0px 1px 0px 0px #45D6D6;
	background-color: #2CBBBB;
	border: 1px solid #27A0A0;
	display: inline-block;
	cursor: pointer;
	color: #FFFFFF;
	font-family: 'Open Sans Condensed', sans-serif;
	font-size: 14px;
	padding: 8px 18px;
	text-decoration: none;
	text-transform: uppercase;
}
.form-style-8 input[type="button"]:hover, 
.form-style-8 input[type="submit"]:hover {
	background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
	background-color:#34CACA;
}
</style>
</head>

<body>

<div class="form-style-8">
  <h2>Set Question paper</h2>
  <form action="question.php" method="POST">
    <!-- <input type="text" name="field1" placeholder="Full Name" /> -->
    <input type="text" name="branch" placeholder="Branch" />
    <input type="text" name="sem" placeholder="Sem" />
    <input type="text" name="id" placeholder="Id" />
    <input type="number" name="question_no" placeholder="Question No" />
    <!-- <textarea placeholder="Message" onkeyup="adjust_textarea(this)"></textarea> -->
    <input type="submit" value="Submit" />
  </form>
</div>

</body>
</html>
