/* Article content gallery with thumbs */
   jQuery(window).load(function(){
      jQuery('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 70,
        itemHeight: 50,
        itemMargin: 12,
        asNavFor: '#slider'
      });

      jQuery('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          jQuery('body').removeClass('loading');
        }
      });
    });