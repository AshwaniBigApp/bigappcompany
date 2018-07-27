<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html" />

<head>
    <?php require('includes/header-links.php'); ?>
        <style>
            .digialMarketing {
                height: auto !important;
                width: 34px !important;
            }
        </style>
</head>

<body class="home page page-id-2 page-template-default">
    <?php require('includes/header.php'); ?>
        <div class="sidebar-dimmer"></div>
        <div class="top mobile slice"></div>
        <div class="bottom mobile slice"></div>
        <header id="masthead" class="front page site-header" role="banner" style="background-image: url('assets/images/video-placeholder.jpg');">
            <div class="video">
                <video autoplay loop muted>
                    <source src="assets/images/video/bigappcompany-720.mp4" media="screen and (max-device-width: 768px)" />
                    <source src="assets/images/video//bigappcompany-992.mp4" media="screen and (min-device-width: 769px) and (max-device-width: 1000px)" />
                    <source src="assets/images/video//bigappcompany-1440.mp4" media="screen and (min-device-width: 1001px) and (max-device-width: 1440px)" />
                    <source src="assets/images/video//bigappcompany-1920.mp4" media="screen and (min-device-width: 1441px)" /> </video>
            </div>
            <div class="ui container site-branding">
                <h1>We Create <span class="js type header title" data-default="Beautiful Websites"></span></h1>
                <div class="js type phrases hide"> <span>Beautiful Websites</span> <span>Beautiful Apps</span> <span>Innovative Applications</span> <span>Timeless Brand Identities</span> </div>
                <h1 class="normal-weight">Creative Web, Mobile App & Digital Marketing Agency</h1>
                <p>Smart, interactive online identities, uniquely designed and developed to be the best in user experience. </p> <a href="#services-section" class="ui secondary button">Our Services</a> <a href="portfolio/index.php" class="ui primary button">View Portfolio</a>
                <div class="home-banner-form">
                    <form class="contactform homecontactform" id="contactform">
                        <input type="hidden" name="from_email" value="no-reply@spotsoon.com">
                        <input type="hidden" name="to_email" value="support@bigappcompany.com.test-google-a.com">
                        <input type="hidden" name="to_cc" value="">
                        <input type="hidden" name="subject" value="BigAppCompany Client Enquiry (Home Page Leads)">
                        <div class="form-group block">
                            <input type="text" placeholder="*Name" class="form-control transition" name="name" id="text_name"> </div>
                        <div class="form-group block">
                            <input type="text" placeholder="*Mobile Number" class="form-control transition" name="phone" id="text_number" maxlength="10"> </div>
                        <div class="form-group block">
                            <input type="text" placeholder="*Email" class="form-control transition" name="email" id="text_email"> </div>
                        <div class="form-group block">
                            <textarea class="form-control transition" placeholder="Comment" rows="4" name="message" id="text_message"></textarea>
                        </div>
                        <div class="form-group block">
                            <button class=" lightbg whitecolor btn-lg btn-block btn  btn-default" id="sendmessage">Send Message</button>
                        </div>
                    </form>
                    <form class="homecontactform " style="display:none;" action="mail/contact_me_home.php" method="post" onsubmit="return validation();">
                        <div class="form-group block">
                            <input type="text" placeholder="*Name" class="form-control" name="name" id="text_name" /> </div>
                        <div class="form-group block">
                            <input type="text" placeholder="*Contact Number" maxlength="10" name="mobile" class="form-control" id="text_contactnumber" /> </div>
                        <div class="form-group block">
                            <input type="text" placeholder="*Email" name="email" class="form-control" id="text_email" /> </div>
                        <div class="form-group block">
                            <textarea class="form-control" placeholder="Message" name="message" rows="4" id="text_message"></textarea>
                        </div>
                        <div class="form-group block">
                            <input type="submit" class="btn  btn-default" name="Enquiry" value="Enquire Now" /> </div>
                    </form>
                </div>
            </div>
        </header>
        <div id="content" class="site-content">
            <div id="front-page">
                <div class="section section-one">
                    <div class="ui equal width stackable grid container">
                        <div class="column">
                            <h4>Web Design Services</h4>
                            <p>Our comprehensive design skills make us push boundaries, specialising in smart and user-friendly. </p>
                        </div>
                        <div class="column">
                            <h4>Development Services</h4>
                            <p>We develop using the latest technology and techniques, for best-quality, hand-coded results. </p>
                        </div>
                        <div class="column">
                            <h4>Mobile App Design Services</h4>
                            <p>Our mobile apps are designed to perform, hitting all your targets. Contact us today to find out more.</p>
                        </div>
                    </div>
                </div>
                <div class="extra padded section section-two">
                    <div class="ui container">
                        <div class="ui very relaxed grid">
                            <div class="row">
                                <div class="sixteen wide mobile eight wide tablet eight wide computer middle aligned column">
                                    <h2 class="accent-bar" id="smallfont">What Can We Do For You?</h2>
                                    <p>From our base in Bangalore, we’ve been called on for projects large and small, from corporate organisations to bootstrapped startups, well-established or brand new. Each client has been thrilled with our personalised solutions, smart designs and fresh branding.</p>
                                    <ul class="caret list">
                                        <li>Industry-leading design and development.</li>
                                        <li>Nothing but the best in tech practices and platforms.</li>
                                        <li>Designed to perform and lead above the rest.</li>
                                    </ul> <a href="aboutus/index.php" class="ui primary button">More About Us</a> </div>
                                <div class="eight wide tablet only eight wide computer only middle aligned column">
                                    <div class="crossfade"> <img src="assets/images/bgsr-1.png" alt="BigApp Company" /> <img src="assets/images/intern-tech.png" alt="BigApp Company" /> <img src="assets/images/bgsa.png" alt="BigApp Company" /> <img src="assets/images/Keystone.png" alt="BigApp Company" /> <img src="assets/images/plus44-1.png" alt="BigApp Company" /> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="services-section" class="padded section section-three">
                    <div class="ui container">
                        <h2 class="accent-bar center-align">What We Do Best</h2>
                        <p class="center-align">The set of specialisms that make us the best choice for your design, development and take projects.
                            <br/> </p>
                        <div class="slider">
                            <div class="tabs">
                                <ul>
                                    <li><a href="#">Responsive Web Design</a></li>
                                    <li><a href="#">E-Commerce Solutions</a></li>
                                    <li><a href="#">UX & User Interface Design</a></li>
                                    <li><a href="#">Mobile App Design</a></li>
                                    <li><a href="#">Digital Marketing</a></li>
                                </ul>
                            </div>
                            <div class="slides">
                                <div class="slide">
                                    <div class="ui grid">
                                        <div class="sixteen wide mobile sixteen wide tablet ten wide computer column">
                                            <div class="ui equal width stackable grid">
                                                <div class="row">
                                                    <div class="column">
                                                        <h6 class="icon">
                                                            <img src="assets/images/svg/Responsive-across-all-devices-2.svg" alt="BigApp Company Responsive across all devices" /> 
                                                            Responsive across all devices</h6>
                                                        <p>We’re campaigning for equal rights across all devices. Our websites look their best on whatever your users have in their hand.</p>
                                                    </div>
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_brand-design.svg" alt="BigApp Company Bespoke Designs" /> Bespoke Designs</h6>
                                                        <p>You deserve something as unique as you are. We take pride in our personalised approach to every project.</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_user-friendly-structures.svg" alt="BigApp Company User Friendly Structures" /> User Friendly Structures</h6>
                                                        <p>UX is a top priority when we build and create. Our designs don’t just look charming, they’re intuitively structured for performance too. </p>
                                                    </div>
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/Artboard-16-copy.svg" alt="BigApp Company Latest Technologies" /> Latest Technologies</h6>
                                                        <p>Looking good today, tomorrow, and two years from now. Smart web development with future requirements in mind. </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="column pad-right">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_intuitive-interface.svg" alt="BigApp Company Content Management Systems (CMS)" /> Content Management Systems (CMS)</h6>
                                                        <p>Want to share some news or edit a page? Customisable CMS makes updating your website as easy as click-type-publish.</p> <a class="ui secondary button hide-on-mobile message-us">Start Your Project Today</a> <a href="portfolio/index.php" class="ui primary button hide-on-mobile">View Portfolio</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="computer only six wide column video">
                                            <video width="500" height="445" autoplay loop>
                                                <source src="assets/images/responsive-video.mp4" type="video/mp4">
                                                <source src="assets/images/video/responsive-video.ogg" type="video/ogg">
                                                <source src="assets/images/video/responsive-video.webm" type="video/webm"> </video>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="ui grid center-align-items">
                                        <div class="computer only six wide column no-padding "> <img class="glide from left" src="assets/images/invoice-designs-2.png" /> </div>
                                        <div class="sixteen wide mobile sixteen wide tablet ten wide computer column">
                                            <div class="ui equal width stackable grid">
                                                <div class="row">
                                                    <div class="column">
                                                        <h6 class="icon">
                                                            <img src="assets/images/svg/CC-web-icons-final-blue-5pt_sales-driven-designs.svg" alt="BigApp Company Sales Driven Designs" /> Sales Driven Designs</h6>
                                                        <p>Customers are identified and targeted by design choices, our layouts are made to maximise product sales.
                                                            <br/> </p>
                                                    </div>
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_smart-checkouts.svg" alt="BigApp Company Smart Checkouts" /> Smart Checkouts</h6>
                                                        <p>A user experience to guarantee a second visit. And a third. And fourth.</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_payment-gateways.svg" alt="BigApp Company Payment Gateways" /> Payment Gateways</h6>
                                                        <p>All payment methods catered for. Choose from a number of supported platforms to fit your business' needs.</p>
                                                    </div>
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_customer-accounts.svg" alt="BigApp Company Customer Accounts" /> Customer Accounts</h6>
                                                        <p>A central system for order tracking and customer profiles. Smooth, simple, error-proof.</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="column pad-right">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_adaptable-platforms.svg" alt="BigApp Company Adaptable Platforms" /> Adaptable Platforms</h6>
                                                        <p>Flexible platforms give your customers a truly personalised shopping experience. </p> <a class="ui secondary button hide-on-mobile message-us">Start Your Project Today</a> <a href="portfolio/index.php" class="ui primary button hide-on-mobile">View Portfolio</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="ui grid">
                                        <div class="sixteen wide mobile eight wide tablet four wide computer not-padded column">
                                            <div class="ui equal width stackable grid">
                                                <div class="row">
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_strict-protocols.svg" alt="BigApp Company Research & Planning" /> Research & Planning</h6>
                                                        <p>A solution comes from understanding a problem. We make it our business to know you and your customers inside out.</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_CMS-wireframe-prototype.svg" alt="BigApp Company Wireframe & Prototyping" /> Wireframe & Prototyping</h6>
                                                        <p>Looking great in our heads, on paper, and in the user’s hand. These techniques hone and test the core architecture of a project. </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_user-testing-analysis.svg" alt="BigApp Company User Testing & Analysis" /> User Testing & Analysis</h6>
                                                        <p>We aim for 100% user satisfaction. A cycle of testing and evaluation will continue until we hit our target. </p> <a class="ui secondary button hide-on-mobile message-us">Start Your Project Today</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="computer only eight wide not-padded middle aligned column"> <img class="glide from bottom" src="assets/images/cam-slide.png" alt="BigApp Company" /> </div>
                                        <div class="sixteen wide mobile eight wide tablet four wide computer not-padded column">
                                            <div class="ui equal width stackable grid">
                                                <div class="row">
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_responsive-and-agile.svg" alt="BigApp Company User Interfaces" /> User Interfaces</h6>
                                                        <p>First impressions matter. Above anything, your content must be clearly signposted and simple to navigate. We call this ‘Information Architecture’ - the structural skeleton of your design, defining where content lives and how to navigate to it. A well-built IA for is essential to meeting your customer’s key needs.
                                                            <br/>
                                                            <br/> For us, design and usability go hand in hand. Everything we make must look great, feel better, and work best. Based on real user insights, encyclopaedic industry knowledge, and masses of practical experience, we plan and develop interfaces that always feel silky-smooth and totally intuitive. </p> <a href="portfolio/index.php" class="ui primary button hide-on-mobile">View Portfolio</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="ui grid center-align-items">
                                        <div class="computer only six wide column no-padding centeralignimage"> <img class="glide from left" src="assets/images/logos-3.png" alt="BigApp Company" /> </div>
                                        <div class="sixteen wide mobile sixteen wide tablet ten wide computer column">
                                            <div class="ui equal width stackable grid">
                                                <div class="row">
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/responsive-structures0D.svg" alt="BigApp Company Responsive Structures" />Responsive Structures </h6>
                                                        <p>Responsive Grids Systems react to any screen size.</p>
                                                    </div>
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/smart-menu.svg" alt="BigApp Company  Smart Menus" /> Smart Menus </h6>
                                                        <p>A focused, user-friendly & animated mobile menus to optimise look and feel.</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svg/mobile-ui-1.svg" alt="BigApp Company  Mobile UI" /> Mobile UI </h6>
                                                        <p>Elements ordered and prioritised for the on-the-go user.</p>
                                                    </div>
                                                    <div class="column">
                                                        <h6 class="icon"><img src="assets/images/svgUX-IN-MIND.svg" />UX in mind </h6>
                                                        <p>Structured to engage and enhance the user experience.</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="column pad-right">
                                                        <h6 class="icon"><img src="assets/images/svg/CC-web-icons-final-blue-5pt_payment-gateways.svg" alt="BigApp Company  Payment Gateways" />Payment Gateways</h6>
                                                        <p>All Payment methods catered for. Choose from a number of supported platforms to fit your business' needs.</p> <a class="ui secondary button hide-on-mobile message-us">Start Your Project Today</a><a href="portfolio/index.php" class="ui primary button hide-on-mobile">View Portfolio</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="ui grid center-align-items">
                                        <div class="computer only six wide column no-padding centeralignimage"> <img class="glide from left" src="assets/images/marketing-image.png" alt="BigApp Company" /> </div>
                                        <div class="sixteen wide mobile sixteen wide tablet ten wide computer column">
                                            <div class="ui equal width stackable grid">
                                                <div class="column">
                                                    <p><b>PERFORMANCE MARKETING</b></p>
                                                    <h6 class="icon"><img src="assets/images/digitalmarketing/Search-Engine-Optimization.png" class="digialMarketing" alt="BigApp Company Search Engine Optimization" />Search Engine Optimization</h6>
                                                    <p>We optimize on page elements create content on an ongoing basis as well as backlinks creation to get sustainable results from search engines.</p>
                                                    <h6 class="icon"><img src="assets/images/digitalmarketing/Paid-Marketing.png" class="digialMarketing" alt="BigApp Company Paid Marketing" />Paid Marketing </h6>
                                                    <p>We try to bring ROI from every penny you spent on Adwords or other online platform. </p>
                                                    <h6 class="icon"><img src="assets/images/digitalmarketing/Web-Analytics.png" class="digialMarketing" alt="BigApp Company Web Analytics" />Web Analytics</h6>
                                                    <p>We analyze the digital data by using various platforms on regular basis to check whatis working and what not.</p>
                                                </div>
                                                <div class="column">
                                                    <p><b>BRAND BUILDING</b></p>
                                                    <h6 class="icon"><img src="assets/images/digitalmarketing/Social-Media-Marketing.png" class="digialMarketing" alt="BigApp Company  Social Media Marketing" /> Social Media Marketing</h6>
                                                    <p>We selectthe right channel, with right content,to connect your brand with your customers.</p>
                                                    <h6 class="icon"><img src="assets/images/digitalmarketing/Digital-Branding.png" class="digialMarketing" alt="BigApp Company  Digital Branding" />Digital Branding</h6>
                                                    <p>We create & publish the engaging content on various social media channels.</p>
                                                    <h6 class="icon"><img src="assets/images/digitalmarketing/Content-Marketing.png" class="digialMarketing" alt="BigApp Company  Content Marketing" />Content Marketing</h6>
                                                    <p>Depending on the stage of customer in the funnel, we create relevant content to increase your ROI</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require('includes/footer.php'); ?>
            <?php require('includes/contact-us-form.php'); ?>
                <?php require('includes/footerjs.php'); ?>
</body>

</html>