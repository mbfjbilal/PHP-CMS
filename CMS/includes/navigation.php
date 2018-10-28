<?php session_start(); ?>

	<div class="row-fluid menu_style">
				<div class="span12  "  >
                    
                   <nav class="navbar navbar-inverse " style="padding-top: 5px;" >
   					    <div class="navbar-header">
        					<button type="button" style=" background-color: #000" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            					<span  class="icon-bar"></span>
            					<span class="icon-bar"></span>
            					<span class="icon-bar"></span>
        					</button>
    					</div>
    					<div class="navbar-collapse collapse">
        					<ul class="nav navbar-nav">

                    <?php 
                    $submitform_class = '';
                    $submitform_url = "Submit Form.php";

                    $privacy_class = '';
                    $privacy_url = "Privacy Policy.php";

                    $contact_class = '';
                    $contact_url = "contact.php";

                    $registration_class = '';
                    $registration_url = "registration.php";

                    // this is for "name of the coming page"
                    $pageName = basename($_SERVER['PHP_SELF']);

                    if ($pageName == $submitform_url) {
                      $submitform_class = 'active';

                    }elseif ($pageName == $privacy_url) {
                      $privacy_class = 'active';

                    }elseif ($pageName == $contact_url) {
                      $contact_class = 'active';

                    }elseif ($pageName == $registration_url) {
                      $registration_class = 'active';

                    }else {
                      $home_class = 'active';
                    }

                     ?>
                    
            			<li class="<?php echo($home_class); ?>" id="inline_style" ><a href="index.php" ><i class="icon-home "></i> Home</a></li>

						    	<li class="<?php echo($privacy_class); ?>" id="inline_style"><a href="Privacy Policy.php">Privacy Policy</a></li>

						    	<li class="<?php echo($contact_class); ?>" id="inline_style"><a href="contact.php">Contact Us</a></li>

                            <?php 
                           if (isset($_SESSION['user_role'])):

                            if ($_SESSION['user_role'] !== 'subscriber') {

                            echo "<li id='inline_style'><a href='admin'>Admin</a></li>";

                                }else {
                            echo "<li id='inline_style'><a href='user'>Admin</a></li>"; 
                                }
                           else:
                           endif;
                           ?>


								<!-- <li id="inline_style"><a href="admin">Admin</a></li> -->
              <?php 
                if (isset($_SESSION['user_role']) && $_SESSION['user_role'] !== 'subscriber , admin') {
                  }
                else { ?>
                  <li class="<?php echo($registration_class); ?>" id="inline_style">
                  <a href="registration.php">Registration</a>
                  </li>

                  <?php
                }

                ?>
							

                   <?php 
                  if (isset($_SESSION['user_role'])):
                  echo "<li id='inline_style'><a href='includes/logout.php'>Logout</a></li>";
                  else:
                  echo "<li id='inline_style'><a href='login.php'>Login</a></li>";
                  endif;
                  ?>
                           

                            <?php 
		// 				   if (isset($_SESSION['user_role'])) {

  //               if ($_SESSION['user_role'] !== 'subscriber') {
						   	
		// 				   		if (isset($_GET['p_id'])) {
						   			
		// 				   			$the_post_id = escape($_GET['p_id']);
									
		// echo "<li id='inline_style'><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";               
		
		// 				   		}
  //               }else {
                  
  //                 if (isset($_GET['p_id'])) {
                    
  //                   $the_post_id = escape($_GET['p_id']);
                  
  //   echo "<li id='inline_style'><a href='user/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";               
    
  //                 }

  //               }

		// 				   }
						   
						   ?>             
       						</ul>
        
        				            <ul class="nav navbar-nav navbar-right  "  id="social_media_logos" >
                              <!--FACEBOOK SHARE start  -->
                                <li class="span2 logo_design"><a class="zoom"  id="style_social"  href="https://www.facebook.com/plugins/shareArticle?mini=true&url=http://adz.orgfree.com/&title=Online Product Advertisement&summary=adz.orgfree.com&source=product_advertisement" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" ><img src="web_images/fb.png" style="height: 50px;width: 50px;margin-top: -20px;"></a></li>
                                <!-- Facebook share end -->
                                <!-- Twitter share start -->
                                <li class="span2 logo_design"><a class="zoom"  id="style_social"  href="https://twitter.com/intent/tweet?url=http://adz.orgfree.com/&title=Online Product Advertisement&summary=adz.orgfree.com&source=product_advertisement" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" ><img src="web_images/twitter.png" style="height: 50px;width: 50px;margin-top: -20px"></a></li>
                                <!-- twitter share end -->
                                <!-- google plus share start -->
                                <li class="span2 logo_design"><a class="zoom"  id="style_social"    href="https://plus.google.com/share?mini=true&url=http://adz.orgfree.com/&title=Online Product Advertisement&summary=adz.orgfree.com&source=product_advertisement" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" ><img src = "web_images/g plus.png" style="height: 50px;width: 50px;margin-top: -20px"></a></li>
                                <!-- google plus share end -->
                                <!-- linkedin share start  -->
                                <li class="span2 logo_design"><a class="zoom"  id="style_social"  href="https://www.linkedin.com/shareArticle?mini=true&url=http://adz.orgfree.com/&title=Online Product Advertisement&summary=adz.orgfree.com&source=product_advertisement" onclick="window.open(this.href,'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" ><img src="web_images/linkedin.png" style="height: 50px;width: 50px;margin-top: -20px"></a></li>
                                <!-- Linkedin share end -->
                            </ul>
                            
    					</div>
					</nav>
    			</div>
                     
    		</div>