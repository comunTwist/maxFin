jQuery(document).ready(function ($) {
    $('.carousel').slick({
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1000,
        accessibility: true,
        nextArrow:'<i class="fas fa-angle-right slick-next"></i>',
        prevArrow:'<i class="fas fa-angle-left slick-prev"></i>',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 580,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }

            }]
    });
});