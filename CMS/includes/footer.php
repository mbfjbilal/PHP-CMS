
<!-- footer start -->

	<div id="divFooter" class="footerArea" style="margin-top:-35px;">

        <div class="divPanel">

            <div class="row-fluid">
                <div class="span5" id="footerArea1">
                
                    <h3>About Website</h3>

                    <p>Online Product Advertisement is the plateform for all them who own their business and want their deal/sale/promotion to be displayed on Online Product Advertisement</p>
                    
                    <p> 
                      
                        <a href="Privacy Policy.php" title="Privacy Policy">Privacy Policy</a><br />
                        

                    </p>

                </div>
                <div class="span4" id="footerArea2">

                    <h3>Recent Advertisement Posts</h3> 

                    <?php 
                $query = "SELECT * FROM posts  WHERE post_status = 'published' ORDER BY post_date DESC LIMIT 3";

                $select_recent_posts_query = mysqli_query($con,$query);

                if (!$select_recent_posts_query) {
                    die('RECENT POST QUERY FAILED'.mysqli_error($con));
                }

                while ($row = mysqli_fetch_array($select_recent_posts_query)) {
                $post_id = escape($row['post_id']);
                $post_title = escape($row['post_title']);
                $post_date = escape($row['post_date']);
                $post_status = escape($row['post_status']);
            
                     ?>
                    <p>
                        <a href="post.php?p_id=<?php echo $post_id; ?>" title=""><?php echo $post_title ?></a><br />
                        <span style="text-transform:none;">
                            <?php
                             // echo date("d M, Y ",strtotime($post_date)); 
                            
                         echo  post_time_ago($post_date);

                             ?>
                                
                            </span>
                    </p>
              
                    <!-- <p>
                        <a href="#" title="">McDonald’s Ramadan Dine Divine Deals 2017 for Iftar</a><br />
                        <span style="text-transform:none;">5 hours ago</span>
                    </p>
                    <p>
                        <a href="#" title="">McDonald’s Ramadan Dine Divine Deals 2017 for Iftar</a><br />
                        <span style="text-transform:none;">19 hours ago</span>
                    </p> -->
                <?php } ?>

                    <p>
                        <a href="#" title="">VIEW ALL POSTS</a>
                    </p>

                </div>
                
                <div class="span3" id="footerArea4">

                    <h3>Get in Touch</h3>  
                                                               
                    <ul id="contact-info">
                    <li>                                    
                        <i class="general foundicon-phone icon"></i>
                        <span class="field">Phone:</span>
                        <br />
                        (051) 256 3465 / 256 3466                                                                      
                    </li>
                    <li>
                        <i class="general foundicon-mail icon"></i>
                        <span class="field">Email:</span>
                        <br />
                        <a href="mailto:info@advertisement.com" title="Email">info@advertisement.com</a>
                    </li>
                    <li>
                        <i class="fa fa-home icon" style="margin-bottom:50px"></i>
                        <span class="field">Address:<br />
                        123 Street,<br />
                        12345 City,<br />
                         Country</span>
                    </li>
                    </ul>

                </div>
            </div>

            <br /><br />
            <div class="row-fluid">
                <div class="span12">
                    <p class="copyright">
                        Copyright © <?php echo date('Y'); ?> Online Product Advertisement System. All Rights Reserved.
                    </p>

                    <p class="social_bookmarks">

                             
                              <!--FACEBOOK SHARE start  -->
                                <a href="https://www.facebook.com/plugins/shareArticle?mini=true&url=http://adz.orgfree.com/&title=Online Product Advertisement&summary=adz.orgfree.com&source=product_advertisement" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" ><i class="fa fa-facebook" style="color: #5072B9; font-size: 14px"></i> Facebook</a>
                                <!-- Facebook share end -->
                                <!-- Twitter share start -->
                                <a href="https://twitter.com/intent/tweet?url=http://adz.orgfree.com/&title=Online Product Advertisement&summary=adz.orgfree.com&source=product_advertisement" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" ><i class="fa fa-twitter" style="color: #00B5EF ; font-size: 14px"></i>  Twitter</a>
                                <!-- twitter share end -->
                                <!-- google plus share start -->
                                <a href="https://plus.google.com/share?mini=true&url=http://adz.orgfree.com/&title=Online Product Advertisement&summary=adz.orgfree.com&source=product_advertisement" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" ><i class="fa fa-google-plus" style="color: #DA4936; font-size: 14px "></i>  G-plus</a>
                                <!-- google plus share end -->
                                <!-- linkedin share start  -->
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=http://adz.orgfree.com/&title=Online Product Advertisement&summary=adz.orgfree.com&source=product_advertisement" onclick="window.open(this.href,'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" ><i class="fa fa-linkedin" style="color: #00649E ; font-size: 14px"></i> LinkedIn</a>
                                <!-- Linkedin share end -->
                           
                    </p>
                </div>
            </div>

        </div>
    </div>