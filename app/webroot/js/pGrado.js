$(function(){
	$('.btn-tooltip').tooltip({
		html: true,
	});

	$('.no-border-red').removeClass('required');

	$('.error-message').addClass('text-danger');
	$('.form-error').closest('div').addClass('has-error');


	/* $('.btn-icheck').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue'
	}); */

	/* slideToTop */
		var slideToTop = $('.slideToTop');

		slideToTop.on('mouseenter', function () {
			$(this).css('opacity', '1');
		});
		slideToTop.on('mouseout', function () {
			$(this).css('opacity', '.7');
		});

		$('.wrapper').append(slideToTop);

		$(window).scroll(function () {
			if ($(window).scrollTop() >= 150) {
				if (!$(slideToTop).is(':visible')) {
					$(slideToTop).fadeIn(500);
				}
			} else {
				$(slideToTop).fadeOut(500);
			}
		});

		$(slideToTop).click(function () {
		$("body,html").animate({
				scrollTop: 0
			}, 500);
		});
		$(".sidebar-menu li a").click(function () {
			var $this = $(this);
			var target = $this.attr("href");
			if (typeof target === 'string') {
				$("body,html").animate({
					scrollTop: ($(target).offset().top) + "px"
				}, 500);
			}
		});


});

$.fn.modalLink = function(target){
	$(this).on('click', function(){
		var modal = $(target);

		if( $(this).is( "a" ) ){
			var url = $(this).prop('href');
		}else{
			var url = $(this).data('url');
		}

		modal.modal('show');
		$.ajax({
			url: url,
			dataType: 'html',
			beforeSend: function(){
				modal.find('.modal-body').html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
			},
			complete: function(msg){
				modal.html(msg.responseText);
			}
		});

		return false;
	});
}


$.fn.btnTextAnimado = function(){

	var $itemAnimado = $(this).find('a');
	var $itemText = $itemAnimado.find('.text-link');

	var cssProp = {
		"display":"inline",
		"margin-left":"-15px",
		"padding": "1px 10px 1px 14px",
		"-webkit-border-top-right-radius": "10px",
		"-webkit-border-bottom-right-radius": "10px",
		"-moz-border-radius-topright": "10px",
		"-moz-border-radius-bottomright": "10px",
		"border-top-right-radius": "10px",
		"border-bottom-right-radius": "10px"
	}

	$itemText.css(cssProp);
	$itemText.hide();

	$itemAnimado.on('mouseenter',function(){
		$(this).find('.text-link').stop(true).show('fast');
	});

	$itemAnimado.on('mouseleave',function(){
		$(this).find('.text-link').stop(true).hide('fast');
	});
}

$.fn.popoverPerfil = function () {

	$(this).hover(function(){
		var btnPerfil = $(this);
		var pop = $('<div />').html('<i class="fa fa-refresh fa-spin"></i> Cargando...');

		btnPerfil.popover({
			content: pop,
			container: 'body',
			html: true,
			placement: 'top',
			delay: { "show": 100, "hide": 10000 },
			trigger: 'manual'  //trigger: 'hover',

		});

		if( btnPerfil.hasClass('popover-up') === false ){
			//pop.html("Primero");

			var user_id = btnPerfil.attr('data-id');
			$.ajax({
				method: "POST",
				url: popover_url+user_id,
				//data: { id: user_id}
				dataType: 'html',

				beforeSend: function(){

				},
				complete: function(msg){
					pop.html(msg.responseText);
				}
			});

			btnPerfil.addClass('popover-up');
		}

		btnPerfil.popover('show');

	},function(){
		var btnPerfil = $(this);
		btnPerfil.popover('hide');
	});

};
