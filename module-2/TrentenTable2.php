<!--
Trenten Coffman
March 29, 2026
Module 2.2 Assignment

Displays a table with random numbers
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
				for ($rowNumber = 1; $rowNumber <= 10; $rowNumber++) {
			?>
					<tr>
						<?php
							for ($columnNumber = 1; $columnNumber <= 10; $columnNumber++) {
						?>
								<td>
									<?php
										echo(rand());
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