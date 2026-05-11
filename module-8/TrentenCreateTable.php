<!--
Trenten Coffman
May 10, 2026
Module 8.2 Assignment

Creates a table in the baseball_01 database named resident_evil_games
-->
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>TrentenCreateTable</title>
		<meta charset='utf-8'>
	</head>
	
	<body>
		<?php
			$conn = new mysqli("localhost", "student1", "pass", "baseball_01");
			
			if ($conn->connect_error) {
				die("Error: Unable to connect: " . $conn->connect_error);
			}
			
			echo "Connected to the database.<br>";
			
			$conn->query("DROP TABLE IF EXISTS resident_evil_games");
			
			$sql='CREATE TABLE resident_evil_games (
				game_id INT AUTO_INCREMENT PRIMARY KEY,
				title CHAR(30) NOT NULL,
				release_year INT NOT NULL,
				copies_sold INT NOT NULL,
				setting CHAR(30) NOT NULL,
				multiplayer TINYINT(1) NOT NULL
			)';
			
			if ($conn->query($sql) === TRUE) {
				echo "resident_evil_games table was created successfully<br>";
			}
			else {
				echo "Error creating resident_evil_games table: " . $conn->error . "<br>";
			}
			
			$conn->close();
		?>
	</body>
</html>