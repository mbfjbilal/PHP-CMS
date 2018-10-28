<?php 

//if username already exists
function username_exists($username)
{
	global $con;

	$query = "SELECT username FROM users WHERE username = '$username' ";
	$result = mysqli_query($con, $query);
	if (!$result) {
		die("QUERY FAILED".mysqli_error($con));
	}

	if (mysqli_num_rows($result) > 0) {
		return true;
	} else {
		return false;
	}
}



//if email already exists
function email_exists($email)
{
	global $con;

	$query = "SELECT user_email FROM users WHERE user_email = '$email' ";
	$result = mysqli_query($con, $query);
	if (!$result) {
		die("QUERY FAILED".mysqli_error($con));
	}

	if (mysqli_num_rows($result) > 0) {
		return true;
	} else {
		return false;
	}
}

// //redirect to different pages 
// function redirect($location)
// {
// 	return header("Location:". $location);
// }
 ?>