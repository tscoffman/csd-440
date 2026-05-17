<!--
Trenten Coffman
May 17, 2026
Module 9.2 Assignment

Uses a form for the user to query the database based on game location
-->
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>TrentenUserQuery</title>
		<meta charset='utf-8'>
		
		<style>
			table {
				border-collapse: collapse;
				width: 80%;
			}
			th, td {
				border: 1px solid black;
				padding: 8px 12px;
				text-align: left;
			}
		</style>
	</head>
	
	<body>
		<a href="TrentenIndex.html">Home</a><br><br>
		<?php
			$conn = new mysqli("localhost", "student1", "pass", "baseball_01");
			
			if ($conn->connect_error) {
				die("Error: Unable to connect: " . $conn->connect_error);
			}
			
			echo 'Connected to the database.<br>';
			
			$result = mysqli_query($conn, "SELECT DISTINCT setting FROM resident_evil_games ORDER BY setting");
		?>
		<center>
			<form action="TrentenUserQuery.php" method="post">
				<label for="location">Select Game Location:</label>
				<select name="location" id="location">
					<option value="">- Choose a Location -</option>
					<?php while ($row = $result->fetch_assoc()) { ?>
						<option value="<?php echo htmlspecialchars($row['setting']); ?>"><?php echo 
							htmlspecialchars($row['setting']); ?></option>
					<?php } ?>
				</select>
				<input type="submit" value="Search">
			</form>
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['location'])) {
				//Added escape string to prevent apostrophes from breaking sql code
				$location = mysqli_real_escape_string($conn, $_POST['location']);
				$result2 = mysqli_query($conn, "SELECT * FROM resident_evil_games WHERE setting = '$location'");
				
				echo "<h3>Games set in: " . $location . "</h3>";
				echo "<table>";
				
				$headers = [
					'Game ID',
					'Title',
					'Release Year',
					'Copies Sold',
					'Setting',
					'Multiplayer'
				];
				
				echo "<tr>";
				foreach ($headers as $value) {
					echo "<th>" . $value . "</th>";
				}
				echo "</tr>";
				
				while ($row = $result2->fetch_assoc()) {
					$row['multiplayer'] = $row['multiplayer'] == 1 ? 'Yes' : 'No';
					echo "<tr>";
					foreach ($row as $value) {
						echo "<td>" . $value . "</td>";
					}
					echo "</tr>";
				}
				
				echo "</table>";
			}
			$conn->close();
		?>
		</center>
	</body>
</html>