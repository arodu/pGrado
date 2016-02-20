<div class="metas view">
<h2><?php echo __('Meta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proyecto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($meta['Proyecto']['tema'], array('controller' => 'proyectos', 'action' => 'view', $meta['Proyecto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Principal'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['principal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cerrado'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['cerrado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bloqueado'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['bloqueado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Completado'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['completado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Meta'); ?></dt>
		<dd>
			<?php echo $this->Html->link($meta['ParentMeta']['alias'], array('controller' => 'metas', 'action' => 'view', $meta['ParentMeta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Finalized'); ?></dt>
		<dd>
			<?php echo h($meta['Meta']['finalized']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Meta'), array('action' => 'edit', $meta['Meta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Meta'), array('action' => 'delete', $meta['Meta']['id']), array(), __('Are you sure you want to delete # %s?', $meta['Meta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Metas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meta'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Metas'), array('controller' => 'metas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Meta'), array('controller' => 'metas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asuntos'), array('controller' => 'asuntos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asunto'), array('controller' => 'asuntos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Asuntos'); ?></h3>
	<?php if (!empty($meta['Asunto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Meta Id'); ?></th>
		<th><?php echo __('Num Secuencia'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Etiquetas'); ?></th>
		<th><?php echo __('Cerrado'); ?></th>
		<th><?php echo __('Propietario Id'); ?></th>
		<th><?php echo __('Responsable Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Finalized'); ?></th>
		<th><?php echo __('Proyecto Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($meta['Asunto'] as $asunto): ?>
		<tr>
			<td><?php echo $asunto['id']; ?></td>
			<td><?php echo $asunto['meta_id']; ?></td>
			<td><?php echo $asunto['num_secuencia']; ?></td>
			<td><?php echo $asunto['titulo']; ?></td>
			<td><?php echo $asunto['descripcion']; ?></td>
			<td><?php echo $asunto['etiquetas']; ?></td>
			<td><?php echo $asunto['cerrado']; ?></td>
			<td><?php echo $asunto['propietario_id']; ?></td>
			<td><?php echo $asunto['responsable_id']; ?></td>
			<td><?php echo $asunto['created']; ?></td>
			<td><?php echo $asunto['updated']; ?></td>
			<td><?php echo $asunto['finalized']; ?></td>
			<td><?php echo $asunto['proyecto_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'asuntos', 'action' => 'view', $asunto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'asuntos', 'action' => 'edit', $asunto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'asuntos', 'action' => 'delete', $asunto['id']), array(), __('Are you sure you want to delete # %s?', $asunto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Asunto'), array('controller' => 'asuntos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Metas'); ?></h3>
	<?php if (!empty($meta['ChildMeta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Proyecto Id'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Principal'); ?></th>
		<th><?php echo __('Cerrado'); ?></th>
		<th><?php echo __('Bloqueado'); ?></th>
		<th><?php echo __('Completado'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Finalized'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($meta['ChildMeta'] as $childMeta): ?>
		<tr>
			<td><?php echo $childMeta['id']; ?></td>
			<td><?php echo $childMeta['proyecto_id']; ?></td>
			<td><?php echo $childMeta['alias']; ?></td>
			<td><?php echo $childMeta['titulo']; ?></td>
			<td><?php echo $childMeta['descripcion']; ?></td>
			<td><?php echo $childMeta['principal']; ?></td>
			<td><?php echo $childMeta['cerrado']; ?></td>
			<td><?php echo $childMeta['bloqueado']; ?></td>
			<td><?php echo $childMeta['completado']; ?></td>
			<td><?php echo $childMeta['total']; ?></td>
			<td><?php echo $childMeta['parent_id']; ?></td>
			<td><?php echo $childMeta['lft']; ?></td>
			<td><?php echo $childMeta['rght']; ?></td>
			<td><?php echo $childMeta['created']; ?></td>
			<td><?php echo $childMeta['updated']; ?></td>
			<td><?php echo $childMeta['finalized']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'metas', 'action' => 'view', $childMeta['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'metas', 'action' => 'edit', $childMeta['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'metas', 'action' => 'delete', $childMeta['id']), array(), __('Are you sure you want to delete # %s?', $childMeta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Meta'), array('controller' => 'metas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
