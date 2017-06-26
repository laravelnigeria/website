/**
 * Created by neo on 26/06/2017.
 */
(function () {
    $('.nav a').on('click', function() {
        $('.active').removeClass('active');
        $(this).closest('li').addClass('active');
        var theClass = $(this).attr("class");
        $('.'+theClass).parent('li').addClass('active');
        $('html, body').stop().animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 400);
        return false;
    });
}());