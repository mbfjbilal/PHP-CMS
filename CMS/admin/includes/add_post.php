<?php 

if (isset($_POST['create_post'])) {
	
	$post_title = escape($_POST['title']);
	$post_user = escape($_POST['post_user']);
	$post_category_id = escape($_POST['post_category']);
	$post_status = escape($_POST['post_status']);

	$post_image = escape($_FILES['image']['name']);
	$post_image_temp = $_FILES['image']['tmp_name'];

	$post_tags = escape($_POST['post_tags']);
	$post_content = $_POST['post_content'];
	$post_date = date('d-m-y');

	move_uploaded_file($post_image_temp, "../images/$post_image");

	$query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, post_content, post_tags, post_status) ";

	$query .= "VALUES({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' ) "; 

	$create_post_query = mysqli_query($con, $query);

	confirmQuery($create_post_query);
}

?>
<center><h1 style="color:#5990BB ">Create New Post</h1></center>

 <form action="" method="post" enctype="multipart/form-data">
    

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" required="">
    </div>

    <div class="form-group">
        <label for="category">Categories</label><br>
        <select name="post_category" class="form-control" style="padding: 5px; width: 30%" id="">
            <?php 
                    $query = "SELECT * FROM categories ";
                    $select_categories = mysqli_query($con,$query);

                    confirmQuery($select_categories);

                    while ($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = escape($row['cat_id']);
                    $cat_title = escape($row['cat_title']);

                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
        
            ?>
        </select>
    </div>
        <div class="form-group">
            <label for="Users">Users</label>
            <input value="<?php echo $_SESSION['username']; ?>" type="text" class="form-control" name="post_user" readonly>
        </div>


    <div class="form-group">
        <label for="post_status">Post Status</label>
        <br>
            <select name="post_status" class="form-control" style="padding: 5px; width: 30%" id="">

                <option value="draft">Select Option</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>

            </select>
    </div>

    <div class="form-group" >
        <label for="post_image">Post Image</label>
        <input type="file" name="image" required>
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" required>
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form>