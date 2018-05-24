// honors carousel init
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

//testimonials carousele init
$(function() {
    $('.testimonials-carousel')
        .jcarousel({
            wrap: 'both'
        });

    $('.testimonials-control-back')
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

    $('.testimonials-control-next')
        .on('jcarouselcontrol:active', function() {
            $(this).removeClass('inactive');
        })
        .on('jcarouselcontrol:inactive', function() {
            $(this).addClass('inactive');
        })
        .jcarouselControl({
            // Options go here
            target: '+=1'
        })
});

