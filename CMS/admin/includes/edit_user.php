<?php 

if (isset($_GET['edit_user'])) {
	
		$the_user_id = escape($_GET['edit_user']);

		$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
		$select_users_query = mysqli_query($con,$query);

		while ($row = mysqli_fetch_assoc($select_users_query)) {
		$user_id = escape($row['user_id']);
		$username = escape(trim($row['username']));
		$user_password = escape($row['user_password']);
		$user_firstname = escape(trim($row['user_firstname']));
		$user_lastname = escape(trim($row['user_lastname']));
		$user_email = escape($row['user_email']);
		$user_image = $row['user_image'];
		$user_role = escape($row['user_role']);

		}



if (isset($_POST['edit_user'])) {
	
	$user_firstname = escape(trim($_POST['user_firstname']));
	$user_lastname = escape(trim($_POST['user_lastname']));
	$user_role = escape($_POST['user_role']);

	// $post_image = $_FILES['image']['name'];
	// $post_image_temp = $_FILES['image']['tmp_name'];

	$username = escape(trim($_POST['username']));
	$user_email = escape($_POST['user_email']);
	$user_password = escape($_POST['user_password']);

	// $post_date = date('d-m-y'); 
	// move_uploaded_file($post_image_temp, "../images/$post_image");

	// $query = "SELECT randSalt FROM users ";
    // $select_randSalt_query = mysqli_query($con, $query);
    // if (!$select_randSalt_query) {    
    //     die("QUERY FAILED". mysqli_error($con));
    // }

    // $row = mysqli_fetch_array($select_randSalt_query);
    // $salt = $row['randSalt'];
    // $hashed_password = crypt($user_password,$salt); //using BLOW FISH encryption tech

	if (!empty($user_password)) {
		$query = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
		$get_user_query = mysqli_query($con,$query);
		confirmQuery($get_user_query);

		$row = mysqli_fetch_array($get_user_query);
		$hashed_password = escape($row['user_password']);
	

	if ($hashed_password != $user_password) {
		$hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
	}

	$query = "UPDATE users SET ";
	$query .="user_firstname  = '{$user_firstname}', ";
	$query .="user_lastname   = '{$user_lastname}', ";
	$query .="user_role 		= '{$user_role}', ";
	$query .="username 		= '{$username}', ";
	$query .="user_email      = '{$user_email}', ";
	$query .="user_password   = '{$hashed_password}' ";
	$query .= "WHERE user_id  = {$the_user_id} ";


	$update_user = mysqli_query($con,$query);
	confirmQuery($update_user);

	echo "User Updated " . "<a href='users.php'>View Users</a>";
	
		}
	}
}else{
	?>
        <script>
            
            window.top.location = "index.php";
        </script>
        <?php
	// header("Location: index.php");
}
?>


<form action="" method="post" enctype="multipart/form-data">
	

	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
	</div>


	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input type="text" value="<?php echo($user_lastname); ?>" class="form-control" name="user_lastname">
	</div>


	 <div class="form-group">
		<label for="user_role">User Role</label><br>
		<select name="user_role" id="">

			<option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>

			<?php 

			if ($user_role == 'admin') {
				
				echo "<option value='subscriber'>subscriber</option>";

			} else {
				
				echo "<option value='admin'>admin</option>";
			
			}
			?>
	
		</select>
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
		<input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="User_password">Password</label>
		<input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
	</div>
</form>