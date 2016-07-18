<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="addAutorLabel">Agregar Nuevo Asunto</h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Session->flash(); ?>

			<?php if(!$success): ?>
				<?php echo $this->bsForm->create('Asunto', array('class'=>'ajaxForm')); ?>
					<?php echo $this->bsForm->hidden('Asunto.proyecto_id',array('value'=>$proyecto_id)); ?>
					<?php
						echo $this->bsForm->input('descripcion');
						echo $this->bsForm->input('meta_id', array('empty'=>''));
						echo $this->bsForm->input('responsable_id', array('empty'=>'', 'selected'=>$userInfo['id']));
					?>
					<hr/>
					<?php echo $this->Form->button('Guardar', array('value'=>'Guardar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')); ?>
					<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
				<?php echo $this->bsForm->end(); ?>

			<?php else: ?>
				<hr/>
				<script type="text/javascript">
					cargarAsuntos();
				</script>
				<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
			<?php endif; ?>
		</div>
	</div>
</div>


<?php $this->Html->scriptStart(array('inline'=>false)); ?>
	$('.ajaxForm').ajaxForm({
		target: '#generalModal',
	});
<?php $this->Html->scriptEnd(); ?>

<!--
<div class="asuntos form">
<?php echo $this->Form->create('Asunto'); ?>
	<fieldset>
		<legend><?php echo __('Add Asunto'); ?></legend>
	<?php
		echo $this->Form->input('meta_id');
		echo $this->Form->input('proyecto_id');
		echo $this->Form->input('num_secuencia');
		echo $this->Form->input('titulo');
		echo $this->Form->input('cerrado');
		echo $this->Form->input('propietario_id');
		echo $this->Form->input('responsable_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Asuntos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Metas'), array('controller' => 'metas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meta'), array('controller' => 'metas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Propietario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>


-->
