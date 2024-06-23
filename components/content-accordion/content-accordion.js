/**
* Content Accordion JS
* -----------------------------------------------------------------------------
*
* All the JS for the Content Accordion component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

// import ScrollMagic from 'ScrollMagic';
// import animationGSAP from 'animation.gsap';
// import addIndicators from 'debug.addIndicators';
// import TweenMax from 'TweenMax';
// import TimelineMax from 'TimelineMax';
( function( app ) {
  const COMPONENT = {

    className: 'content-accordion',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      $( 'button.content-accordion__item-title' ).on( 'toggleBefore', function( event ) {
        const target = $( this ).data( 'toggle-target' );
        $( target ).slideToggle();
      } );
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'content-accordion', COMPONENT );
} )( app );
