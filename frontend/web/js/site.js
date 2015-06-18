/**
 * Created by Pavel on 17.5.2015.
 */

// jQuery functions
( function($) {
    $(document).ready(function(){
        $('.button-collapse').sideNav({'edge': 'left'});
        $('select').material_select();
        $('.collapsible').collapsible();
    });
} )( jQuery );
