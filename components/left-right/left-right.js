/**
* Left Right JS
* -----------------------------------------------------------------------------
*
* All the JS for the Left Right component.
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

    className: 'left-right',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'left-right', COMPONENT );
} )( app );
