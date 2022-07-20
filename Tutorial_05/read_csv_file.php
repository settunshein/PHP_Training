<?php
require "vendor/autoload.php";
$reader      = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load("files/csv_file.csv");
$worksheet   = $spreadsheet->getActiveSheet();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Day 05</title>
	<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<ul>
		<li>[ <a href="read_txt_file.php">Read txt File</a> ]</li>
		<li>[ <a href="read_xls_file.php">Read xls File</a> ]</li>
		<li>[ <a href="read_csv_file.php">Read csv File</a> ]</li>
		<li>[ <a href="read_pdf_file.php">Read pdf File</a> ]</li>
	</ul>
 	<table>
	 	<?php
	    	foreach ($worksheet->getRowIterator() as $row) {
		      	$cellIterator = $row->getCellIterator();
		      	$cellIterator->setIterateOnlyExistingCells(false);
		      	echo "<tr>";
		      	foreach ($cellIterator as $cell){ 
		      		echo "<td>". $cell->getValue() ."</td>"; 
		      	}
	      		echo "</tr>";
    		}
		?>
    </table>
</body>
</html>