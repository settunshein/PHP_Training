<?php 

$file_name = "files/pdf_file.pdf";

header("Content-type: application/pdf");
header("Content-length:" . filesize($file_name));
readfile($file_name);

?>