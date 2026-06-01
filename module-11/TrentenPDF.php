<?php
/*
Trenten Coffman
May 31, 2026
Module 11.2 Assignment

Generates a PDF file using data from resident_evil_games table in the database
*/

require('./fpdf.php');

$conn = new mysqli("localhost", "student1", "pass", "baseball_01");
if ($conn->connect_error) {
	die("Error: Unable to connect: " . $conn->connect_error);
}

$overview_text = "The Resident Evil franchise is a long-running survival horror video game series " .
	"created by Capcom in 1996. The games typically focus on outbreaks of dangerous viruses and " .
	"bio-engineered creatures created by the sinister Umbrella Corporation, leading players to " .
	"battle zombies, mutated monsters, and other biological weapons while managing limited resources. " .
	"The series is known for combining horror, exploration, puzzle-solving, and combat.";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 14);

// Description of game series
$pdf->MultiCell(0, 8, $overview_text);

$result = $conn->query("SELECT * FROM resident_evil_games");

// Table header
$pdf->Cell(50, 10, 'Title', 1, 0, 'C');
$pdf->Cell(30, 10, 'Release Year', 1, 0, 'C');
$pdf->Cell(30, 10, 'Copies Sold', 1, 0, 'C');
$pdf->Cell(50, 10, 'Setting', 1, 0, 'C');
$pdf->Cell(30, 10, 'Multiplayer', 1, 1, 'C');

$pdf->SetFont('Times', '', 12);

// Table rows
while($row = $result->fetch_assoc()) {
	$row['multiplayer'] = $row['multiplayer'] == 1 ? 'Yes' : 'No';
	
	$pdf->Cell(50, 10, $row['title'], 1, 0, 'C');
	$pdf->Cell(30, 10, $row['release_year'], 1, 0, 'C');
	$pdf->Cell(30, 10, $row['copies_sold'], 1, 0, 'C');
	$pdf->Cell(50, 10, $row['setting'], 1, 0, 'C');
	$pdf->Cell(30, 10, $row['multiplayer'], 1, 1, 'C');
}

// Table footer
$pdf->SetFont('Times', 'I', 12);
$pdf->Cell(190, 10, 'Resident Evil is a trademark of Capcom Co.', 1, 1, 'C');

$conn->close();

$pdf->Output('I', 'resident_evil.pdf');
?>