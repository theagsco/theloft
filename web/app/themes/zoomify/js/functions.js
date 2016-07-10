(function($)
{
    "use strict";

    $(document).ready(function()
    {

      robo_mobileMenu();
      robo_searchform();
      robo_intro();
      robo_video();

    });


    /**
     * Mobile Navigation
     */
    function robo_mobileMenu()
    {

    	var container, button, menu;

    	container = document.getElementById( 'site-navigation' );
    	if ( ! container ) {
    		return;
    	}

    	// button = container.getElementsByTagName( 'button' )[0];
    	button = document.getElementsByClassName( 'menu-toggle' )[0];
    	if ( 'undefined' === typeof button ) {
    		return;
    	}

    	menu = container.getElementsByTagName( 'ul' )[0];

    	// Hide menu toggle button if menu is empty and return early.
    	if ( 'undefined' === typeof menu ) {
    		button.style.display = 'none';
    		return;
    	}

    	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
    		menu.className += ' nav-menu';
    	}

    	button.onclick = function(e) {
    		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
    			container.className = container.className.replace( ' toggled', '' );
          e.preventDefault();
    		} else {
    			container.className += ' toggled';
          e.preventDefault();
    		}
    	};

    }

  /**
   * Search Form
   */
  function robo_searchform()
  {

    $(document).on('click', '.search-btn', function () {
      $('.search-overlay').show();
      $('body').addClass('searchfullwidth');
		  $('body').removeClass('searchhide');
    }).on('click', '.search-close', function (e) {
      e.stopPropagation();
      $(this).closest('.search-overlay').hide();
      $('body').addClass('searchhide');
		  $('body').removeClass('searchfullwidth');
    });

    $(document).keyup(function (e) {
      if (e.keyCode == 27) {
        $('.search-overlay').hide();
        $('body').addClass('searchhide');
        $('body').removeClass('searchfullwidth');
      }
    });

  }

  /**
   * Header Intro
   */
  function robo_intro()
  {
    var introSection = $('#tr-intro-background'),
  		introSectionHeight = introSection.height(),
  		//change scaleSpeed if you want to change the speed of the scale effect
  		scaleSpeed = 0.3,
  		//change opacitySpeed if you want to change the speed of opacity reduction effect
  		opacitySpeed = 1;

  	//update this value if you change this breakpoint in the style.css file (or _layout.scss if you use SASS)
  	var MQ = 1170;

  	triggerAnimation();
  	$(window).on('resize', function(){
  		triggerAnimation();
  	});

  	//bind the scale event to window scroll if window width > $MQ (unbind it otherwise)
  	function triggerAnimation(){
  		if($(window).width()>= MQ) {
  			$(window).on('scroll', function(){
  				//The window.requestAnimationFrame() method tells the browser that you wish to perform an animation- the browser can optimize it so animations will be smoother
  				window.requestAnimationFrame(animateIntro);
  			});
  		} else {
  			$(window).off('scroll');
  		}
  	}
  	//assign a scale transformation to the introSection element and reduce its opacity
  	function animateIntro () {
  		var scrollPercentage = ($(window).scrollTop()/introSectionHeight).toFixed(5),
  			scaleValue = 1 - scrollPercentage*scaleSpeed;
  		//check if the introSection is still visible
  		if( $(window).scrollTop() < introSectionHeight) {
  			introSection.css({
  			    '-moz-transform': 'scale(' + scaleValue + ') translateZ(0)',
  			    '-webkit-transform': 'scale(' + scaleValue + ') translateZ(0)',
  				'-ms-transform': 'scale(' + scaleValue + ') translateZ(0)',
  				'-o-transform': 'scale(' + scaleValue + ') translateZ(0)',
  				'transform': 'scale(' + scaleValue + ') translateZ(0)',
  				'opacity': 1 - scrollPercentage*opacitySpeed
  			});
  		}
  	}
  }

  /**
   * Responsive Video
   */
  function robo_video()
  {
  	$('.site-content').fitVids();
  }

})( jQuery );