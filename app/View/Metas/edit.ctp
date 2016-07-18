<?php

	$meta_id = $this->bsForm->value('Meta.id');

	$metas[$meta_id] =  array(
		'name' => $metas[$meta_id],
		'value' => '',
		'disabled' => TRUE,
		//'selected' => TRUE
	);
?>

<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="addAutorLabel">Editar Meta</h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Flash->render() ?>

			<?php if(!$success): ?>
				<?php echo $this->bsForm->create('Meta', array('class'=>'ajaxForm')); ?>
					<?php echo $this->bsForm->hidden('Meta.proyecto_id',array('value'=>$proyecto_id)); ?>
					<div class="row">
						<div class="col-md-8">
							<?php echo $this->bsForm->input('Meta.id'); ?>
							<?php echo $this->bsForm->input('Meta.titulo'); ?>
							<?php echo $this->bsForm->input('Meta.parent_id',array('options'=>$metas, 'label'=>'Meta Padre', 'empty'=>'')); ?>
							<?php echo $this->bsForm->input('Meta.descripcion'); ?>
						</div>
						<div class="col-md-4">
							<label>Fecha de Culminación</label>
							<div id="fechaCulminacion" data-input="#culminacionImput"></div>
							<?php echo $this->bsForm->input('Meta.culminacion', array('type'=>'hidden', 'id'=>'culminacionImput')); ?>
						</div>
					</div>
					<hr/>
					<?php echo $this->Form->button('Guardar', array('value'=>'Guardar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')); ?>
					<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
				<?php echo $this->bsForm->end(); ?>

			<?php else: ?>
				<hr/>
				<script type="text/javascript">
					cargarMetas();
				</script>
				<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php $this->Html->css('/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min', array('inline'=>false)); ?>
<?php $this->Html->script('/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min', array('inline'=>false)); ?>
<?php $this->Html->script('/libs/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min', array('inline'=>false)); ?>

<?php $this->Html->scriptStart(array('inline'=>false)); ?>
	$('.ajaxForm').ajaxForm({
		target: '#generalModal',
	});

	var fecha = $('#fechaCulminacion').datepicker({
		format: "yyyy-mm-dd",
		maxViewMode: 2,
		clearBtn: true,
		language: "es",
		orientation: "auto left",
		todayHighlight: true
	});

	fecha.on('changeDate', function(e){
		var date = fecha.datepicker('getDate');
		var input = $( fecha.data('input') );
		if( date == null){
			input.val('');
		}else{
			input.val(date.getFullYear()+"-"+ (date.getMonth()+1) +"-"+date.getDate());
		}
  });

	var input = $( fecha.data('input') );
	if( input.val() != ''){
		fecha.datepicker('update', input.val() );
	}

<?php $this->Html->scriptEnd(); ?>



<!--
<div class="metas form">
<?php echo $this->Form->create('Meta'); ?>
	<fieldset>
		<legend><?php echo __('Edit Meta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('proyecto_id');
		echo $this->Form->input('alias');
		echo $this->Form->input('titulo');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('principal');
		echo $this->Form->input('cerrado');
		echo $this->Form->input('bloqueado');
		echo $this->Form->input('completado');
		echo $this->Form->input('total');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		echo $this->Form->input('finalized');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Meta.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Meta.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Metas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Metas'), array('controller' => 'metas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Meta'), array('controller' => 'metas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asuntos'), array('controller' => 'asuntos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asunto'), array('controller' => 'asuntos', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->
