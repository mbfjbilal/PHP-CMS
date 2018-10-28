<?php 
include 'delete_modal.php';

if (isset($_POST['checkBoxArray'])) {

	foreach ($_POST['checkBoxArray'] as $postvalueId ) {

		 $bulk_options = escape($_POST['bulk_options']);

		 switch ($bulk_options) {		//these cases is for view all post apply button

 	case 'published':

	$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = '{$postvalueId}' ";
	$update_to_published_status = mysqli_query($con,$query);
	confirmQuery($update_to_published_status);
	break;
		 	
 	case 'draft':	

	$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = '{$postvalueId}' ";
	$update_to_draft_status = mysqli_query($con,$query);
	confirmQuery($update_to_draft_status);
	break;

 	case 'delete':	
		 	
	$query = "DELETE FROM posts WHERE post_id = '{$postvalueId}' ";
	$update_to_delete_status = mysqli_query($con,$query);
	confirmQuery($update_to_delete_status);
	break;

	// case 'clone':	

	// $query = "SELECT * FROM posts WHERE post_id = '{$postvalueId}' ";
	// $select_post_query = mysqli_query($con,$query);

	// while ($row = mysqli_fetch_array($select_post_query)) {

	// 	$post_title = $row['post_title'];
	// 	$post_category_id = $row['post_category_id'];
	// 	$post_date = $row['post_date'];
	// 	$post_author = $row['post_author'];
	// 	$post_user = $row['post_user'];
	// 	$post_status = $row['post_status'];
	// 	$post_image = $row['post_image'];
	// 	$post_tags = $row['post_tags'];
	// 	$post_content = $row['post_content'];
	// }

	// $query = "INSERT INTO posts(post_category_id, post_title, post_author,post_user, post_date, post_image, post_content, post_tags, post_status)";

	// $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}','{$post_user}',now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";
	// $copy_query = mysqli_query($con,$query);

	// confirmQuery($copy_query);
	// break;

		 	default:
		 		echo 'Please Select Status.';
		 		break;
		 }
	}
	
}
?>				
<!-- view all post apply button html start-->
<form action="" method="post">
 <table class="table table-bordered table-hover">

 	<div id="bulkOptionContainer" class="col-xs-4" style="padding: 0px;">
 		
 		<select class="form-control" name="bulk_options" id="">
 			<option value="">Select Option</option>
 			<option value="published">Publish</option>
 			<option value="draft">Draft</option>
 			<!-- <option value="clone">Clone</option> -->
 			<option value="delete">Delete</option>
 		</select>

 	</div>

<div class="col-xs-4">
	
	<input type="submit" name="submit" class="btn btn-success" value="Apply">
	<a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>

</div>

<!-- end view all post apply button -->


    	<thead>
    		<tr>
    			<th><input id="selectAllBoxes" type="checkbox" name=""></th>
    			<th>Id</th>
    			<th>Users</th>
    			<th>Title</th>
    			<th>Category</th>
    			<th>Status</th>
    			<th>Image</th>
    			<th>Tags</th>
    			<th>Comments</th>
    			<th>Date</th>
    			<th>View Post</th>
    			<th>Edit</th>
    			<th>Delete</th>
    			<th>Views</th>
    		</tr>
    	</thead>
        <tbody>

        	<?php 
			// $query = "SELECT * FROM posts ORDER BY post_id DESC";

			$query = "SELECT * FROM posts ORDER BY post_id DESC";
			$select_posts = mysqli_query($con,$query);

			while ($row = mysqli_fetch_assoc($select_posts)) {
			$post_id = escape($row['post_id']);
			$post_author = escape($row['post_author']);
			$post_user = escape($row['post_user']);
			$post_title = escape($row['post_title']);
			$post_category_id = escape($row['post_category_id']);
			$post_status = escape($row['post_status']);
			$post_image = escape($row['post_image']);
			$post_tags = escape($row['post_tags']);
			$post_comment_count = escape($row['post_comment_count']);
			$post_date = escape($row['post_date']);
			$post_views_count = escape($row['post_views_count']);


			echo "<tr>";
			?>
	<td>
   <input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo($post_id) ?>'>
	</td>

			<?php
			echo "<td>$post_id</td>";

			if (!empty($post_author)) {
				
				echo "<td>$post_author</td>";

			}elseif (!empty($post_user)) {
				
				echo "<td>$post_user</td>";
			}
			
			echo "<td>$post_title</td>";

			$query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
            $edit_categories_id = mysqli_query($con,$query);

            while ($row = mysqli_fetch_assoc($edit_categories_id)) {
            $cat_id = escape($row['cat_id']);
            $cat_title = escape($row['cat_title']);

			echo "<td>{$cat_title}</td>";

		}
		
			echo "<td>$post_status</td>";
			echo "<td><img height='100' width='100' src='../images/$post_image' alt='image'></td>";
			echo "<td>$post_tags</td>";


			$query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
			$send_comment_query = mysqli_query($con,$query);
			$row = mysqli_fetch_array($send_comment_query);
			$comment_id = escape($row['comment_id']);
			$count_comments = mysqli_num_rows($send_comment_query);


			echo "<td><a href='post_comments.php?id=$post_id'>$count_comments</a></td>";




			echo "<td>$post_date</td>";
			echo "<td><a class='btn btn-primary' href='../post.php?p_id={$post_id}'>View Post</a></td>";
			echo "<td><a class='btn btn-info' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";

			?>

			<form method="post">
				<input type="hidden" name="post_id" value="<?php echo($post_id) ?>">
			<?php 
			echo	'<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>';
			?>
			</form>


			<?php 

			// echo "<td><a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";

			// echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
			echo "<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";
			echo "</tr>";

		}
        	?>
        	
        </tbody>
    </table>
</form>

   <?php 
   if (isset($_POST['delete'])) {
   	
   	$delete_post_id = escape($_POST['post_id']);

   	$query = "DELETE FROM posts WHERE post_id = {$delete_post_id} ";
   	$delete_query = mysqli_query($con,$query);
   	?>
        <script>
           
            window.top.location = "posts.php";
        </script>
        <?php
   	// header("Location: posts.php");

   }
   ?>

   <?php 
   if (isset($_GET['reset'])) {
   	
   	$the_post_id = escape($_GET['reset']);

   	$query = "UPDATE posts SET post_views_count = 0 WHERE post_id =".mysqli_real_escape_string($con,$_GET['reset'])."";
   	$reset_query = mysqli_query($con,$query);
   	?>
        <script>
            
            window.top.location = "posts.php";
        </script>
        <?php
   	// header("Location: posts.php");

   }
   ?>

   <!-- this is for delete popup on view_all_posts -->
<!--    <script type="text/javascript">

   	$(document).ready(function () {
   		
   		$(".delete_link").on('click', function(){

   			var id = $(this).attr("rel");
   			var delete_url = "posts.php?delete="+ id +" ";
   			
   			$(".modal_delete_link").attr("href", delete_url);

   			$("#myModal").modal('show');

   		});

   	});

   </script> -->