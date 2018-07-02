<?php
include 'db.php';
session_start();
ob_start();
if(isset($_POST['sbumit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	if($username=="" && $password== $db_password="")
	{
		header("location:../index.php");
	}
	$username=mysqli_real_escape_string($connection,$username);
	$password=mysqli_real_escape_string($connection,$password);
	$sql="SELECT * FROM user WHERE username='$username' AND user_password='$password'";
	$result=mysqli_query($connection,$sql);
	while($row=mysqli_fetch_assoc($result))
	{
		$db_user_id=$row['user_id'];	
		$db_user_first_name=$row['user_first_name'];
		$db_user_lastname=$row['user_lastname'];	
		$db_user_role=$row['user_role'];	
		$db_username=$row['username'];	
		$db_password=$row['user_password'];	
	}
	if($username=== $db_username && $password=== $db_password)
	{
		header("location:../admin/");
		$_SESSION['user_id']=$db_user_id;
		$_SESSION['user_first_name']=$db_user_first_name;
		$_SESSION['user_lastname']=$db_user_lastname;
		$_SESSION['user_role']=$db_user_role;
		$_SESSION['username']=$db_username;
		
	}
	else
	{
		header("location:../index.php");
	}
}
else
{
	echo "wrong";
}
?>