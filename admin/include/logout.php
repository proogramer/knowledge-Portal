<?php
session_start();
$_SESSION['user_id']=$db_user_id;
		$_SESSION['user_first_name']= null;
		$_SESSION['user_lastname']= null;
		$_SESSION['user_role']= null;
		$_SESSION['username']= null;
		header('location:../admin/index.php');
?>