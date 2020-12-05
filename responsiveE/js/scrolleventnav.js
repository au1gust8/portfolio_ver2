$(document).ready(function () {

    $(window).on('scroll', function () {
        var scroll_top = $(window).scrollTop();

        if (scroll_top < $('#content').offset().top) {
            $('#headerArea').css({
                background: 'rgba(51,51,153,0)',
                borderBottom: 'none'
            });
            $('.menu').find('a').css('color', '#ff6');

            $('.menu').find('li').hover(function () {
                $(this).children('a').css('color', '#506278');
            }, function () {
                $(this).children('a').css('color', '#ff6');
            });

        } else {
            $('#headerArea').css({
                background: '#506278',
                borderBottom: 'none'
            });
            $('.menu').find('a').css('color', '#ff6');
            $('.menu').find('li').hover(function () {
                $(this).children('a').css('color', '#fff');
            }, function () {
                $(this).children('a').css('color', '#ff6');
            });
        };
    });
});
