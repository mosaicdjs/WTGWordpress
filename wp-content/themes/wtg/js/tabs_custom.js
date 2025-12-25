/* globals $: false */
(function( $ ){
  var url = WPURLS.themeurl;
  $.fn.responsiveTabs = function() {
    this.addClass('responsive-tabs');
    this.append($('<span class="glyphicon"><img src="'+url+'/images/arrow_down_white.png"></span>'));
    this.append($('<span class="glyphicon"><img src="'+url+'/images/arrow_down_white.png"></span>'));
  
    this.on('click', 'li.active > a, span.glyphicon', function() {
      this.toggleClass('open');
    }.bind(this));
  
    this.on('click', 'li:not(.active) > a', function() {
      this.removeClass('open');
    }.bind(this));
  };
  
  $('.nav.nav-tabs').responsiveTabs();
  


  $('.trigger-continent').on('click', function(e){
      var x = $(this).closest('.topnav');
      if (x.hasClass('responsive')){
          x.removeClass('responsive');
      }
      else{
          $('.topnav').removeClass('responsive');
          x.addClass('responsive');
      }
  });
})( jQuery );

