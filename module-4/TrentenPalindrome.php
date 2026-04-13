<!--
Trenten Coffman
April 12, 2026
Module 4.2 Assignment

Checks a list of words to see if they are palindromes
-->
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>TrentenPalindrome</title>
		<meta charset='utf-8'>
	</head>
	
	<body>
		<?php
			function palindrome_checker($stringArray) {
				foreach ($stringArray as $word) {
					echo "Original: {$word}<br>";
					$reversed = strrev($word);
					echo "Reversed: {$reversed}<br>";
					if ($word === $reversed) {
						echo "{$word} is a palindrome<br><br>";
					}
					else {
						echo "{$word} is NOT a palindrome<br><br>";
					}
				}
			}
			
			$stringArray = array("level", "eye", "variable", "palindrome", "kayak", "reader");
			palindrome_checker($stringArray);
		?>
	</body>
</html>