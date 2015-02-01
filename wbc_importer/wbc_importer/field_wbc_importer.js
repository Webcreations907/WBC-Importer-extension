/* global redux_change, wp */

( function( $ ) {
    "use strict";
    $.redux = $.redux || {};
    $( document ).ready( function() {
        $.redux.wbc_importer();
    } );
    $.redux.wbc_importer = function() {

        $( '.wrap-importer.theme.not-imported' ).unbind('click').on( 'click', function(e) {
            e.preventDefault();
            var r = confirm("Import Demo Content?");
            if(r == false) return;
            var parent = jQuery(this);
            parent.find('.spinner').css('display','inline-block');

            var data = jQuery(this).data();

            parent.find('.import-demo-data').hide();
            data.action = "redux_wbc_importer";
            data.demo_import_id = parent.attr( "data-demo-id" );
            data.nonce = parent.find('.import-demo-data').attr( "data-nonce" );
            data.type = 'import-demo-content';
            parent.find('.wbc_image').css('opacity','0.5');
            jQuery.post( ajaxurl, data, function( response ) {
                parent.find('.wbc_image').css('opacity','1');
                parent.find('.spinner').css('display','none');
                
                if(response.length > 0 && response.match(/Have fun!/gi)){
                    parent.find('.import-demo-data').removeClass('button-primary').addClass('button').text('Imported').show();
                    parent.addClass('imported active').removeClass('not-imported');   
                }else{
                    parent.find('.import-demo-data').show();
                    alert('There was an error importing demo content: \n' +response.replace(/(<([^>]+)>)/gi,""));
                }
            } );       
            return false;
        });
    };
} )( jQuery );
