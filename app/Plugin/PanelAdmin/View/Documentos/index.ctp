<div class="documentos index">
	<h2><?php echo __('Documentos'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-condensed">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_documento_id'); ?></th>
			<th><?php echo $this->Paginator->sort('proyecto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('data'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($documentos as $documento): ?>
	<tr>
		<td><?php echo h($documento['Documento']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($documento['TipoDocumento']['nombre'], array('controller' => 'tipo_documentos', 'action' => 'view', $documento['TipoDocumento']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($documento['Proyecto']['tema'], array('controller' => 'proyectos', 'action' => 'view', $documento['Proyecto']['id'])); ?>
		</td>
		<td><?php echo h($documento['Documento']['data']); ?>&nbsp;</td>
		<td><?php echo h($documento['Documento']['created']); ?>&nbsp;</td>
		<td><?php echo h($documento['Documento']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $documento['Documento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $documento['Documento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $documento['Documento']['id']), array(), __('Are you sure you want to delete # %s?', $documento['Documento']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Documento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipo Documentos'), array('controller' => 'tipo_documentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Documento'), array('controller' => 'tipo_documentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
	</ul>
</div>
