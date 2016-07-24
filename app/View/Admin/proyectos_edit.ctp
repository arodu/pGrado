<?php
	echo $this->element('commons/header_view', array(
		'title'=>'Proyecto',
		'subtitle'=>'Editar Datos del Proyecto',
		'breadcrumb'=>array(
			__('Listado Proyectos')=>array('controller'=>'admin','action'=>'proyectos_index'),
			__('Ver Proyecto')=>array('controller'=>'proyectos','action'=>'view',$this->bsForm->value('Proyecto.id')),
			__('Editar')=>true,
		)
	));
?>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>


	<?php echo $this->bsForm->create('Proyecto',array('inputDefaults'=>array('div'=>array('class'=>'form-group col-sm-6')))); ?>
	<?php //echo $this->bsForm->create('Proyecto'); ?>
	<div class="row">
		<div class="col-sm-9">
			<div class="box box-primary">
				<div class="box-header">
					<h4><?php echo $proyecto_view['Revision']['titulo']; ?></h4>
					<ul class="list-unstyled">
						<?php foreach ($proyecto_view['Autor'] as $autor): ?>
							<li>
								<?php
									if($autor['TipoAutor']['code'] != 'estudiante'){
										echo '<strong>'.$autor['TipoAutor']['nombre'].': </strong>';
									}
									echo $autor['Usuario']['nombre_completo'];
								?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="box-body">
					<div class="row">
						<?php
							echo $this->bsForm->input('Proyecto.id');
							echo $this->bsForm->input('Proyecto.tema',array('div'=>array('class'=>'form-group col-sm-12')));

							echo $this->bsForm->input('Proyecto.programa_id',array('empty'=>'--seleccione--','id'=>'programa', 'class'=>'sd_programa form-control', 'data-child'=>'categorias', 'data-target'=>'#categorias'));
							echo $this->bsForm->input('Proyecto.categoria_id',array('empty'=>'--seleccione--','id'=>'categorias', 'class'=>'sd_programa form-control'));

							echo $this->bsForm->input('Proyecto.grupo_id',array('empty'=>'--seleccione--'));

							echo $this->bsForm->input('Proyecto.sede_id',array('empty'=>'--seleccione--'));

							echo $this->bsForm->input('Proyecto.fase_id',array('empty'=>'--seleccione--','id'=>'fases', 'class'=>'sd_fases form-control', 'data-child'=>'estados', 'data-target'=>'#estados'));
							echo $this->bsForm->input('Proyecto.estado_id',array('empty'=>'--seleccione--','id'=>'estados', 'class'=>'sd_fases form-control'));
						?>

						<div class="form-group col-sm-6 bs-switch">
							<label for="ProyectoActivo">Proyecto Activado</label>
							<?php echo $this->Form->checkbox('Proyecto.activo', array('id'=>'ProyectoActivo')); ?>
						</div>
						<div class="form-group col-sm-6 bs-switch">
							<label for="ProyectoBloqueado">Proyecto Bloqueado</label>
							<?php echo $this->Form->checkbox('Proyecto.bloqueado', array('id'=>'ProyectoBloqueado')); ?>
						</div>

					</div>
				</div>

				<div class="box-footer">
					<?php echo $this->bsForm->submit('Guardar',array('class'=>'btn btn-primary','div'=>false)); ?>
					<?php echo $this->Html->link('Cancelar',array('controller'=>'proyectos','action'=>'view',$this->bsForm->value('id')),array('class'=>'btn btn-default')); ?>
				</div>

			</div>

		</div>
	</div>

	<?php echo $this->bsForm->end(); ?>


	<?php $this->Html->scriptStart(array('inline' => false)); ?>
			$('.bs-switch input[type=checkbox]').bootstrapSwitch({
				onText: "Si",
				offText: "No",
			});
			$('.sd_programa').selectDepend("<?php echo $this->Html->url(array('controller'=>'proyectos', 'action'=>'selectlist_programas')); ?>","-- seleccione --");
			$('.sd_fases').selectDepend("<?php echo $this->Html->url(array('controller'=>'proyectos', 'action'=>'selectlist_fases')); ?>","-- seleccione --");
	<?php $this->Html->scriptEnd(); ?>
</section><!-- /.content -->
