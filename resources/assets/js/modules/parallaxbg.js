/**
 * This will add a little parallax to the background image on the mouse movement.
 */
$(document).ready(() => {
    let div = $(".parallaxbg");

    let movementStrength = 25;
    let height = movementStrength / $(window).height();
    let width = movementStrength / $(window).width();

    $(window).resize(() => {
        div.css("background-position", "center top");
    });

    div.mousemove((e) => {
        let pageWidth  = $(window).width();
        let pageHeight = $(window).width();

        if (pageWidth >= 991) {
            let pageX = e.pageX - (pageWidth / 2);
            let pageY = e.pageY - (pageHeight / 2);
            let newvalueX = width * pageX * -1 - 25;
            let newvalueY = height * pageY * -1 - 50;
            div.css("background-position", newvalueX+"px     "+newvalueY+"px");
        }
    });
});