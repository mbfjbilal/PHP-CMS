<?php include 'includes/user_header.php'; ?>
<?php 

if (isset($_SESSION['username']) && $_SESSION['user_role'] == 'subscriber') {
	
	$username = escape($_SESSION['username']);

	$query = "SELECT * FROM users WHERE username = '{$username}' ";
	$select_user_profile_query = mysqli_query($con,$query);

	while ($row = mysqli_fetch_array($select_user_profile_query)) {
	    
			$user_id = escape($row['user_id']);
			$username = escape(trim($row['username']));
			$user_password = escape($row['user_password']);
			$user_firstname = escape(trim($row['user_firstname']));
			$user_lastname = escape(trim($row['user_lastname']));
			$user_email = escape($row['user_email']);
			$user_image = escape($row['user_image']);
			// $user_role = escape($row['user_role']);

	}

}else {
		?>
        <script>
            window.top.location = "index.php";
        </script>
        <?php
}
?>

<?php 

if (isset($_POST['edit_user'])) {
	
	$user_firstname = escape(trim($_POST['user_firstname']));
	$user_lastname = escape(trim($_POST['user_lastname']));
	// $user_role = escape($_POST['user_role']);

	// $post_image = $_FILES['image']['name'];
	// $post_image_temp = $_FILES['image']['tmp_name'];

	$username = escape(trim($_POST['username']));
	$user_email = escape($_POST['user_email']);
	$user_password = escape($_POST['user_password']);
	// $post_date = date('d-m-y'); 

	// move_uploaded_file($post_image_temp, "../images/$post_image");


				  $query = "UPDATE users SET ";
		          $query .="user_firstname  = '{$user_firstname}', ";
		          $query .="user_lastname   = '{$user_lastname}', ";
		          // $query .="user_role 		= '{$user_role}', ";
		          $query .="username 		= '{$username}', ";
		          $query .="user_email      = '{$user_email}', ";
		          $query .="user_password   = '{$user_password}' ";
		          $query .= "WHERE username  = '{$username}' ";
       

				$update_user = mysqli_query($con,$query);

				confirmQuery($update_user);

                ?>
<script type="text/javascript">
    alert("Profile update successfully.");
</script>
                <?php

}

?>
    <div id="wrapper">

        <!-- Navigation -->
 <?php include 'includes/user_navigation.php'; ?>      

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                 <div class="row">
                    <div class="col-lg-12">
                       <div class="row-fluid"><center><h1 style="color: #5990BB ;">Profile</h1></center></div>
                        <form action="" method="post" enctype="multipart/form-data">
    

                            <div class="form-group">
                                <label for="user_firstname">First Name</label>
                                <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname" required>
                            </div>


                            <div class="form-group">
                                <label for="user_lastname">Last Name</label>
                                <input type="text" value="<?php echo($user_lastname); ?>" class="form-control" name="user_lastname" required>
                            </div>

                            <div class="form-group">
                                <label for="Username">User Name</label>
                                <input type="text" value="<?php echo $username; ?>" class="form-control" name="username" readonly>
                            </div>

                            <!-- <div class="form-group">
                                <label for="post_image">Post Image</label>
                                <input type="file" name="image">
                            </div> -->

                            <div class="form-group">
                                <label for="User_email">Email</label>
                                <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email" required>
                            </div>

                            <div class="form-group">
                                <label for="User_password">Password</label>
                                <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password" required>
                            </div>

                            <div class="form-group">
                                <input class="btn  btn-primary" type="submit" name="edit_user" value="Update Profile">
                            </div>
                        </form>
                                            </div>
                                        </div> 
                <!-- /.row -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include 'includes/user_footer.php'; ?>