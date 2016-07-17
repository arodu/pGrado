<div id="metas" class="metas index">
	<div class="pull-right">
		<?php
			echo $this->Html->link(
				'<i class="fa fa-plus fa-fw"></i> '.__('Nuevo Asunto'),
				array('controller'=>'asuntos', 'action'=>'add', $proyecto_id),
				array(
					'id'=>'btn-nuevo-asunto',
					'class'=>'btn btn-default btn-sm',
					'escape'=>false,
				)
			);
		?>
	</div>
	<div class="clearfix"></div>
	<hr/>
	<div>

	</div>
</div>


<?php // ----------------- JavaScript ------------------- ?>
	<script type="text/javascript">
		$('#btn-nuevo-asunto').modalLink('#generalModal');
	</script>

<!--
<div class="asuntos index">
	<h2><?php echo __('Asuntos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_id'); ?></th>
			<th><?php echo $this->Paginator->sort('proyecto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('num_secuencia'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('cerrado'); ?></th>
			<th><?php echo $this->Paginator->sort('propietario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('responsable_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($asuntos as $asunto): ?>
	<tr>
		<td><?php echo h($asunto['Asunto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($asunto['Meta']['titulo'], array('controller' => 'metas', 'action' => 'view', $asunto['Meta']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($asunto['Proyecto']['tema'], array('controller' => 'proyectos', 'action' => 'view', $asunto['Proyecto']['id'])); ?>
		</td>
		<td><?php echo h($asunto['Asunto']['num_secuencia']); ?>&nbsp;</td>
		<td><?php echo h($asunto['Asunto']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($asunto['Asunto']['cerrado']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($asunto['Propietario']['cedula'], array('controller' => 'usuarios', 'action' => 'view', $asunto['Propietario']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($asunto['Responsable']['cedula'], array('controller' => 'usuarios', 'action' => 'view', $asunto['Responsable']['id'])); ?>
		</td>
		<td><?php echo h($asunto['Asunto']['created']); ?>&nbsp;</td>
		<td><?php echo h($asunto['Asunto']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $asunto['Asunto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $asunto['Asunto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $asunto['Asunto']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $asunto['Asunto']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Asunto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Metas'), array('controller' => 'metas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meta'), array('controller' => 'metas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Propietario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>


-->
