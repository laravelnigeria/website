(() => {
    $(document).ready(() => {
        const div = $('*[parallax]');

        const movementStrength = 15;
        const height = movementStrength / $(window).height();
        const width = movementStrength / $(window).width();

        $(window).resize(() => div.css('background-position', 'center center'));

        div.mousemove(e => {
            const pageWidth = $(window).width();
            const pageHeight = $(window).width();

            if (pageWidth >= 768) {
                const pageX = e.pageX - pageWidth / 2;
                const pageY = e.pageY - pageHeight / 2;
                const newvalueX = width * pageX * -1 - 2;
                const newvalueY = height * pageY * -1 - 50;
                div.css('background-position', `${newvalueX}px ${newvalueY}px`);
            }
        });
    });
})();
