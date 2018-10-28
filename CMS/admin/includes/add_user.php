<?php //include '../user_exists.php'; ?>
<?php 
$message = "";
if (isset($_POST['create_user'])) {
	
	$user_firstname = escape(trim($_POST['user_firstname']));
	$user_lastname = escape(trim($_POST['user_lastname']));
	$user_role = escape(trim($_POST['user_role']));

	// $post_image = $_FILES['image']['name'];
	// $post_image_temp = $_FILES['image']['tmp_name'];

	$username = escape(trim($_POST['username']));
	$user_email = escape($_POST['user_email']);
	$user_password = escape($_POST['user_password']);

	// $post_date = date('d-m-y'); 
	// move_uploaded_file($post_image_temp, "../images/$post_image");

	 $user_password = password_hash($user_password , PASSWORD_BCRYPT , array('cost' => 12));

	 if (username_exists($username)) {
        $message = "User already exists";
    }elseif (email_exists($user_email)){
        $message = "email already exists";
    }else{

	$query = "INSERT INTO `users` (`user_firstname`, `user_lastname`,`user_role`,
	`username`,`user_email`, `user_password`) ";

	$query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}',
	'{$user_email}','{$user_password}' ) "; 

	$create_user_query = mysqli_query($con, $query);

	confirmQuery($create_user_query);

	echo "<div class='alert alert-success'>
		<strong>User Created: </strong><a href='users.php'> View Users</a></div>";
    //echo 'User Created: ' . '' . "<a href='users.php'>View Users</a> "; 
    }
	
}else{
    $message = "";
}


?>


<form action="" method="post" enctype="multipart/form-data">
	
	<?php 
	if (!$message=="") { ?>
		<div class="alert alert-danger">
  		<strong>Warning!</strong> <?php echo $message; ?>
	</div>
	<?php 
	}else {
	echo "<div><?php echo $message; ?></div>";
	} ?>
<center><h1 style="color:#5990BB ">Create New User</h1></center>
	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input type="text" class="form-control" name="user_firstname" required>
	</div>


	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input type="text" class="form-control" name="user_lastname" required>
	</div>


	 <div class="form-group">
		<label for="user_role">User Role</label><br>
		<select name="user_role" class="form-control" style="padding: 5px; width: 30%" id="">

			<option value="subscriber">Select Option</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>

		</select>
	</div>

	<div class="form-group">
		<label for="Username">User Name</label>
		<input type="text" class="form-control" name="username" required>
	</div>

	<!-- <div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="image">
	</div> -->

	<div class="form-group">
		<label for="User_email">Email</label>
		<input type="email" class="form-control" name="user_email" required>
	</div>

	<div class="form-group">
		<label for="User_password">Password</label>
		<input type="password" class="form-control" name="user_password" required>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="Add User">
	</div>
</form>