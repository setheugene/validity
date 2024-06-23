/**
* Report JS
* -----------------------------------------------------------------------------
*
* All the JS for the Report component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
import {DrawSVGPlugin} from 'gsap/DrawSVGPlugin';
gsap.registerPlugin( ScrollTrigger, DrawSVGPlugin );
( function( app ) {
  const COMPONENT = {

    className: 'report',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      gsap.fromTo( '.report__border', {duration: 2.5, drawSVG: 0}, {
        drawSVG: '100%',
        ease: 'linear',
        duration: 2.5,
        scrollTrigger: {
          trigger: '.report__border',
          pin: false,
          start: 'top 80%',
          end: 'max',
          // markers: true,
        },
      } );
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'report', COMPONENT );
} )( app );
