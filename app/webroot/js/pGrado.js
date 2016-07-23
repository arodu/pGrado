$(function(){
	$('.btn-tooltip').tooltip({ html: true });

	$('.no-border-red').removeClass('required');

	$('.error-message').addClass('text-danger');
	$('.form-error').closest('div').addClass('has-error');

	/* $('.btn-icheck').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue'
	}); */

	//  --- slideToTop ---
		var slideToTop = $('.slideToTop');

		slideToTop.on('mouseenter', function () {
			$(this).css('opacity', '1');
		});
		slideToTop.on('mouseout', function () {
			$(this).css('opacity', '.7');
		});

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
	//  --- /slideToTop ---

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

$.fn.btnSubmit = function(){

}

$.fn.ajaxFormulario = function(target){
	$(this).ajaxForm({
		target: target,
		beforeSubmit: function(arr, $form, options) {
			$form.find('.btn-submit').button('loading');
		},
	});
}

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
				modal.html('<div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-body"><i class="fa fa-refresh fa-spin"></i> Cargando...</div></div></div>');
			},
			complete: function(msg){
				modal.html(msg.responseText);
				$('.btn-submit').btnSubmit();
			},
			error: function (jqXHR, exception) {
				console.error(jqXHR);
				alert( '['+jqXHR.status+'] '+jqXHR.statusText);
				location.reload(true);
			},
		});

		return false;
	});
}

var buffer = [];
$.fn.popoverPerfil = function(){
	$(this).addClass('mano');
	$(this).on('mouseover', function(e) {
			 var $popover = $(this);
			 if(!$popover.hasClass('popover-up')){
				 user_id = $(this).data('id');
				 $.ajax({
					 url: popover_url+user_id,
					 dataType: 'html',
					 success: function(html) {
						 $popover.popover({
							 //title: 'Relance',
							 content: html,
							 placement: 'top',
							 html: true,
							 trigger: 'hover'
						 })
						 .popover('show')
						 .addClass('popover-up');
					 }
				 });
			 }
	 });


	/*
	var popover = $(this);
	var content = $('<div />').html('<i class="fa fa-refresh fa-spin"></i> Cargando...');

	popover.popover({
		content: content,
		container: 'body',
		html: true,
		placement: 'top',
		delay: { "show": 100, "hide": 10000 },
		trigger: 'manual'
	})
	.on('mouseover', function(){
			var user_id = popover.data('id');
			$.ajax({
				method: "POST",
				url: popover_url+user_id,
				//data: { id: user_id}
				dataType: 'html',
				complete: function(msg){
					content.html(msg.responseText);
				}
			});
			$(this).popover('show');
	})
	.on('mouseleave', function(){
	    $(this).popover('hide');
	});

	/*$(this).hover(function(){

		var pop = $('<div />').html('<i class="fa fa-refresh fa-spin"></i> Cargando...');

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
	}); */

};



/*$.fn.popoverPerfil = function(){

	$buffer = [];

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
*/

$.fn.selectDepend = function (url, empty = false) {
	var loader_text = 'Loading...';
	var error_text = 'Error!';

	$(this).change(function(){
		_selects_depend($(this), url);
	});

	var _selects_depend = function($current, url){
		var $child = $($current.data('child'));
		var $target = $($current.data('target'));
		$.ajax({
			url : url + '/' + $current.data('child') + '/' + $current.val(),
			dataType : 'json',
			success: function(json) {
				$target.empty(); // remove old options
				if(empty !== false){
					$target.append($("<option></option>").attr("value", "").text(empty));
				}

				$.each(json, function(value,key) {
					$target.append($("<option></option>")
						 .attr("value", value).text(key));
				});
				if (typeof $child.data('child') !== "undefined") {
					_selects_depend($child, url);
				}
				$target.prop('disabled', false);
			},
			beforeSend: function() {
				block($target, loader_text);
			},
			error: function(xhr, status) {
				block($target, error_text);
				console.log(status);
			},
			//complete : function(xhr, status) {
			//  $child.prop('disabled', false);
			//}
		});
	}

	var block = function($select, message){
		$select.prop('disabled', true);
		$select.empty(); // remove old options
		$select.append($("<option></option>").attr("value", "").text(message));
	}

};

$.fn.overlay1 = function(){
	$(this).addClass('overlay1');
	$(this).append('<br/><div class="wrapper"><i class="fa fa-refresh fa-spin"></i> Cargando</div>');
}

$.fn.recargar = function(url){
	var content = $(this);
	$.ajax({
		url: url,
		dataType: 'html',
		beforeSend: function(){
			//$content.html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
			//$(content).css('position','relative');
			$(content).overlay1();
		},
		complete: function(msg){
			content.html(msg.responseText);
		},
		error: function (jqXHR, exception) {
			console.error(jqXHR);
			alert( '['+jqXHR.status+'] '+jqXHR.statusText);
			location.reload(true);
    },
	});

};

/*$.fn.btnTextAnimado = function(){
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
} */
