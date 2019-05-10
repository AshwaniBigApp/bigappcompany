<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html" />

<head>
    <title>Facebook Followership v/s IPL Auction Price</title>
    <meta name="description" content="As every match begins with toss, IPL Season starts with Player Auction. Some teams will retain their most trusted players and sometimes team management will be ready to bid as high as possible to get their favorite player." />
    <meta property="og:title" content="Facebook Followership v/s IPL Auction Price"/>
    <meta property="og:image" content="https://www.bigappcompany.com/blog/images/facebook.jpg"/>
    <meta property="og:site_name" content="BigAppCompany Blog"/>
    <meta property="og:description" content="As every match begins with toss, IPL Season starts with Player Auction. Some teams will retain their most trusted players and sometimes team management will be ready to bid as high as possible to get their favorite player."/>
	
    <?php require('../includes/header-links.php'); ?>

</head>

<body class="page page-id-10 page-template page-template-page-templates page-template-studio-page page-template-page-templatesstudio-page-php">
     <?php require('../includes/header.php'); ?> 
    <div class="sidebar-dimmer"></div>
    <div class="top mobile slice"></div>
    <div class="bottom mobile slice"></div>
    <header id="masthead" class="studio-page site-header" role="banner" style="background-image: url('../externalresources/wp-content/uploads/2016/07/studio4.jpg');">
        <div class="ui container center aligned site-branding">
            <h1>Facebook Followership v/s IPL Auction Price</h1>
            <h1 class="normal-weight"><i>Apr 17, 2018</i></h1> </div>
    </header>
    <div id="content" class="site-content">
        <div id="blog-page">
			<div class="ui container">
				<div class="blog-left">
					<div class="blog-main-image textc">
						<img src="images/facebook.jpg" alt="IPL" />
					</div>
					<p>As every match begins with toss, IPL Season starts with Player Auction. Some teams will retain their most trusted players and sometimes team management will be ready to bid as high as possible to get their favorite player.</p>
					<p>While Team Management bidding to get the best player over their opponent team, obviously every one look at their previous records, performance etc., but do you think players fan followers on their social profile affect their bidding? Is having a high follower's will help the player to get bided more?</p>

					<div class="blog-main-image textc">
						<img src="images/facebook1.jpg" alt="IPL" />
					</div>

					<p>When it comes to most expensive player of IPL Auction 2018, we can say that the fan followers doesn't impact players bidding amount in IPL Auctions. As we can see from the above graph, the most expensive players of year 2018 are those whose Facebook followers are almost less than 2M.</p>

					<div class="blog-main-image textc">
						<img src="images/facebook2.jpg" alt="IPL" />
					</div>

					<p>But We can also say that the players who had less social followers were bided only around the base price of any player which is 2Cr.</p>
					<p>To conclude we can say that only players performance can make him gain more money in IPL but having a less social followers can impact the bidding and restrict a player to be get bid around base price.</p>
					<p>If you would like to meet our team, you can contact us by <br/>
						<b>Email</b> : support@bigappcompany.com<br/>
						<b>Contact</b> : +91 9980411991
					</p>
					<p><b>Or Mail Us using below form</b></p>
					<form id="blog-form" name="" action="" method="post" >
						<input type="hidden" name="from_email" value="support@spotsoon.com">
						<input type="hidden" name="to_email" value="ravi@bigappcompany.com,divnay@bigappcompany.com">
						<input type="hidden" name="to_cc" value="">
						<input type="hidden" name="subject" value="BigAppCompany Blog Page Enquiry">
						<div class="form-group">
							<label>Name</label>
							<input class="nametxt" name="name" />
						</div>
						<div class="form-group">
							<label>Phone Number</label>
							<input class="phonetxt" name="phone" />
						</div>
						<div class="textr">
							<button class="blog-form-submit" type="button" name="submit">Submit</button>
						</div>
					</form>
				</div>
				<div class="blog-right">
					<?php require('blog-right.php'); ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
     <?php require('../includes/footer.php'); ?>

     <?php require('../includes/contact-us-form.php'); ?>
    
      <?php require('../includes/footerjs.php'); ?>
	  <script>
		$(document).ready(function(){
			$(".blog-form-submit").click(function(){
				$(".error-msg").remove();
				if($(".nametxt").val() == ""){
					$(".nametxt").parent().append("<span class='error-msg'>Please enter your name</span>");
					$(".nametxt").focus();
					return false;
				}
				if($(".phonetxt").val() == ""){
					$(".phonetxt").parent().append("<span class='error-msg'>Please enter Phone Number</span>");
					$(".phonetxt").focus();
					return false;
				}
				if($(".phonetxt").val() == ""){
					$(".phonetxt").parent().append("<span class='error-msg'>Please enter Phone Number</span>");
					$(".phonetxt").focus();
					return false;
				}
				var regx = /^[0-9]+$/;
				var valu = $(".phonetxt").val();
				if(regx.test(valu) == false){
					$(".phonetxt").parent().append("<span class='error-msg'>Please enter correct Phone Number</span>");
					$(".phonetxt").focus();
					return false;
				}
				if(valu.length != 10){
					$(".phonetxt").parent().append("<span class='error-msg'>Please enter 10 digit Phone Number</span>");
					$(".phonetxt").focus();
					return false;
				}
				var fdata = new FormData()
				fdata.append("product_name", jQuery("#blog-form").serialize());
				jQuery.ajax({
					type: 'POST',
					url: "https://bigappcompany.com/cms/contact",
					data: fdata,
					contentType: false,
					processData: false,
					success: function(response) {
						if (response == 1) {
							alert("Thank you for contacting BigAppCompany we will get back to you in 24 hours");
							location.reload();
						} else {
							alert("Error!!! Please Try After Some Time");
							location.reload();
						}
					}
				})
			});
		});
	  </script>
</body>

</html>