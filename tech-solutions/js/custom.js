$(document).ready(function () {
    //    $(".started").click(function () {
    //        let phone = $(".input-phone").val();
    //        let phone2 = phone.replace(/[^0-9]/g, '');
    //        if (phone == "") {
    //            $(".error-phone-tooltip").show();
    //            $(".input-phone").addClass("active");
    //            $('.input-phone').focus();
    //            return false;
    //        }
    //        else if (phone2.length != 10) {
    //            $(".error-phone-tooltip").show();
    //            $(".input-phone").addClass("active");
    //            return false;
    //        }
    //        else {
    //            $(".error-phone-tooltip span").text("Thank you");
    //            $(".input-phone").reset();
    //        }
    //    });
    $(".scrollT").click(function (e) {
        var target = $(this).attr("rel");
        var $target = jQuery(target);
        e.preventDefault();
        jQuery('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 1000, 'swing', function () {
            $(".error-phone-tooltip").show();
            $(".input-phone").addClass("active");
        });
    });
    jQuery(".started").click(function (e) {
        e.preventDefault();
        jQuery(this).attr("disabled", true);
        let phone = $(".input-phone").val();
        let phone2 = phone.replace(/[^0-9]/g, '');
        if (phone == "") {
            $(".error-phone-tooltip").show();
            $(".input-phone").addClass("active");
            $('.input-phone').focus();
            jQuery(".started").removeAttr("disabled");
            return false;
        }
        else if (phone2.length != 10) {
            $(".error-phone-tooltip").show();
            $(".input-phone").addClass("active");
            jQuery(".started").removeAttr("disabled");
            return false;
        }
        else {
            $(".error-phone-tooltip span").text("Thank you. One of our team members will get back to you very soon.");
            jQuery(".started").removeAttr("disabled");
        }
        var fdata = new FormData()
        fdata.append("product_name", jQuery(".getacall").serialize());
        jQuery.ajax({
            type: 'POST'
            , url: "https://bigappcompany.co.in/demos/cms/contactcompany"
            , data: fdata
            , contentType: false
            , processData: false
            , success: function (response) {
                if (response == 1) {
                    location.href = "thankyou.php";                    
                }
                else {
                    alert("Please try after some time");
                }
            }
        })
    });
});