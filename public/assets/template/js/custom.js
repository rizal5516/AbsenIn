(function (jQuery) {
    "use strict";

    jQuery(document).ready(function () {

        /*---------------------------------------------------------------------
        Tooltip
        -----------------------------------------------------------------------*/
        jQuery('[data-toggle="popover"]').popover();
        jQuery('[data-toggle="tooltip"]').tooltip();


        /*---------------------------------------------------------------------
        Sidebar Widget
        -----------------------------------------------------------------------*/

        jQuery(document).on("click", '.iq-menu > li > a', function () {
            jQuery('.iq-menu > li > a').parent().removeClass('active');
            jQuery(this).parent().addClass('active');
        });


        /*---------------------------------------------------------------------
        Page Loader
        -----------------------------------------------------------------------*/
        jQuery("#load").fadeOut();
        jQuery("#loading").delay().fadeOut("");


        /*---------------------------------------------------------------------
        Search input
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', function (e) {
            let myTargetElement = e.target;
            let selector, mainElement;
            if (jQuery(myTargetElement).hasClass('search-toggle') || jQuery(myTargetElement).parent().hasClass('search-toggle') || jQuery(myTargetElement).parent().parent().hasClass('search-toggle')) {
                if (jQuery(myTargetElement).hasClass('search-toggle')) {
                    selector = jQuery(myTargetElement).parent();
                    mainElement = jQuery(myTargetElement);
                } else if (jQuery(myTargetElement).parent().hasClass('search-toggle')) {
                    selector = jQuery(myTargetElement).parent().parent();
                    mainElement = jQuery(myTargetElement).parent();
                } else if (jQuery(myTargetElement).parent().parent().hasClass('search-toggle')) {
                    selector = jQuery(myTargetElement).parent().parent().parent();
                    mainElement = jQuery(myTargetElement).parent().parent();
                }
                if (!mainElement.hasClass('active') && jQuery(".navbar-list li").find('.active')) {
                    jQuery('.navbar-list li').removeClass('iq-show');
                    jQuery('.navbar-list li .search-toggle').removeClass('active');
                }

                selector.toggleClass('iq-show');
                mainElement.toggleClass('active');

                e.preventDefault();
            } else if (jQuery(myTargetElement).is('.search-input')) { } else {
                jQuery('.navbar-list li').removeClass('iq-show');
                jQuery('.navbar-list li .search-toggle').removeClass('active');
            }
        });


        /*---------------------------------------------------------------------
        Page Menu
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.wrapper-menu', function () {
            jQuery(this).toggleClass('open');
        });

        jQuery(document).on('click', ".wrapper-menu", function () {
            jQuery("body").toggleClass("sidebar-main");
        });

    });

})(jQuery);