jQuery("document").ready(function ($) {

    var nav = $('.header');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            nav.addClass("headerFixo");
        } else {
            nav.removeClass("headerFixo");
        }
    });

});


$(function () {
    $('.nav-tog').click(function (e) {
        e.stopPropagation();
        toggleNav();
    });

    $('#main').click(function (e) {
        var target = $(e.target);
        if(!target.closest('#nav').length && $('.menu').hasClass('show-nav')){
            toggleNav();
        }
    });

    function toggleNav() {
        if($('.menu').hasClass('show-nav')){
            $('.menu').removeClass('show-nav');
            $('#closeIcon').addClass('invisivel');
            $('#openText').removeClass('invisivel');
        }else{
            $('.menu').addClass('show-nav');
            $('#closeIcon').removeClass('invisivel');
            $('#openText').addClass('invisivel');
        }
    }
});


$(function () {
    $('#entrar').click(function (e) {
        $('#entrarForm').removeClass('invisivel');
        $('#cadastrarForm').addClass('invisivel');
        $('#entrar').addClass('form-selected');
        $('#cadastrar').removeClass('form-selected');
    });

    $('#cadastrar').click(function (e) {
        $('#entrarForm').addClass('invisivel');
        $('#cadastrarForm').removeClass('invisivel');
        $('#entrar').removeClass('form-selected');
        $('#cadastrar').addClass('form-selected');
    });
});


