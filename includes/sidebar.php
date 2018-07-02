<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                </div>
				<!-- Login -->
				<div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" placeholder="User Name" class="form-control">
					</div>
					 <div class="form-group">
                        <input name="password" type="text" placeholder="Password" class="form-control">
					</div>
					<div class="form-group">
                        <input name="sbumit" type="submit" value="Submit" class="btn btn-primary">
					</div>
                    </form>
                </div>







                <!-- Blog Categories Well -->
                <div class="well">


                    <?php
                    $query="SELECT * FROM categories LIMIT 4";
                    $select_categories_sidebar=mysqli_query($connection,$query);

                    ?>

                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php

                                while ($row=mysqli_fetch_assoc($select_categories_sidebar)) 
                    {
                    $cat_title=$row['cat_title'];
					$car_id=$row['cat_id'];
                    echo "<li><a href='categorey.php?categorey=$row[cat_id]'>$cat_title</a></li>";
                    }

                                ?>
                            
                            </ul>
                        </div>

                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>









                <!-- Side Widget Well -->
                <?php
               // include "widget.php"                ?>

            </div>