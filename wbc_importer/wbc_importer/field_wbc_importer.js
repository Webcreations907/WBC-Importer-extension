/* global redux_change, wp */

(function($) {
    "use strict";
    $.redux = $.redux || {};
    $(document).ready(function() {
        $.redux.wbc_importer();
    });
    $.redux.wbc_importer = function() {

        $('.wrap-importer.theme.not-imported, #wbc-importer-reimport').unbind('click').on('click', function(e) {
            e.preventDefault();

            var parent = jQuery(this);

            var reimport = false;

            var message = 'Import Demo Content?';

            if (e.target.id == 'wbc-importer-reimport') {
                reimport = true;
                message = 'Re-Import Content?';

                if (!jQuery(this).hasClass('rendered')) {
                    parent = jQuery(this).parents('.wrap-importer');
                }
            }

            if (parent.hasClass('imported') && reimport == false) return;

            var r = confirm(message);

            if (r == false) return;

            if (reimport == true) {
                parent.removeClass('active imported').addClass('not-imported');
            }

            parent.find('.spinner').css('display', 'inline-block');

            parent.removeClass('active imported');

            parent.find('.importer-button').hide();

            var data = jQuery(this).data();

            data.action = "redux_wbc_importer";
            data.demo_import_id = parent.attr("data-demo-id");
            data.nonce = parent.attr("data-nonce");
            data.type = 'import-demo-content';
            data.wbc_import = (reimport == true) ? 're-importing' : ' ';
            parent.find('.wbc_image').css('opacity', '0.5');
            jQuery.post(ajaxurl, data, function(response) {
                parent.find('.wbc_image').css('opacity', '1');
                parent.find('.spinner').css('display', 'none');

                if (response.length > 0 && response.match(/Have fun!/gi)) {

                    if (reimport == false) {
                        parent.addClass('rendered').find('.wbc-importer-buttons .importer-button').removeClass('import-demo-data');

                        var reImportButton = '<div id="wbc-importer-reimport" class="wbc-importer-buttons button-primary import-demo-data importer-button">Re-Import</div>';
                        parent.find('.theme-actions .wbc-importer-buttons').append(reImportButton);
                    }
                    parent.find('.importer-button:not(#wbc-importer-reimport)').removeClass('button-primary').addClass('button').text('Imported').show();
                    parent.find('.importer-button').attr('style', '');
                    parent.addClass('imported active').removeClass('not-imported');
                } else {
                    parent.find('.import-demo-data').show();

                    if (reimport == true) {
                        parent.find('.importer-button:not(#wbc-importer-reimport)').removeClass('button-primary').addClass('button').text('Imported').show();
                        parent.find('.importer-button').attr('style', '');
                        parent.addClass('imported active').removeClass('not-imported');
                    }

                    alert('There was an error importing demo content: \n\n' + response.replace(/(<([^>]+)>)/gi, ""));
                }
            });
            return false;
        });
    };
})(jQuery);