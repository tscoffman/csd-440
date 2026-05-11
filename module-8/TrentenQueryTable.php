<!--
Trenten Coffman
May 10, 2026
Module 8.2 Assignment

Performs a few test queries on the resident_evil_games table
-->
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>TrentenQueryTable</title>
		<meta charset='utf-8'>
	</head>
	
	<body>
		<?php
			$conn = new mysqli("localhost", "student1", "pass", "baseball_01");
			
			if ($conn->connect_error) {
				die("Error: Unable to connect: " . $conn->connect_error);
			}
			
			echo 'Connected to the database.<br>';
			
			// All Records
			$result = $conn->query("SELECT * FROM resident_evil_games");
			echo "<h3>All Games</h3>";
			while($row = $result->fetch_assoc()) {
				echo $row['game_id'] . ": " . $row['title'] . " - " . $row['release_year'] . " - " . $row['copies_sold']
				. " - " . $row['setting'] . "<br>";
			}
			
			// Multiplayer Games
			$result = $conn->query("SELECT title FROM resident_evil_games WHERE multiplayer = 1");
			echo "<h3>Games With Multiplayer</h3>";
			while($row = $result->fetch_assoc()) {
				echo $row['title'] . "<br>";
			}
			
			// Best Selling Game
			$result = $conn->query("SELECT title, copies_sold FROM resident_evil_games ORDER BY copies_sold 
				DESC LIMIT 1");
			echo "<h3>Best Selling Game</h3>";
			$row = $result->fetch_assoc();
			echo $row['title'] . " - " . $row['copies_sold'] . " copies sold<br>";
			
			// Count of Games
			$result = $conn->query("SELECT COUNT(*) AS total_games FROM resident_evil_games");
			echo "<h3>Total Games</h3>";
			$row = $result->fetch_assoc();
			echo $row['total_games'] . " games in the database<br>";
			
			$conn->close();
		?>
	</body>
</html>