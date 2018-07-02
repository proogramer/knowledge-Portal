<?php

$db['host']="localhost";
$db['username']="root";
$db['password']="";
$db['dbname']="cms";

foreach ($db as $key => $value) 
{	
	define(strtoupper($key), $value);
}

$connection=mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME);
/*$connection=mysqli_connect("localhost","root","","cms");
*/


?>