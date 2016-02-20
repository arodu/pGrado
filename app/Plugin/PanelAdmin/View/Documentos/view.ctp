<div class="documentos view">
<h2><?php echo __('Documento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($documento['Documento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Documento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($documento['TipoDocumento']['nombre'], array('controller' => 'tipo_documentos', 'action' => 'view', $documento['TipoDocumento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proyecto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($documento['Proyecto']['tema'], array('controller' => 'proyectos', 'action' => 'view', $documento['Proyecto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php
		 		if($documento['TipoDocumento']['code'] == 'aprob-prop'){
		 			echo '<strong>Jurados: </strong><br/>';
		 			echo '<ul>';
					foreach ($new_data as $data) {
						echo '<li>'.$data.'</li>';
					}
					echo '</ul>';
				} 
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($documento['Documento']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($documento['Documento']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Documento'), array('action' => 'edit', $documento['Documento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Documento'), array('action' => 'delete', $documento['Documento']['id']), array(), __('Are you sure you want to delete # %s?', $documento['Documento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Documentos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Documento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipo Documentos'), array('controller' => 'tipo_documentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Documento'), array('controller' => 'tipo_documentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
	</ul>
</div>
