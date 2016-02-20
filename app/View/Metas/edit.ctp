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
