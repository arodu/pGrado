<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Proyectos <small>Movimientos</small></h1>
	<?php echo $this->General->breadcrumb(array(
		__('Listado Proyectos')=>array('controller'=>'admin','action'=>'proyectos_index'),
		__('Movimientos')=>true,
	)); ?>
</section>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h4>Seleccionar Proyectos</h4>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<?php echo $this->bsForm->create('Proyecto'); ?>
						<div class="row">
							<div class="col-md-6"><?php echo $this->bsForm->input('Proyecto.programa_id', array('id'=>'programa', 'class'=>'sd_programa form-control', 'data-child'=>'categorias', 'data-target'=>'#categorias', 'required'=>false, 'empty'=>' -- Seleccione --')); ?></div>
							<div class="col-md-6"><?php echo $this->bsForm->input('Proyecto.categoria_id', array('id'=>'categorias', 'required'=>false, 'empty'=>' -- Seleccione --')); ?></div>
						</div>
						<div class="row">
							<div class="col-md-6"><?php echo $this->bsForm->input('Proyecto.grupo_id', array('required'=>false, 'empty'=>' -- Seleccione --')); ?></div>
							<div class="col-md-6"><?php echo $this->bsForm->input('Proyecto.sede_id', array('required'=>false, 'empty'=>' -- Seleccione --')); ?></div>
						</div>
						<div class="row">
							<div class="col-md-6"><?php echo $this->bsForm->input('Proyecto.activo', array('required'=>false, 'empty'=>' -- Seleccione --', 'options'=>array('1'=>'Activos', '0'=>'Inactivos'))); ?></div>
							<div class="col-md-6"><?php echo $this->bsForm->input('Proyecto.bloqueado', array('required'=>false, 'empty'=>' -- Seleccione --', 'options'=>array('1'=>'Bloqueados', '0'=>'Desbloqueados'))); ?></div>
						</div>
						<div class="row">
							<div class="col-md-6"><?php echo $this->bsForm->input('Proyecto.fase_id',array('id'=>'fases', 'class'=>'sd_fases form-control', 'data-child'=>'estados', 'data-target'=>'#estados', 'required'=>false, 'empty'=>' -- Seleccione --')); ?></div>
							<div class="col-md-6"><?php echo $this->bsForm->input('Proyecto.estado_id',array('id'=>'estados', 'required'=>false, 'empty'=>' -- Seleccione --')); ?></div>
						</div>
						<hr/>
							<?php echo $this->Form->submit('Buscar',array('class'=>'btn btn-primary', 'div'=>false)); ?>
							<?php echo $this->Form->reset('Reset',array('class'=>'btn btn-default', 'div'=>false)); ?>
							<?php echo $this->Html->link('Cancelar',array('controller'=>'admin','action'=>'proyectos_index'),array('class'=>'btn btn-default')); ?>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>

	<?php if(isset($proyectos)): ?>

		<?php echo $this->bsForm->create('Admin', array('url'=>array('controller'=>'admin', 'action'=>'proyectos_move_trans'))); ?>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-warning">
						<div class="box-header">
							<h4><input type="checkbox" name="name" value="" class="checkbox_main" id="checkbox_main" /><label class="titulo" for="checkbox_main">Seleccionar Proyectos</h4>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body move	">

							<?php if(!empty($proyectos)): ?>
								<?php foreach ($proyectos as $proyecto): ?>
									<div class="proyecto callout callout-gray">
										<div class="row">
											<div class="col-md-8">
												<input type="checkbox" name="data[Proyecto][id][<?php echo $proyecto['Proyecto']['id']; ?>]" value="true" class="checkbox" id="ck-<?php echo $proyecto['Proyecto']['id']; ?>" />
												<div class="datos">
													<label class="titulo" for="ck-<?php echo $proyecto['Proyecto']['id']; ?>">
														<?php echo $proyecto['Revision'][0]['titulo']; ?>
													</label>
													<div class="info">
														<?php echo $proyecto['Programa']['nombre']; ?><br/>
														<?php echo $proyecto['Categoria']['nombre']; ?><br/>
														<?php echo $proyecto['Grupo']['nombre']; ?><br/>
														<?php echo $proyecto['Sede']['nombre']; ?><br/>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<ul class="list-unstyled autores">
													<li>Autor Uno</li>
													<li>Autor Dos</li>
													<li><strong>Tutor Academico: </strong>Autor Cuatro</li>
													<li><strong>Tutor Metodologico: </strong>Autor Tres</li>
												</ul>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 etiquetas">
												<?php echo ( $proyecto['Proyecto']['bloqueado'] ? '<span class="label label-danger">Bloqueado</span>' : ''); ?>
												<span class="label label-default"><?php echo ( $proyecto['Proyecto']['activo'] ? 'Activo' : 'Inactivo' ); ?></span>
												<span class="label label-default"><?php echo $proyecto['Fase']['nombre']; ?></span>
												<span class="label label-default"><?php echo $proyecto['Estado']['nombre']; ?></span>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								<?php // debug($proyectos); ?>
							<?php else: ?>
								<div class="callout callout-danger">
									No se han encontrado Proyectos con esas caracteristicas.
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<div class="box box-warning">
						<div class="box-header">
							<h4>Transformar a:</h4>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body #trans-a">

							<?php $checkbox = '<span class="input-group-addon"><input type="checkbox"></span>'; ?>


								<div class="row">
									<div class="col-md-6">
										<div class="form-group to-trans">
											<?php echo $this->Form->label('Trans.programa_id'); ?>
											<?php echo $this->Form->input('Trans.programa_id',array(
														'class'=>'form-control',
														'div'=>array('class'=>'input-group required '),
														'before'=>$checkbox,
														'label'=>false,
													)); ?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group to-trans">
											<?php echo $this->Form->label('Trans.categoria_id'); ?>
											<?php echo $this->Form->input('Trans.categoria_id',array(
														'class'=>'form-control',
														'div'=>array('class'=>'input-group'),
														'before'=>$checkbox,
														'label'=>false,
													)); ?>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group to-trans">
											<?php echo $this->Form->label('Trans.grupo_id'); ?>
											<?php echo $this->Form->input('Trans.grupo_id',array(
														'class'=>'form-control',
														'div'=>array('class'=>'input-group'),
														'before'=>$checkbox,
														'label'=>false,
													)); ?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group to-trans">
											<?php echo $this->Form->label('Trans.sede_id'); ?>
											<?php echo $this->Form->input('Trans.sede_id',array(
														'class'=>'form-control',
														'div'=>array('class'=>'input-group'),
														'before'=>$checkbox,
														'label'=>false,
													)); ?>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group to-trans">
											<?php echo $this->Form->label('Trans.activo','Activación de Proyecto'); ?>
											<?php echo $this->Form->input('Trans.activo',array(
														'class'=>'form-control',
														'options'=>array('1'=>'Activar', '0'=>'Inactivar'),
														'div'=>array('class'=>'input-group'),
														'before'=>$checkbox,
														'label'=>false,
													)); ?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group to-trans">
											<?php echo $this->Form->label('Trans.bloqueado','Activación de Proyecto'); ?>
											<?php echo $this->Form->input('Trans.bloqueado',array(
														'class'=>'form-control',
														'options'=>array('1'=>'Bloquear', '0'=>'Desbloquear'),
														'div'=>array('class'=>'input-group'),
														'before'=>$checkbox,
														'label'=>false,
													)); ?>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group to-trans">
											<?php echo $this->Form->label('Trans.fase_id'); ?>
											<?php echo $this->Form->input('Trans.fase_id',array(
														'class'=>'form-control',
														'div'=>array('class'=>'input-group'),
														'before'=>$checkbox,
														'label'=>false,
													)); ?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group to-trans">
											<?php echo $this->Form->label('Trans.estado_id'); ?>
											<?php echo $this->Form->input('Trans.estado_id',array(
														'class'=>'form-control',
														'div'=>array('class'=>'input-group'),
														'before'=>$checkbox,
														'label'=>false,
													)); ?>
										</div>
									</div>
								</div>

								<hr/>

								<?php echo $this->Form->input('Guardar Cambios', array('type'=>'submit')); ?>

						</div>
					</div>
				</div>
			</div>

		<?php echo $this->bsForm->end(); ?>

	<?php endif; ?>

	<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>
		$('.sd_programa').selectDepend("<?php echo $this->Html->url(array('controller'=>'proyectos', 'action'=>'selectlist_programas')); ?>","-- Seleccione --");
		$('.sd_fases').selectDepend("<?php echo $this->Html->url(array('controller'=>'proyectos', 'action'=>'selectlist_fases')); ?>","-- Seleccione --");

		$('.checkbox').change(function(){
			var checkbox = $(this);
			var call = $(this).closest('.callout');
			if(checkbox.is(":checked")) {
				call.removeClass('callout-gray');
				call.addClass('callout-success');
			} else {
				call.removeClass('callout-success');
				call.addClass('callout-gray');
			}
		});

		$('.checkbox_main').change(function(){
			$('.checkbox').prop('checked', $(this).is(':checked') ).trigger("change");
		});
		//$('.myCheckbox').is(':checked');


		//////////////////////////////////////
		$('.to-trans select').each(function(){
			$(this).prop('disabled',true);
		});

		$('.to-trans input[type=checkbox]').on('click',function(){
			var $checkbox = $(this);
			var $select = $checkbox.closest('.input-group').find('select');
			if ( $checkbox.is(':checked') ) {
				$select.prop('disabled',false);
			}else{
				$select.prop('disabled',true);
			}
		});

	<?php echo $this->Html->scriptEnd(); ?>



<?php /*
<hr/>

	<?php echo $this->Form->create('Proyecto',array('inputDefaults'=>array('required'=>true,'empty'=>'--seleccione--','class'=>'form-control','div'=>array('class'=>'form-group')))); ?>

	<div class="row">
		<div class="col-xs-12">
			<div class="box box-danger">
				<div class="box-body">

					<div class="container-fluid">

						<div class="row">

							<div class="col-sm-6 well-sm no-shadow">

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

	</div>

	<?php echo $this->Form->end(); ?>

</section><!-- /.content -->


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


*/ ?>
