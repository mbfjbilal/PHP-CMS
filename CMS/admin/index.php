<?php include 'includes/admin_header.php'; ?>

    <div id="wrapper">

        <!-- Navigation -->
 <?php include 'includes/admin_navigation.php'; ?>      

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
               <!--  <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small><?php //echo $_SESSION['username'] ?></small>
                        </h1>
                        
                    </div>
                </div> -->
                <!-- /.row -->
<div class="four-grids">
                    <div class="col-md-3 four-grid">
                        <div class="four-grid1">
                            <div class="icon">
                                <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>User</h3>
                                <?php 
                                $query = "SELECT * FROM users";
                                $select_all_users = mysqli_query($con,$query);
                                $user_count = mysqli_num_rows($select_all_users);

                                echo "<h4>{$user_count}</h4>";
                                ?>
                            </div>
                            <a href="users.php">More Info
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                        </div>
                    </div>
                    <div class="col-md-3 four-grid">
                        <div class="four-grid2">
                            <div class="icon">
                                <i class="glyphicon glyphicon-align-justify glyphicon-file " aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Posts</h3>
                                <?php 
                                $query = "SELECT * FROM posts";
                                $select_all_posts = mysqli_query($con,$query);
                                $post_count = mysqli_num_rows($select_all_posts);

                                echo "<h4>{$post_count}</h4>";
                                ?>
                                
                            </div>
                            <a href="posts.php">More Info
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 four-grid">
                        <div class="four-grid3">
                            <div class="icon">
                                <i class="glyphicon glyphicon-bell" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Categories</h3>
                                <?php 
                        $query = "SELECT * FROM categories";
                        $select_all_categories = mysqli_query($con,$query);
                        $category_count = mysqli_num_rows($select_all_categories);

                        echo " <h4>{$category_count}</h4>";
                        ?>
                                                              
                            </div>
                            <a href="categories.php">More Info
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 four-grid">
                        <div class="four-grid4">
                            <div class="icon">
                                <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Comments</h3>
                            <?php 
                            $query = "SELECT * FROM comments";
                            $select_all_comments = mysqli_query($con,$query);
                            $comment_count = mysqli_num_rows($select_all_comments);

                            echo "<h4>{$comment_count}</h4>";
                            ?>
                                
                            </div>
                            <a href="comments.php">More Info
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <!-- /.row -->
                
                <!-- /.row -->
     <!-- chart bar selecting queris  -->
    <?php 

 $query = "SELECT * FROM posts WHERE post_status = 'published' ";
$select_all_published_posts = mysqli_query($con,$query);
$post_published_count = mysqli_num_rows($select_all_published_posts);
                                     

                                      
$query = "SELECT * FROM posts WHERE post_status = 'draft' ";
$select_all_draft_posts = mysqli_query($con,$query);
$post_draft_count = mysqli_num_rows($select_all_draft_posts);


$query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
$unapproved_comments_query = mysqli_query($con,$query);
$unapproved_comment_count = mysqli_num_rows($unapproved_comments_query);


$query = "SELECT * FROM users WHERE user_role = 'subscriber'";
$select_all_subscribers = mysqli_query($con,$query);
$subscriber_count = mysqli_num_rows($select_all_subscribers);


//ending bar selecting queris
    ?>
<!-- start chat bar div -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          
          <?php
                                      
    $element_text = ['All Posts','Active Posts','Draft Posts', 'Comments','Pending Comments', 'Users','Subscribers', 'Categories'];       
    $element_count = [$post_count,$post_published_count, $post_draft_count, $comment_count,$unapproved_comment_count, $user_count,$subscriber_count,$category_count];

    for($i =0;$i < 8; $i++) {
    
        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
    
    }
                                                            
            ?>
            // ['posts',2],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
        </div>
<!-- end chat bar div -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include 'includes/admin_footer.php'; ?>