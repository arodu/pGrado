<?php // debug($archivos); 

	echo $this->Html->link('Generar Nuevo Backup', array('controller'=>'backup','action'=>'crear'),array('class'=>'btn btn-primary'));

	echo '<hr/>';
?>
	<table class="table">
		<tr>
			<th>Archivo</th>
			<th>Tamaño</th>
			<th>Fecha</th>
			<th colspan="2">Acciones</th>
		</tr>
		<?php foreach ($archivos as $archivo) {
					$size = round( $archivo['filesize'] / 1000 , 2).'kB';
					$text = $archivo['filename'].' - '.$size.' - '.date('d/m/Y H:m:s', $archivo['lastChange']);
						?>
					<tr>
						<td><?php echo $archivo['filename'];?></td>
						<td><?php echo $size;?></td>
						<td><?php echo date('d/m/Y H:m:s', $archivo['lastChange']);?></td>
						<td>
							<div class="btn-group">
								<?php
								echo $this->Html->link('<i class="fa fa-align-left fa-fw"></i> Ver', array('controller'=>'backup','action'=>'view',$archivo['basename']),array('class'=>'backup-wiew btn btn-default btn-sm','data-title'=>$text,'escape'=>false));

								echo $this->Html->link('<i class="fa fa-download fa-fw"></i> Descargar', array('controller'=>'backup','action'=>'download',$archivo['basename']),array('class'=>'btn btn-default btn-sm','escape'=>false));
								?>
							</div>
						</td>
						<td>
							<div class="btn-group">
								<?php

									echo $this->Html->link('<i class="fa fa-database fa-fw"></i> Restaurar','#',
										array(	'class'=>'btn btn-default btn-warning btn-restaurar btn-sm',
												'data-title'=>$text,
												'data-archivo'=>$archivo['basename'],
												'escape'=>false
											)
										);

									echo $this->Html->link('<i class="fa fa-times fa-fw"></i> Eliminar',"#",
										array(	'class'=>'btn btn-default btn-danger btn-sm',
												'data-title'=>$text,
												'data-archivo'=>$archivo['basename'],
												'escape'=>false
											)
										);
								?>
							</div>
						</td>
					</tr>
		<?php } ?>
	</table>

	<div class="modal fade" id="backupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">#title#</h4>
				</div>
				<div class="modal-body">
					<i class="fa fa-refresh fa-spin"></i> Cargando...
				</div>
				<div class="modal-footer">

					<?php // echo $this->Html->link('<i class="fa fa-download fa-fw"></i>Descargar', array('controller'=>'backup','action'=>'download',$archivo['basename']),array('class'=>'btn btn-primary btn-download pull-left','escape'=>false)); ?>
					<a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="backupModalRestaurar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">#title#</h4>
				</div>

				<?php echo $this->Form->create('MysqlBackup',array('url'=>array('controller'=>'backup','action'=>'recrear'))); ?>
				<div class="modal-body">
					<?php 	echo $this->Form->input('Usuario.password_check',array(
								'label'=>'Verificación de Contraseña: '.$userInfo['nombre'],
								'type'=>'password',
								'class'=>'form-control required',
								'required'=>true,
							));

							echo $this->Form->input('Backup.archivo',array(
									'id'=>'input-archivo',
									'type'=>'hidden',
									'value'=>'',
								));
					?>


				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</a>
					<?php echo $this->Form->submit('Restaurar Base de Datos',array('class'=>'btn-submit btn btn-primary pull-left', 'escape'=>false)); ?>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>


<?php $this->Html->scriptStart(array('inline' => false)); ?>

	var $bmView = $('#backupModal');
	var $bmRestore = $('#backupModalRestaurar');
	var $restoreForm = $bmRestore.find('form');


	var $bodyModal = $bmView.find('.modal-body');
	var $btnDownload = $bmView.find('.btn-download');

	$bmView.modal({
		show: false
	});

	$bmRestore.modal({
		show: false
	});

	$('.backup-wiew').on('click',function(){

		var $btnView = $(this);
		
		$bmView.find('.modal-title').text( $btnView.data('title') );

		$btnDownload.attr('href','#');

		$.ajax({
			url: $btnView.attr('href'),
			dataType: "html",
			beforeSend: function(){
				$bodyModal.html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
			},
			success: function(msg){
				$bodyModal.html(msg);
			}
		});
		$bmView.modal('show');
		return false;
	});

	$bmView.on('hidden.bs.modal', function (e) {
		$bodyModal.html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
		$btnDownload.attr('href','#');
	})


	$('.btn-restaurar').on('click',function(){
		var $btnRestore = $(this);
		$bmRestore.find('form');

		$restoreForm.find('#input-archivo').val( $btnRestore.data('archivo') );

		$bmRestore.find('.modal-title').text( $btnRestore.data('title') );

		$bmRestore.modal('show');
		
		return false;
	});

	$restoreForm.on('submit',function(){
		$btnSubmit = $(this).find('.btn-submit');
		$btnSubmit.val('Cargando...').attr('disabled',true);
	});

<?php $this->Html->scriptEnd(); ?>