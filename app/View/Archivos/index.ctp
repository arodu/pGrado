<?php echo $this->Session->flash(); ?>
<div class="text-progress"></div>
<div id="progress" class="progress progress-xxs">
	<div class="progress-bar progress-bar-primary progress-bar-striped"></div>
</div>

<?php if(!$proyecto_bloqueado): ?>
	<div class="file-box">
		<div class="file">
			<div class="fileinput-button">
				<input id="fileupload" type="file" name="file" />
				<div class="icon">
					<i class="fa fa-plus"></i>
				</div>
				<span class="text-progress text-muted"></span>
				<div class="file-name">
					<span><strong><i class="fa fa-upload fa-fw"></i> Agregar Archivo...</strong></span>
					<br>
					<small>&nbsp;</small>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

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
				if(!$proyecto_bloqueado){
					echo $this->Html->link('<i class="fa fa-times"></i>',
							array('controller'=>'archivos','action'=>'delete',$archivo['Archivo']['id']),
							array('class'=>'delete-file file-modal-link','escape'=>false)
						);
				}
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


<!--
<div class="fileinput-button">
	<div class="file-box">
		<div class="file">
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
</div>
-->

<span id="cant-archivos" class="hidden"><?php echo count($archivos);?></span>


<script type="text/javascript">
	$('.cant-archivos').text( $('#cant-archivos').text() );

	'use strict';

	var url = "<?php echo $this->Html->url(array('controller'=>'archivos','action'=>'add',$proyecto_id));?>";
	var max_filesize = <?php echo $this->General->return_bytes(ini_get('upload_max_filesize')) ?>

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

			if(data.originalFiles[0]['size'] > max_filesize) {
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
			},

			progressall: function (e, data) {
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#progress .progress-bar').css('width', progress+'%');
				$('.fileinput-button .text-progress').html( progress+'%' );

			},

			fail: function(e, data){
				alert("Error Cargando el Archivo!");
			},

			done: function (e, data) {
				$('.box-body .tab-content #tab-archivos').html(data.result);
				$('#index-view').remove();
				$('.cant-archivos').text($('#cant-archivos').text());
			}
		})
		.prop('disabled', !$.support.fileInput)
		.parent().addClass($.support.fileInput ? undefined : 'disabled');


		// ------------------
		$('.file-modal-link').modalLink('#generalModal');

</script>
