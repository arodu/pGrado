<div class="categorias view">
<h2><?php echo __('Categoria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Id'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $categorias_ruta;?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['activo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categoria'), array('action' => 'edit', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoria'), array('action' => 'delete', $categoria['Categoria']['id']), array(), __('Are you sure you want to delete # %s?', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
	</ul>
</div>


<div class="related">
	<h3><?php echo __('Related Usuarios'); ?></h3>
	<?php if (!empty($categoria['Usuario'])): ?>
		<table cellpadding = "0" cellspacing = "0" class="table table-condensed">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Cedula'); ?></th>
			<th><?php echo __('Nombres'); ?></th>
			<th><?php echo __('Apellidos'); ?></th>
			<th><?php echo __('email'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($categoria['Usuario'] as $usuario): ?>
			<tr>
				<td><?php echo $usuario['id']; ?></td>
				<td><?php echo $usuario['cedula']; ?></td>
				<td><?php echo $usuario['nombres']; ?></td>
				<td><?php echo $usuario['apellidos']; ?></td>
				<td><?php echo $usuario['email']; ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'usuarios', 'action' => 'view', $usuario['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>


<div class="related">
	<h3><?php echo __('Related Proyectos'); ?></h3>
	<?php if (!empty($categoria['Proyecto'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-condensed">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tema'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th><?php echo __('Sede Id'); ?></th>
		<th><?php echo __('Fase Id'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th><?php echo __('Grupo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoria['Proyecto'] as $proyecto): ?>
		<tr>
			<td><?php echo $proyecto['id']; ?></td>
			<td><?php echo $proyecto['tema']; ?></td>
			<td><?php echo $proyecto['categoria_id']; ?></td>
			<td><?php echo $proyecto['sede_id']; ?></td>
			<td><?php echo $proyecto['fase_id']; ?></td>
			<td><?php echo $proyecto['estado_id']; ?></td>
			<td><?php echo $proyecto['created']; ?></td>
			<td><?php echo $proyecto['updated']; ?></td>
			<td><?php echo $proyecto['activo']; ?></td>
			<td><?php echo $proyecto['grupo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'proyectos', 'action' => 'view', $proyecto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'proyectos', 'action' => 'edit', $proyecto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'proyectos', 'action' => 'delete', $proyecto['id']), array(), __('Are you sure you want to delete # %s?', $proyecto['id'])); ?>
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
