<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"><?php

include "includes/db.php";

?>
<?php

include "includes/header.php";

?>


    <!-- Navigation -->
    <?php

    include "includes/navigation.php";

    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">
                <?php
                if(isset($_GET['categorey']))
				{
					$categorey=$_GET['categorey'];
					$sql="SELECT * FROM posts WHERE post_cat_id='$categorey' ";
					$result=mysqli_query($connection,$sql);
					while($row=mysqli_fetch_assoc($result))
                    {
					 	$post_id=$row['post_id'];
                    	$post_title=$row['post_title'];
                    	$post_author=$row['post_author'];
                   	 	$post_date=$row['post_date'];
                    	$post_image=$row['post_image'];
                   		$post_content=substr($row['post_content'],0,100);
						$post_status=$row['post_status'];
                    ?>


                    
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo"$post_id"; ?>"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content?></p>

                <hr>
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
        <!-- /.row -->

        <hr>

        <?php

include "includes/footer.php";

?>

  