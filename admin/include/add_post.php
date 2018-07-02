	<?php

	if(isset($_POST['submit']))
	{
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

		echo $sql="INSERT INTO posts set 
		post_title='".$post_title."',
		post_author='".$post_author."',
		post_cat_id='".$post_category_id."',
		post_status='".$post_status."',
		post_image='".$post_im."',
		post_tags='".$post_tags."',
		post_content='".$post_content."',
		post_date='".$post_date."',
		post_comment_count='".$post_comment_count."'
		";
		$result=mysqli_query($connection,$sql);
		if($result)
		{
			header("location:posts.php?source=add_post");
		}
		else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
		}
	}
	?>
	<div class="row" id="add_post">
		<div class="col-lg-12" id="add_post" >
			<h1 class="page-header">
				WELCOME TO ADMIN
				<small>Author</small>
			</h1>

			<form id="add_post" action="" method="post"  enctype="multipart/form-data">
				<div class="form-group">
					<label for="post_title">Post Title</label>
<input type="text" class="form-control" id="post_title" name="post_title" data-validation="required"   />
				</div>
				<div class="form-group">
					<label for="post_cat_id">Post Category</label>
					<select class="form-control" name="post_cat_id" data-validation="required">
						<option value="">---Select-----</option>
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
					<input type="text" class="form-control" name="post_author" data-validation="required"  />
				</div>
				<div class="form-group">
					<label for="post_status">Post Status</label>
					<select class="form-control" name="post_status" data-validation="required">
						<option value="">---Select-----</option>
						<option value="Published">Published</option>
						<option value="Draft">Draft</option>
					</select>
				</div>
				<div class="form-group">
					<label for="post_image">Post Image</label>
					<input type="file" name="post_image" data-validation="required" />
				</div>
				<div class="form-group">
					<label for="post_tags">Post Tags</label>
					<input type="text" class="form-control" name="post_tags" data-validation="required" />
				</div>
				<div class="form-group">
					<label for="post_content">Post Content</label>
					<textarea type="text" class="form-control" name="post_content" cols="30" rows="10" data-validation="required"></textarea> 
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="submit" value="Publish"  />
				</div>
			</form>
		</div>
	</div>