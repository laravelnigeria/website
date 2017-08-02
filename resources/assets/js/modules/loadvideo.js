(function () {
    if( navigator.userAgent.match(/Android/i)
    || navigator.userAgent.match(/webOS/i)
    || navigator.userAgent.match(/iPhone/i)
    || navigator.userAgent.match(/iPad/i)
    || navigator.userAgent.match(/iPod/i)
    || navigator.userAgent.match(/BlackBerry/i)
    || navigator.userAgent.match(/Windows Phone/i)
    ){
        // If mobile, then we do all this
    } else {
        document.getElementById("bgvid").innerHTML = ''+
            '<source src="/videos/bg.mp4" type="video/mp4">'+
            '<source src="/videos/bg.ogv" type="video/ogg">'+
            '<source src="/videos/bg.webm" type="video/webm">';
    }
}())