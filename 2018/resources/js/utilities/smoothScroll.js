$(document).ready(() => {
    $('[smooth-scroll] a').on('click', function() {
        if ($(this).attr('href') !== '#') {
            $('.active').removeClass('active');
            $(this).closest('li').addClass('active');

            $('.' + $(this).attr("class")).parent('li').addClass('active');

            try {
                $('html, body').stop().animate({
                    scrollTop: $($(this).attr('href').replace('/', '')).offset().top
                }, 400);
            } catch (e) {
                //
                return true;
            }

            return false;
        }
    });
});
