/**
* Contact CTA JS
* -----------------------------------------------------------------------------
*
* All the JS for the Contact CTA component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
import {CustomEase} from 'gsap/CustomEase.js';
gsap.registerPlugin( ScrollTrigger, CustomEase );
( function( app ) {
  const COMPONENT = {

    className: 'contact-cta',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      $( '.contact-cta' ).each( function() {
        $( this ).find( '.contact-cta__name-slider' ).slick( {
          arrows: false,
          speed: 300,
          autoplaySpeed: 1500,
          slidesToShow: 1,
          infinite: true,
          vertical: true,
          autoplay: true,
          pauseOnHover: false,
        } );
      } );
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'contact-cta', COMPONENT );
} )( app );
