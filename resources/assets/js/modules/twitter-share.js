;(function($){

    /**
     * jQuery function to prevent default anchor event and take the href * and the title to make a share popup
     *
     * @param  {object} e           [Mouse event]
     * @param  {int} intWidth   [Popup width default 500]
     * @param  {int} intHeight  [Popup height default 400]
     * @param  {boolean} resizeable  [Is popup resizeable default true]
     */
    $.fn.customerPopup = function (e, intWidth, intHeight, resizeable) {
        let canResize;

        // Prevent default anchor event
        e.preventDefault();

        // Set values for window
        intWidth = intWidth || '500';
        intHeight = intHeight || '400';
        canResize = (resizeable ? 'yes' : 'no');

        // Set title and open popup with focus on it
        var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
            strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + canResize,
            objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
    };

    /* ================================================== */

    $(document).ready(function ($) {
        $('.popup-link').on("click", function(e) {
            let resizeable = !!$(this).data('popup-resizable');
            let intWidth   = $(this).data('popup-width') || '500';
            let intHeight  = $(this).data('popup-height') || '400';

            $(this).customerPopup(e, intWidth, intHeight, resizeable);
        });
    });

}(jQuery));