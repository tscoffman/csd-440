<!--
Trenten Coffman
May 17, 2026
Module 9.2 Assignment

Adds a record to the table using a form
-->
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>TrentenAddRecord</title>
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
		?>
		
		<center>
			<h2>Add a Record</h2>
			<form action="TrentenAddRecord.php" method="post">
				<label>Title: <input type="text" name="title" maxlength="30" required></label><br>
				<label>Release Year: <input type="number" name="release_year" required></label><br>
				<label>Copies Sold: <input type="number" name="copies_sold" required></label><br>
				<label>Setting: <input type="text" name="setting" maxlength="30" required></label><br>
				<label>Multiplayer: 
					<select name="multiplayer">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</label><br>
				<input type="submit" value="Add Record">
			</form>
			
			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					//Added escape string to prevent apostrophes from breaking sql code
					$title = mysqli_real_escape_string($conn, $_POST['title']);
					$release_year = $_POST['release_year'];
					$copies_sold = $_POST['copies_sold'];
					$setting = mysqli_real_escape_string($conn, $_POST['setting']);
					$multiplayer = $_POST['multiplayer'];
					
					$sql = "INSERT INTO resident_evil_games (title, release_year, copies_sold, setting, multiplayer)
						VALUES ('$title', '$release_year', '$copies_sold', '$setting', '$multiplayer')";
					
					if (mysqli_query($conn, $sql)) {
						echo "<p>Record added successfully</p>";
					}
					else {
						echo "<p>Error: " . $conn->error . "</p>";
					}
				}
			?>
		</center>
		
		<?php
			$conn->close();
		?>
	</body>
</html>