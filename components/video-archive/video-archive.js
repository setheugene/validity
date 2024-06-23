/**
* Video Archive JS
* -----------------------------------------------------------------------------
*
* All the JS for the Video Archive component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

// import {gsap} from 'gsap';
// import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
// gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'video-archive',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      $( '#video-archive__filters input' ).on( 'change', function() {
        filterVideos( 1 );
      } );

      // If the pagination changes, filter the events with the new page
      $( document ).on( 'click', '.pagination button', function() {
        filterVideos( $( this ).attr( 'data-value' ) );
      } );

      function filterVideos( page ) {
        const data = {
          'page': page ? page : 1,
          'category': [],
        };

        const checkedFilter = $( '#video-archive__filters .video__filter ' ).find( 'input:checked' );

        if ( checkedFilter ) {
          data['category'].push( checkedFilter.val() );
        }

        $.ajax( {
          type: 'GET',
          url: siteInfo.wpApiSettings.ll + 'LL_Ajax/LL_Video',
          data: data,
          beforeSend: function( xhr ) {
            xhr.setRequestHeader( 'X-WP-Nonce', siteInfo.wpApiSettings.nonce );
            xhr.setRequestHeader( 'X-Requested-With', 'XMLHttpRequest' );
            doingAjax = true;
          },
          success: function( data ) {
            $( '#video-archive__video-grid' ).html( data.videoCards );
            $( '#video-archive__pagination' ).html( data.pagination );
          },
          complete: function( jqXHR, status ) {
            doingAjax = false;
          },
        } );
      }
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'video-archive', COMPONENT );
} )( app );
