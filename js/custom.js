$(document).ready(function () {
    $(".started").click(function () {
        let phone = $(".input-phone").val();
        let phone2 = phone.replace(/[^0-9]/g, '');
        if (phone == "") {
            $(".error-phone-tooltip").show();
            $(".input-phone").addClass("active");
            $('.input-phone').focus();
            return false;
        }
        else if (phone2.length != 10) {
            $(".error-phone-tooltip").show();
            $(".input-phone").addClass("active");
            return false;
        }
        else {
            $(".error-phone-tooltip span").text("Thank you");
            $(".input-phone").reset();
        }
    });

    
//       $('.plus').click(function (e) {
//            $(this).next().slideToggle("slow");
//        });
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');
        $(this).parent("li").toggleClass('show');
        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-menu .show').removeClass("show");
        });
        
        
        if (!$parent.parent().hasClass('navbar-nav')) {
            $el.next().css({
                "top": $el[0].offsetTop
                , "left": $parent.outerWidth() - 4
            });
        }
        return false;
    });
    $('.projects').owlCarousel({
        loop: true
        , nav: true
        , items: 1
        , margin: 10
        , autoplay: true
        , autoplayHoverPause: true
        , responsive: {
            0: {
                items: 1
                , nav: true
            }
            // , 480: {
            //     items: 1
            // }
            , 768: {
                items: 2
            }
            ,992: {
                items:3
            }
        }
    });
    $(".projects .owl-prev").html('<i class="fa fa-angle-left"></i>');
    $(".projects .owl-next").html('<i class="fa fa-angle-right"></i>');
    $('.content-scroll').owlCarousel({
        loop: true
        , nav: true
        , items: 1
        , margin: 10
        , autoplay: true
        , autoplayHoverPause: true
        , responsive: {
            0: {
                items: 1
                , nav: true
            }
            , 480: {
                items: 1
            }
            , 768: {
                items: 1
            }
        }
    });
    $(".content-scroll .owl-prev").html('<i class="fa fa-angle-left"></i>');
    $(".content-scroll .owl-next").html('<i class="fa fa-angle-right"></i>');
    $(".industries-btn").click(function () {
        $(this).hide();
    });
    $(".industries-close").click(function (e) {      
            var target =$(this).attr("rel");
            var $target = jQuery(target);
               e.preventDefault();
            jQuery('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 1000, 'swing', function () {                
                   $("#industries").removeClass("show");
           $(".industries-btn").show();
            });
     
       
    });

    
        // Devendra Script
        //web development carousel- web process
    $('.web_process').owlCarousel({
        loop: true
        , nav: true
        , items: 1
        , margin: 20
        , autoplay: true
        , responsive: {
            0: {
                items: 1
            }
            , 480: {
                items: 2
            }
            , 768: {
                items: 3
            }
        }
    });
    //web development carousel- before and after carousel
    $('.bef_slider').owlCarousel({
        loop: true
        , nav: true
        , items: 1
        , margin: 20
        , autoplay: true
    });
    $(".owl-prev").html('<i class="fa fa-angle-left"></i>');
    $(".owl-next").html('<i class="fa fa-angle-right"></i>');
    //end devendra script
});

$("input[class='myCheckbox']").click(function(){
    if($("#formID input:checkbox:checked").length > 0){
     $(".checkSubmit").removeClass('disabled');
     $(".checkSubmit").removeAttr('disabled','');
    }
    else{
        $(".checkSubmit").addClass('disabled');
        $(".checkSubmit").attr('disabled','disabled');
    }
  });

  var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});