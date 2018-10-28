<?php include 'includes/user_header.php'; ?>

    <div id="wrapper">

        <!-- Navigation -->
 <?php include 'includes/user_navigation.php'; ?>      

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>

                        <table class="table table-bordered table-hover">
                        	<thead>
                        		<tr>
                        			<!-- <th>Id</th> -->
                        			<th>Author</th>
                        			<th>Comment</th>
                        			<th>Email</th>
                        			<th>In Response to</th>
                        			<th>Date</th>
                        			<th>Delete</th>
                        		</tr>
                        	</thead>
	                        <tbody>

    	<?php 
		$query = "SELECT * FROM comments WHERE comment_post_id =" . mysqli_real_escape_string($con,escape($_GET['id'])). "  ";
		$query .= "AND comment_status = 'approved' ";
		
		$select_comments = mysqli_query($con,$query);

		while ($row = mysqli_fetch_assoc($select_comments)) {
		$comment_id = escape($row['comment_id']);
		$comment_post_id = escape($row['comment_post_id']);
		$comment_author = escape(trim($row['comment_author']));
		$comment_content = escape(trim($row['comment_content']));
		$comment_email = escape($row['comment_email']);
		
		$comment_date = escape($row['comment_date']);
		
		echo "<tr>";
		// echo "<td>$comment_id</td>";
		echo "<td>$comment_author</td>";
		echo "<td>$comment_content</td>";

						// 		$query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
      //                           $edit_categories_id = mysqli_query($con,$query);

      //                           while ($row = mysqli_fetch_assoc($edit_categories_id)) {
      //                           $cat_id = $row['cat_id'];
      //                           $cat_title = $row['cat_title'];

						// 		echo "<td>{$cat_title}</td>";

						// }
							
						echo "<td>$comment_email</td>";
						


						$query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
						$select_post_id_query = mysqli_query($con,$query);
						while ($row = mysqli_fetch_assoc($select_post_id_query)) {

							$post_id = escape($row['post_id']);
							$post_title = escape($row['post_title']);

							echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
						}
						


						echo "<td>$comment_date</td>";
						echo "<td><a href='post_comments.php?delete=$comment_id&id=" .escape($_GET['id']) ."'>Delete</a></td>";
						echo "</tr>";

						}
	                        ?>
	                        	
	                        </tbody>
	                    </table>

	                  
        <?php
	                   	// header("Location: comments.php");

	                   if (isset($_GET['delete'])) {
	                   	
	                   	$the_comment_id = escape($_GET['delete']);

	                   	$query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
	                   	$delete_query = mysqli_query($con,$query);
	                   	?>
        <script>
            
            window.top.location = " post_comments.php?id=" . escape($_GET['id']) ."";
        </script>
        <?php
	                   	// header("Location: post_comments.php?id=" . escape($_GET['id']) ."");

	                   }
	                   ?>
	                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include 'includes/user_footer.php'; ?>