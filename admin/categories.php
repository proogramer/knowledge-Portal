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



                        <h1 class="page-header">
                            WELCOME TO ADMIN
                            <small>Author</small>
                        </h1>
						<div class='col-xs-6'>
						<?php insert_value()?>
							<form id="add_categorey" action="" method="post">
								<div class="form-group">
								<label for="cat-title">Add Category</label>
									<input type="text" class="form-control" data-validation="required" id="cat_title" name="cat_title"  />
								</div class="form-group" >
								<div >
									<input type="submit" class="btn btn-primary" name="submit" value="Add Category"  />
								</div>
							</form>
						</div>
						
						<div class='col-xs-6'>
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Id</th>
									<th>Category Title</th>
								</tr>
							</thead>
							<tbody>
							<!--//---- fetch values------->
							<?php fetch_value(); ?>
							</tbody>
						</table>
						<!--//---- delete values------->
						<?php delete_value(); ?>
						</div>
						<?php
						////-------update values------
						update_value();
						?>
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