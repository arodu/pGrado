<?php echo $this->Session->flash(); ?>

<div class="metas form">
<?php echo $this->bsForm->create('Meta'); ?>
	<?php
		echo $this->bsForm->hidden('Meta.proyecto_id',array('value'=>$proyecto_id));

		echo $this->bsForm->input('Meta.titulo');
		echo $this->bsForm->input('Meta.alias');
		echo $this->bsForm->input('Meta.parent_id',array('options'=>$metas));

		echo $this->bsForm->input('Meta.descripcion');

		echo $this->bsForm->input('Meta.finalized', array('type'=>'text','class'=>'form-control datetimepicker'));
	?>
	<hr/>
	<?php
		echo $this->bsForm->buttom('Guardar', array('type'=>'submit','class'=>'btn btn-primary'));
		echo '&nbsp;';
		echo $this->Html->link('Cancelar',array(),array('class'=>'btn btn-default'));
	?>
<?php echo $this->bsForm->end(); ?>
</div>

<?php $this->Html->scriptStart(array('inline'=>false)); ?>

	$('.datetimepicker').datetimepicker({
		format: 'yyyy-mm-dd hh:ii',
		autoclose: true,
		language: 'es',
		minuteStep: 10
	});

<?php $this->Html->scriptEnd(); ?>
