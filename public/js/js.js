$(document).ready(function(){
    $('#slider').slick({
        infinite: true,
        dots:true,
        arrows:false
    })

    $('.teachers .row').slick({
        slidesToShow:3
    })
});
