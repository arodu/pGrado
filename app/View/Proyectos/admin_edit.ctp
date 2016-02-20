<?php // ----------------- HEADER ------------------- ?> 
	<?php
		$this->assign('title-page', 'Proyecto <small>Editar Datos del Proyecto</small>');
	?>


<?php echo $this->bsForm->create('Proyecto',array('inputDefaults'=>array('div'=>array('class'=>'form-group col-sm-6')))); ?>
<?php //echo $this->bsForm->create('Proyecto'); ?>
<div class="row">
	<div class="col-sm-9">
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
				<?php
					echo $this->bsForm->input('id');
					echo $this->bsForm->input('tema',array('div'=>array('class'=>'form-group col-sm-12')));
					echo $this->bsForm->input('programa_id',array('empty'=>'--seleccione--','id'=>'target_programa'));
					echo $this->bsForm->input('categoria_id',array('empty'=>'--seleccione--','id'=>'target_categoria'));

					echo $this->bsForm->input('grupo_id',array('empty'=>'--seleccione--'));

					echo $this->bsForm->input('sede_id',array('empty'=>'--seleccione--'));

					echo $this->bsForm->input('fase_id',array('empty'=>'--seleccione--','id'=>'target_fase'));
					echo $this->bsForm->input('Proyecto.estado_id',array('empty'=>'--seleccione--','id'=>'target_estado'));

					echo $this->bsForm->input('activo',array('label'=>'Activar Proyecto'));
				?>
				</div>
			</div>

			<div class="box-footer">
				<?php echo $this->bsForm->submit('Guardar',array('class'=>'btn btn-primary','div'=>false)); ?>
				<?php echo $this->bsForm->reset('Reset'); ?>
				<?php echo $this->Html->link('Cancelar',array('action'=>'view',$this->bsForm->value('id')),array('class'=>'btn btn-default')); ?>
			</div>

		</div>

	</div>
</div>

<?php echo $this->bsForm->end(); ?>


<?php $this->Html->scriptStart(array('inline' => false)); ?>

	$(function(){

		$('#target_fase select').change(function(){
			var ruta = "<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'estados_list','admin'=>true));?>/"+$(this).val();
			$( "#target_estado" ).load(ruta);
		});

		$('#target_programa select').change(function(){
			var ruta = "<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'getCategoria','admin'=>false)).'/';?>"+$(this).val();
			$( "#target_categoria" ).load(ruta);
		});

	});
<?php $this->Html->scriptEnd(); ?>