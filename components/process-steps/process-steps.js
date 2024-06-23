/**
* Process Steps JS
* -----------------------------------------------------------------------------
*
* All the JS for the Process Steps component.
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

    className: 'process-steps',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      $( '.process-steps__step-row' ).each( function() {
        const circles = gsap.timeline( {
          scrollTrigger: {
            trigger: this,
            start: 'top 45%',
            end: `bottom 45%`,
            pin: false,
            scrub: false,
            // markers: true,
            toggleActions: 'play reverse play reverse',
            onRefresh: ( self ) => {
              if ( self.progress > 0 ) {
                $( this ).addClass( 'js-animated' );
              }
            },
            onEnter: ( {progress, direction, isActive} ) => $( this ).addClass( 'js-animated' ),
          },
        } );
        circles.from( $( this ).find( '.animated-circle' ), {
          scale: 0,
          stagger: 0.1,
          duration: .45,
          ease: CustomEase.create( 'custom', '.32, 1.51, .60, 1.3,' ),
        } );
      } );
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'process-steps', COMPONENT );
} )( app );
