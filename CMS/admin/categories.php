<?php include 'includes/admin_header.php'; ?>

    <div id="wrapper">

        <!-- Navigation -->
 <?php include 'includes/admin_navigation.php'; ?>      

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="col-xs-6">
                        <?php insert_categories(); ?>
                      
                        <form action="" method="post">
                        	<div class="form-group">
                        		<label for="cat-title">Add Category</label>
                        		<input type="text" class="form-control" name="cat_title">
                        	</div>
                        	<div class="form-group">
                        		<input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                        	</div>
                        </form>

                        <?php
                        //UPDATE AND INCLUDE QUERY 
                        if (isset($_GET['edit'])) {
                            
                            $cat_id = escape($_GET['edit']);

                            include "includes/update_categories.php";
                        }
                        ?>
                        </div><!-- Add Category Form -->
                        

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                        		<thead>
                        			<tr>
                        				<th>Id</th>
                        				<th>Category Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                                    
                                <!--  FIND ALL CATEGORY FUNCTION -->
								<?php findAllCategories(); ?>
                                <!--  DELETE CATEGORY  FUNCTION -->
                                <?php deleteCategories(); ?> 

                        		</tbody>
                        	</table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include 'includes/admin_footer.php'; ?>