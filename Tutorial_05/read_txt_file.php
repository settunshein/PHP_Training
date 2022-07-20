<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<ul>
	<li>[ <a href="read_txt_file.php">Read txt File</a> ]</li>
	<li>[ <a href="read_xls_file.php">Read xls File</a> ]</li>
	<li>[ <a href="read_csv_file.php">Read csv File</a> ]</li>
	<li>[ <a href="read_pdf_file.php">Read pdf File</a> ]</li>
</ul>

<?php

echo file_get_contents('files/txt_file.txt');

?>