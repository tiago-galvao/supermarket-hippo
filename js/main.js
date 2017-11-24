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

$('#categoriaModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('whatever');
    var modal = $(this);
    modal.find('.modal-title').text('Nova Categoria');
    modal.find('.modal-body input').val(recipient);
})

$('#usuarioModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;
    var recipient = button.data('whatever');
    var modal = $(this);
    modal.find('.modal-title').text('Novo Usuário ');
    modal.find('.modal-body input').val(recipient);
})
