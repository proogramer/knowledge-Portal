<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_POST['submit']))
{
	$u_id=$_GET['user_id'];
	$username=$_POST['username'];
	$user_first_name=$_POST['user_first_name'];
	$user_lastname=$_POST['user_lastname'];
	$user_password=$_POST['user_password'];
	$user_email=$_POST['user_email'];
	
	
	$user_im=$_FILES['user_image']['name'];
	$user_image_tmp=$_FILES['user_image']['tmp_name'];
	
	
	$user_role=$_POST['user_role'];
	$randsalt=$_POST['randsalt'];
	$post_date=date('d-m-y');
	
	
	move_uploaded_file($user_image_tmp, "../images/$user_im");
	
	echo $sql="UPDATE user set 
	username='".$username."',
	user_first_name='".$user_first_name."',
	user_lastname='".$user_lastname."',
	user_password='".$user_password."',
	user_image='".$user_im."',
	user_email='".$user_email."',
	user_role='".$user_role."',
	randsalt='".$randsalt."'
	WHERE user_id='$u_id'
	";
	$result=mysqli_query($connection,$sql);
	if($result)
	{
		"right";
	}
	else
	{
		echo "wrong";
	}
}
?>

<?php
if(isset($_GET['user_id']))
{
	$u_id=$_GET['user_id'];
	$sql="SELECT * FROM user WHERE  user_id='$u_id' ";
	$resul=mysqli_query($connection,$sql);
	$ro=mysqli_fetch_assoc($resul);
?>

<div class="row" id="add_post">
		<div class="col-lg-12" id="add_post" >
			<h1 class="page-header">
				WELCOME TO ADMIN
				<small>Author</small>
			</h1>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
	<label for="username">User Name</label>
		<input type="text" data-validation="required"  class="form-control" value="<?php echo $ro['username'];?>" name="username"  />
</div>
<div class="form-group">
	<label for="user_first_name">First Name</label>
		<input type="text" data-validation="required"  class="form-control" value="<?php echo $ro['user_first_name'];?>" name="user_first_name"  />
</div>
<div class="form-group">
	<label for="last_name">Last Name</label>
		<input type="text" data-validation="required"  class="form-control" value="<?php echo $ro['user_lastname'];?>" name="user_lastname"  />
</div>
<div class="form-group">
	<label for="E-mail">E-mail</label>
		<input type="email data-validation="required"   class="form-control" value="<?php echo $ro['user_email'];?>" name="user_email"  />
</div>

<div class="form-group">
	<label for="passwword">Password</label>
		<input type="password" data-validation="required"  class="form-control" value="<?php echo $ro['user_password'];?>" name="user_password"  />
</div>
<div class="form-group">
	<img width="100" src="../images/<?php echo $ro['user_image'];?>"  />
</div>
<div class="form-group">
	<label for="user_image">Image</label>
		<input type="file" data-validation="required"  name="user_image"  />
</div>
<div class="form-group">
	<label for="rand_salt">Randsalt</label>
		<input type="text" data-validation="required"  class="form-control" value="<?php echo $ro['randsalt'];?>" name="randsalt"  /> 
</div>
<div class="form-group">
	<label for="user_role">Role</label>
		<input type="text" data-validation="required"  class="form-control" value="<?php echo $ro['user_role'];?>" name="user_role"  /> 
</div>
<div class="form-group">
		<input type="submit" class="btn btn-primary" name="submit" value="Publish"  />
</div>
</form>
<?php
}
?>
</div>
</div>
</body>
</html>