<div class="descargas view">
<h2><?php echo __('Descarga'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($descarga['Descarga']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($descarga['Descarga']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($descarga['Descarga']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Etiqueta'); ?></dt>
		<dd>
			<?php echo h($descarga['Descarga']['etiqueta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ruta'); ?></dt>
		<dd>
			<?php echo h($descarga['Descarga']['ruta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($descarga['Descarga']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($descarga['Descarga']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($descarga['Usuario']['cedula'], array('controller' => 'usuarios', 'action' => 'view', $descarga['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($descarga['Descarga']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Descarga'), array('action' => 'edit', $descarga['Descarga']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Descarga'), array('action' => 'delete', $descarga['Descarga']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $descarga['Descarga']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Descargas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Descarga'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
