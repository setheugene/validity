/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */
( function( app ) {
  const COMPONENT = {
    videoPopup: function( popupUrl ) {
      $.magnificPopup.open( {
        items: {
          src: popupUrl,
        },
        type: 'iframe',
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'mfp-fade',
        callbacks: {
          open: function() {
            $( 'video' ).trigger( 'pause' );
          },
          close: function() {
            $( 'video' ).trigger( 'play' );
          },
        },
      }, 0 );
    },
    init: function() {
      const _this = this;
      $( document ).on( 'click', '.js-init-video', function( e ) {
        e.preventDefault();
        console.log( $( this ) );
        const popupUrl = $( this ).attr( 'href' );
        if ( popupUrl !== '' ) {
          _this.videoPopup( popupUrl );
        }
      } );

      $( '.navbar-toggle' ).on( 'toggleBefore', function( event ) {
        const target = $( this ).data( 'toggle-target' );
        $( target ).slideToggle();
      } );

      $( '.gform_page:first-of-type .name_first input' ).on( 'change', function() {
        const url = new URL( location );
        const param = $( this ).val();
        url.searchParams.set( 'user', param );
        history.pushState( {}, '', url );
      } );

      // Set progress for custom progress bar
      const totalPages = $( '.gform_wrapper .gform_body .gform_page' ).length;
      const initialProgress = ( 1 / totalPages ) * 100;
      $( '.validity-progress-bar .validity-progress' ).css( {
        'width': initialProgress + '%',
      } );

      // Hide custom progress bar on confirmation
      $( document ).on( 'gform_confirmation_loaded', function( event, formId ) {
        $( '.validity-progress-bar .validity-progress' ).css( {
          'width': '100%',
        } );
      } );

      $( document ).on( 'gform_page_loaded', function( event, formId, currentPage ) {
        // Set progress for custom progress bar
        const progress = ( currentPage / totalPages ) * 90;
        if ( $( '.validity-progress-bar .validity-progress' ).length ) {
          $( '.validity-progress-bar .validity-progress' ).css( {
            'width': progress + '%',
          } );
        }

        const url = new URL( location );
        $( '.gform_page:first-of-type .name_first input' ).on( 'change', function() {
          const param = $( this ).val();
          url.searchParams.set( 'user', param );
          history.pushState( {}, '', url );
        } );
        const gsectionTitle = $( '.gform_page.llgq-current-page .gsection_title' );
        if ( gsectionTitle.is( ':contains("[first_name]")' ) ) {
          console.log( 'hey' );
          let param = url.searchParams.get( 'user' );
          if ( !param || param == '' || param == null ) {
            param = ' ';
          }
          if ( param && gsectionTitle.length > 0 ) {
            const nameShortcode = gsectionTitle.text();
            const name = nameShortcode.replace( '[first_name]', '<span class="capitalize">' + param + '</span>' );
            gsectionTitle.html( name );
          }
        }
        /* Allow selects to have placeholder styles */
        $( 'select' ).addClass( 'placeholder-selected' );
        $( 'select' ).on( 'change', function() {
          $( 'select' ).removeClass( 'placeholder-selected' );
        } );
      } );

      function handleMobileChange( event ) {
        /*
         * Remove any inline display values when the screen changes
         * between mobile and desktop state. This allows the default
         * stylings to kick in and prevent any weird "half mobile half desktop"
         * nav display states that sometimes occur while resizing the browser
         * Also remove any active is-open classes from the toggle and nav to reset
         * its state when switching between screen sizes
         */
        if ( event.matches ) {
          if ( $( '.primary-nav' ).length > 0 ) {
            $( '.primary-nav' ).get( 0 ).style.removeProperty( 'display' );

            $( '.navbar-toggle, .primary-nav' ).removeClass( 'is-open' );
          }
        }
      }

      /* Run the handleMobileChange function when the screen sizes changes based on the mobileSize const */
      const mobileSize = window.matchMedia( '(min-width: 768px)' );
      handleMobileChange( mobileSize );
      mobileSize.addEventListener( 'change', handleMobileChange );

      if ( mobileSize.matches ) {
        $( '.primary-menu-item button, .primary-menu-item a' ).on( 'toggleBefore', function( event ) {
          const target = $( this ).data( 'toggle-target' );
          const separatedArray = target.split( ', ' );
          separatedArray.forEach( function( target ) {
            if ( !target.includes( 'nav-overlay' ) ) {
              $( target ).slideToggle();
            } else {
              const targetClasslist = $( target ).attr( 'class' ).split( /\s+/ );
              if ( targetClasslist.includes( 'is-active' ) ) {
                $( target ).removeClass( 'is-active' );
              } else {
                setTimeout( function() {
                  $( target ).addClass( 'is-active' );
                }, 250 );
              }
            }
          } );
        } );
      } else {
        $( '.primary-menu-item button, .primary-menu-item a' ).on( 'toggleBefore', function( event ) {
          const target = $( this ).data( 'toggle-target' );
          $( target ).fadeToggle();
        } );
      }

      /* Allow selects to have placeholder styles */
      checkSelectPlaceholder();
      $( '.gfield_select' ).on( 'change', function() {
        checkSelectPlaceholder();
      } );
      function checkSelectPlaceholder() {
        if ( $( '.gfield_select' ).find( 'option:selected' ).hasClass( 'gf_placeholder' ) ) {
          $( '.gfield_select' ).addClass( 'placeholder-selected' );
        } else {
          $( '.gfield_select' ).removeClass( 'placeholder-selected' );
        }
      }

      /* Lazyload all embeds */
      if ( 'IntersectionObserver' in window ) {
        const options = {
          root: null, // avoiding 'root' or setting it to 'null' sets it to default value: viewport
          rootMargin: '0px 0px 100px', // determines how far form the root the intersection callback will trigger
        };
        const embedObserver = new IntersectionObserver( function( entries, observer ) {
          entries.forEach( function( embed ) {
            if ( embed.isIntersecting ) {
              $( embed.target ).attr( 'src', $( embed.target ).attr( 'data-src-defer' ) );
              // remove observer
              embedObserver.unobserve( embed.target );
            }
          } );
        }, options );

        // add the observer to the elements
        $( '[data-src-defer]' ).each( function( index, element ) {
          embedObserver.observe( element );
        } );
      }

      /* Set up arias for blog sidebar toggles */
      toggleBlogSidebarAriaVisibility();

      $( window ).on( 'resize', function() {
        toggleBlogSidebarAriaVisibility();
      } );

      function toggleBlogSidebarAriaVisibility() {
        if ( window.innerWidth > 1024 ) {
          $( '.blog__sidebar-inner' ).attr( 'aria-hidden', false );
        } else if ( window.innerWidth <= 1024 && !$( '.blog__sidebar-inner' ).hasClass( 'is-open' ) ) {
          $( '.blog__sidebar-inner' ).attr( 'aria-hidden', true );
        }
      }
    },
    finalize: function() {
    },
  };

  app.registerComponent( 'common', COMPONENT );
} )( app );
