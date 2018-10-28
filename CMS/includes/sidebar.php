			
			<div class="span4 sidebar">

                    <div class="sidebox">
						
						<div class="row-fluid div_adjust"> <!-- start search -->
                            <div class="span12">
                                <form action="search.php" method="post" id="search-form_3">
                                <input type="text" name="search" class="search_3"/>
                                <input type="submit" name="submit" class="submit_3" value="Search" />
								</form>
                            </div>
                        </div>    
								<!-- end search -->
                        <br />
						
						<!-- Blog categories Well-->
                            
                             <?php 

                    $query = "SELECT * FROM categories";
                    $select_catagories_query = mysqli_query($con,$query);

                     ?>
						<img src="web_images/pic.PNG" alt="Advertisement" class="responsive" style="margin-top:20px"><br><br>
						<img src="web_images/catagories.PNG" alt="Catagories" class="responsive"><br>
						 <ul style="font-size: 16px;">
                            <?php

                         while ($row = mysqli_fetch_assoc($select_catagories_query)) {
                              
                              $cat_id = escape($row['cat_id']);
                              $cat_title = escape($row['cat_title']);
                        
                        $count_query = "SELECT * FROM posts WHERE post_category_id = $cat_id";
                    $select_count_query = mysqli_query($con,$count_query);
                    $show_count = mysqli_num_rows($select_count_query);

                        echo  "<li><a href='category.php?category=$cat_id' class='customHr'>
                                    {$cat_title} ($show_count)</a></li>" ;
                      } 
                      ?>
							                          
                          </ul>			 
<br>
						<!-- start HOT deals -->
						<!-- <img src="web_images/hot deals.PNG" alt="Hotdeals" class="responsive"><br>
						    
							 <!-- widget -->
							<!-- <?phpINCLUDE //widget.php; ?> -->
							<!--Hot deals block end  -->
                   				
					<!-- <div class="row-fluid ">	 -->
                   		<!-- <div class="span12"> -->
						<!-- <br /> -->
								<!-- <center><button type="button" class="btn_show  btn-large " style="width:100%;"> -->
                            <!-- Show More »  -->
                        <!-- </button></center> -->

							<!-- </div> -->
						<!-- </div> -->
										   	 
                    </div>
                    
                </div>