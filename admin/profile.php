
<?php
ob_start();
session_start();
include "include/header.php";
?>
    <div id="wrapper">

        <!-- Navigation -->
       <?php include "include/navigation.php" ?>
<div id="page-wrapper">
	<div class="container-fluid">
 		<div class="row">
        	<div class="col-lg-12">
             	<h1 class="page-header">
                        WELCOME TO ADMIN
                        <small>Author</small>
				</h1>
				<?php
if(isset($_POST['submit']))
{
	$username=$_SESSION['username'];
	$user_first_name=$_POST['user_first_name'];
	$user_lastname=$_POST['user_lastname'];
	$user_email=$_POST['user_email'];
	
	
	$user_im=$_FILES['user_image']['name'];
	$user_image_tmp=$_FILES['user_image']['tmp_name'];
	
	
	$user_role=$_POST['user_role'];
	$randsalt=$_POST['randsalt'];
	$post_date=date('d-m-y');
	
	
	move_uploaded_file($user_image_tmp, "../images/$user_im");
	
	$sql="UPDATE user set 
	user_first_name='".$user_first_name."',
	user_lastname='".$user_lastname."',
	user_image='".$user_im."',
	user_email='".$user_email."',
	user_role='".$user_role."',
	randsalt='".$randsalt."'
	WHERE username='$username'
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
				if(isset($_SESSION['username']))
				{
					$username=$_SESSION['username'];
					$sql="SELECT * FROM user WHERE username='$username'";
					$result=mysqli_query($connection,$sql);
					while($row=mysqli_fetch_assoc($result))
					{
				
				?>
                <form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
	<label for="user_first_name">First Name</label>
		<input type="text" data-validation="required"  class="form-control" value="<?php echo $row['user_first_name'];?>" name="user_first_name"  />
</div>
<div class="form-group">
	<label for="last_name">Last Name</label>
		<input type="text" data-validation="required"  class="form-control" value="<?php echo $row['user_lastname'];?>" name="user_lastname"  />
</div>
<div class="form-group">
	<label for="E-mail">E-mail</label>
		<input type="email data-validation="required"   class="form-control" value="<?php echo $row['user_email'];?>" name="user_email"  />
</div>

<div class="form-group">
	<img width="100" src="../images/<?php echo $row['user_image'];?>"  />
</div>
<div class="form-group">
	<label for="user_image">Image</label>
		<input type="file" data-validation="required"  name="user_image"  />
</div>
<div class="form-group">
	<label for="rand_salt">Randsalt</label>
		<input type="text" data-validation="required"  class="form-control" value="<?php echo $row['randsalt'];?>" name="randsalt"  /> 
</div>
<div class="form-group">
	<label for="user_role">Role</label>
		<input type="text" data-validation="required"  class="form-control" value="<?php echo $row['user_role'];?>" name="user_role"  /> 
</div>
<div class="form-group">
		<input type="submit" class="btn btn-primary" name="submit" value="Update"  />
</div>
</form>
<?php
				}
				}
?>
            </div>
		</div>
	</div>
</div>
</div>
			  
            <!-- /.container-fluid -->
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
	 $.validate();
</script>
<?php include"include/footer.php" ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>