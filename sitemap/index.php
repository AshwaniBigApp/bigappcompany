<!DOCTYPE php>
<php lang="en">
<head>
    <?php require('../includes/header-links.php'); ?>        
</head>

<body class="page page-id-88 page-template page-template-page-templates page-template-sitemap-page page-template-page-templatessitemap-page-php">
     <?php require('../includes/header.php'); ?> 
    
    <div class="sidebar-dimmer"></div>
    <div class="top mobile slice"></div>
    <div class="bottom mobile slice"></div>
    <header id="masthead" class="default site-header" role="banner" style="background-image: url('../externalresources/wp-content/themes/gdwp/images/masthead.jpg');">
        <div class="ui container center aligned site-branding">
            <h1>Sitemap</h1> </div>
    </header>
    <div id="content" class="site-content">
        <div id="primary" class="padded sitemap section">
            <div id="main" class="ui relaxed grid container" role="main">
                <div class="sixteen wide mobile sixteen wide tablet six wide computer column">
                    <p><strong>Pages</strong></p>
                    <ul class="caret list">
                        <li class="page_item page-item-14"><a href="../index.php">Home</a></li>
                        <li class="page_item page-item-31"><a href="../index.php#services-section">Services</a></li>
                        <li class="page_item page-item-12"><a href="../portfolio/index.php">Portfolio</a></li>
                        <li class="page_item page-item-71"><a href="../aboutus/index.php">About Us</a></li>
                        <li class="page_item page-item-2"><a href="../contact/index.php">Get in Touch</a></li>
                    </ul>
                </div>
                <div class="sixteen wide mobile eight wide tablet six wide computer column">
                   
                </div>
                <aside class="sixteen wide mobile sixteen wide tablet four wide computer sidebar column">
                    <div class="ui relaxed grid">
                        <div class="sidebar row">
                            <div class="sixteen wide mobile eight wide tablet sixteen wide computer column subscribe area">
                                <h2 class="title"><i class="mail outline icon"></i> Subscribe</h2>
                                <p>Inspire your inbox with our weekly, curated newsletter featuring resources for web design, development, and marketing.</p>
                                <script type="text/javascript">
                                    (function () {
                                        if (!window.mc4wp) {
                                            window.mc4wp = {
                                                listeners: []
                                                , forms: {
                                                    on: function (event, callback) {
                                                        window.mc4wp.listeners.push({
                                                            event: event
                                                            , callback: callback
                                                        });
                                                    }
                                                }
                                            }
                                        }
                                    })();
                                </script>
                                <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-92 mc4wp-ajax" method="post" data-id="92" data-name="Subscribe Footer">
                                    <div class="mc4wp-form-fields">
                                        <div class="subscribe-footer">
                                            <input type="email" name="email" placeholder="Your Email" />
                                            <button class="submit"></button>
                                        </div>
                                        <div style="display: none;">
                                            <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="mc4wp-response"></div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <?php require('../includes/footer.php'); ?>

     <?php require('../includes/contact-us-form.php'); ?>
    
      <?php require('../includes/footerjs.php'); ?>
</body>

</php>