<?php include 'includes/user_header.php'; ?>

    <div id="wrapper">

        <!-- Navigation -->
 <?php include 'includes/user_navigation.php'; ?>      

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
               <!--  <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                            <small><?php// echo $_SESSION['username'] ?></small>
                        </h1>
                        
                    </div>
                </div> -->
                <!-- /.row -->
<div class="four-grids">
                 
                    <div class="col-md-3 four-grid">
                        <div class="four-grid2">
                            <div class="icon">
                                <i class="glyphicon glyphicon-align-justify glyphicon-file " aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Posts</h3>
                                <?php 
                                $query = "SELECT * FROM posts WHERE post_user= '$_SESSION[username]'";
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
                        <div class="four-grid4">
                            <div class="icon">
                                <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Comments</h3>
                            <?php 
                            // $query = "SELECT * FROM comments";
                            $query = "SELECT * FROM comments WHERE EXISTS (SELECT * FROM posts WHERE posts.post_id = comments.comment_post_id AND posts.post_user= '$_SESSION[username]' AND comments.comment_status = 'approved')";
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
$query = "SELECT * FROM posts WHERE post_user= '$_SESSION[username]'";
$select_all_posts = mysqli_query($con,$query);
$post_count = mysqli_num_rows($select_all_posts);


 $query = "SELECT * FROM posts WHERE post_user= '$_SESSION[username]' AND post_status = 'published' ";
$select_all_published_posts = mysqli_query($con,$query);
$post_published_count = mysqli_num_rows($select_all_published_posts);
                                     

                                      
$query = "SELECT * FROM posts WHERE post_user= '$_SESSION[username]' AND post_status  = 'draft' ";
$select_all_draft_posts = mysqli_query($con,$query);
$post_draft_count = mysqli_num_rows($select_all_draft_posts);

$query = "SELECT * FROM comments WHERE EXISTS (SELECT * FROM posts WHERE posts.post_id = comments.comment_post_id AND posts.post_user= '$_SESSION[username]')";
$comments_query = mysqli_query($con,$query);
$comment_count = mysqli_num_rows($comments_query);


$query = "SELECT * FROM comments WHERE EXISTS (SELECT * FROM posts WHERE posts.post_id = comments.comment_post_id AND posts.post_user= '$_SESSION[username]' AND comments.comment_status = 'unapproved')";
$unapproved_comments_query = mysqli_query($con,$query);
$unapproved_comment_count = mysqli_num_rows($unapproved_comments_query);



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
                                      
    $element_text = ['All Posts','Active Posts','Draft Posts', 'Comments','Pending Comments'];       
    $element_count = [$post_count,$post_published_count, $post_draft_count, $comment_count,$unapproved_comment_count];

    for($i =0;$i < 5; $i++) {
    
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
        <?php include 'includes/user_footer.php'; ?>