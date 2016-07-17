<div class="asuntos form">
<?php echo $this->Form->create('Asunto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Asunto'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Asunto.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Asunto.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Asuntos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Metas'), array('controller' => 'metas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meta'), array('controller' => 'metas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Propietario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
