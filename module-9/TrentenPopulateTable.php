<!--
Trenten Coffman
May 10, 2026
Module 8.2 Assignment

Populates the resident_evil_games table with records
-->
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>TrentenPopulateTable</title>
		<meta charset='utf-8'>
	</head>
	
	<body>
		<a href="TrentenIndex.html">Home</a><br><br>
		<?php
			$conn = new mysqli("localhost", "student1", "pass", "baseball_01");
			
			if ($conn->connect_error) {
				die("Error: Unable to connect: " . $conn->connect_error);
			}
			
			echo 'Connected to the database.<br>';
			
			// Check if table already has records
			$result = $conn->query("SELECT COUNT(*) AS total FROM resident_evil_games");
			$row = $result->fetch_assoc();
			if($row['total'] > 0) {
				die("The table is already populated.<br>");
			}
			
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil', 1996, 5331000, 'Spencer Mansion', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil 2', 1998, 6114000, 'Raccoon City Police Dept', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil 3: Nemesis', 1999, 3570000, 'Raccoon City', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Code: Veronica', 2000, 2910000, 'Rockfort Island', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil Remake', 2002, 6339000, 'Spencer Mansion', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil Zero', 2002, 5354000, 'Arklay Mountains', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Outbreak', 2003, 1663000, 'Raccoon City', 1)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil 4', 2005, 13188000, 'Spain', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('The Umbrella Chronicles', 2007, 1536000, 'Raccoon City', 1)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil 5', 2009, 15204000, 'Kijuju, Africa', 1)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Revelations', 2012, 4596000, 'Cruise Ship', 1)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Operation Raccoon City', 2012, 2900000, 'Raccoon City', 1)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil 6', 2012, 12717000, 'China, Europe, US', 1)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Revelations 2', 2015, 4700000, 'Sein Island', 1)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil 7: Biohazard', 2017, 12700000, 'Baker Plantation, Louisana', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil 2 Remake', 2019, 13600000, 'Raccoon City Police Dept', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil 3 Remake', 2020, 8430000, 'Raccoon City', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil Village', 2021, 9490000, 'Eastern Europe', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil 4 Remake', 2023, 6480000, 'Spain', 0)");
			mysqli_query($conn, "INSERT INTO resident_evil_games(title, release_year, copies_sold, setting, multiplayer)
			VALUES('Resident Evil Requiem', 2026, 7000000, 'Raccoon City', 0)");
			
			echo "resident_evil_games table populated.<br>";
			
			$conn->close();
		?>
	</body>
</html>