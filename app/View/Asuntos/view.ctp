<div class="asuntos view">
<h2><?php echo __('Asunto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($asunto['Asunto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta'); ?></dt>
		<dd>
			<?php echo $this->Html->link($asunto['Meta']['titulo'], array('controller' => 'metas', 'action' => 'view', $asunto['Meta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proyecto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($asunto['Proyecto']['tema'], array('controller' => 'proyectos', 'action' => 'view', $asunto['Proyecto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Secuencia'); ?></dt>
		<dd>
			<?php echo h($asunto['Asunto']['num_secuencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($asunto['Asunto']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cerrado'); ?></dt>
		<dd>
			<?php echo h($asunto['Asunto']['cerrado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Propietario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($asunto['Propietario']['cedula'], array('controller' => 'usuarios', 'action' => 'view', $asunto['Propietario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Responsable'); ?></dt>
		<dd>
			<?php echo $this->Html->link($asunto['Responsable']['cedula'], array('controller' => 'usuarios', 'action' => 'view', $asunto['Responsable']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($asunto['Asunto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($asunto['Asunto']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Asunto'), array('action' => 'edit', $asunto['Asunto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Asunto'), array('action' => 'delete', $asunto['Asunto']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $asunto['Asunto']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Asuntos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asunto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Metas'), array('controller' => 'metas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meta'), array('controller' => 'metas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Propietario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
