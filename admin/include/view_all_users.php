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
	echo $sql="DELETE FROM user WHERE user_id='$delete_id'";
	$result=mysqli_query($connection,$sql);
	if($result==true)
	{
		header("location:./users.php");
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
									<th>User name</th>
									<th>User Full Name</th>
									<th>User E-mail</th>
									<th>User Role</th>
									<th>Rand Salt</th>
									<th>User Image</th>
									<th>Edit</th>
									<th>Delete</th>
				
								</tr>
							</thead>
							<tbody>
							<?php
							$sql="SELECT * FROM user";
							$result=mysqli_query($connection,$sql);
							while($row=mysqli_fetch_assoc($result))
							{
							
							?>
								<tr>
									<td><?php echo $row['user_id'];?></td>
									<td><?php echo $row['username'];?></td>
									<td><?php echo $row['user_first_name']; echo $row['user_lastname']?></td>
									<td><?php echo $row['user_email'];?></td>
									<td><?php echo $row['user_role'];?></td>
									<td><?php echo $row['randsalt'];?></td>
									<td> <img width="100" src="../images/<?php echo $row['user_image']; ?> "  /></td>
									<td><?php echo "<a href='users.php?source=edit_user&user_id=$row[user_id] '>Edit</a> "; ?></td>
									<td><?php echo "<a href='users.php?delete=$row[user_id] '>Delete</a> "; ?></td>
								
								</tr>
							</tbody>
							<?php
							}
							?>
						</table>
						
</body>
</html>