/**
* Main CTA JS
* -----------------------------------------------------------------------------
*
* All the JS for the Main CTA component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

// import {gsap} from 'gsap';
// import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
( function( app ) {
  const COMPONENT = {

    className: 'main-cta',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      // gsap.registerPlugin( ScrollTrigger );
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'main-cta', COMPONENT );
} )( app );
