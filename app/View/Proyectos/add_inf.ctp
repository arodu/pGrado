<div class="row">
	<div class="col-sm-9">
		<div class="box">
			<?php echo $this->Form->create('Proyecto',array('inputDefaults'=>array('div'=>array('class'=>'form-group'),'class'=>'form-control'))); ?>
			<div class="box-body">
				<?php

					echo $this->Form->input('Revision.titulo',array('label'=>'Título','div'=>array('class'=>'form-group well well-sm')));

					echo $this->Form->input('Proyecto.tema',array('label'=>'Tema'));
					echo $this->Form->input('Proyecto.programa_id',array('label'=>__("Programa"),'empty'=>'-- seleccione --'));
					echo $this->Form->input('Proyecto.categoria_id',array('label'=>__("Categoría"),'empty'=>'-- seleccione --'));
					echo $this->Form->input('Proyecto.grupo_id',array('empty'=>'-- seleccione --'));

					

					echo $this->Form->input('Revision.resumen',array('div'=>array('class'=>'form-group well well-sm')));
					echo $this->Form->input('Revision.objetivos',array('label'=>'Objetivo General y Específicos','div'=>array('class'=>'form-group well well-sm')));
					echo $this->Form->input('Revision.metodologia_desarrollo',array('label'=>'Metodología de Desarrollo del Producto Tecnológico','between'=>' (Nombre, Autor y Año)','div'=>array('class'=>'form-group well well-sm')));
					echo $this->Form->input('Revision.observaciones',array('div'=>array('class'=>'form-group well well-sm')));


					//echo $this->Form->input('usuario_id');
					//echo $this->Form->input('Revision.metadata');
				?>
			</div>

			<div class="box-footer">
				<?php echo $this->Form->button('<i class="fa fa-save fa-fw"></i> Guardar Propuesta',array('type'=>'submit','class'=>'btn btn-primary',));?>

				<?php echo $this->Html->link('<i class="fa fa-reply fa-fw"></i> Cancelar',array('controller'=>'proyectos','action'=>'index'),array('class'=>'btn btn-default','escape'=>false)); ?>
			</div>
			<?php echo $this->Form->end(); ?>




		</div>
	</div>

	<?php echo $this->element('ayuda/main',array('ruta'=>'proyectos.add')); ?>

</div>

<?php
		echo $this->Html->css('bootstrap-wysihtml5/bootstrap3-wysihtml5.min',array('inline'=>false));
		echo $this->Html->script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',array('inline'=>false));
?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
	$(function(){
		$("textarea").wysihtml5();
	});
<?php $this->Html->scriptEnd(); ?>