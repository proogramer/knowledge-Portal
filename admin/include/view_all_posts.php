<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
ob_start();
if(isset($_GET['delete']))
{
	$delete_id=$_GET['delete'];
	$sql="DELETE FROM posts WHERE post_id='$delete_id'";
	$result=mysqli_query($connection,$sql);
	if($result==true)
	{
		header("location:posts.php");
	}
	else
	{
		echo "wrong";
	}
}
?>
 <h1 class="page-header">
                            WELCOME TO ADMIN
                            <small>Author</small>
                        </h1>
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Id</th>
									<th>Author</th>
									<th>Title</th>
									<th>Category</th>
									<th>Status</th>
									<th>Images</th>
									<th>Tag</th>
									<th>Comments</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$sql="SELECT * FROM posts";
							$result=mysqli_query($connection,$sql);
							while($row=mysqli_fetch_assoc($result))
							{
							
							?>
								<tr>
									<td><?php echo $row['post_id'];?></td>
									<td><?php echo $row['post_author'];?></td>
									<td><?php echo $row['post_title'];?></td>
									<?php $ID= $row['post_cat_id'];
									$quer="SELECT cat_title FROM categories WHERE cat_id='$ID'";
									$resul= mysqli_query($connection,$quer);
									while ($my_row=mysqli_fetch_assoc($resul)) 
    								{			
										echo "<td>$my_row[cat_title] </td>";
									}
									?>
									<td><?php echo $row['post_status'];?></td>
									<?php $image=$row['post_image']; ?>
									<td><?php echo "<img width=100 src='../images/$image' />"; ?></td>
									<td><?php echo $row['post_tags'];?></td>
									<td><?php echo $row['post_comment_count'];?></td>
									<td><?php echo $row['post_date'];?></td>
									<td><?php echo "<a href='posts.php?delete=$row[post_id] '>Delete</a> "; ?></td>
									<td><?php echo "<a href='posts.php?source=edit_post&p_id=$row[post_id] '>Edit</a> "; ?></td>
								</tr>
							</tbody>
							<?php
							}
							?>
						</table>
						
</body>
</html>