import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
import {DrawSVGPlugin} from 'gsap/DrawSVGPlugin';
import {CustomEase} from 'gsap/CustomEase.js';
gsap.registerPlugin( ScrollTrigger, DrawSVGPlugin, CustomEase );
( function( app ) {
  const COMPONENT = {
    init: function() {
      const _this = this;
    },
    finalize: function() {
    },
    animate: function() {
      $( `.js-fade:not(.js-ignore), .js-reveal:not(.js-ignore), .js-fade-group` ).each( function() {
        gsap.registerPlugin( ScrollTrigger );
        const tl = gsap.timeline( {
          scrollTrigger: {
            trigger: this,
            start: 'top 90%',
            scrub: 0.15,
            onRefresh: ( self ) => {
              if ( self.progress > 0 ) {
                $( this ).addClass( 'js-animated' );
              }
            },
            onEnter: ( {progress, direction, isActive} ) => {
              if ( $( this ).hasClass( 'js-fade-group' ) ) {
                $( this ).find( '> *' ).each( function( childKey, child ) {
                  const delay = ( childKey + 1 ) / 10;
                  child.style.setProperty( '--fade-group-delay', delay + 's' );
                } );
              }
              $( this ).addClass( 'js-animated' );
            },
          },
        } );
      } );
      // add active class to entire sections for css animations
      $( '.activate' ).each( function() {
        ScrollTrigger.create( {
          trigger: this,
          start: 'top 50%',
          scrub: 0.15,
          onRefresh: ( self ) => {
            if ( self.progress > 0 ) {
              $( this ).addClass( 'active' );
            }
          },
          //
          onEnter: () => $( this ).addClass( 'active' ),
        } );
      } );
      // DRAW IN LINE TO RIGHT OF SUBTITLE
      $( '.subtitle-line' ).each( function() {
        ScrollTrigger.create( {
          trigger: this,
          start: 'top 50%',
          scrub: 0.15,
          onRefresh: ( self ) => {
            if ( self.progress > 0 ) {
              $( this ).addClass( 'active' );
            }
          },
          //
          onEnter: () => $( this ).addClass( 'active' ),
        } );
      } );
      // DRAW IN SVG LINE ON SCROLLTRIGGER
      $( '.draw-in-line' ).each( function() {
        gsap.fromTo( $( this ), {duration: 1, drawSVG: 0}, {
          drawSVG: '100%',
          ease: CustomEase.create( 'custom', '0,.03,.97,.91' ),
          duration: 1,
          scrollTrigger: {
            trigger: $( this ),
            pin: false,
            start: 'top 80%',
            end: 'max',
            // markers: true,
          },
        } );
      } );
      // PLACE ANIMATED-CIRCLES CLASS ON WRAPPER YOU WANT TO BE TRIGGER
      // PLACE ANIMATED-CIRCLES CLASS ON EACH ITEM YOU WANT POP ANIMATION ON
      $( '.animated-circles' ).each( function() {
        const circles = gsap.timeline( {
          scrollTrigger: {
            trigger: this,
            start: 'top 60%',
            pin: false,
            scrub: false,
            // markers: true,
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
    onError: function() {
      document.querySelectorAll( '.js-fade' )?.forEach( ( el ) => {
        el.classList.remove( 'js-fade' );
      } );
    },
  };
  app.registerComponent( 'animations', COMPONENT );
} )( app );
