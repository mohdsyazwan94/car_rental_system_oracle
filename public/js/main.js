(function ($)
  { "use strict"

/* 2. sticky And Scroll UP */
    $(window).on('scroll', function () {
      var scroll = $(window).scrollTop();
      if (scroll < 400) {
        $(".header-sticky").removeClass("sticky-bar");
        $('#back-top').fadeOut(500);
      } else {
        $(".header-sticky").addClass("sticky-bar");
        $('#back-top').fadeIn(500);
      }
    });
  // Scroll Up
    $('#back-top a').on("click", function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  

/* 3. slick Nav */
// mobile_menu
    var menu = $('ul#navigation');
    if(menu.length){
      menu.slicknav({
        prependTo: ".mobile_menu",
        closedSymbol: '+',
        openedSymbol:'-'
      });
    };

    $("[data-background]").each(function () {
      $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
      });


	$("a").on('click', function(event) {
    var pathArray = $(this).attr('href').split( '/' );
    var protocol = pathArray[0];
    var host = pathArray[2].split( '#' )[0];
    var url = protocol + '//' + host.replace(/\/$/, "");console.log(url);console.log(location.href.split( '#' )[0].replace(/\/$/, "") );
		// Make sure this.hash has a value before overriding default behavior
		if (this.hash !== "" && url==location.href.split( '#' )[0].replace(/\/$/, "") ) {
		  // Prevent default anchor click behavior
		  event.preventDefault();

		  // Store hash
		  var hash = this.hash;

		  // Using jQuery's animate() method to add smooth page scroll
		  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		  $('html, body').animate({
			scrollTop: $(hash).offset().top-180
		  }, 800, function(){

			// Add hash (#) to URL when done scrolling (default click behavior)
			//window.location.hash = hash;
			history.pushState({}, '', hash);
		  });
		} // End if
	});


})(jQuery);
