<!-- hot deals widget -->
 <?php 

                    $query = "SELECT * FROM posts WHERE post_title LIKE '%$post_title' && post_tags LIKE '%$post_tags' ";
                    $select_post_query = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($select_post_query)) {
                        
                        $post_title = escape($row['post_title']);
                $post_image = escape($row['post_image']);
                $post_content = escape($row['post_content']);
                $post_date = escape($row['post_date']);
			
			?>


	<div class="row-fluid ">
		<div class="span2">
			<a href="post.php?p_id=<?php echo $post_id; ?>"><img src= "images/<?php echo($post_image); ?>" class="img-polaroid hotdeals_images" alt=""> </a>
		</div>
		
		<div class="span10 ">
		<div class="row-fluid   ">
			<span class="span12"><a href='#' style="font-size: 14px" > <?php echo($post_title); ?></a></span>
		</div> 
		<div class="row-fluid " >
			 <span class="span12 " id="clampjs" style="font-size: 12px; overflow: hidden;"> <?php echo  ($post_content); ?> 
			  </span>
		</div>
		<div class="row-fluid   ">
			<span class="span12" style="color:#2475AE "> <?php echo($post_date); ?> </span>
		</div>
		<?php } ?>
	</div>

</div>
<!-- Script to clampin text  -->
<script type="text/javascript">
	
$(document).ready( function() {   

     $('#clampjs').css({ 
            'max-height':'73px', 
            'overflow':'hidden'
        });


    });
</script>