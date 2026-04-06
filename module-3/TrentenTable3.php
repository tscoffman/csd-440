<!--
Trenten Coffman
April 5, 2026
Module 3.2 Assignment

Displays a table with random numbers using an external function
-->
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>TrentenTable2</title>
		<meta charset='utf-8'>
	</head>
	
	<body>
		<table border='1' width='400'>
			<?php
				require "TrentenFunction.php";
				for ($rowNumber = 1; $rowNumber <= 10; $rowNumber++) {
			?>
					<tr>
						<?php
							for ($columnNumber = 1; $columnNumber <= 10; $columnNumber++) {
						?>
								<td>
									<?php
										echo(getSum(rand(1, 1000000), rand(1, 1000000)));
									?>
								</td>
						<?php
							}
						?>
					</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>