<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php 
if (!isset($_GET['email']) && !isset($_GET['token'])) {
                        ?>
        <script>
           window.top.location = "index.php";
        </script>
        <?php
    // header("Location: index.php");
}

// $email = 'bilal@b2bx.net';

// $token = '2a0330823b94719fbc1966855d4d0d96081ed6241a8f37d0da75ab0ac8949c92eba0009e0f57358fbeaa2f44567f6ee5e3a5';
$email = $_GET['email'];
$token = $_GET['token'];

if ($query = "SELECT username, user_email, token FROM users WHERE token='{$token}'") {
    
    $user_token_info_query = mysqli_query($con,$query);

    while ($row = mysqli_fetch_array($user_token_info_query)) {
        
        $username = $row['username'];
        $user_email = $row['user_email'];
        $token = $row['token'];
    }

     // if ($_GET['token'] !== $token || $_GET['email'] !== $email) {
     //     header("Location: index.php");
     // }

    if (isset($_POST['password']) && isset($_POST['confirmPassword'])) {
        
        if ($_POST['password'] === $_POST['confirmPassword']) {
            
           $password = $_POST['password'];
           $hashedPassword = password_hash($password , PASSWORD_BCRYPT , array('cost' => 12));

           if ($query = "UPDATE users SET token='', user_password = '{$hashedPassword}' WHERE user_email ='{$email}'") {

            $token_update_query = mysqli_query($con,$query);

            if (mysqli_affected_rows($con) >= 1) {
         // mysqli_affected_rows() function returns the number of affected rows in the previous INSERT, UPDATE etc query.
                    ?>
        <script>
           window.top.location = "login.php";
        </script>
        <?php
               // header("Location: login.php");

            }
               
           }
           // else {
           //     echo 'BAD UPDATE QUERY REQUEST';
           // }
           mysqli_close($con);
           $verified = true;

        }else {
            echo "Password can't match.";
        }
    }

}else{
    echo 'User data fatching error'.mysqli_error($con);
}

?>

<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>

<div class="container">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Reset Password</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">


                                <form id="register-form" role="form" autocomplete="off" class="form" action="" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                            <input id="password" name="password" placeholder="Enter password" class="form-control"  type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok color-blue"></i></span>
                                            <input id="confirmPassword" name="confirmPassword" placeholder="Confirm password" class="form-control"  type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input name="resetPassword" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>

                            </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<hr>

<?php include "includes/footer.php";?>

</div> <!-- /.container -->

