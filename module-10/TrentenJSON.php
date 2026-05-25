<!--
Trenten Coffman
May 24, 2026
Module 10.2 Assignment

Encodes form data into JSON format
-->
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>TrentenJSON</title>
		<meta charset='utf-8'>
	</head>
	
	<body>
		<?php
			$submitted = ($_SERVER['REQUEST_METHOD'] === 'POST');
			$errors = [];
			$data = [];
			
			if ($submitted) {
				$fields = [
					'student_id' => 'Student ID',
					'full_name'  => 'Full Name',
					'email'      => 'Email Address',
					'phone'      => 'Phone Number',
					'dob'        => 'Date of Birth',
					'major'      => 'Major',
					'gpa'        => 'GPA',
					'grad_year'  => 'Graduation Year',
					'address'    => 'Address',
				];
				
				foreach ($fields as $key => $label) {
					if (empty($_POST[$key])) {
						$errors[] = "$label is required.";
					}
				}
				
				if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					$errors[] = 'Email Address is not valid.';
				}
				
				if (!empty($_POST['gpa'])) {
					$gpa = (float)$_POST['gpa'];
					if ($gpa < 0.0 || $gpa > 4.0) {
						$errors[] = 'GPA must be between 0.0 and 4.0.';
					}
				}
				
				if (empty($errors)) {
					$data = [
						'student_id'    => htmlspecialchars(trim($_POST['student_id'])),
						'full_name'     => htmlspecialchars(trim($_POST['full_name'])),
						'email'         => htmlspecialchars(trim($_POST['email'])),
						'phone'         => htmlspecialchars(trim($_POST['phone'])),
						'date_of_birth' => htmlspecialchars(trim($_POST['dob'])),
						'major'         => htmlspecialchars(trim($_POST['major'])),
						'gpa'           => (float)$_POST['gpa'],
						'grad_year'     => (int)$_POST['grad_year'],
						'address'       => htmlspecialchars(trim($_POST['address'])),
						'enrolled'      => isset($_POST['enrolled']) ? true : false,
					];
				}
			}
		?>
		
		<?php if ($submitted && !empty($errors)) { ?>
			<h2>Error: Please fix the following problems</h2>
			<ul>
				<?php foreach ($errors as $error) { ?>
					<li><?php echo $error; ?></li>
				<?php } ?>
			</ul>
			<a href="TrentenJSON.php">Go back to the form</a>
			
		<?php } elseif ($submitted && empty($errors)) { ?>
			<?php echo json_encode($data); ?>
			
		<?php } else { ?>
			<center>
				<form method='post' action='TrentenJSON.php'>
					<label for='student_id'>Student ID:</label>
					<input type='text' name='student_id' id='student_id' size='30'><br><br>
					
					<label for='full_name'>Full Name:</label>
					<input type='text' name='full_name' id='full_name' size='30'><br><br>
					
					<label for='email'>Email Address:</label>
					<input type='text' name='email' id='email' size='30'><br><br>
					
					<label for='phone'>Phone Number:</label>
					<input type='text' name='phone' id='phone' size='30'><br><br>
					
					<label for='dob'>Date of Birth:</label>
					<input type='date' name='dob' id='dob'><br><br>
					
					<label for='major'>Major / Field of Study:</label>
					<input type='text' name='major' id='major' size='30'><br><br>
					
					<label for='gpa'>GPA (0.0 - 4.0):</label>
					<input type='text' name='gpa' id='gpa' size='10'><br><br>
					
					<label for='grad_year'>Expected Graduation Year:</label>
					<input type='text' name='grad_year' id='grad_year' size='10'><br><br>
					
					<label for='address'>Campus Address:</label>
					<input type='text' name='address' id='address' size='40'><br><br>
					
					<label for='enrolled'>Currently Enrolled Full-Time:</label>
					<input type='checkbox' name='enrolled' id='enrolled' value='1'><br><br>
					
					<input type='submit' value='Submit Registration'>
				</form>
			</center>
		<?php } ?>
		
	</body>
</html>