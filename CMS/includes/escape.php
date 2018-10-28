

<?php 

function escape($string){

	global $con;

	return mysqli_real_escape_string($con, trim($string));
}

 ?>
