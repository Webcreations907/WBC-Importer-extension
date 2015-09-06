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
                message  = 'Re-Import Content?';

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

            var imported_demo = false;

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
                    imported_demo = true;
                    wbc_show_progress(data);
                    location.reload(true);
                } else {
                    parent.find('.import-demo-data').show();

                    if (reimport == true) {
                        parent.find('.importer-button:not(#wbc-importer-reimport)').removeClass('button-primary').addClass('button').text('Imported').show();
                        parent.find('.importer-button').attr('style', '');
                        parent.addClass('imported active').removeClass('not-imported');
                    }
                    
                    imported_demo = true;

                    alert('There was an error importing demo content: \n\n' + response.replace(/(<([^>]+)>)/gi, ""));
                }
            });

            function progress_bar(){
                var progress = '<div class="wbc-progress-back"><div class="wbc-progress-bar button-primary"><span class="wbc-progress-count">0%</span></div>';
                parent.prepend(progress);
                setTimeout(function(){
                    wbc_show_progress(data);
                },2000);
            }

            progress_bar();

            function wbc_show_progress( data ){
                
                data.action = "redux_wbc_importer_progress";

                if(imported_demo == false){
                    
                    jQuery.ajax({
                        url: ajaxurl,
                        data: data,
                        success:function(response){
                            var obj = jQuery.parseJSON(response);
                            if (response.length > 0 && typeof obj == 'object'){
                                var percentage = Math.floor((obj.imported_count / obj.total_post ) * 100);

                                percentage = (percentage > 0) ? percentage - 1 : percentage;
                                parent.find('.wbc-progress-bar').css('width',percentage+"%");
                                parent.find('.wbc-progress-count').text(percentage+"%");
                                setTimeout(function(){
                                    wbc_show_progress(data);
                                },2000);
                            }
                        }
                    });

                }else{
                    parent.find('.wbc-progress-back').remove();
                }
            }


            return false;
        });
    };
})(jQuery);