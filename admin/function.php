<?php
function insert_value()
{
	global $connection;
	if(isset($_POST['submit']))
	{
		$cat_title=$_POST['cat_title'];
		if($cat_title=="" || empty($cat_title))
		{
			echo "This filed should not be empty";
		}
		else
		{
			$query="INSERT INTO categories (cat_title) VALUE ('$cat_title')";
			$result=mysqli_query($connection,$query);
			if($result==true)
			{	
				//echo "right";
			}
			else
			{
				//echo "Error: " . $query . "<br>" . $connection->error;
			}
		}
	}
}
function fetch_value()
{
	global $connection;
	$query="SELECT * FROM categories";
	$result= mysqli_query($connection,$query);
	while ($row=mysqli_fetch_assoc($result)) 
    {
		$cat_title=$row['cat_title'];
		$id=$row['cat_id'];
		?>
		<tr> 
			<?php echo "<td>$id</td>";?>
			<?php echo "<td>$cat_title</td>";?> 
			<?php echo "<td><a href=categories.php?update=$id>Update</a></td>";?>
			<?php echo "<td><a href=categories.php?delete=$id>Delete</a></td>";?> 
		</tr>
		<?php
	}
}
function delete_value()
{
	global $connection;
	if(isset($_GET['delete']))
	{
		$delete=$_GET['delete'];
		$sql="DELETE FROM categories WHERE cat_id='$delete'";  
		$result=mysqli_query($connection,$sql);
		if($result==true)
		{
			header("location:categories.php");
		}
	}
}
function update_value()
{
	global $connection;
	if(isset($_GET['update']))
	{
		$_SESSION['update_id']=$update=$_GET['update'];
		$sql="SELECT cat_title FROM categories WHERE cat_id='$update' ";
		$result = mysqli_query($connection, $sql);
		$row=mysqli_fetch_assoc($result);
		if($row>0)
		{	
			?>
			<div class='col-xs-6'>
			<form action="" method="post">
				<div class="form-group">
					<label for="cat-title">Update Category</label>
					<input type="text" class="form-control" data-validation="required" name="update_title" value="<?php echo $row['cat_title'];?>"  />
				</div class="form-group" >
				<div >
					<input type="submit" class="btn btn-primary"  name="update_submit" value="Edit Category"  />
				</div>
			</form>
			</div>
<?php
						
		}
}
		if(isset($_POST['update_submit']))
		{
			$id=$_SESSION['update_id'];
			$update_value=$_POST['update_title'];
			$sql="UPDATE categories set 
			cat_title='".$update_value."' WHERE cat_id=$id";
			$result=mysqli_query($connection,$sql);
			if($result==true)
			{
				header("location:categories.php");
			}
		}
}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
	 $.validate();
</script>