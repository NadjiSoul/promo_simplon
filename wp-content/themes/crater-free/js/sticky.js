
  (function ($) {
    $(document).ready(function () { 
        /*-- Window scroll function --*/
        $(window).on('scroll', function () {
          /* sticky header */        
            var sticky = $('header'),
            scroll = $(window).scrollTop();            
            if (scroll > 250) { 
                sticky.addClass('fixed');
                $('#logo-alt').css({'display': 'block'});
                $('a.custom-logo-link').css({'display': 'none'});
                $('a.logo-inner-page').css({'display': 'none'});
            }
            else {               
                sticky.removeClass('fixed');
                $('#logo-alt').css({'display': 'none'});
                $('a.custom-logo-link').css({'display': 'block'});
                $('a.logo-inner-page').css({'display': 'block'});
            }
        });
   }) ;    
})(this.jQuery);