      

<?php include 'includes/db.php';?>
<?php include 'includes/header.php';?>
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

  <div class="divPanel notop page-content div_stylepanale2 background_forms" style="margin-top:30px;   height: 500px ; ">
        <div class="container">
            <div id="login_block" class="row  vcenter span12" style="margin-top:30px;" >
<div class="span3"></div>
                <div class="span4 ">
                    <div class="panel panel-primary" >
                        <div class="panel-heading" >
                            <a href="index.php" class="home" style="color:#F0F0F0 "><span><i class="fa fa-home fa-fw" aria-hidden="true" ></i></span>Authorization </a>
                            <a href="index.php" class="home" style="color:#F0F0F0 ; "> <span class="pull-right"><b>OP</b><span style="font-size: 15; color:#F0F0F0">
Advertisement</span></span></a>
                        </div>
						
                        <form action="includes/action_login.php" method="post">

                        <div class="panel-body text-center">
                            <div id="error_login" class="hidden alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Incorrect login or password!</div>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>

                                <input name="username" type="text" class="form-control form-group" placeholder="Username" style="font-size: 15; padding-top: 15px ;padding-bottom: 15px;" value="" required="">


                            </div>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>


                                <input name="password"  type="password" class="form-control form-group" placeholder="Password" style="font-size: 15; padding-top: 15px ;padding-bottom: 15px;" value="" required="">


                            </div>

                            <button name="login" type="submit" class="btn btn-success btn-block">LOG IN</button>

                            <!-- <button id="sign_in" type="button" class="btn btn-success btn-block">LOG IN</button> -->
                            <div style="margin-top:7px;" class="pull-left">
                                <a href="index.php"><span style="position:relative; top:-1px; left:1px;" class="glyphicon glyphicon-arrow-left">Back</span></a>
                            </div>
                            <div class="pull-right" style="margin-top: 10px;">
                                <a id="reset_pass" href="login.php#?forgot=<?php echo uniqid(true); ?>">Forgot password?</a>
                            </div>
                        </div>
						
						
						</form>
						
						
						
                    </div>
                </div><div class="span5"></div>
            </div>

            <div id="reset_pass_block" class="hidden row vcenter span12" style="margin-top:30px;">
                <div class="span3"></div>
                <div class="span4 ">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Reset password <a href="index.php" class="home"><span class="pull-right"><span class="pull-right"><b style="color:#F0F0F0">OP</b><span style="font-size: 15;color:#F0F0F0">
Advertisement</span></span></span></a>
                        </div>


                        <form action="includes/forgot.php" method="post">
                        <div class="panel-body text-center">
                            <div id="error_reset_pass" class="hidden alert alert-danger">User with such username does not exist!</div>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                <input id="reset_username" name="email" type="email" class="form-control form-group" placeholder="Email" style="font-size: 15; padding-top: 15px ;padding-bottom: 15px;">
                            </div>

                            <button name="forgot" type="submit" class="btn btn-success btn-block">RESET PASSWORD</button>

                            
                            <input type="hidden" class="hide" name="token" id="token" value="">
                            
                            <div class="pull-left" style="margin-top: 10px;">
                                <a id="go_back_to_login" href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go back</a>
                            </div>
                        </div>
                        </form>

                    </div>
                </div><div class="span5"></div>
            </div>

            <div id="reset_sucsess_block" class="hidden row vcenter">
                <div class="col-xs-4 col-xs-offset-4 ">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Reset password <span class="pull-right"><span class="pull-right"><b>OP</b><span style="font-size: 15">
Advertisement</span></span></span>
                        </div>
                        <div class="panel-body text-center">
                            <h4>The link for password reset sent to<br> <b><span id="reset_sucsess_username"></span></b></h4>
                        </div>
                    </div>
                </div>
            </div>
        
    

    <script>         
        
             $(document).ready(function () {

            //     // csrf token
            //     var csrfToken = $('[name="csrf-param"]').attr('content');

            //     // sign in
            //     $('#sign_in').click(function () {
            //         $('#sign_in').prop('disabled', true).html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
            //         $.post('/includes/login.php', {
            //             username: $('#username').val(),
            //             password: $('#password').val(),
            //             remember: $("#remember").prop("checked") ? 1 : 0,
            //             csrfToken: csrfToken
            //         }, function (data) {
            //             if (data === 'ok') {
            //                 location.reload();
            //             } else {
            //                 $('#error_login').removeClass('hidden');
            //                 $('#sign_in').prop('disabled', false).html('LOG IN');
            //             }
            //         });
            //     });


                // show reset pass form
                $('#reset_pass').on('click', function () {
                    $('#login_block').addClass('hidden');
                    $('#reset_pass_block').removeClass('hidden');
                });


                // back to login form
                $('#go_back_to_login').on('click', function () {
                    location.reload();
                });


                // reset pass
                $('#reset_pass_button').on('click', function () {
                    $('#reset_pass_button').prop('disabled', true).html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
                    $.post('/login/apiResetPass/', {
                        reset_username: $('#reset_username').val(),
                        csrfToken: csrfToken
                    }, function (data) {
                        var response = $.parseJSON(data);
                        if (response.status === 'ok') {
                            $('#reset_pass_block').addClass('hidden');
                            $('#reset_sucsess_username').html($('#reset_username').val());
                            $('#reset_sucsess_block').removeClass('hidden');
                        } else {
                            $('#reset_pass_button').prop('disabled', false).html('RESET PASSWORD');
                            $('#error_reset_pass').removeClass('hidden');
                        }
                    });
                });

            });
        </script>

            <div id="footerInnerSeparator"></div>
        </div>
    </div>
    </div>
    
    <!-- footer start -->
    <?php include 'includes/footer.php';?>
