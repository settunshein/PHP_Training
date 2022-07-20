<?php
require "vendor/autoload.php";
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
	<section>
		<h2>Read txt File</h2>
		<?= file_get_contents('files/txt_file.txt'); ?>
	</section>

	<section>
		<h2>Read xls File</h2>
	 	<table>
		 	<?php
		 		$reader      = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
				$reader->setReadDataOnly(true);
				$spreadsheet = $reader->load("files/xls_file.xls");
				$worksheet   = $spreadsheet->getActiveSheet();
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
	</section>

    <section>
    	<h2>Read csv File</h2>
	    <table>
		 	<?php
		 		$reader      = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				$reader->setReadDataOnly(true);
				$spreadsheet = $reader->load("files/csv_file.csv");
				$worksheet   = $spreadsheet->getActiveSheet();
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
    </section>

    <section>
    	<h2>Read doc File</h2>
    	<?php

    	function kv_read_word($input_file){	
	 		$kv_strip_texts = ''; 
	     	$kv_texts = ''; 	

			if( !$input_file || !file_exists($input_file) ){
				return false;
			}
			$zip = zip_open($input_file);
				
			if ( !$zip || is_numeric($zip) ) {
				return false;
			}

			while($zip_entry = zip_read($zip)) {
					
				if ( zip_entry_open($zip, $zip_entry) == FALSE ){
					continue;
				}
					
				if (zip_entry_name($zip_entry) != "word/document.xml"){
					continue;
				}

				$kv_texts .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
					
				zip_entry_close($zip_entry);
			}
			zip_close($zip);
				
			$kv_texts = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $kv_texts);
			$kv_texts = str_replace('</w:r></w:p>', "\r\n", $kv_texts);
			$kv_strip_texts = strip_tags($kv_texts,'');
			return $kv_strip_texts;
		}
		?>

		<?php
		$kv_texts = kv_read_word('files/doc_file.docx');
		if($kv_texts !== false) {		
			echo $kv_texts;	
		}
		?>
    </section>
</body>
</html>