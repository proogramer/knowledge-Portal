<?php
session_start();
$_SESSION['user_id']=null;
$_SESSION['user_first_name']= null;
$_SESSION['user_lastname']= null;
$_SESSION['user_role']= null;
$_SESSION['username']= null;
		
header('location:../index.php');
?>