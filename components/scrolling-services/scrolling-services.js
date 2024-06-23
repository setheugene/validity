/**
* Scrolling Services JS
* -----------------------------------------------------------------------------
*
* All the JS for the Scrolling Services component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'scrolling-services',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      window.onload = function() {
        document.querySelector( '.scrolling-services lottie-player' ).play();
      };

      let headerHeight = $( 'header' ).height();
      if ( $( 'body' ).hasClass( 'logged-in' ) ) {
        headerHeight += 32;
      }

      const componentsHeight = $( '#scrolling-services__content' ).height();

      if ( window.innerWidth < 1024 ) {
        // DO NOT FIRE ANIMATIONS
      } else {
        const st = ScrollTrigger.create( {
          trigger: '#scrolling-services__pinned-lottie',
          pin: true,
          start: `top top+=${headerHeight}`,
          end: `top bottom-=${componentsHeight}`,
          pinSpacing: false,
          scrub: true,
          anticipatePin: true,
          // markers: true,
        } );
      }
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'scrolling-services', COMPONENT );
} )( app );
