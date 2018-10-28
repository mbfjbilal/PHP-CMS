<?php include 'includes/db.php';?>
<?php include 'includes/header.php';?>
<?php include 'reg_user_exists.php'; ?>

<?php 

//if ($_SERVER['REQUEST_METHOD'] == "POST") {
if (isset($_POST['submit'])) {    
    $first_name = escape(trim($_POST['first_name']));
    $last_name = escape(trim($_POST['last_name']));
    $username = escape(trim($_POST['username']));
    $email    = escape(trim($_POST['email']));
    $password = escape(trim($_POST['password']));

    if (username_exists($username)) {
        $message = "User already exists";
    }elseif (email_exists($email)){
        $message = "email already exists";
    }else{

    if (!empty($username) && !empty($email) && !empty($password)) {

    $first_name = mysqli_real_escape_string($con, $first_name);
    $last_name = mysqli_real_escape_string($con, $last_name);
    $username = mysqli_real_escape_string($con, $username);
    $email    = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    $password = password_hash($password , PASSWORD_BCRYPT , array('cost' => 12));

    // $query = "SELECT randSalt FROM users ";
    // $select_randSalt_query = mysqli_query($con, $query);
    // if (!$select_randSalt_query) {    
    //     die("QUERY FAILED". mysqli_error($con));
    // }

    // $row = mysqli_fetch_array($select_randSalt_query);
    // $salt = $row['randSalt'];
    // $password = crypt($password,$salt); //using BLOW FISH encryption tech

    $query = "INSERT INTO users (user_firstname ,user_lastname ,username ,user_email ,user_password ,user_role) ";
    $query.= "VALUE('{$first_name}','{$last_name}','{$username}', '{$email}', '{$password}', 'subscriber') ";
    $register_user_query = mysqli_query($con,$query);
    if (!$register_user_query) {
        die("QUERY FAILED". mysqli_error($con));
    }
   
    //$message = "Your Registration has been submited";
  }else{
    $message = "Fileds cannot be empty";
  }

         $message = "Your Registration has been submited";
    }


}else{
    $message = "";
}

?>

<div id="divBoxed" class="container">

    <div class="main_center_div" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;zoom: 1;"></div>

    <div class=" row-fluid  notop nobottom div_style">
            <!--title bar-->
            <div class="row-fluid   ">
                <div class="span12">

                    <div id="divLogo" class="pull-left">
                        <a href="index.php" id="divSiteTitle" style=" color:#E0E0E0 ; font-size:38px ;">DEALS <b style=" color:#54A4DE ; ">IN</b> PAKISTAN </a>
                        <span  id="divSiteTitle" style=" color:#E0E0E0; " >|</span>
                        <span id="divTagLine" style=" color:#E0E0E0; padding-left:0px">HotDeals / Discounts / Sale in Rawalpindi, Islamabad</span>
                    </div>
                </div>  
            </div>
            <!--menu bar or Navigation-->
            
<?php include 'includes/navigation.php'; ?>
 
    </div>
    <!-- Page Content -->
<div class="contentArea">

  <div class="divPanel notop page-content div_stylepanale2" style="margin-top:30px;">
        

    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>User Registeration</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                    <?php 
                    if (!$message=="") { ?>
                    <div class="alert alert-info">
                    <?php echo $message; ?>
                    </div>
                    <?php 
                    }else {
                    echo "<div><?php echo $message; ?></div>";
                    } ?>

                        <!-- <h6 class="text-center"><?php// echo $message; ?></h6> -->
                         <div class="form-group">
                            <label for="username" class="sr-only">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name" required="">
                        </div>
                         <div class="form-group">
                            <label for="username" class="sr-only">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name" required="">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required="">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required="">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required="">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login " class="btn btn-custom btn-lg btn-block btn-success" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        

            <div id="footerInnerSeparator"></div>
        </div>
    </div>
    </div>
    
    <!-- footer start -->
    <?php include 'includes/footer.php';?>