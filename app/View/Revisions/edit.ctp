<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Proyecto <small>Editar Revisión</small></h1>
	<?php echo $this->General->breadcrumb(array(
		__('Proyectos')=>array('controller'=>'proyectos','action'=>'index'),
		__('Ver Proyecto')=>array('controller'=>'proyectos','action'=>'view',$proyecto_id),
		__('Editar Revisión')=>true,
	)); ?>
</section>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

	<div class="row">
		<div class="col-sm-9">
			<div class="revisions form box">
			<?php echo $this->Form->create('Revision',array('inputDefaults'=>array('div'=>array('class'=>'form-group well well-sm'),'class'=>'form-control'))); ?>
				<div class="box-body">
						<?php
			echo $this->Form->input('id');
			//echo $this->Form->input('proyecto_id');
			echo $this->Form->input('Revision.titulo',array('label'=>'Título'));

			echo $this->Form->input('Revision.resumen',array('class'=>'form-control textarea-wysihtml5'));

			echo $this->Form->input('Revision.etiquetas',array('label'=>'Palabras Clave ','between'=>'&nbsp;<span>separadas por coma ( , )</span>'));

			echo $this->Form->input('Revision.descripcion',array('label'=>'Descripción','class'=>'form-control textarea-wysihtml5'));

			echo $this->Form->input('Revision.observaciones',array('class'=>'form-control textarea-wysihtml5'));

			//echo $this->Form->input('usuario_id');
			//echo $this->Form->input('metadata');
		?>
				</div>
				<div class="box-footer">
					<?php echo $this->Form->button('<i class="fa fa-save fa-fw"></i> Guardar Revisión',array('type'=>'submit','class'=>'btn btn-primary',));?>

					<?php echo $this->Html->link('<i class="fa fa-reply fa-fw"></i> Regresar al Proyecto',array('controller'=>'proyectos','action'=>'view',$this->Form->value('proyecto_id')),array('class'=>'btn btn-default','escape'=>false)); ?>
				</div>
				<?php echo $this->Form->end(); ?>



			</div>
		</div>

		<?php echo $this->element('ayuda/main',array('ruta'=>'proyectos.add')); ?>

	</div>

	<?php
		echo $this->Html->script('/libs/wysihtml5/dist/wysihtml5-0.3.0.min',array('inline'=>false));
		echo $this->Html->css('/libs/bootstrap3-wysihtml5/dist/bootstrap-wysihtml5-0.0.2',array('inline'=>false));
		echo $this->Html->script('/libs/bootstrap3-wysihtml5/dist/bootstrap-wysihtml5-0.0.2',array('inline'=>false));
		echo $this->Html->script('/mods/bootstrap3-wysihtml5/bootstrap-wysihtml5.es-MO',array('inline'=>false));
	?>
	<?php $this->Html->scriptStart(array('inline' => false)); ?>
		$(function(){
			$('.textarea-wysihtml5').each(function(){

				$(this).wysihtml5({
							"font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
							"emphasis": true, //Italics, bold, etc. Default true
							"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
							"html": false, //Button which allows you to edit the generated HTML. Default false
							"link": true, //Button to insert a link. Default true
							"image": true, //Button to insert an image. Default true,
							"color": false, //Button to change color of font
							"size": 'sm',
							"fa": true,
							locale: "es-MO",
					});
			});

			$('.wysihtml5-toolbar').addClass('pull-right');
		});
	<?php $this->Html->scriptEnd(); ?>

</section><!-- /.content -->
