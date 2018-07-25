<link rel='stylesheet' id='contact-form-7-css' href='<?=base_url?>externalresources/wp-content/plugins/contact-form-7/includes/css/styles11b8.css' type='text/css' media='all' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<script type='text/javascript' src='<?=base_url?>externalresources/wp-includes/js/jquery/jqueryb8ff.js'></script>
<script type='text/javascript' src='<?=base_url?>externalresources/wp-includes/js/jquery/jquery-migrate.min330a.js'></script>
<!--<script type='text/javascript' src='<?=base_url?>externalresources/wp-content/plugins/svg-support/js/min/svg-inline-min8a54.js'></script>-->
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery(".open-quickform h4").click(function() {
            jQuery(".rightform-quickaccess").toggleClass("active ");
        });
        var chkwidth = jQuery(window).width();
        if (chkwidth < 768) {
            jQuery(".phone input").attr('type', 'number');
            $("#navigation-bar .ui.mobile.container nav > ul > li a").click(function() {
                $("body").removeClass("mobile open");
                $("#navigation-bar").removeClass("mobile open");
                $("#navigation-bar .ui.mobile.container").css("display", "none");
                $(".mobile.slice.top").removeClass("active");
                $(".mobile.slice.bottom").removeClass("active");
            });
        }


    });

    function validation() {
        var getname = $("#text_name").val();
        var getcontactno = $("#text_contactnumber").val();
        var checkcontactnumber = isNaN(getcontactno);
        var getemail = $("#text_email").val();
        var getmessage = $("#text_message").val();
        if (getname == "") {
            alert("Please Enter the Name");
            $("#text_name").focus();
            return false;
        }

        if (getcontactno == "") {
            alert("Please Enter Your Contact Number");
            $("#text_contactnumber").focus();
            return false;
        }
        if (checkcontactnumber == true) {
            alert("Please Enter a valid Contact Number ");
            $("#text_contactnumber").select();
            return false;
        }

        if (IsEmail(getemail) == false) {
            alert("Please Enter a valid email Id");
            jQuery('#text_email').select();
            return false;
        }
        if (getmessage == "") {
            alert("Please Enter Your Message");
            jQuery('#text_message').select();
            return false;
        }
    }


    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }

    jQuery("#sendmessage").click(function(e) {
        e.preventDefault();
        let getname = jQuery("#text_name").val();
        if (getname == "") {
            alert("Please Enter Your Name");
            jQuery("#text_name").focus();
            return false;
        }
        let getmono = jQuery("#text_number").val();
        if (getmono == "") {
            alert("Please Enter Your Mobile Number");
            jQuery("#text_number").focus();
            return false;
        }
        let getmonolength = getmono.length;
        if (getmonolength != 10) {
            alert("Please Enter a Valid Mobile Number");
            jQuery("#text_number").select();
            return false;
        }
        let getmonotype = isNaN(getmono);
        if (getmonotype == true) {
            alert("Please Enter a Valid Mobile Number");
            jQuery("#text_number").select();
            return false;
        }
        let getemail = jQuery("#text_email").val();
        if (getemail == "") {
            alert("Please Enter your Email Id");
            jQuery("#text_email").focus();
            return false;
        }
        if (IsEmail(getemail) == false) {
            alert("Please Enter a valid email Id");
            jQuery('#text_email').select();
            return false;
        }
        let getmessage = $("#text_message").val();
        if (getmessage == "") {
            alert("Please Enter You Message");
            jQuery('#text_message').focus();
            return false;
        }

        var fdata = new FormData()
        fdata.append("product_name", jQuery("#contactform").serialize());
        jQuery.ajax({
            type: 'POST',
            url: "https://bigappcompany.com/cms/contact",
            data: fdata,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 1) {
                    alert("Thank you for contacting BigAppCompany we will get back to you in 24 hours");
                    location.href = "<?php echo base_url; ?>thankyou/index.php";
                } else {
                    alert("Please Try After Some Time");
                    location.href = "<?php echo base_url; ?>thankyou/error.php";
                }
            }
        })
    });
    jQuery("#sendmessage1").click(function(e) {
        e.preventDefault();
        let getname = jQuery("#text_name1").val();
        if (getname == "") {
            alert("Please Enter Your Name");
            jQuery("#text_name1").focus();
            return false;
        }
        let getmono = jQuery("#text_number1").val();
        if (getmono == "") {
            alert("Please Enter Your Mobile Number");
            jQuery("#text_number1").focus();
            return false;
        }
        let getmonolength = getmono.length;
        if (getmonolength != 10) {
            alert("Please Enter a Valid Mobile Number");
            jQuery("#text_number1").select();
            return false;
        }
        let getmonotype = isNaN(getmono);
        if (getmonotype == true) {
            alert("Please Enter a Valid Mobile Number");
            jQuery("#text_number1").select();
            return false;
        }
        let getemail = jQuery("#text_email1").val();
        if (getemail == "") {
            alert("Please Enter your Email Id");
            jQuery("#text_email1").focus();
            return false;
        }
        if (IsEmail(getemail) == false) {
            alert("Please Enter a valid email Id");
            jQuery('#text_email1').select();
            return false;
        }
        let getmessage = $("#text_message1").val();
        if (getmessage == "") {
            alert("Please Enter You Message");
            jQuery('#text_message1').focus();
            return false;
        }

        var fdata = new FormData()
        fdata.append("product_name", jQuery("#contactform1").serialize());
        jQuery.ajax({
            type: 'POST',
            url: "https://bigappcompany.com/cms/contact",
            data: fdata,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 1) {
                    alert("Thank you for contacting BigAppCompany we will get back to you in 24 hours");
                    location.href = "<?php echo base_url; ?>thankyou/index.php";
                } else {
                    alert("Please Try After Some Time");
                    location.href = "<?php echo base_url; ?>thankyou/error.php";
                }
            }
        })
    });

</script>

<script type='text/javascript' src='<?=base_url?>externalresources/wp-content/themes/bigappcompany/dist/scripts.min4a7d.js'></script>
<script type='text/javascript' src='<?=base_url?>externalresources/wp-includes/js/wp-embed.min1c9b.js'></script>
<!--<script type='text/javascript' src='<?=base_url?>externalresources/wp-content/plugins/twitget/js/moment1c9b.js'></script>-->
<!-- <script type='text/javascript' src='<?=base_url?>externalresources/wp-content/plugins/twitget/js/langs.min1c9b.js'></script>-->
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
    window.$zopim || (function (d, s) {
        var z = $zopim = function (c) {
                z._.push(c)
            }
            , $ = z.s = d.createElement(s)
            , e = d.getElementsByTagName(s)[0];
        z.set = function (o) {
            z.set.
            _.push(o)
        };
        z._ = [];
        z.set._ = [];
        $.async = !0;
        $.setAttribute("charset", "utf-8");
        $.src = "https://v2.zopim.com/?5rjkFW0Cz0ZsIYX5muzTAEzsLa8XIrNy";
        z.t = +new Date;
        $.
        type = "text/javascript";
        e.parentNode.insertBefore($, e)
    })(document, "script");
</script>
<!--End of Zendesk Chat Script-->


<!--
<script type="text/javascript">
var $zoho= $zoho || {salesiq:{values:{},ready:function(){}}};var d=document;s=d.createElement("script");s.type="text/javascript";
s.defer=true;s.src="https://salesiq.zoho.com/personal9599/float.ls?embedname=personal9599";
t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);
</script>-->
