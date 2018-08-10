var $width = jQuery('.products-pool-item').width();
jQuery('.release-blue').height($width);
var productImg = jQuery('.woocommerce div.product div.images .woocommerce-main-image img');
var productImgWidth = productImg.width();
productImg.height(productImgWidth);

jQuery(window).resize(function() {
    $width = jQuery('.products-pool-item').width();
    jQuery('.release-blue').height($width); 
    productImgWidth = productImg.width();
    productImg.height(productImgWidth);
});

//Sticky header
jQuery(window).scroll(function () {
    jQuery('header').toggleClass('sticky-header', jQuery(this).scrollTop() > 0/*jQuery('header').height()*/);
    
    jQuery('.scroll-top').toggleClass('top-active',
    jQuery(this).scrollTop() > 1080 );
});

//mobile button

jQuery('.mobile-button').click(function() {
    jQuery(this).toggleClass('clicked-button');
    jQuery('.main-menu').toggleClass('clicked-menu');
});
jQuery('.main-menu ul li a').click(function() {
    jQuery('.main-menu').removeClass('clicked-menu');
    jQuery('.mobile-button').removeClass('clicked-button');
});

//smooth scrolling 
// Select all links with hashes
jQuery('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = jQuery(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        jQuery('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = jQuery(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });


function resizeMe() {
    if(window.matchMedia('(max-width: 1023px)').matches) {
     jQuery('.main-menu ul li:first-child a').text('Home');
 } else {
     jQuery('.main-menu ul li:first-child a').text('Services');
 }
};
 
resizeMe();
       jQuery(window).resize(function() {
        resizeMe();
    });   