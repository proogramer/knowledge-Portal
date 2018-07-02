<?php
session_start();
include "include/header.php" 
?>
<div id="wrapper">

        <!-- Navigation -->
 <?php include "include/navigation.php" ?>
<?php

?>

<div id="page-wrapper">

<div class="container-fluid">

    
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
					<?php
					$sql="SELECT * FROM posts";
					$result_post=mysqli_query($connection,$sql);
					$post_count=mysqli_num_rows($result_post);
					echo " <div class='huge'>$post_count</div>";
					?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php
					$sql="SELECT * FROM comments";
					$result_comment=mysqli_query($connection,$sql);
					$comment_count=mysqli_num_rows($result_comment);
					echo "<div class='huge'>$comment_count</div>";
					?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
					$sql="SELECT * FROM user";
					$result_user=mysqli_query($connection,$sql);
					$count_user=mysqli_num_rows($result_user);
					echo "<div class='huge'>$count_user</div>";
					?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
					$sql="SELECT * FROM categories";
					$result_categories=mysqli_query($connection,$sql);
					$count_categories=mysqli_num_rows($result_categories);
					echo "<div class='huge'>$count_categories</div>";
					?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
		
			
				
				
				
				 <div class="row">
				
				
				
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data' ,'Count'],
		   <?php
		  
		  $element_text =  array("active_post" , "categories" , "comments" , "user");
		  $element_count= array($post_count,$count_categories,$comment_count,$count_user);
		  
		  for($i=0;$i<4;$i++)
		  {
			 echo "['{$element_text[$i]}'" . "," ." {$element_count[$i]}],";
			  
		  }
		  
		  ?>	
		 
		  
          //['Posts' , '1000']
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
	<div id="columnchart_material" style="width auto; height:500px;"></div>
</div>
 </div>
            <!-- /.container-fluid -->
</div>
        </div>
