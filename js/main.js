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


var filtro = document.querySelector('#filtro');

filtro.addEventListener('input', function(){
	
	var boxfilter = document.querySelectorAll(".box-info");
	if(filtro.value.length > 0){
		for(var i = 0; i < boxfilter.length; i++){
			var boxname = boxfilter[i].querySelector(".box-info--text").textContent;
			var exp = new RegExp(filtro.value, "i");
			if(exp.test(boxname)){
				boxfilter[i].classList.remove("invisivel");
			}else{
				boxfilter[i].classList.add("invisivel");
			}
		};
	}else{
		for(var i = 0; i < boxfilter.length; i++){
			boxfilter[i].classList.remove("invisivel");
		};
	}
});