(function( $ ) {
    
	/**
	 * Toggle hamburger full-screen
	 */
    
    toggleHamburgerScreen();
    function toggleHamburgerScreen(){
        $( document.body ).on( 'click', '.header-hamburger', function( event ) {

            console.log('hamburger');

            event.preventDefault();
            var $el = $( this ),
            $screen = $( '#' + $el.data( 'target' ) );


            $screen.fadeToggle( function() {
                $( '.hamburger-menu', $screen ).addClass( 'active' );
            } );
            $screen.addClass( 'open' );



    }).on( 'click', '#hamburger-fullscreen .button-close', function( event ) {
            event.stopPropagation();

            var $el = $( this ),
                $screen = $( '#hamburger-fullscreen' );

            $el.removeClass( 'active' );
            $screen.removeClass( 'open' );

            setTimeout( function() {
                $screen.fadeOut();
            }, 420 );
        } );

        // Init scrollbar for full screen menu.
        if ( typeof PerfectScrollbar !== 'undefined' ) {
            var $hamburgerScreen = $( '#hamburger-fullscreen' );

            if ( $hamburgerScreen.length ) {
                new PerfectScrollbar( $( '.hamburger-screen-content', $hamburgerScreen ).get( 0 ) );
            }
        }
    };

    


})( jQuery );