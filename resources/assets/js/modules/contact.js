(function (http) {
    let contactFormElem = $("#contact-form");
    let validContactToken = "YUesU09isIUiUkCX9288==";

    /**
     * Sets a custom validator that can then be called from the input field if necessary for the field to
     * be validated.
     */

    contactFormElem.validator({
        custom: {
            pattern: ($el) => {
                var pattern = $el.data("pattern");
                return !$el.val() || new RegExp(pattern,"g").test($el.val())
            }
        }
    });


    /**
     * We will attempt to remove the already set value in the __token field and replace it with nothing.
     * This is basically a poormans alternative to checkmate bots that do not load Javascript and thus
     * cannot run this command. The server will make sure if this field is not equal to a certain
     * string then it could be spam.
     */

    $(".leave > input").attr("value", validContactToken);

    /**
     * This block is here to basically toggle the popup form to enter the contact details and
     * message.
     */

    $(".contact-popup-toggle").click((evt) => {
        let scrollPosition, elem, html;

        evt.preventDefault();

        html = $("html");
        elem = $(".full-pop.contact");

        if (elem.hasClass("active")) {
            elem.removeClass("active");

            // Unlock scrolling...
            scrollPosition = html.data("scroll-position");
            html.css("overflow", html.data("previous-overflow"));
            window.scrollTo(scrollPosition[0], scrollPosition[1])
        } else {
            elem.addClass("active");

            scrollPosition = [
                self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
            ];

            // Lock scrolling...
            html.data("scroll-position", scrollPosition);
            html.data("previous-overflow", html.css("overflow"));
            html.css("overflow", "hidden");
            window.scrollTo(scrollPosition[0], scrollPosition[1]);
        }
    });

    /**
     * Submits the form to the server for processing.
     */

    contactFormElem.validator().on('submit', (evt) => {
        if ( ! evt.isDefaultPrevented()) {
            evt.preventDefault();

            let sendBtn = contactFormElem.find('.send-btn');
            let oldText = sendBtn.text();
            let newText = sendBtn.data('loading');

            function toggleBtnState() {
                if ( ! sendBtn.data('active')) {
                    sendBtn.data('loading', oldText);
                    sendBtn.text(newText);
                    sendBtn.data('active', true);
                    sendBtn.attr('disabled', true);
                } else {
                    sendBtn.data('loading', newText);
                    sendBtn.text(oldText);
                    sendBtn.data('active', false);
                    sendBtn.attr('disabled', false);
                }
            }

            toggleBtnState();

            http.post('/contact', {
                message: contactFormElem.find('textarea').val(),
                name: contactFormElem.find('input[name=name]').val(),
                email: contactFormElem.find('input[name=email]').val(),
                __token: contactFormElem.find('input[name=__token]').val(),
            }).then((response) => {
                if (response.data.status === 'ok') {
                    showSnackBar("Your message has been sent successfully!");
                    contactFormElem.trigger('reset');
                    $(".close.contact-popup-toggle").trigger('click');
                } else {
                    showSnackBar("Oops! Something went wrong, weird.");
                    console.error(response);
                }

                toggleBtnState();
            }).catch((error) => {
                showSnackBar("Oops! Something broke. Please try again.");
                console.error(error);
                toggleBtnState();
            });

            return false;
        }
    });
}(window.axios));