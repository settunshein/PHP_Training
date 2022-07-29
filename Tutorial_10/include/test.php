<?php

// include('include/header.php');	

// insertDummyUser();

$hash1 = password_hash('123123123', PASSWORD_BCRYPT);
$hash2 = password_hash('password', PASSWORD_BCRYPT);
echo $hash1 . '<br>'; 
echo $hash2 . '<br>';
// $2y$10$Py.a1GgLvkIeg9WKj9Xts.WMobtmPBWrR3jfp183IULtUaXkyqN/C
echo '<hr>';



$hash = '$2y$10$JZeBHtOmS5orKpD9uP7lWuYlKaGP8XUIZCbhqCyjDl0vPFG11Lgzi';
if( password_verify('123', $hash) ){
	echo 'Correct';
}else{
	echo 'Incorrect';
}
echo '<hr>';

/*
# Tesing Mail 
  - ddktestweb01@gmail.com
  - boomxhakalaka
*/

echo !extension_loaded('openssl') ? 'Not Available' : 'Available';
echo '<hr>';



function printToken()
{
	$token = md5( uniqid(time()) );
	$token = sha1($token);
	$token = crypt($token, $token);
	echo $token; 
	echo '<hr>';
}
printToken();



function printDate()
{ 
	// echo "mktime() Hour : "  . mktime(date('H'));
	// echo '<br>';
	// echo "mktime() Month: "  . mktime(date('m'));
	// echo '<br>';
	// echo "mktime() Year : "  . mktime(date('Y'));
	$exp_format  = mktime( date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y") );
   	$exp_date    = date("Y-m-d H:i:s", $exp_format);
   	echo $exp_date;
   	echo '<hr>';
}
printDate();