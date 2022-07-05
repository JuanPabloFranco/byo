(function($) {

    'use strict';

    wp.customize( 'wp_footer_copyright', function( value ) {
        value.bind( function( newval ) {
            $( '#footer .copyright span' ).html( newval );
        } );
    } );
    
})(jQuery);