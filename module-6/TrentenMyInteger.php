<!--
Trenten Coffman
April 26, 2026
Module 6.2 Assignment

Defines a class with a private integer variable and methods to interact with that variable
-->
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>TrentenMyInteger</title>
		<meta charset='utf-8'>
	</head>
	
	<body>
		<?php
			class TrentenMyInteger {
				private int $number;
				
				function __construct(int $number) {
					$this->number = $number;
				}
				
				function isEven(int $number) {
					if ($number % 2 == 0) {
						return "$number is even<br />";
					}
					else {
						return "$number is not even<br />";
					}
				}
				
				function isOdd(int $number) {
					if ($number % 2 !== 0) {
						return "$number is odd<br />";
					}
					else {
						return "$number is not odd<br />";
					}
				}
				
				function isPrime(int $number) {
					if ($number <= 1) {
						return "$number is not prime<br />";
					}
					for ($i = 2; $i < $number; $i++) {
						if ($number % $i == 0) {
							return "$number is not prime<br />";
						}
					}
					return "$number is prime<br />";
				}
				
				function getNumber() {
					return $this->number;
				}
				
				function setNumber(int $number) {
					$this->number = $number;
				}
			}
			
			$num1 = new TrentenMyInteger(23);
			echo "Value: " . $num1->getNumber() . "<br />";
			echo $num1->isEven($num1->getNumber());
			echo $num1->isOdd($num1->getNumber());
			echo $num1->isPrime($num1->getNumber());
			$num1->setNumber(1);
			echo "New value: " . $num1->getNumber() . "<br /><br />";
			
			$num2 = new TrentenMyInteger(8);
			echo "Value: " . $num2->getNumber() . "<br />";
			echo $num2->isEven($num2->getNumber());
			echo $num2->isOdd($num2->getNumber());
			echo $num2->isPrime($num2->getNumber());
			$num2->setNumber(5);
			echo "New value: " . $num2->getNumber();
		?>
	</body>
</html>