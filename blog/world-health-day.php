<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html" />

<head>
    <title>BigAppCompany celebrated World Health Day 2018 with a cricket match at BEL ground.</title>
    <meta name="description" content="BigAppCompany celebrated World Health Day 2018 with a cricket match at BEL ground. The match was organized with 4 cricket teams with eight players in each team." />
    <meta property="og:title" content="BigAppCompany celebrated World Health Day 2018 with a cricket match at BEL ground."/>
    <meta property="og:image" content="https://www.bigappcompany.com/blog/images/world-health-day.jpg"/>
    <meta property="og:site_name" content="BigAppCompany Blog"/>
    <meta property="og:description" content="BigAppCompany celebrated World Health Day 2018 with a cricket match at BEL ground. The match was organized with 4 cricket teams with eight players in each team."/>
	
    <?php require('../includes/header-links.php'); ?>

</head>

<body class="page page-id-10 page-template page-template-page-templates page-template-studio-page page-template-page-templatesstudio-page-php">
     <?php require('../includes/header.php'); ?> 
    <div class="sidebar-dimmer"></div>
    <div class="top mobile slice"></div>
    <div class="bottom mobile slice"></div>
    <header id="masthead" class="studio-page site-header" role="banner" style="background-image: url('../externalresources/wp-content/uploads/2016/07/studio4.jpg');">
        <div class="ui container center aligned site-branding">
            <h1>BigAppCompany celebrated World Health Day 2018 with a cricket match at BEL ground</h1>
            <h1 class="normal-weight"><i>Apr 16, 2018</i></h1> </div>
    </header>
    <div id="content" class="site-content">
        <div id="blog-page">
			<div class="ui container">
				<div class="blog-left">
					<div class="blog-main-image textc" style="max-width:90%;">
						<img src="images/world-health-day.jpg" alt="World Health Day" />
					</div>
					<p>The match was organized with 4 cricket teams with eight players in each team.</p>
					<p>The four teams were:-</p>
					<ol class="blog-ol">
						<li>Sales Super Stars,</li>
						<li>Marketing Masters,</li>
						<li>Dynamic Developers and</li>
						<li>Back-End Blasters.</li>
					</ol>
					<p>They were two league matches, two qualifiers and one final match. Each team put their best and gave the very stiff competition.</p>
					<div class="blog-main-image textc" style="max-width:90%;">
						<img src="images/world-health-day2.jpg" alt="World Health Day" />
						<img src="images/world-health-day3.jpg" alt="World Health Day" />
					</div>
					<p>Among four team, Dynamic Developer won the final match against Back-End Blasters.</p>
					<p>Congratulation Dynamic developer team for outstanding performance and winning the BigAppCompany Cricket League.</p>
					<div class="blog-main-image textc" style="max-width:90%;">
						<img src="images/world-health-day1.jpg" alt="World Health Day" />
					</div>
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