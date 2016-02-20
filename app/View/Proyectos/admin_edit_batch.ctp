<?php echo $this->Form->create('Proyecto',array('inputDefaults'=>array('required'=>true,'empty'=>'--seleccione--','class'=>'form-control','div'=>array('class'=>'form-group')))); ?>

<div class="row">
	<div class="col-sm-9">
		<div class="box box-danger">
			<div class="box-body">

				<div class="container-fluid">

					<div class="row">

						<div id="trans-de" class="col-sm-6 well-sm no-shadow">

							<fieldset>
								<legend>Seleccionar Proyectos:</legend>
								<?php

									echo $this->Form->input('Proyecto.programa_id',array('empty'=>'--seleccione--','div'=>array('id'=>'target_programa','class'=>'form-group')));

									echo $this->Form->input('Proyecto.categoria_id',array('empty'=>'--seleccione--','div'=>array('id'=>'target_categoria','class'=>'form-group')));

									echo $this->Form->input('Proyecto.grupo_id',array('empty'=>'--seleccione--','div'=>array('class'=>'form-group')));

									echo $this->Form->input('Proyecto.sede_id',array('empty'=>'--seleccione--','div'=>array('class'=>'form-group')));

									echo $this->Form->input('Proyecto.activo',array('options'=>array(1=>'Activos',0=>'Inactivos'),'empty'=>'--seleccione--','label'=>'Activar Proyecto','div'=>array('class'=>'form-group')));

									echo $this->Form->input('Proyecto.fase_id',array('empty'=>'--seleccione--','div'=>array('id'=>'target_fase','class'=>'form-group')));

									echo $this->Form->input('Proyecto.estado_id',array('empty'=>'--seleccione--','div'=>array('id'=>'target_estado','class'=>'form-group')));
								?>
							</fieldset>
						</div>

						<div id="trans-a" class="col-sm-6 well well-sm no-shadow">
							<fieldset>
								<legend>Transformar a:</legend>
								<?php
									//echo $this->Form->input('id');
									//echo $this->Form->input('tema');

									$checkbox = '<span class="input-group-addon"><input type="checkbox"></span>';

									?>

									<div class="form-group">
										<?php echo $this->Form->label('Trans.programa_id'); ?>
										<?php echo $this->Form->input('Trans.programa_id',array(
													'div'=>array('class'=>'input-group required '),
													'before'=>$checkbox,
													'label'=>false,
												)); ?>
									</div>

									<div class="form-group">
										<?php echo $this->Form->label('Trans.categoria_id'); ?>
										<?php echo $this->Form->input('Trans.categoria_id',array(
													'div'=>array('class'=>'input-group'),
													'before'=>$checkbox,
													'label'=>false,
												)); ?>
									</div>

									<div class="form-group">
										<?php echo $this->Form->label('Trans.sede_id'); ?>
										<?php echo $this->Form->input('Trans.sede_id',array(
													'div'=>array('class'=>'input-group'),
													'before'=>$checkbox,
													'label'=>false,
												)); ?>
									</div>

									<div class="form-group">
										<?php echo $this->Form->label('Trans.activo','Activación de Proyecto'); ?>
										<?php echo $this->Form->input('Trans.activo',array(
													'options'=>array(1=>'Activo',0=>'Inactivo'),
													'div'=>array('class'=>'input-group'),
													'before'=>$checkbox,
													'label'=>false,
												)); ?>
									</div>

									<div class="form-group">
										<?php echo $this->Form->label('Trans.fase_id'); ?>
										<?php echo $this->Form->input('Trans.fase_id',array(
													'div'=>array('class'=>'input-group'),
													'before'=>$checkbox,
													'label'=>false,
												)); ?>
									</div>

									<div class="form-group">
										<?php echo $this->Form->label('Trans..estado_id'); ?>
										<?php echo $this->Form->input('Trans..estado_id',array(
													'div'=>array('class'=>'input-group'),
													'before'=>$checkbox,
													'label'=>false,
												)); ?>
									</div>

							</fieldset>
						</div>
					</div>


					

				</div>
			</div>

			<div class="box-footer">
				<?php echo $this->Form->submit('Listar Proyectos',array('class'=>'btn btn-default', 'div'=>false)); ?>

				<?php echo $this->Form->reset('Reset',array('class'=>'btn btn-default', 'div'=>false)); ?>
				<?php echo $this->Html->link('Cancelar',array('action'=>'view',$this->Form->value('id')),array('class'=>'btn btn-default')); ?>
			</div>

		</div>
	</div>
	<div class="col-sm-3">
		<div class="box box-danger box-solid">
			<div class="box-header">
				Esta Accion es sumamente peligrosa
			</div>
			<div class="box-body">
				


				<?php echo $this->Form->input('Usuario.password_check',array(
							'label'=>'Chequear contraseña de Usuario',
							'type'=>'password',
							'class'=>'form-control',
							'div'=>array('class'=>'form-group required'),
						)); ?>

				
			</div>
			<div class="box-footer">
				<?php echo $this->Form->submit('Ejecutar Cambios',array('class'=>'btn btn-primary', 'div'=>false)); ?>
			</div>
		</div>
	</div>
</div>

<?php echo $this->Form->end(); ?>


<?php $this->Html->scriptStart(array('inline' => false)); ?>

	$(function(){

		$divTransformar = $('#trans-a');


		$('#target_fase select').change(function(){
			var ruta = "<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'estados_list','admin'=>true));?>/"+$(this).val();
			$( "#target_estado" ).load(ruta);
		});

		$('#target_programa select').change(function(){
			var ruta = "<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'getCategoria','admin'=>false)).'/';?>"+$(this).val();
			$( "#target_categoria" ).load(ruta);
		});


		$divTransformar.find('select').each(function(){
			$(this).attr('disabled',true);
		});

		$divTransformar.find('input[type=checkbox]').on('click',function(){
			var $checkbox = $(this);
			var $select = $checkbox.closest('.input-group').find('select');
			if ( $checkbox.is(':checked') ) {
				$select.attr('disabled',false);
			}else{
				$select.attr('disabled',true);
			}
		});


	});
<?php $this->Html->scriptEnd(); ?>