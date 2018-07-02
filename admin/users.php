
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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">



                       <?php 
					  
					  
					   if(isset($_GET['source']))
					   {
						   $source=$_GET['source'];
					   }
					   else
					   {
						   $source=''; 
					   }
					
					   switch($source)
					   {
						   case 'add_user';
						   include 'include/add_user.php';
						   break;
						   
						   case 'edit_user';
						   include "include/user_edit.php";
						   break;
						   
						   default:
						    include 'include/view_all_users.php';
						   
						   
						   
						   break;
						   
							 
					   }
					  ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
                <!-- /.row -->
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