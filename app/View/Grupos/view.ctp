<div class="grupos view">
<h2><?php echo __('Grupo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['activo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fase'); ?></dt>
		<dd>
			<?php echo $this->Html->link($grupo['Fase']['nombre'], array('controller' => 'fases', 'action' => 'view', $grupo['Fase']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['meta']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Grupo'), array('action' => 'edit', $grupo['Grupo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Grupo'), array('action' => 'delete', $grupo['Grupo']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $grupo['Grupo']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fases'), array('controller' => 'fases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fase'), array('controller' => 'fases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Proyectos'); ?></h3>
	<?php if (!empty($grupo['Proyecto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tema'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th><?php echo __('Programa Id'); ?></th>
		<th><?php echo __('Sede Id'); ?></th>
		<th><?php echo __('Fase Id'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th><?php echo __('Bloqueado'); ?></th>
		<th><?php echo __('Grupo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($grupo['Proyecto'] as $proyecto): ?>
		<tr>
			<td><?php echo $proyecto['id']; ?></td>
			<td><?php echo $proyecto['tema']; ?></td>
			<td><?php echo $proyecto['categoria_id']; ?></td>
			<td><?php echo $proyecto['programa_id']; ?></td>
			<td><?php echo $proyecto['sede_id']; ?></td>
			<td><?php echo $proyecto['fase_id']; ?></td>
			<td><?php echo $proyecto['estado_id']; ?></td>
			<td><?php echo $proyecto['created']; ?></td>
			<td><?php echo $proyecto['updated']; ?></td>
			<td><?php echo $proyecto['activo']; ?></td>
			<td><?php echo $proyecto['bloqueado']; ?></td>
			<td><?php echo $proyecto['grupo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'proyectos', 'action' => 'view', $proyecto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'proyectos', 'action' => 'edit', $proyecto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'proyectos', 'action' => 'delete', $proyecto['id']), array('confirm' => __('Are you sure you want to delete # %s?', $proyecto['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
