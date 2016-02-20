<div class="logs index">
	<h2><?php echo __('Logs'); ?></h2>
	<div class="table-responsive">
    	<table cellpadding="0" cellspacing="0" class="table table-condensed">
    		<thead>
    			<tr>
    					<th><?php echo $this->Paginator->sort('id'); ?></th>
    					<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
    					<th><?php echo $this->Paginator->sort('code'); ?></th>
    					<th><?php echo $this->Paginator->sort('related_id'); ?></th>
    					<th><?php echo $this->Paginator->sort('created'); ?></th>
    					<th><?php echo $this->Paginator->sort('observacion'); ?></th>
    					<!-- <th class="actions"><?php echo __('Actions'); ?></th> -->
    			</tr>

    		</thead>
        	<tbody>
            	<?php foreach ($logs as $log): ?>
            		<tr>
            			<td><?php echo h($log['Log']['id']); ?>&nbsp;</td>
            			<td>
            				<?php echo $this->Html->link($log['Usuario']['cedula_nombre_completo'], array('controller' => 'usuarios', 'action' => 'view', $log['Usuario']['id'])); ?>
            			</td>
            			<td>

            				<spam title="<?php echo $log['DescripcionLog']['descripcion']; ?>" data-toggle="tooltip" data-placement="right"><?php echo $log['DescripcionLog']['code']; ?></spam>

            			</td>

            			<!-- Arreglar Aqui -->
            			<td><?php echo h($log['Log']['related_id']); ?>&nbsp;</td>

            			<td><?php echo h($log['Log']['created']); ?>&nbsp;</td>
            			<td><?php echo h($log['Log']['observacion']); ?>&nbsp;</td>
            			<!--<td class="actions">
            				<?php echo $this->Html->link(__('View'), array('action' => 'view', $log['Log']['id'])); ?>
            				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $log['Log']['id'])); ?>
            				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $log['Log']['id']), array(), __('Are you sure you want to delete # %s?', $log['Log']['id'])); ?>
            			</td> -->
            		</tr>
            	<?php endforeach; ?>
        	</tbody>
    	</table>
    </div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
    <ul class="pagination">
    <?php
    echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
    echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
    echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
    ?>
    </ul>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Log'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Descripcion Logs'), array('controller' => 'descripcion_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Descripcion Log'), array('controller' => 'descripcion_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
<?php $this->Html->scriptEnd(); ?>