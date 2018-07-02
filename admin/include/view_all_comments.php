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
	echo $sql="DELETE FROM comments WHERE comment_id='$delete_id'";
	$result=mysqli_query($connection,$sql);
	if($result==true)
	{
		header("location:./comments.php");
	}
	else
	{
		echo "wrong";
	}
}
?>
<?php
if(isset($_GET['unapproved']))
{
	$unapproved_id=$_GET['unapproved'];
	echo $sql="UPDATE comments set comment_status='unapproved' WHERE comment_id='$unapproved_id'";
	$result=mysqli_query($connection,$sql);
	if($result==true)
	{
		header("location:./comments.php");
	}
	else
	{
		echo "wrong";
	}
}
?>
<?php
if(isset($_GET['approved']))
{
	$unapproved_id=$_GET['approved'];
	echo $sql="UPDATE comments set comment_status='approved' WHERE comment_id='$unapproved_id'";
	$result=mysqli_query($connection,$sql);
	if($result==true)
	{
		header("location:./comments.php");
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
									<th>Post</th>
									<th>Author</th>
									<th>E-mail</th>
									<th>Content</th>
									<th>Date</th>
									<th>Status</th>
									<th>Approved</th>
									<th>Upproved</th>
									<th>Delete</th>
				
								</tr>
							</thead>
							<tbody>
							<?php
							$sql="SELECT * FROM comments";
							$result=mysqli_query($connection,$sql);
							while($row=mysqli_fetch_assoc($result))
							{
							
							?>
								<tr>
									<td><?php echo $row['comment_id'];?></td>
									<?php
									$post_id=$row['comment_post_id'];
									$sql="SELECT * FROM posts WHERE post_id='$post_id'";
									$resultt=mysqli_query($connection,$sql);
									while($post_row=mysqli_fetch_assoc($resultt))
									{
										echo "<td><a href=../post.php?p_id=$post_row[post_id]>$post_row[post_title]</a></td>";
									}
									?>
									<td><?php echo $row['comment_author'];?></td>
									<td><?php echo $row['comment_email'];?></td>
									<td><?php echo $row['comment_content'];?></td>
									<td><?php echo $row['comment_date'];?></td>
									<td><?php echo $row['comment_status'];?></td>
									<td><?php echo "<a href='comments.php?approved=$row[comment_id] '>Approved</a> "; ?></td>
									<td><?php echo "<a href='comments.php?unapproved=$row[comment_id] '>Unapproved</a> "; ?></td>
									<td><?php echo "<a href='comments.php?delete=$row[comment_id] '>Delete</a> "; ?></td>
								
								</tr>
							</tbody>
							<?php
							}
							?>
						</table>
						
</body>
</html>