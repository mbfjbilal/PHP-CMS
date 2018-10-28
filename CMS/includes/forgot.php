<?php include 'db.php'; ?>
<?php include 'escape.php'; ?>
<?php include '../user_exists.php'; ?>

<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
//require '../classes/config.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		if (isset($_POST['email'])) {

			$email  = $_POST['email'];
			$length = 50;
			$token  = bin2hex(openssl_random_pseudo_bytes($length));
			//openssl_random_pseudo_bytes — Generate a pseudo-random string of bytes

			if (email_exists($email)) {
				
				$query = "UPDATE users SET token='{$token}' WHERE user_email='{$email}' ";
				$token_update_query = mysqli_query($con,$query);
				
				if (!$token_update_query) {
					die("TOKEN QUERY FAILED".mysqli_error($con));
				}else {
					//echo 'string';
				}

			}else {
				echo 'No Email exists.';
			}

			$mail = new PHPMailer(true);

try {
//Server settings
//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = Config::SMTP_HOST;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = Config::SMTP_USER;                 // SMTP username
$mail->Password = Config::SMTP_PASSWORD;                           // SMTP password
$mail->Port = Config::SMTP_PORT;  
$mail->SMTPSecure = 'tls';          // Enable TLS encryption, `ssl` also accepted
$mail->isHTML(true);
$mail->Charset = 'UTF-8';

$mail->setFrom('no-replay@advertisement.com', 'Admin');
$mail->addAddress($email);

$mail->Subject = 'Reset Your password';

$mail->Body = '<p>

Please click to reset your password

<a href="http://localhost:8080/my/Final_new-1/reset.php?email='.$email.'&token='.$token.' ">http://localhost:8080/my/Final_new-1//reset.php?email='.$email.'&token='.$token.'</a>

</p>';

if ($mail->send()) {
	 //echo 'Message has been sent';
	$emailSent = true;
	               	?>
        <script>
           
            window.top.location = "../login.php";
        </script>
        <?php
	// header("Location: ../login.php");
}else {
	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}catch (Exception $e) {
echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}		


		}

	}else {
		               	?>
        <script>
            
            window.top.location = "../login.php";
        </script>
        <?php
		// header("Location: ../login.php");
	}

 ?>