<?php include 'db.php'; ?>
<?php include 'escape.php'; ?>
<?php session_start(); ?>

<?php 

if (isset($_POST['login'])) {
	
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);

	$username = mysqli_real_escape_string($con,$username);
	$password = mysqli_real_escape_string($con,$password);

	$query = "SELECT * FROM users WHERE username = '{$username}' ";
	$select_user_query = mysqli_query($con,$query);
	if (!$select_user_query) {
		
		die("QUERY FAILED.".mysqli_error($con));

	}

	if(mysqli_num_rows($select_user_query) == 0 ){

			?>
        <script>
            alert("Incorrect username.");
            window.top.location = "../login.php";
        </script>
        <?php
	}

	while ($row = mysqli_fetch_array($select_user_query)) {

		$db_user_id = escape($row['user_id']);
		$db_username = escape($row['username']);
		$db_user_password = escape($row['user_password']);
		$db_user_firstname = escape($row['user_firstname']);
		$db_user_lastname = escape($row['user_lastname']);
		$db_user_role = escape($row['user_role']);
	    
	}
		// $password = crypt($password,$db_user_password); //using BLOW FISH decryption tech

	//this === is for "identical" exact same
	// if ($username === $db_username && $password === $db_user_password) {

		if(password_verify($password,$db_user_password)){
		
		if ($db_user_role === 'admin') {
		$_SESSION['username'] = escape($db_username);
		$_SESSION['firstname'] = escape($db_user_firstname);
		$_SESSION['lastname'] = escape($db_user_lastname);
		$_SESSION['user_role'] = escape($db_user_role);
               	?>
        <script>
          
            window.top.location = "../admin";
        </script>
        <?php
			// header("Location: ../admin");
			// redirect("/abc/admin");

		}elseif ($db_user_role === 'subscriber') {
		$_SESSION['username'] = escape($db_username);
		$_SESSION['firstname'] = escape($db_user_firstname);
		$_SESSION['lastname'] = escape($db_user_lastname);
		$_SESSION['user_role'] = escape($db_user_role);
               	?>
        <script>
          
            window.top.location = "../user";
        </script>
        <?php
			// header("Location: ../admin");
			// redirect("/abc/admin");

		}else{
               	?>
        <script>
            
            window.top.location = "../login.php";
        </script>
        <?php
			// header("Location: ../index.php");
			// redirect("/abc/index.php");
		}
		
		
	}else{
               	?>
        <script>
           alert("Incorrect password.");
            window.top.location = "../login.php";
        </script>
        <?php
		// header("Location: ../index.php");
		//die('not verify'.mysqli_error($con));
		// redirect("/abc/index.php");

	}
}

?>