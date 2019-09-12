// Scroll Down script
jQuery(function() {
  jQuery('.scrolldown').on('click', function(e) {
    e.preventDefault();
    jQuery('html, body').animate({
      scrollTop: jQuery(jQuery(this).attr('href')).offset().top
    }, 500, 'linear');
  });
});