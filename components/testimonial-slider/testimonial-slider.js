/**
* Testimonial Slider JS
* -----------------------------------------------------------------------------
*
* All the JS for the Testimonial Slider component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

// import {gsap} from 'gsap';
// import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
// gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'testimonial-slider',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      testimonialSlider();

      $( window ).on( 'resize', function() {
        testimonialSlider();
      } );

      function testimonialSlider() {
        $( '.testimonial-slider' ).each( function() {
          if ( $( this ).find( '.testimonial-slider__slide' ).length > 1 ) {
            $( this ).find( '.testimonial-slider__slider' ).slick( {
              dots: false,
              infinite: true,
              fade: true,
              // fade: true,
              arrows: true,
              appendArrows: $( '.testimonial-slider__arrows-container' ),
              prevArrow: $( '.testimonial-slider__prev-arrow' ),
              nextArrow: $( '.testimonial-slider__next-arrow' ),
              slidesToShow: 1,
            } );
          } else {
            // do nothing
          }
        } );
      }
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'testimonial-slider', COMPONENT );
} )( app );
