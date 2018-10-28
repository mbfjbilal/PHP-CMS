<?php include 'includes/db.php';?>
<?php include 'includes/header.php';?>

<button onclick="topFunction()" id="myBtn" title="Go to top" >Move to Top</button>
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

<div class="contentArea">

  <div class="divPanel notop page-content div_stylepanale2" style="margin-top:30px;">
            

  <div class="row-fluid">
			<!--Edit Ads Content Area here-->
         <div class="span8" id="divMain">  

			<?php

         	if (isset($_GET['p_id'])) {
         		
         		$the_post_id = escape($_GET['p_id']);

            $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id ";
         	$send_query = mysqli_query($con,$view_query);

            if (!$send_query) {
                die("POST VIEW QUERY FAILED");
            }

            //spearate post for admin and users to show all and published
            if (isset($_SESSION['user_role']) && $_SESSION['user_role']== 'admin') {
                
                $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";

            }else {

    $query = "SELECT * FROM posts WHERE post_id = $the_post_id AND post_status = 'published' ";
            }

         	$select_all_posts_query = mysqli_query($con,$query);

            if (mysqli_num_rows($select_all_posts_query) < 1) {

                // if post_status == 'published'
                echo '<center><h1>No posts available</h1></center>';
                
            }else{

         	while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
         		
         		$post_title = escape($row['post_title']);
         		//$post_author = $row['post_author'];
         		$post_author = escape($row['post_user']);
         		$post_image = escape($row['post_image']);
         		$post_content = $row['post_content'];
                $post_date = escape($row['post_date']);
         		// $post_address= $row['post_address'];
         		// $post_contact_number = $row['post_contact_number'];
         		// $post_website = $row['post_website'];
         		// $post_facebook = $row['post_facebook'];
         		// $post_twitter = $row['post_twitter'];
         		$post_tags = escape($row['post_tags']);

         		?>


         	<div class="row-fluid">       
                <div class="span2"> 
                <a href="post.php?p_id=<?php echo $post_id; ?>">                         
                    <img src="images/<?php echo $post_image ?>" class="img-polaroid small_image" alt="image">
                </a> 
                </div>

                <div class="span10">            
                    <h3 >
                        <a class="post_heading" style="color:#206BA4;font-size: 26px" href="post.php?p_id=<?php echo $the_post_id; ?> "><?php echo $post_title ?></a>
                    </h3>

                    <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-primary disabled btn-lg"><?php echo  post_time_ago($post_date); ?></a>

            <div class="btn btn-default visible-xs-block hidden-xs visible-sm-block ">...</div>
            <a href="#" class="btn btn-default disabled " style="color: #2475AE">by </a>
            <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>" class="btn btn-default " style="font-weight: bold;"> <?php echo $post_author ?></a>
            <a href="#" class="btn btn-default disabled visible-lg-block visible-md-block" style="color: #2475AE">in </a>
            <a href="#" class="btn btn-default visible-lg-block visible-md-block" style="font-weight: bold;"> <?php echo $post_tags ?></a>,
           <!-- <a href="#" class="btn btn-default visible-lg-block visible-md-block " style="font-weight: bold;">Ramadan Deals</a> -->
             <a href="#" class="btn btn-warning  btn-comment pull-right"><i class="fa fa-comment" style="font-size: 17px;"></i></a>   
        </div>
                </div>       
            </div>
            <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span10 ">  
                <a href="post.php?p_id=<?php echo $post_id; ?>">                         
                    <img src="images/<?php echo $post_image ?>"  alt="image" class="img-fluid image_style"> 
                </a>  
                </div>          
            </div>
            
            <div class="row-fluid">
                <div class="span12" style=" text-align:center;"><?php echo $post_content ?></div> 
            </div>
             <br>
             <div class="row-fluid">
                <div class="span12">
                 <?php include 'includes/social_media.php';?>

                 </div>
             </div>
           <hr>
            <br><br>
            <div class="row-fluid">
                <div class="span12">
                <div class="panel-footer " style="margin-left:15px; ">
                    <span  style="font-size: 18px ; color: #2475AE">Related Posts</span>
                    <div class="clearfix"></div>
                </div>
                </div>
                <div class="span12">
                <?php 

               $str = explode(" ", $post_title);
               
               //$related_post_query = "SELECT  * from posts WHERE post_title LIKE '%$post_title' AND post_tags LIKE '%$post_tags%'";

                $related_post_query = "SELECT * FROM posts WHERE post_title LIKE '%$str[0]%' AND post_title LIKE '%$str[1]%' AND post_title LIKE '%$str[2]%' AND post_status = 'published'";

            $select_all_related_post_query = mysqli_query($con,$related_post_query);

            if (mysqli_num_rows($select_all_related_post_query) < 1) {

                // if post_status == 'published'
                echo '<center><h1>No posts available</h1></center>';
                
            }else{

            while ($row = mysqli_fetch_array($select_all_related_post_query)) {
                
                $post_id = escape($row['post_id']);
                $post_title = escape($row['post_title']);
                $post_date = escape($row['post_date']);
                $post_image = escape($row['post_image']);
                $post_tags = escape($row['post_tags']);
                $post_status = escape($row['post_status']);

                ?>


               


                <div class="span4">
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><img src="images/<?php echo $post_image ?>"><br>
                        <span style="font-size: 16px ; color: #2475AE"><?php echo $post_title ?></span>
                    </a>
                    <br>
                    <span style="font-size: 16px ; color: #999999"><?php echo post_time_ago($post_date)." "."$post_tags" ?></span>

                </div>
            
             <?php } } ?>
                </div>

            </div>
			


         <?php } 

           
            ?>
         	
			
			
			<!-- Blog Comments -->

            <?php 

            if (isset($_POST['create_comment'])) {

                $the_post_id = escape($_GET['p_id']);
               $comment_author  = escape($_POST['comment_author']);
               $comment_email   = escape($_POST['comment_email']);
               $comment_content = escape($_POST['comment_content']);

        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
                   

               $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";

               $query .= "VALUES ($the_post_id ,'{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

               $create_comment_query = mysqli_query($con,$query);

               if (!$create_comment_query) {
                die("QUERY FAILED.".mysqli_error($con));
               }


                // $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                // $query .= "WHERE post_id = $the_post_id ";
                // $update_comment_count = mysqli_query($con,$query);


            }else{

                echo "<script>alert('Comments fields cannot be empty')</script>";
            }

                }
                
             
            ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post"  role="form">

                        <div class="form-group">
                            <label for="Author">Author</label>
                           <input name="comment_author" type="text" class="form-control" name="comment_author">
                        </div>

                        <div class="form-group">
                            <label for="Email">Email</label>
                           <input name="comment_email" type="email" class="form-control" name="comment_email">
                        </div>

                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" cols="30" rows="4" ></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php 

                $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                $query .= "AND comment_status = 'approved' ";
                $query .= "ORDER BY comment_id DESC ";
                $select_comment_query = mysqli_query($con,$query);
                if (!$select_comment_query) {
                    
                    die("QUERY FAILED.".mysqli_error($con));

                }
                while ($row = mysqli_fetch_array($select_comment_query)) {
                $comment_date = escape($row['comment_date']);
                $comment_content = escape($row['comment_content']);
                $comment_author = escape($row['comment_author']);

                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="image">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                       <?php echo $comment_content; ?>
                    </div>
                </div>


                <?php }  } }else{
                    ?>
        <script>
           window.top.location = "index.php";
        </script>
        <?php
                // header("Location: index.php");
                }
                ?>

			<hr>
			
				<div class="clear"></div>
			 
			 
                </div>
				<!--End Ads Content Area here-->
				
				<!--Edit Sidebar Categories, TAgs....Content here-->
            <?php include 'includes/sidebar.php';?>
				<!--End Sidebar Categories, TAgs....Content here-->
            </div>

            <div id="footerInnerSeparator"></div>
        </div>
    </div>
	
	<!-- footer start -->
	<?php include 'includes/footer.php';?>