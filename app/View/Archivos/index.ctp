<?php echo $this->Session->flash(); ?>

<div class="index archivos">

	<?php if(empty($archivos)){ ?>
			<ul class="list-group">
				<li class="list-group-item info-progress">
					<div class="text-progress"><span class="text-muted">No se encontraron archivos</span></div>
					<div id="progress" class="progress">
						<div class="progress-bar"></div>
					</div>
				</li>
			</ul>

	<?php }else{ ?>
		<ul class="list-group">

			<?php foreach ($archivos as $archivo) { ?>
				<li class="list-group-item"><?php
						echo $this->Html->link(
								'<i class="fa fa-file-o"></i> '.$archivo['Archivo']['nombre'].' - '.$this->General->byteSize($archivo['Archivo']['tamano']).' - '.$this->General->dateTimeFormatPrint($archivo['Archivo']['created']),
								array('controller'=>'archivos','action'=>'download',$archivo['Archivo']['id'],true),
								array('escape'=>false)
							);

						echo $this->Html->link('<i class="fa fa-trash"></i>', array('controller'=>'archivos','action' => 'delete', $archivo['Archivo']['id']), array('class'=>'close','escape'=>false));

					?>

				</li>
			<?php } ?>

			<li class="list-group-item info-progress hidden">
				<div class="text-progress"></div>
				<div id="progress" class="progress">
					<div class="progress-bar"></div>
				</div>
			</li>


		</ul>
	<?php } ?>

</div>

<div class="clearfix"></div>


<div id="index-view" class="hidden">
	<?php echo $this->requestAction(array('controller'=>'archivos','action'=>'view',$proyecto_id,'admin'=>false),array('return')); ?>
</div>


<script type="text/javascript">
	$(function () {
		'use strict';

		var url = "<?php echo $this->Html->url(array('controller'=>'archivos','action'=>'add',$proyecto_id));?>";


		$('#fileupload').fileupload({

			url: url,
			dataType: 'html', //dataType: 'json',
			type: 'post',

			add: function(e, data) {
				var uploadErrors = [];
				var acceptFileTypes = /(\.|\/)(gif|jpeg|jpg|png|pdf|doc|docx|odt|txt)$/i;

				if(data.originalFiles[0]['name'].length && !acceptFileTypes.test(data.originalFiles[0]['name'])) {
					uploadErrors.push('Formato de Archivo no aceptado');
				}

				if(data.originalFiles[0]['size'] > 5000000) {
					uploadErrors.push('Filesize is too big');
				}
				if(uploadErrors.length > 0) {
					alert(uploadErrors.join("\n"));
				} else {
					data.submit();
				}
			},

			beforeSend: function (e, data) {
				$('.info-progress').removeClass('hidden');
				$('#progress').html('<div class="progress-bar"></div>');

				$('.info-progress .text-progress').html('<small class="text-muted"><i class="fa fa-refresh fa-spin"></i> Cargando <strong>'+data.originalFiles[0]['name']+'</strong></small>');

			},

			progressall: function (e, data) {
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#progress .progress-bar').css('width',progress + '%').text(progress + '%');
			},

			done: function (e, data) {
				$('#archivosModal .modal-body').html(data.result);

				$('.info-progress .text-progress').html('<small class=""><i class="fa fa-check"></i> Cargado con exito! <strong>'+data.originalFiles[0]['name']+'</strong></small>');

				$('#files').html($('#index-view').html());
				$('#index-view').remove();
				$('.cant-archivos').text($('#cant-archivos').text());

			}

		}).prop('disabled', !$.support.fileInput)
			.parent().addClass($.support.fileInput ? undefined : 'disabled');


		$('.index.archivos a.close').click(function(){

			if(confirm('¿Esta seguro que desea elimiar este archivo?')){

				var link = $(this);

				$.ajax({
					url: link.attr('href'),
					type: 'post',
					beforeSend: function(){
						link.closest('.list-group-item').slideUp();
					},
					complete: function(msg){
						//$('#files').html(data);
						link.closest('.modal-body').html(msg.responseText);
						$('#files').html($('#index-view').html());
						$('#index-view').remove();
						$('.cant-archivos').text($('#cant-archivos').text());
					}
				});

			}

			return false;
		});

	});
</script>


