<?php // ----------------- HEADER ------------------- ?>
	<?php
		$this->assign('title-page', 'Proyecto <small>Editar Datos del Proyecto</small>');
	?>


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

					echo $this->bsForm->input('Proyecto.activo',array('label'=>'Activar Proyecto'));

					echo $this->bsForm->input('Proyecto.bloqueado',array('label'=>'Bloquear Proyecto'));
				?>
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

		$('.sd_programa').selectDepend("<?php echo $this->Html->url(array('controller'=>'proyectos', 'action'=>'selectlist_programas')); ?>","-- seleccione --");
		$('.sd_fases').selectDepend("<?php echo $this->Html->url(array('controller'=>'proyectos', 'action'=>'selectlist_fases')); ?>","-- seleccione --");


		/*
		$('#target_fase select').change(function(){
			var ruta = "<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'estados_list','admin'=>true));?>/"+$(this).val();
			$( "#target_estado" ).load(ruta);
		});

		$('#target_programa select').change(function(){
			var ruta = "<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'getCategoria','admin'=>false)).'/';?>"+$(this).val();
			$( "#target_categoria" ).load(ruta);
		}); */

<?php $this->Html->scriptEnd(); ?>
