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
			
         <div class="span8" id="divMain">                    
			<div class="row-fluid">		
		        <div class="span12">
				<center><h1 style="color: #206BA4"><b>Contact Us</b></h1> </center>                          
                 </div>  
				 <div class="span12">
				<span style="font-size: 16px">For website related matters (like issues, feedback, suggestions etc ), you may contact us by sending an e-mail to the following address:</span>
				</div> 
				
				 <div class="span12">
				 <br />
				 <a href="mailto:info@advertisement.com" title="Email" style="font-size: 16px">info@advertisement.com</a>
				</div>       		 
           		<br>
			
				</div>
			<!--End Policy Content Area here-->
			<hr>
			<br />
	               </div>
                    <?php 


                        // the message
// $msg = "First line of text\nSecond line of text";

// // use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);

// // send email
// mail("someone@example.com","My subject",$msg);
//===========================================================
   // if (isset($_POST['submit'])) {

   //                  $to         = "bilal@armyspy.com";
   //                  $subject    = wordwrap($_POST['subject'], 70);
   //                  $body       = $_POST['body'];
   //                  $header       = $_POST['email'];
                    
   //                  // send email
   //                  mail($to,$subject,$body,$header);

   //                  }
//==============================================================
                
                    if (isset($_POST['submit'])) {

                    $to         = "bilal@armyspy.com";
                    $subject    = wordwrap($_POST['subject'], 70);
                    $header       = $_POST['body'];
                    $body     = $_POST['email'];
                    
                    // send email
                    mail($to,$subject,"From: ".$body."<br>".$header);
                    //mail($to,$subject,$header);
                                        ?>
        <script>
           window.top.location = "contact.php";
        </script>
        <?php
                    // header("Location:contact.php");
                    }
                    
                    //if (isset($_POST['submit'])) {

                    //$to         = "bilal@armyspy.com";
                    //$subject    = wordwrap($_POST['subject'], 70);
                    //$body       = $_POST['body'];
                    //$header     = $_POST['email'];
                    
                    // send email
                    //mail($to,$subject,$body,$header);
                    //}
                    ?>



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
    <script>

