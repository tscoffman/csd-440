<!--
Trenten Coffman
May 10, 2026
Module 8.2 Assignment

Drops the resident_evil_games table from baseball_01 database
-->
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>TrentenDropTable</title>
		<meta charset='utf-8'>
	</head>
	
	<body>
		<?php
			$conn = new mysqli("localhost", "student1", "pass", "baseball_01");
			
			if ($conn->connect_error) {
				die("Error: Unable to connect: " . $conn->connect_error);
			}
			
			echo 'Connected to the database.<br>';
			
			try {
				$conn->query('DROP TABLE resident_evil_games');
				echo "resident_evil_games table dropped successfully<br>";
			} catch (Exception $e) {
				echo "resident_evil_games table does not exist<br>";
			}
			
			$conn->close();
		?>
	</body>
</html>