<div class="grupos form">
<?php echo $this->Form->create('Grupo'); ?>
	<fieldset>
		<legend><?php echo __('Add Grupo'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('activo');
		echo $this->Form->input('fase_id');
		echo $this->Form->input('meta');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Grupos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Fases'), array('controller' => 'fases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fase'), array('controller' => 'fases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
	</ul>
</div>
