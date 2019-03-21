// ===============================
// designesia 2013  //
// ===============================
jQuery(document).ready(function () {
    domready(function () {
        selectnav('nav', {
            label: ':: Navigation ::',
            nested: true,
            indent: '-'
        });
    });
});


jQuery(document).ready(function () {
	 jQuery('#mainlogo img').hover(
        function () {
            jQuery(this).fadeTo(150, .75);
        },
        function () {
            jQuery(this).fadeTo(150, 1);
        })
	
	$doc_height = $(window).innerHeight(); 
	jQuery('.page_slider_extended #content-wrapper').css("margin-top", $doc_height);
	jQuery('#footer.page-slider').css("margin-top", $doc_height);
	
	//alert($doc_height);

    jQuery('#menu-thumbnail-view li').hover(
        function () {
            jQuery(this).find('.menu-text-expand').fadeTo(150, 1);
            jQuery(this).find('.price').fadeTo(150, 0);
        },
        function () {
            jQuery(this).find('.menu-text-expand').fadeTo(150, 0);
            jQuery(this).find('.price').fadeTo(150, 1);
        })

    jQuery(".menu-item").hover(
        function () {
            jQuery(this).find('img').animate({
                'margin-top': "-5px"
            }, "fast");
        },
        function () {
            jQuery(this).find('img').animate({
                'margin-top': "0px"
            }, "fast");
        })

    jQuery(".menu-item").hover(
        function () {
            jQuery(this).find('img').animate({
                'margin-top': "-5px"
            }, "fast");
        },
        function () {
            jQuery(this).find('img').animate({
                'margin-top': "0px"
            }, "fast");
        })

    jQuery("#btn-switch").fadeTo(150, .75);

    jQuery("#btn-switch").hover(
        function () {
            jQuery(this).stop().fadeTo(150, 1);
        },
        function () {
            jQuery(this).stop().fadeTo(150, .75);
        })

    jQuery("#btn-switch").toggle(
        function () {
            jQuery('#canvas').stop().animate({
                "opacity": "0"
            }, "50");
            jQuery(this).addClass("on");
        },
        function () {
            jQuery('#canvas').stop().animate({
                "opacity": "1"
            }, "50");
            jQuery(this).removeClass("on");
        })


    jQuery("#btn-book-now").toggle(
        function () {
            jQuery('#booking-form').animate({
                height: "show"
            }, 600, "easeInOutCubic", function () {});
            jQuery(this).find('.on').hide();
            jQuery(this).find('.off').show();
        },
        function () {
            jQuery('#booking-form').animate({
                height: "hide"
            }, 600, "easeInCubic", function () {});
            jQuery(this).find('.on').show();
            jQuery(this).find('.off').hide();
        })



    jQuery('.totop a[href^="#"]').on('click', function (e) {
        e.preventDefault();

        var target = this.hash,
            $target = jQuery(target);

        jQuery('html, body').stop().animate({
            'scrollTop': $target.offset().top // - 200px (nav-height)
        }, 600, 'easeOutQuint', function () {
            window.location.hash = '1' + target;
        });
    });


    jQuery("#content-wrapper").fitVids();

    jQuery("#pauseplay").toggle(
        function () {
            jQuery(this).addClass("pause");
        },
        function () {
            jQuery(this).removeClass("pause").addClass("play");
        })

    jQuery("#pauseplay").stop().fadeTo(150, .5);
    jQuery("#pauseplay").hover(
        function () {
            jQuery(this).stop().fadeTo(150, 1);
        },
        function () {
            jQuery(this).stop().fadeTo(150, .5);
        })




    jQuery(".msg .btn").click(function () {
        jQuery(this).parent().fadeOut(300);
    });
	
	jQuery(".close").click(function () {
        jQuery(this).parent().fadeOut(300);
    });

    jQuery(".min").click(function () {
        jQuery(this).parent().prev(".plus").slideToggle(200);
        jQuery(this).parent().slideToggle(200);
        jQuery(this).fadeOut(10);
    });


    jQuery('.cat-count').hide();

    jQuery('.cat-name').hover(
        function () {
            jQuery(this).parent().parent().find('.cat-count').stop().fadeTo(150, 1);
        },

        function () {
            jQuery(this).parent().parent().find('.cat-count').stop().fadeTo(150, 0);
        }
    )

    jQuery('.overlay').fadeTo(1, 0);

    jQuery(".box .pic_hover").hover(
        function () {
            jQuery(this).parent().find(".overlay").width(jQuery(this).find("img").css("width"));
            jQuery(this).parent().find(".overlay").height(jQuery(this).find("img").css("height"));
            jQuery(this).parent().find(".overlay").fadeTo(100, .8);
            picheight = jQuery(this).find("img").css("height");
            newheight = (picheight.substring(0, picheight.length - 2) / 2) - 32;
            //alert(newheight);
            jQuery(this).parent().find(".info-area").animate({
                'margin-top': newheight
            }, 'fast');

        },
        function () {
            jQuery(this).parent().find(".info-area").animate({
                'margin-top': '10%'
            }, 'fast');
            jQuery(this).parent().find(".overlay").fadeTo(100, 0);
        })


});


// ===============================
// fading object //
// ===============================


jQuery(document).ready(function () {
    jQuery("#wrapper").fadeIn(700);
    jQuery(".hide_content .inner").css("-webkit-border-radius", "20px");
    jQuery(".hide_content .inner").css("-moz-border-radius", "20px");
    jQuery(".contact_form_holder").css("-moz-border-radius", "10px");
    jQuery("#social-icons img").stop().animate({
        "opacity": ".25"
    }, "50");
    jQuery("#social-icons img").hover(
        function () {
            jQuery(this).stop().animate({
                "opacity": "1"
            }, "50");
        },
        function () {
            jQuery(this).stop().animate({
                "opacity": ".25"
            }, "50");

        });

});


jQuery(document).ready(function () {
	// --------------------------------------------------
	// lazyload
	// --------------------------------------------------
	 jQuery(function() {
          jQuery("img").lazyload({
              effect : "fadeIn",
			  effectspeed: '1000' 

          });
      });

	
	
    // ===============================
    // isotop filtering
    // ===============================
    var $container = jQuery('#gallery')
    jQuery('#filters a').click(function () {
        var $this = jQuery(this);
        // don't proceed if already selected
        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents();
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');

        var selector = jQuery(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false,
            }
        });
        return false;
    });

    window.onresize = function (event) {
        jQuery('#gallery').isotope('reLayout');
		jQuery('#room-list').isotope('reLayout');
		jQuery('#bloglist_masonry').isotope('reLayout');
		
		$doc_height = $(window).innerHeight(); 
		jQuery('.page_slider_extended #content-wrapper').css("margin-top", $doc_height);
		jQuery('#footer.page-slider').css("margin-top", $doc_height);
    };

    jQuery(".clickarea").click(
        function () {
            jQuery(this).parent().find('.clickarea').css("z-index", "26");
            jQuery(this).parent().find('.title').stop().fadeTo(150, 0);
            jQuery(this).parent().find('.info').stop().fadeTo(300, 1);
            jQuery(this).parent().find('.corner').stop().fadeTo(300, 0);
            jQuery(this).parent().find('.textinfo').animate({
                'font-size': '12px',
                'width': '100%',
                'height': '100%'
            }, 'fast');
            jQuery(this).parent().find('.info h2').animate({
                'font-size': '24px'
            }, 'fast');
            jQuery(this).parent().find('.bginfo').stop().fadeTo(300, 1);
            jQuery(this).parent().find('.btnquit').stop().fadeTo(300, 1);
            jQuery(this).parent().find('.btn').stop().fadeTo(300, 1);
        });


    jQuery(".btnquit").click(
        function () {
            jQuery(this).parent().find('.clickarea').css("z-index", "28");
            jQuery(this).parent().find('.title').stop().fadeTo(150, 1);
            jQuery(this).parent().find('.info').stop().fadeTo(300, 0);
            jQuery(this).parent().find('.corner').stop().fadeTo(300, 1);
            jQuery(this).parent().find('.textinfo').animate({
                'font-size': '0px',
                'width': '0',
                'height': '0'
            }, 'fast');
            jQuery(this).parent().find('.info h2').animate({
                'font-size': '0px'
            }, 'fast');
            jQuery(this).parent().find('.bginfo').stop().fadeTo(300, 0);
            jQuery(this).parent().find('.btnquit').fadeOut(20);
            jQuery(this).parent().find('.btn').stop().fadeTo(300, 0);

        });

    jQuery('.btnquit').hover(
        function () {
            jQuery(this).animate({
                'padding': '5px'
            }, 'fast');
            jQuery(this).parent().find('.info').stop().fadeTo(300, .25);

        },
        function () {
            jQuery(this).animate({
                'padding': '0px'
            }, 'fast');
            jQuery(this).parent().find('.info').stop().fadeTo(300, 1);
        }
    )
	
	// The slider being synced must be initialized first
              jQuery('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 210,
                itemMargin: 5,
                asNavFor: '#slider'
              });

              jQuery('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel"
              });
	
    jQuery('.clickarea').hover(
        function () {
            jQuery(this).parent().find('img').stop().animate({
                "opacity": ".25"
            }, "50");
            jQuery(this).parent().find('.title h1').animate({
                'font-size': '24px'
            }, 'fast');
        },
        function () {
            jQuery(this).parent().find('img').stop().animate({
                "opacity": "1"
            }, "50");
            jQuery(this).parent().find('.title h1').animate({
                'font-size': '16px'
            }, 'fast');
        }
    )
	
	
	



});

// designesia 2013
jQuery('.de_tab').find('.de_tab_content div').hide();
jQuery('.de_tab').find('.de_tab_content div:first').show();

jQuery('.de_nav li').click(function() {
    jQuery(this).parent().find('li a').removeClass("active");
    jQuery(this).find('a').addClass("active");
    jQuery(this).parent().parent().find('.de_tab_content div').hide();

    var indexer = jQuery(this).index(); // get tab index
    
    jQuery(this).parent().parent().find('.de_tab_content div:eq(' + indexer + ')').fadeIn(); // open corresponding based index
});