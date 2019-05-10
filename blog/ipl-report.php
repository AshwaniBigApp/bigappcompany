<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html" />

<head>
    <title>IPL 2018 Team Social Media Analysis Report</title>
    <meta name="description" content="Know the IPL Players, Team with the highest followership across various Social Media Platform - Facebook, Twitter and Instagram. Know the trending teams in Google Trend and different states in India." />
    <meta property="og:title" content="IPL 2018 Team Social Media Analysis Report"/>
    <meta property="og:image" content="https://www.bigappcompany.com/blog/images/ipl-report1.jpg"/>
    <meta property="og:site_name" content="BigAppCompany Blog"/>
    <meta property="og:description" content="Know the IPL Players, Team with the highest followership across various Social Media Platform - Facebook, Twitter and Instagram. Know the trending teams in Google Trend and different states in India."/>
	
    <?php require('../includes/header-links.php'); ?>
</head>

<body class="page page-id-10 page-template page-template-page-templates page-template-studio-page page-template-page-templatesstudio-page-php">
     <?php require('../includes/header.php'); ?> 
    <div class="sidebar-dimmer"></div>
    <div class="top mobile slice"></div>
    <div class="bottom mobile slice"></div>
    <header id="masthead" class="studio-page site-header" role="banner" style="background-image: url('../externalresources/wp-content/uploads/2016/07/studio4.jpg');">
        <div class="ui container center aligned site-branding">
            <h1>IPL 2018 teams and Social Media Analysis</h1>
            <h1 class="normal-weight"><i>Apr 11, 2018</i></h1> </div>
    </header>
    <div id="content" class="site-content">
        <div id="blog-page">
			<div class="ui container">
				<div class="blog-left">
					<div class="blog-main-image textc">
						<img src="images/ipl-report1.jpg" alt="IPL" />
					</div>
					<h2>Trending IPL Team in March 2018</h2>
					<p>According to Google Trends, we got to know that Chennai Super Kings and Royal Challengers Bangalore are most trending and Sunrisers Hyderabad and Rajasthan Royals are least trending.</p>
					<h2>IPL Team Facebook Followers</h2>
					<div class="blog-main-image textc">
						<img src="images/ipl-report2.jpg" alt="IPL" />
					</div>
					<p>Kolkata Knight Riders has highest number of Facebook followers.</p>
					<p>Mumbai Indians & Chennai Super Kings have joined 11 million club.</p>
					<h2>IPL Team Instagram Followers</h2>
					<div class="blog-main-image textc">
						<img src="images/ipl-report3.jpg" alt="IPL" />
					</div>
					<p>Mumbai Indians & Royal challengers Bangalore has highest number of Instagram follower.</p>
					<p>Kings XI Punjab, Chennai Super Kings & Kolkata Knight Riders have joined 500k  club.</p>
					<h2>IPL Team Twitter Followers</h2>
					<div class="blog-main-image textc">
						<img src="images/ipl-report4.jpg" alt="IPL" />
					</div>
					<p>Mumbai Indians has highest number of Twitter follower.</p>
					<p>Royal Challengers Bangalore, Chennai Super Kings & Kolkata Knight Riders have also joined 3 million club.</p>
					<h2>IPL Team Captain's Facebook Followers</h2>
					<div class="blog-main-image textc">
						<img src="images/ipl-report5.jpg" alt="IPL" />
					</div>
					<p>Virat Kohli has highest number of Facebook follower.</p>
					<p>Mahindra Singh Dhoni & Rohit Sharma have also joined 10 million club joined 3 million club.</p>
					<h2>IPL Team Captain's Instagram Followers</h2>
					<div class="blog-main-image textc">
						<img src="images/ipl-report6.jpg" alt="IPL" />
					</div>
					<p>Virat Kohli has highest number of Instagram follower.</p>
					<p>Mahindra Singh Dhoni & Rohit Sharma have also joined 5 million club.</p>
					<h2>IPL Team Captain's Twitter Followers</h2>
					<div class="blog-main-image textc">
						<img src="images/ipl-report7.jpg" alt="IPL" />
					</div>
					<p>Virat Kohli has highest number of Twitter followers.</p>
					<p>Rohit Sharma & Ravichandran Ashwin have joined 8 million club.</p>
					<h2>Which Team is Popular in which states of India?</h2>
					<div class="blog-main-image textc">
						<img src="images/ipl-report8.jpg" alt="IPL" />
					</div>
					<ol class="blog-ol">
						<li>IPL 2018 with eight different colours with 28 States of India.</li>
						<li>IPL 2018 is going to be more colourful and more interesting with eight awesome team.</li>
						<li>According to Google trends, Delhi Daredevils is searched the most in 10 states followed by Kings XI Punjab, Chennai Super Kings & Royal Challengers Bangalore.</li>
						<li>The above data is for 30 days before the start of IPL 2018.</li>
					</ol>
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