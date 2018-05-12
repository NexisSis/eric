$(function() {
    $('.jcarousel')
        .jcarousel({
            wrap: 'both'
        });

    $('.jcarousel-control-prev')
        .on('jcarouselcontrol:active', function() {
            $(this).removeClass('inactive');
        })
        .on('jcarouselcontrol:inactive', function() {
            $(this).addClass('inactive');
        })
        .jcarouselControl({
            // Options go here
            target: '-=1'
        });

    $('.jcarousel-control-next')
        .on('jcarouselcontrol:active', function() {
            $(this).removeClass('inactive');
        })
        .on('jcarouselcontrol:inactive', function() {
            $(this).addClass('inactive');
        })
        .jcarouselControl({
            // Options go here
            target: '+=1'
        });
});


new WOW().init();
//header animation
window.onscroll = function() {scrollFix()};
var header = document.getElementById("menuNav");
var main = document.getElementById("main");
var logoText1 = document.getElementById("logo-block-text-1-animation");
var logoText2 = document.getElementById("logo-block-text-2-animation");
var LogoImg = document.getElementById("logo-img-animation");
var LogoButton = document.getElementById("logo-button-animation");
var sticky = header.offsetTop;
function scrollFix() {
    if (window.pageYOffset >= sticky-10) {
        header.classList.add("sticky");
        main.classList.add("main-animation");
       logoText1.classList.add("logo-block-text-1-animation");
       logoText2.classList.add("logo-block-text-2-animation");
       LogoImg.classList.add("logo-img-animation");
        LogoButton.classList.add("logo-button-animation");

    } else {
        header.classList.remove("sticky");
        main.classList.remove("main-animation");
        logoText1.classList.remove("logo-block-text-1-animation");
        logoText2.classList.remove("logo-block-text-2-animation");
        LogoImg.classList.remove("logo-img-animation");
        LogoButton.classList.remove("logo-button-animation");

    }
}


// smooth animation
$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 900);
});