<!--
Trenten Coffman
April 19, 2026
Module 5.2 Assignment

Created an associative array with customer information then pulled records using array methods
-->
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>TrentenCustomers</title>
		<meta charset='utf-8'>
	</head>
	
	<body>
		<?php
			$customers = [
				['firstName' => 'George', 'lastName' => 'Cartwell', 'age' => 40, 'phoneNumber' => '555-638-4567'],
				['firstName' => 'Lou', 'lastName' => 'Nap', 'age' => 26, 'phoneNumber' => '555-808-2017'],
				['firstName' => 'Bonnie', 'lastName' => 'Hart', 'age' => 53, 'phoneNumber' => '555-987-5431'],
				['firstName' => 'Gabby', 'lastName' => 'Davis', 'age' => 46, 'phoneNumber' => '555-002-2002'],
				['firstName' => 'Rachel', 'lastName' => 'Williams', 'age' => 28, 'phoneNumber' => '555-123-5930'],
				['firstName' => 'Paul', 'lastName' => 'Smith', 'age' => 39, 'phoneNumber' => '555-198-4120'],
				['firstName' => 'Fred', 'lastName' => 'Johnson', 'age' => 19, 'phoneNumber' => '555-404-2466'],
				['firstName' => 'Lizz', 'lastName' => 'Brown', 'age' => 68, 'phoneNumber' => '555-993-3743'],
				['firstName' => 'Dorris', 'lastName' => 'Miller', 'age' => 50, 'phoneNumber' => '555-837-1957'],
				['firstName' => 'Vance', 'lastName' => 'Wilson', 'age' => 35, 'phoneNumber' => '555-384-0195']
			];
			
			#Oldest Customer
			$oldestAge = max(array_column($customers, 'age'));
			$oldestIndex = array_search($oldestAge, array_column($customers, 'age'));
			$oldestCustomer = $customers[$oldestIndex];
			echo "Oldest customer: " . $oldestCustomer['firstName'] . ' ' . $oldestCustomer['lastName'] . 
				', ' . $oldestCustomer['age'] . ', ' . $oldestCustomer['phoneNumber'] . "<br />";
			
			#Specific Phone Number
			$phoneSearchIndex = array_search('555-808-2017', array_column($customers, 'phoneNumber'));
			$phoneSearchCustomer = $customers[$phoneSearchIndex];
			echo "Customer with the phone number 555-808-2017: " . $phoneSearchCustomer['firstName'] . ' ' . 
				$phoneSearchCustomer['lastName'] . ', ' . $phoneSearchCustomer['age'] . ', ' . 
				$phoneSearchCustomer['phoneNumber'] . "<br />";
			
			#Alphabetically Last First Name
			$lastAlphabetically = $customers[0]['firstName'];
			for ($x = 1; $x < count($customers); $x++) {
				if ($customers[$x]['firstName'] > $lastAlphabetically) {
					$lastAlphabetically = $customers[$x]['firstName'];
				}
			}
			$lastAlphabeticallyIndex = array_search($lastAlphabetically, array_column($customers, 'firstName'));
			$lastAlphabeticallyCustomer = $customers[$lastAlphabeticallyIndex];
			echo "Customer with the alphabetically last first name: " . $lastAlphabeticallyCustomer['firstName'] . 
				' ' . $lastAlphabeticallyCustomer['lastName'] . ', ' . $lastAlphabeticallyCustomer['age'] . ', ' . 
				$lastAlphabeticallyCustomer['phoneNumber'] . "<br />";
			
			#Full List
			echo "<br />List of all customers:<br />";
			foreach ($customers as $customer) {
				echo $customer['firstName'] . ' ' . $customer['lastName'] . 
				', ' . $customer['age'] . ', ' . $customer['phoneNumber'] . "<br />";
			}
		?>
	</body>
</html>