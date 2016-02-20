<?php
	$this->assign('title-page', 'Proyecto <small>Editar Revisión</small>');

	$bc = array(
		'items'=>array(
				0 => array('title'=>'Proyectos','url'=>'/proyectos/index'),
				1 => array('title'=>'Ver Proyecto','url'=>'/proyectos/view/'.$proyecto_id),
			),
		'config'=>array('activo'=>'Editar Revisión')
		);
	$this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));	
?>


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
	echo $this->Html->css('/libs/bootstrap-wysihtml5/bootstrap3-wysihtml5.min',array('inline'=>false));
	echo $this->Html->script('/libs/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',array('inline'=>false));
	echo $this->Html->script('/libs/bootstrap-wysihtml5/locales/bootstrap-wysihtml5.es-MO',array('inline'=>false));
?>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
	$(function(){

		//$("textarea").wysihtml5();

		$('.textarea-wysihtml5').wysihtml5({
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

		$('.wysihtml5-toolbar').addClass('pull-right');

	});
<?php $this->Html->scriptEnd(); ?>