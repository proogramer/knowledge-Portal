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
	$id=$_GET['p_id'];
	$post_title=filter_var($_POST["post_title"], FILTER_SANITIZE_STRING);
	$post_author=filter_var($_POST["post_author"], FILTER_SANITIZE_STRING);
	$post_category_id=filter_var($_POST["post_cat_id"], FILTER_SANITIZE_STRING);
	$post_status=filter_var($_POST["post_status"], FILTER_SANITIZE_STRING);
	
	$post_im=$_FILES['post_image']['name'];
	$post_image_tmp=$_FILES['post_image']['tmp_name'];

	$post_tags=filter_var($_POST["post_tags"], FILTER_SANITIZE_STRING);
	$post_content=filter_var($_POST["post_content"], FILTER_SANITIZE_STRING);
	$post_date=date("d-m-y");
	$post_comment_count="0";


		move_uploaded_file($post_image_tmp, "../images/$post_im");
	
	
	move_uploaded_file($post_image_tmp, "../images/$post_im");
	
	$sql="UPDATE posts set 
	post_title='".$post_title."',
	post_author='".$post_author."',
	post_status='".$post_status."',
	post_cat_id='".$post_category_id."',
	post_image='".$post_im."',
	post_tags='".$post_tags."',
	post_content='".$post_content."',
	post_date='".$post_date."',
	post_comment_count='".$post_comment_count."' WHERE post_id='$id'
	";
	$result=mysqli_query($connection,$sql);
	if($result==true)
	{
	}
	else
	{
		echo "wrong";
	}
}
?>
<?php
if(isset($_GET['p_id']))
{
	$post_id=$_GET['p_id'];
	$sql="SELECT * FROM posts WHERE post_id='$post_id'";
	$result=mysqli_query($connection,$sql);
	$row=mysqli_fetch_assoc($result)
?>
<div class="row" id="add_post">
		<div class="col-lg-12" id="add_post" >
			<h1 class="page-header">
				WELCOME TO ADMIN
				<small>Author</small>
			</h1>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
	<label for="post_title">Post Title</label>
		<input type="text" class="form-control" data-validation="required"   value="<?php echo $row['post_title']; ?>" name="post_title"  />
</div>

<div class="form-group">
	<label for="post_category">Post Category </label>
	<select class="form-control" data-validation="required" name="post_cat_id">
	<?php

	$query="SELECT * FROM categories";
	$resul= mysqli_query($connection,$query);
	while($ro=mysqli_fetch_assoc($resul)) 
    {
		 echo "<option value='$ro[cat_id]'>$ro[cat_title]</option> ";
	}?>
	
</select>
</div>
<div class="form-group">
	<label for="post_author">Post Author</label>
		<input type="text" class="form-control" data-validation="required" value="<?php echo $row['post_author']; ?>" name="post_author"  />
</div>
<div class="form-group">
	<label for="post_status">Post Status</label>
	<select name="post_status" class="form-control">
	<?php
	if($row['post_status']=="Draft")
	{
	?>
	<option value="<?php echo $row['post_status']?>"><?php echo $row['post_status'] ?></option>
	<option value="published">Published</option>
	<?php
	}
	if($row['post_status']=="Published")
	{
	?>
	<option value="<?php echo $row['post_status']?>"><?php echo $row['post_status'] ?></option>
	<option value="draft">Draft</option>
	<?php
	}
	?>
	</select>
	</div>
<div class="form-group">
	<label for="post_image">Post Image</label>
	<input type="file" name="post_image" data-validation="required"  />
	<img src="../images/<?php echo $row['post_image'];?>" width="100"  />
</div>

<div class="form-group">
	<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" data-validation="required" value="<?php echo $row['post_tags']; ?>" name="post_tags"  />
</div>
<div class="form-group">
	<label for="post_content">Post Content</label>
		<textarea type="text" class="form-control" name="post_content" data-validation="required" cols="30" rows="10"><?php echo $row['post_content']; ?></textarea> 
</div>
<div class="form-group">
		<input type="submit" class="btn btn-primary" name="submit" value="Publish"  />
</div>
</form
><?php
}
?>
</div>
</div>
</body>
</html>