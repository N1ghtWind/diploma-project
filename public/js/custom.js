jQuery(function () {
    var AllAnimatingElements = $("*[data-animation]");

    doAnimations(AllAnimatingElements);
});

function doAnimations(elements) {
    var animationEndEvents =
        "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
    elements.each(function () {
        var $this = $(this);
        var $animationDelay = $this.data("delay");
        var $animationType = "animated " + $this.data("animation");
        $this.css({
            "animation-delay": $animationDelay,
            "-webkit-animation-delay": $animationDelay,
        });
        $this.addClass($animationType).one(animationEndEvents, function () {
            $this.removeClass($animationType);
        });
    });
}

/*------ Wow Active ----*/
new WOW().init();


// AOS Active

AOS.init({
    useClassNames: true,
    initClassName: false,
    animatedClassName: 'animated',
    delay: 0,
});
