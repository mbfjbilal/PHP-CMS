<?php include 'includes/db.php';?>
<?php include 'includes/header.php';?>
    <ul><li onClick= "topFunction()" id="myBtn" title= "Go to top" class="fa fa-arrow-circle-up " ></li></ul>

    <!--***     CONTAINER      ***-->
    <div id="divBoxed" class="container">

    <div class="main_center_div"></div>

    <div class=" row-fluid  notop nobottom div_style">
            <!--title bar-->
			<div class="row-fluid   ">
                <div class="span12">

                    <div id="divLogo" class="pull-left">
                       <b  id="divSiteTitle" style=" color:#E0E0E0  ;">DEALS <a id="divSiteTitle"  href="index.php" style=" color:#54A4DE ; ">IN</a> PAKISTAN </b>
						<span  id="divSiteTitle" style=" color:#E0E0E0; " >|</span>
                        <span id="divTagLine" style=" color:#E0E0E0; padding-left:0px">HotDeals / Discounts / Sale in Rawalpindi, Islamabad</span>
                    </div>
				</div>	
			</div>
				<!--menu bar or Navigation-->
      
		<?php include 'includes/navigation.php'; ?>
				
    </div>
    <!--END OF HEADER AREA-->


    <!--BODY CONTENT AREA START-->

<div class="contentArea">

  <div class="divPanel notop page-content div_stylepanale2" style="margin-top:30px;">
            

   			 <div class="row-fluid">
				<div class="span8"> 
					<div class="span12">
						<center><h1 style="color: #206BA4"><b>Submit Your Deal For FREE</b></h1></center>
						
					</div>
					<div class="span12">
						<span style="font-size:18px" >Do you own a business and want your deal/sale/promotion to be displayed on Online Product Advertisement?</span>	
					</div>
					<br />
					<div class="span12">
						<span  style="font-size:14px">Please use the following form to submit your deal/sale/promotion for FREE. We will review the submission and will display it for Free if it fulfills our criteria.</span>	
					</div>
					
					<div class="span12">
					<br />
					<br />
						<label>Name <span style="color:#999999; size:35px">(required)</span></label>
						<input  type="text" name="name"   size="35" style="width:50%;" required/>
					</div>
					<div class="span12">
						
						<label>Email <span style="color:#999999; size:20px">(required)</span></label>
						<input  type="text" name="email"  size="35" style="width:50%;" required/>
						</div>
					<div class="span12">
					
						<label>Phone Number <span style="color:#999999; size:11px">(required)</span></label>
						<input  type="text" name="phone_number"   size="35" style="width:50%;" required/>
					</div>
					<div class="span12">
					  <div class="form-group">
       					 <label>Upload Image</label>
      					  <div class="input-group " >
           				 <span class="input-group-btn ">
            			    <span class="btn btn-default btn-file">
               			     Browse…<input type="file" id="imgInp">
               				 </span>
            			</span>
          				  <input type="text" class="form-control" readonly>
       					 </div>
       					 <img id='img-upload'/>
    					</div>
					</div>
					<div class="span12">
					
						<label>Website <span style="color:#999999; size:35px">(required)</span></label>
						<input  type="text" name="website"   size="35" style="width:50%;" required/>
					</div>
					<div class="span12">
						
						<label>Comment <span style="color:#999999; size:500px">(required)</span></label>
						<textarea  name="Comment" style="width:80% ; height:150px; "  required></textarea>
						</div>
					<div class="span12">
						
						
						<input type="submit" name="submit"  class="comment_btn" style="float: left;width:20% ; size: 35px;"  required/>
						</div>
						
			<div class="row-fluid">
			<br>
				<div class="span12">
				<br>
				<center>
				<a href="#" class="social_icons"><i class="fa fa-twitter" style="font-size:20px; color:#55ACEE"></i></a>
				<a href="#" class="social_icons"><i class="fa fa-facebook" style="font-size:20px; color:#3B5998"></i></a>
				<a href="#" class="social_icons"><i class="fa fa-youtube-play" style="font-size:20px; color:#E63C3C"></i></a>
				<a href="#" class="social_icons"><i class="fa fa-google-plus " style="font-size:20px; color:#DD4B39"></i></a>
<hr>			</center>
				</div>
				<hr><br>
			</div>
			
				<?php include 'includes/comment_box.php';?>
                <!--Edit Sidebar Categories, TAgs....Content here-->
            <?php include 'includes/sidebar.php';?>
                <!--End Sidebar Categories, TAgs....Content here-->
            </div>

            <div id="footerInnerSeparator"></div>
        </div>
    </div>
    
    <!-- footer start -->
    <?php include 'includes/footer.php';?>
</div>


     <!-- GO TO TOP BUTTON START-->  
	<?php include 'includes/top_button.php';?>
