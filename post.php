<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	
	<?php include "includes/db.php"; ?>
    <!-- Navigation -->
    <?php include 'includes/navigation.php' ?>
    <!-- Page Content -->
	
	<?php
	if(isset($_GET['p_id']))
	{
		$the_p_id=$_GET['p_id'];
		$sql="SELECT * FROM posts WHERE post_id='$the_p_id' ";
		$result=mysqli_query($connection,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
		
	?>
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $row['post_title']; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $row['post_author']; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['post_date']; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="image-responsive" width="700" src="images/<?php echo $row['post_image'];?>"  />
				

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $row['post_content'];?></p>

                <hr>
                <!-- Blog Comments -->
				<?php
		}
	}
?>
</div>

            <!-- Blog Sidebar Widgets Column -->
			<?php
			    include "includes/sidebar.php";
				?>

           </div>

                <!-- Comments Form -->
				<?php
	if(isset($_POST['comment_submit']))
	{
		$the_p_id=$_GET['p_id'];
		$author_name=$_POST['author_name'];
		$author_email=$_POST['author_email'];
		$author_content=$_POST['author_content'];
		$comment_status='unapproved';
		$comment_date=date("Y/m/d");
		$sql="INSERT INTO comments set 
		comment_post_id='".$the_p_id."',
		comment_author='".$author_name."',
		comment_email='".$author_email."',
		comment_content='".$author_content."',
		comment_status='".$comment_status."',
		comment_date='".$comment_date."'
		";
		$result=mysqli_query($connection,$sql);
		if($result==true)
		{
			$sql="UPDATE posts set post_comment_count=post_comment_count +1  WHERE post_id='$the_p_id'";
			$update_result=mysqli_query($connection,$sql);
			if($update_result==true)
			{
				echo "updated sucessfully";
			}
			else
			{
				echo "didn't update";
			}
		}
		else
		{
			echo "wrong";	
		}
	}
	?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
						<label for="comment_author">Author</label>
                            <input type="text" class="form-control" name="author_name" />
                        </div>
						<div class="form-group">
						<label for="email">E-mail</label>
                            <input type="text" class="form-control" name="author_email" />
                        </div>
						<div class="form-group">
						<label for="comment_content">Comment</label>
                            <textarea rows="3" class="form-control" name="author_content"></textarea>
                        </div>
						
                        <button type="submit" name="comment_submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
				<?php
				$the_p_id=$_GET['p_id'];
				$sql="SELECT * FROM comments WHERE comment_status='approved' AND comment_post_id='$the_p_id'";
				$comments_result=mysqli_query($connection,$sql);
				while($comments_row=mysqli_fetch_assoc($comments_result))
				{
				?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img   class="img-responsive" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comments_row['comment_author'];?>
                            <small><?php echo $comments_row['comment_date'];?></small>
                        </h4>
                       <?php echo $comments_row['comment_content'];?>
                    </div>
                </div>
				<?php
				 }
				?>

                <!-- Comment -->
               

            
        <hr>

     <?php include 'includes/footer.php'?>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
