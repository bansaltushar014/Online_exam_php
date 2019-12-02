<?php

class DatabaseConnect 
{
	public function connect(){
		$mysqli = new mysqli('localhost' ,'root' , '12345', 'learnphp');
/*database connection condition*/
if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->connect_error);
}else{
	return $mysqli;
}
 	public function closeConnection($conn){
			mysqli_close($conn);
		}
	}
}
?>