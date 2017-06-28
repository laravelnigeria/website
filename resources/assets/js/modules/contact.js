(function () {
    $('#contact-form').validator({
        custom: {
            pattern: ($el) => {
                var pattern = $el.data('pattern');
                return !$el.val() || new RegExp(pattern,"g").test($el.val())
            }
        }
    });
    $('.contact-popup-toggle').click((evt) => {
        let scrollPosition, elem, html;

        evt.preventDefault();

        html = $('html');
        elem = $('.full-pop.contact');

        if (elem.hasClass('active')) {
            elem.removeClass('active');

            // Unlock scrolling...
            scrollPosition = html.data('scroll-position');
            html.css('overflow', html.data('previous-overflow'));
            window.scrollTo(scrollPosition[0], scrollPosition[1])
        } else {
            elem.addClass('active');

            scrollPosition = [
                self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
            ];

            // Lock scrolling...
            html.data('scroll-position', scrollPosition);
            html.data('previous-overflow', html.css('overflow'));
            html.css('overflow', 'hidden');
            window.scrollTo(scrollPosition[0], scrollPosition[1]);
        }
    });
}());