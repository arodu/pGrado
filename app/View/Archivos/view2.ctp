<?php echo $this->Session->flash(); ?>

<?php // debug($archivos); ?>

<?php // debug($proyecto_id); ?>

<div class="text-progress"></div>
<div id="progress" class="progress progress-xxs">
	<div class="progress-bar progress-bar-primary progress-bar-striped"></div>
</div>

<span class="fileinput-button">
	<div class="file-box">
		<div class="file">
				<!-- <span class="corner"></span>-->
				<input id="fileupload" type="file" name="file" />

				<div class="icon">
					<i class="fa fa-plus"></i>
				</div>
				<span class="text-progress text-muted"></span>

				<div class="file-name bg-blue">
					<span><strong><i class="fa fa-upload fa-fw"></i> Agregar Archivo...</strong></span>
					<br>
					<small>&nbsp;</small>
				</div>

		</div>
	</div>
</span>

<!-- <span class="fileinput-button">
	<i class="fa fa-upload"></i>
	<span>Cargar Archivos...</span>
	<input id="fileupload" type="file" name="file">
</span> -->

<?php foreach ($archivos as $archivo) { ?>

	<div class="file-box">

		<div class="file">

			<?php 
				$esImagen = $this->General->esImagen($archivo['Archivo']['nombre']);

				if( $esImagen ){
					$url = $this->Html->url(array('controller'=>'archivos','action'=>'download',$archivo['Archivo']['id']));
				}else{
					$url = $this->Html->url(array('controller'=>'archivos','action'=>'download',$archivo['Archivo']['id'],'1'));
				}
			?>

			<?php
				echo $this->Html->link('<i class="fa fa-times"></i>',
						array('controller'=>'archivos','action'=>'delete',$archivo['Archivo']['id']),
						array('class'=>'delete-file','escape'=>false)
					);
			?>

			<a href="<?php echo $url;?>" title="<?php echo $archivo['Archivo']['nombre'];?>" target="_blank">
				<span class="corner"></span>


				<?php $ft = $this->General->fileType($archivo['Archivo']['nombre']); ?>

				<?php if($esImagen){ ?>
					<div class="image" style="text-align: center;">
						<?php echo $this->Html->image(

							$this->Html->url(array('controller'=>'archivos','action'=>'miniatura',$archivo['Archivo']['id']),true)

						,array('style'=>'max-width:220px;max-height:100px;')); ?>
					</div>
				<?php }else{ ?>
					<div class="icon">
						<?php echo '<i class="fa '.$this->General->iconFileType($archivo['Archivo']['nombre']).'"></i>'; ?>
					</div>
				<?php } ?>

				<div class="file-name">
					<?php echo $archivo['Archivo']['nombre'];?>
					<br>
					<small><?php echo $this->General->byteSize($archivo['Archivo']['tamano']).' - '.$this->General->dateTimeFormatPrint($archivo['Archivo']['created']); ?></small>
				</div>
			</a>

		</div>
	</div>
<?php } ?>

<span id="cant-archivos" class="hidden"><?php echo count($archivos);?></span>

<style type="text/css">

	.file{
		position: relative;
	}

	.file .file-name{
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	.file .delete-file{
		z-index: 100;
		position: absolute;
		top: 0px;
		right: 0px;
	}

	.file .delete-file .fa{
		font-size: 1.5em;
		padding: 2px;
		background-color: #ccc;
		color: #fff;
	}

	.file .delete-file .fa:hover{
		background-color: #333;
		color: #fff;
	}

	.file .icon {
		position: relative;
	}

	.file .text-progress {
		font-size: 2.2em;
		position: absolute;
			right: 0;
			top: 0;
	}

	/* .file-name:hover{
		white-space: normal;
		overflow: inherit;
		text-overflow: inherit;
		word-wrap: break-word;
	} */
</style>

<!--

	<div class="file-box">
		<div class="file">
			<a href="#">
				<span class="corner"></span>

				<div class="image">
					<?php echo $this->Html->image('imagen.jpg'); ?>
				</div>
				<div class="file-name">
					Italy street.jpg
					<br>
					<small>Added: Jan 6, 2014</small>
				</div>
			</a>
		</div>
	</div> -->

<script type="text/javascript">

		$('.cant-archivos').text( $('#cant-archivos').text() );

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
					uploadErrors.push('Tamaño de Archivo no aceptado');
				}

				if(uploadErrors.length > 0) {
					alert(uploadErrors.join("\n"));
				} else {
					data.submit();
				}
			},

			beforeSend: function (e, data) {
				$('.fileinput-button .icon').html('<i class="fa fa-spinner fa-pulse"></i>');

				$('.fileinput-button .file-name span').html( data.originalFiles[0]['name'] );
				$('.fileinput-button .file-name small').html( '<i class="fa fa-refresh fa-spin"></i> Cargando Archivo...' );

				$('.fileinput-button #fileupload').attr('disabled','disabled');

				$('.fileinput-button .file-name').removeClass('bg-blue').addClass('bg-gray');

				// data.originalFiles[0]['name']
				//	<br>
				//<small>&nbsp;</small> 

				//$('.info-progress').removeClass('hidden');
				//$('#progress').html('<div class="progress-bar"></div>');

				//$('.info-progress .text-progress').html('<small class="text-muted"><i class="fa fa-refresh fa-spin"></i> Cargando <strong>'+data.originalFiles[0]['name']+'</strong></small>');
			},

			progressall: function (e, data) {
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#progress .progress-bar').css('width', progress+'%');
				$('.fileinput-button .text-progress').html( progress+'%' );

			},

			done: function (e, data) {
				//$('#archivosModal .modal-body').html(data.result);

				$('.box-body .tab-content #tab-archivos').html(data.result);

				//$('.info-progress .text-progress').html('<small class=""><i class="fa fa-check"></i> Cargado con exito! <strong>'+data.originalFiles[0]['name']+'</strong></small>');

				//$('#files').html($('#index-view').html());

				$('#index-view').remove();
				$('.cant-archivos').text($('#cant-archivos').text());
			}
		}).prop('disabled', !$.support.fileInput)
			.parent().addClass($.support.fileInput ? undefined : 'disabled');


		$('.file-box a.delete-file').click(function(){

			if(confirm('¿Esta seguro que desea elimiar este archivo?')){

				var link = $(this);

				$.ajax({
					url: link.attr('href'),
					type: 'post',
					beforeSend: function(){
						link.closest('.file-box').hide(600);
					},
					complete: function(msg){
						//$('#files').html(data);
						//link.closest('.modal-body').html(msg.responseText);
						$('.box-body .tab-content #tab-archivos').html(msg.responseText);

						//$('#files').html($('#index-view').html());

						//$('#index-view').remove();
						$('.cant-archivos').text($('#cant-archivos').text());
					}
				});

			}

			return false;
		});


</script>