<?php 

function escape($string){

	global $con;

	return mysqli_real_escape_string($con, trim($string));
}


//redirect to different pages 
function redirect($location)
{
	 header("Location:". $location);
	 exit;
}


/* begin functions for forgot password */
function ifItIsMethod($method=null)
{
	if ($_SERVER['REQUEST_METHOD'] == strtoupper($method)) {
		return true;
	}

	return false;
}

function isLoggedIn()
{
	if (isset($_SESSION['user_role'])) {
		return true;
	}

	return false;
}

function checkIfUserIsLoggedInAndRedirect($redirectlocation=null)
{
	if (isLoggedIn()) {
		redirect($redirectlocation);
	}
}
/* End of forgot password functions */

//if admin then show user page
function is_admin($username)
{
	global $con;

	$query = "SELECT user_role FROM users WHERE username = '$username' ";
	$result = mysqli_query($con, $query);
	confirmQuery($result);

	$row = mysqli_fetch_array($result);

	if ($row['user_role']== 'admin') {
		return true;
	} else {
		return false;
	}
}


// //if username already exists
// function username_exists($username)
// {
// 	global $con;

// 	$query = "SELECT username FROM users WHERE username = '$username' ";
// 	$result = mysqli_query($con, $query);
// 	confirmQuery($result);

// 	if (mysqli_num_rows($result) > 0) {
// 		return true;
// 	} else {
// 		return false;
// 	}
// }


//SHOW USERS ONLINE
function users_online(){

if (isset($_GET['onlineusers'])) {

	global $con;
	
	if (!$con) {		//this is bcz connectin file ("db.php") is not include in this fnctn.
		
		session_start();
		include("../includes/db.php");

		$session = session_id();    //session_id pik id of any user that login.
		$time = time();
		$time_out_in_seconds = 30;
		$time_out = $time - $time_out_in_seconds;

		$query = "SELECT * FROM users_online WHERE session = '$session'";
		$send_query = mysqli_query($con,$query);
		$count = mysqli_num_rows($send_query);

		if ($count == NULL) {
		    
		    mysqli_query($con, "INSERT INTO users_online(session, time) VALUES('$session','$time')");
		}else{

		    mysqli_query($con, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
		}

	$users_online_query = mysqli_query($con, "SELECT * FROM users_online WHERE time > '$time_out'");
		 echo $count_user = mysqli_num_rows($users_online_query);


		}

	}	//get request isset "onlineusers"

}

users_online();


//confim query error 
function confirmQuery($result)
{
	global $con;

	if (!$result) {
		
		die("QUERY FAILED.".mysqli_error($con));
	}

	return $result;
}


